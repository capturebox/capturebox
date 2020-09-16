<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpdateIdeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all Laravel IDE Helper files';

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
        Artisan::call('ide-helper:generate');
        $this->info(Artisan::output());

        Artisan::call('ide-helper:meta');
        $this->info(Artisan::output());

        Artisan::call('ide-helper:models', ['--nowrite' => true]);
        $this->info(Artisan::output());
    }
}
