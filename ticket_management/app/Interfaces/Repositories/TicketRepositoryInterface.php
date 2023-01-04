<?php
namespace App\Interfaces\Repositories;

use GuzzleHttp\Psr7\Request;

interface TicketRepositoryInterface
{
  public function getTickets();
  public function save(array $ticket);
  public function show($id);
  public function delete($ticket);
  public function update(array $ticket, $id);


}
