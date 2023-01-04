<?php
namespace App\Services;

use App\Interfaces\Services\TicketServiceClassInterface;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;


class TicketServiceClass implements TicketServiceClassInterface
{
    private TicketRepository $repository;

    public function __construct( TicketRepository $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }

    public function getTickets()
    {
       return $this->repository->getTickets();
    }

    public function save(array $ticket)
    {
        return $this->repository->save($ticket);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function delete($ticket)
    {
        return $this->repository->delete($ticket);
    }

    public function update(array $ticket, $id)
    {
        return $this->repository->update($ticket, $id);
    }

}
