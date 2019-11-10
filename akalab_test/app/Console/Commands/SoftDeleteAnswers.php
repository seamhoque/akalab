<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Answers;
use Carbon\Carbon;

class SoftDeleteAnswers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SoftDeleteAnswers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes answers every 24 hrs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        Answers::withTrashed()->where( 'created_at', '>', Carbon::now()->subDays(1))
            ->get();

    }
}
