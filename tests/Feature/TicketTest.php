<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ticket;
use App\Http\Controllers\API\TicketController;

class TicketTest extends TestCase
{
    /**
     * Ticket API Controller processed Tickets method
     *
     * @return void
     */
    public function testGetProcessedTickets()
    {
        $controller = new TicketController;
        $result = $controller->getProcessedTickets();
        $this->assertEquals('OK', $result->statusText());
    }

    /**
     * Ticket API Controller unprocessed Tickets method
     *
     * @return void
     */
    public function testGetUnprocessedTickets()
    {
        $controller = new TicketController;
        $result = $controller->getUnprocessedTickets();
        $this->assertEquals('OK', $result->statusText());
    }


    /**
     * Ticket API Controller user tickets
     *
     * @return void
     */
    public function testGetUserTickets()
    {
        $controller = new TicketController;
        $result = $controller->getUserTickets('test@email.com');
        $this->assertEquals('OK', $result->statusText());
    }

    /**
     * Ticket API Controller ticket stats
     *
     * @return void
     */
    public function testGetTicketStats()
    {
        $controller = new TicketController;
        $result = $controller->getStats();
        $this->assertEquals('OK', $result->statusText());
    }

}
