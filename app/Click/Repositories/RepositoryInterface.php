<?php


namespace App\Click\Repositories;


use Illuminate\Contracts\Support\Jsonable;

interface RepositoryInterface
{
    public function all(int $limit, int $offset, string $sort_by, string $order, array $filters) : iterable;
    public function find($id) : Jsonable;
    public function create(array $data) : Jsonable;
    public function update($id, array $data) : Jsonable;
    public function delete($id);
}
