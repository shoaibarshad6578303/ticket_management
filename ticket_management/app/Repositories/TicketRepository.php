<?php

namespace App\Repositories;

use App\Http\Resources\TicketCollection;
use App\Http\Resources\TicketResource;
use App\Ticket;
use App\Interfaces\Repositories\TicketRepositoryInterface;
use App\Todo;
use Illuminate\Support\Facades\DB;

class TicketRepository implements TicketRepositoryInterface
{
    private $model;

    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }

    public function getTickets()
    {
        return new TicketCollection($this->model::with('todos')->get());
    }

    public function save( array $ticket )
    {
        DB::beginTransaction();
        try
        {
            $ticketCreated = $this->model::create([
                'name' => $ticket['name']
            ]);

            foreach ($ticket['todos'] as $todo) {
                $todo = new Todo([
                    'name' => $todo['name'],
                    'status' => $todo['status']
                ]);

                $ticketCreated->todos()->save($todo);
            }

        }
        catch( Exception $e )
        {
            DB::rollback();
            return response()->json([
                'error'=> $e->getMessage()
            ],500);
        }

        DB::commit();
        return response()->json(['message' => 'Ticket created successfully'], 201);

    }

    public function show($id)
    {
        return new TicketResource($this->model::with('todos')->where('id', $id)->first());
    }

    public function delete($ticket)
    {
        $ticket->delete();
        return response()->json(204);
    }

    public function update( array $ticket, $id )
    {
        DB::beginTransaction();
        try
        {
            $this->model::where('id', $id)->update([
                'name' => $ticket['name']
            ]);
        }
        catch( Exception $e )
        {
            DB::rollback();
            return response()->json([
                'error'=> $e->getMessage()
            ],500);
        }

        DB::commit();
        return response()->json(['message' => 'Ticket updated successfully'], 200);

    }
}
