<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Report extends Model
{
    protected $fillable = ['year', 'type', 'title', 'file_path'];

    protected $appends = ['url'];

    /**
     * Public download URL for the report PDF.
     *
     * When services.reports.base_url (REPORTS_BASE_URL) is set, the file is
     * served from an external object store — REPORTS_BASE_URL + filename —
     * so the oversized audited PDFs never enter the Cloudflare Pages build
     * (25 MB per-file limit). When it is empty, we fall back to the local
     * public disk, preserving local development and Laravel hosting exactly.
     */
    public function getUrlAttribute(): string
    {
        $base = config('services.reports.base_url');

        if (filled($base)) {
            return rtrim($base, '/').'/'.basename($this->file_path);
        }

        return Storage::disk('public')->url($this->file_path);
    }
}
