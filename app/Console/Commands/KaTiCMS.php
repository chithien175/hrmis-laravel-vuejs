<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class KaTiCMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'katicms:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs all system and sub-system migrations';

    protected $modules = ['Blog', 'Menu'];

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:fresh', [
            '--force' => 'force',
        ]);
        $this->call('db:seed', [
            '--force' => 'force',
        ]);

        foreach($this->modules as $module){
            $this->call('module:migrate', [
                'module' => $module,
            ]);
            $this->call('module:seed', [
                'module' => $module,
            ]);
        }
    }
}
