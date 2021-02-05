<?php


namespace App\Repositories\contracts;


use Illuminate\Support\Collection;

interface CharacterRepositoryInterface
{
    public function create(array $data);

    public function list(): Collection;

    public function find(int $characterId);

    public function findByHouse(string $houseId);

    public function delete(int $characterId);

    public function update(array $data, int $characterId);

}
