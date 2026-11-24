<?php

namespace App\Enums;

enum RegistrationStatus: string
{
    case DRAFT = 'draft';
    case SUBMITTED = 'submitted';
    case NEEDS_REVISION = 'needs_revision';
    case VERIFIED = 'verified';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draf Formulir',
            self::SUBMITTED => 'Terkirim / Menunggu Verifikasi',
            self::NEEDS_REVISION => 'Perlu Revisi',
            self::VERIFIED => 'Terverifikasi Berkas',
            self::ACCEPTED => 'Diterima',
            self::REJECTED => 'Tidak Diterima',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::DRAFT => 'bg-gray-100 text-gray-800 border-gray-200',
            self::SUBMITTED => 'bg-blue-100 text-blue-800 border-blue-200',
            self::NEEDS_REVISION => 'bg-amber-100 text-amber-800 border-amber-200',
            self::VERIFIED => 'bg-teal-100 text-teal-800 border-teal-200',
            self::ACCEPTED => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            self::REJECTED => 'bg-rose-100 text-rose-800 border-rose-200',
        };
    }

    public function canApplicantEdit(): bool
    {
        return in_array($this, [self::DRAFT, self::NEEDS_REVISION], true);
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
