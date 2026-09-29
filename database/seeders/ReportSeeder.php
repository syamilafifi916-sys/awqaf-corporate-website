<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annualReportYears = range(2015, 2024);
        // 2021 Audited Financial Statement is now available in reports/.
        $financialStatementYears = range(2015, 2025);

        foreach ($annualReportYears as $year) {
            Report::updateOrCreate(
                ['year' => $year, 'type' => 'annual_report'],
                [
                    'title' => "Laporan Tahunan {$year}",
                    'file_path' => "reports/Annual-Report-AWQAF-{$year}.pdf",
                ],
            );
        }

        foreach ($financialStatementYears as $year) {
            Report::updateOrCreate(
                ['year' => $year, 'type' => 'financial_statement'],
                [
                    'title' => "Penyata Kewangan Diaudit {$year}",
                    'file_path' => $year === 2025
                        ? 'documents/reports/Penyata-Kewangan-Diaudit-2025.pdf'
                        : "reports/Audited-financial-statement-{$year}.pdf",
                ],
            );
        }
    }
}
