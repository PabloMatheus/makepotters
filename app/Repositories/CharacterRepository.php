<?php


namespace App\Repositories;

use App\Models\Character;
use App\Repositories\contracts\CharacterRepositoryInterface;
use Illuminate\Support\Collection;

class CharacterRepository implements CharacterRepositoryInterface
{

    public function create(array $data): Character
    {
        return Character::create([
            'name'     => $data['name'],
            'house'    => $data['house'],
            'patronus' => $data['patronus'],
            'school'   => $data['school'],
            'role'     => "student"
        ]);
    }

    public function list(): Collection
    {
        return Character::all();
    }

    public function find(int $characterId)
    {
        return Character::find($characterId);
    }

    public function findByHouse(string $houseId)
    {
        return Character::where('house', $houseId)->get();
    }

    public function delete(int $characterId)
    {
        $character = Character::find($characterId);
        return $character->delete();
    }

    public function update(array $data, int $characterId)
    {
        $character = Character::find($characterId);
        return $character->update($data);
    }
}
