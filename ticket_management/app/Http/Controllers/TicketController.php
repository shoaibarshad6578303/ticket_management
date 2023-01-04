<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTicket;
use App\Ticket;
use Illuminate\Http\Request;
use App\Interfaces\Services\TicketServiceClassInterface;
use App\Http\Requests\StoreTicket;

class TicketController extends Controller
{
    private TicketServiceClassInterface $interface;


    public function __construct( TicketServiceClassInterface $ticketServiceClassInterface)
    {
        $this->interface = $ticketServiceClassInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->interface->getTickets();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        return $this->interface->save($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return $this->interface->show($ticket->id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicket $request, Ticket $ticket)
    {
        return $this->interface->update($request->all(), $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        return $this->interface->delete($ticket);
    }
}
