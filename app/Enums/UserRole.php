<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case EDITOR = 'editor';
    case PSB_OFFICER = 'psb_officer';
    case APPLICANT = 'applicant';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::EDITOR => 'Editor Konten',
            self::PSB_OFFICER => 'Petugas PSB',
            self::APPLICANT => 'Pendaftar / Calon Santri',
        };
    }

    public function isStaff(): bool
    {
        return in_array($this, [self::SUPER_ADMIN, self::EDITOR, self::PSB_OFFICER], true);
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
