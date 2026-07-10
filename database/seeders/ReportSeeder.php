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
        $financialStatementYears = array_diff(range(2015, 2024), [2021]);

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
                    'file_path' => "reports/Audited-financial-statement-{$year}.pdf",
                ],
            );
        }
    }
}
