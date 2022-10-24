<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Ticket;

class CreateTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new dummy ticket every minute';

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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function handle(Schedule $schedule, Ticket $ticket)
    {
        $count = 0;
        while(true) {
            Ticket::factory()
            ->count(1)
            ->create();
            $count ++;
            $this->info( $count . ' Tickets have been created.');
            sleep(60);
        }
    }
}
