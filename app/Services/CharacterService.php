<?php

namespace App\Services;

use App\Repositories\contracts\CharacterRepositoryInterface;

class CharacterService
{
    private $characterRepository;
    private $houseService;

    public function __construct(CharacterRepositoryInterface $characterRepository, HouseService $houseService)
    {
        $this->characterRepository = $characterRepository;
        $this->houseService        = $houseService;
    }

    public function create(array $data)
    {
        if (!array_key_exists('house', $data)) {
            $data['house'] = $this->houseService->selectorHat();
        }

        return $this->characterRepository->create($data);
    }

    public function update(array $data, $characterId)
    {
        return $this->characterRepository->update($data, $characterId);
    }

    public function delete(int $characterId)
    {
        return $this->characterRepository->delete($characterId);
    }

    public function list()
    {
        return $this->characterRepository->list();
    }

    public function find(int $characterId)
    {
        return $this->characterRepository->find($characterId);
    }

    public function findByHouse(string $houseId)
    {
        return $this->characterRepository->findByHouse($houseId);
    }
}
