<?php

namespace App\Console\Commands;

use App\Models\Seeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class LoadSeedersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'override the actual command of db seed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $migrator;

    /**
     * The console command description.
     *
     * @var string
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
        $seeder = Seeder::orderBy('batch', 'DESC')->first();
        $newBatch = $seeder ? $seeder->batch + 1 : 1;
        $counter = $this->checkNewFilesAndImportSeedersIfNew($newBatch);
        $this->info('new seeder files executed successfully ' . $counter);
    }

    /**
     * check and run seeders
     * @params integer $newBatch
     */
    private function checkNewFilesAndImportSeedersIfNew($newBatch)
    {
        $path = base_path('database/seeders');
        $failedFiles = [];
        $successFiles = [];
        $alreadyLoaded = [];

        $files = preg_grep('/^([^.])/', scandir($path));
        $count = 0;
        foreach ($files as $item) {
            $one = str_replace('.php','',$item);
            $this->info('checking for ' . $one);

            $found = Seeder::where('seed_class', $one)->first();
            if (empty($found)) {
                try {
                    Artisan::call(sprintf('db:seed --force --class=%s ', $one));
                    $count++;
                    Seeder::create(['seed_class' => $one, 'batch' => $newBatch]);
                    $successFiles[] = $one;
                } catch (\Throwable $th) {
                    $failedFiles[] = $one. "Message = ".$th->getMessage();
                    Log::error('seeder file '.$one);
                    Log::error($th->getMessage());
                    Log::error($th->getTraceAsString());
                }
            } else {
                $alreadyLoaded[] = $one;
            }
        }
        $this->info(" Successfully loaded " . count($successFiles));
        $this->error(" Failed to import data from files " . count($failedFiles));
        $this->error(" Failed files " . implode(',',$failedFiles));
        $this->info(" Old files " . count($alreadyLoaded));

        return $count;
    }

}
