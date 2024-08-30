<?php

namespace App\Imports;

use App\Imports\Sheets\SplitsSheet;
use App\Imports\Sheets\DividendsSheet;
use App\Imports\Sheets\DailyChangesSheet;
use App\Imports\Sheets\MarketDataSheet;
use App\Imports\Sheets\PortfoliosSheet;
use App\Imports\Sheets\TransactionsSheet;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BackupImport implements WithMultipleSheets
{

    use Importable;

    public function sheets(): array
    {
        return [
            'Portfolios' => new PortfoliosSheet,
            'Transactions' => new TransactionsSheet,
            'Daily Changes' => new DailyChangesSheet,
        ];

        // Can listen for AfterSheet to run clean up afterwards
    }
}
