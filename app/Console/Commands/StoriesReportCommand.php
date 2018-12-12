<?php

namespace App\Console\Commands;

use App\Mail\StoriesLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class StoriesReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anonity:stories-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will send mail to admin of daily added stories.';

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
        Mail::to('stories@anonity.in')->send(new StoriesLog());
    }
}
