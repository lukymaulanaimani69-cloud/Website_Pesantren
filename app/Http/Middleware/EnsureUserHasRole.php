<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->guest(route('login'));
        }

        if (! $user->is_active) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda telah dinonaktifkan oleh Administrator.',
            ]);
        }

        $userRoleValue = is_string($user->role) ? $user->role : $user->role->value;

        // Super Administrator memiliki wewenang penuh
        if ($userRoleValue === 'super_admin') {
            return $next($request);
        }

        // Petakan alias 'admin' atau 'staff' serta pecah pemisah koma
        $normalizedRoles = [];
        foreach ($roles as $roleGroup) {
            foreach (explode(',', $roleGroup) as $r) {
                $r = trim($r);
                if ($r === 'admin' || $r === 'staff') {
                    $normalizedRoles[] = 'super_admin';
                    $normalizedRoles[] = 'editor';
                    $normalizedRoles[] = 'psb_officer';
                } else {
                    $normalizedRoles[] = $r;
                }
            }
        }

        if (! in_array($userRoleValue, $normalizedRoles, true)) {
            abort(403, 'Akses tidak diizinkan. Peran akun Anda tidak memiliki wewenang untuk membuka halaman ini.');
        }

        return $next($request);
    }
}
