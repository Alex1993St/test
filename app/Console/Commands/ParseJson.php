<?php

namespace App\Console\Commands;

use App\Traits\DataTrait;
use Illuminate\Console\Command;

class ParseJson extends Command
{

    use DataTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Parse json file in folder 'data'";

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
        $this->startParser();
    }
}
