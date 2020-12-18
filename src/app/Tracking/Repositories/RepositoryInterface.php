<?php


namespace App\Tracking\Repositories;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Returns a number of total rows for the last query in method all()
     * Result can be used for pagination
     * @return int
     */
    public function getSelectAllRowsCount(): int;

    public function all(int $limit, int $offset, string $sort_by = null, string $order = null, array $filters = []): Collection;

    public function find($id): Model;

    public function create(array $data): Model;

    public function update($id, array $data): Model;

    public function delete($id);
}
