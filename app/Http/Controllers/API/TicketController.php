<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the processed tickets
     *
     * @return \Illuminate\Http\Response
     */
    public function getProcessedTickets()
    {
        $tickets = Ticket::where('status', true)->paginate(10);
        return response()->json($tickets);
    }

    /**
     * Display a listing of the unprocessed tickets
     *
     * @return \Illuminate\Http\Response
     */
    public function getUnprocessedTickets()
    {
        $tickets = Ticket::where('status', false)->paginate(10);
        return response()->json($tickets);
    }

    /**
     * Display a listing of the tickets belonging to an email address
     * @param  String  $email
     * @return \Illuminate\Http\Response
     */
    public function getUserTickets($email)
    {
        $userTickets = Ticket::where('user_email', $email)->paginate(10);
        return response()->json($userTickets);
    }

    /**
     * Display general stats
     *
     * @return \Illuminate\Http\Response
     */
    public function getStats()
    {
        $tickets = Ticket::all();
        $totalCount = count($tickets);

        $unprocessedTickets = $tickets->where('status',false);
        $unprocessedCount = count($unprocessedTickets);

        $userTicket = Ticket::select('user_name')
        ->groupBy('user_name')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();

        $lastProcessed = Ticket::where('status', true)
        ->orderBy('updated_at', 'desc')
        ->first();

        $lastProcessedDate = $lastProcessed->updated_at->format('Y-m-d h:i:sa');

        $data = [
            'total-tickets' => $totalCount,
            'unprocessed-tickets' => $unprocessedCount,
            'biggest-user' => $userTicket->user_name,
            'last-processed' => $lastProcessedDate
        ];
        return response()->json($data);
    }
}
