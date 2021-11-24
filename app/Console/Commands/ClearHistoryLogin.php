<?php

namespace App\Console\Commands;

use App\Models\LoginHistory;
use Illuminate\Console\Command;

class ClearHistoryLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:loginHistory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear login histories';

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
     * @return bool
     */
    public function handle(): bool
    {
        LoginHistory::truncate();
        return true;
    }
}
