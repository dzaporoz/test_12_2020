<?php


namespace App\Tracking\Repositories;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function getSelectAllRowsCount(): int;

    public function all(int $limit, int $offset, ?string $sort_by, ?string $order, array $filters = []): Collection;

    public function find($id): Model;

    public function create(array $data): Model;

    public function update($id, array $data): Model;

    public function delete($id);
}
