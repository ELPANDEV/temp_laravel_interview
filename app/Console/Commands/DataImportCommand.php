<?php

namespace App\Console\Commands;

use App\Imports\DataImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class DataImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from sheet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $importer = new DataImport();
        $sheets   = array_keys($importer->conditionalSheets());

        if ($this->option('all')) $importer->onlySheets($sheets);
        else {
            $tables = $this->choice(
                'Pick all tables that you wanna import',
                $sheets,
                0,
                null,
                true
            );
    
            $this->info('Tables selected => ' . implode(', ', $tables));
            
            $importer->onlySheets($tables);
        }
        
        Excel::import($importer, 'zip_codes.xls', 'public');
    }
}
