<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class SendAnswer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendAnswer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends an email of answers from last 48 hours';

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
        $name = app('App\Http\Controllers\AnswersController')->answers_48hr();

        Mail::to('seam.hoque@live.com')->send(new SendMailable($name));

        echo "email sent";
    }
}
