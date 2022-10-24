<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Ticket;

class ProcessTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes 1 ticket every 5 minutes';

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
            $ticket = Ticket::where('status' , false)->oldest()->first();
            $ticket->status = true;
            $ticket->save();
            $count ++;
            $this->info( $count . ' Tickets have been processed.');
            sleep(300);
        }
    }
}
