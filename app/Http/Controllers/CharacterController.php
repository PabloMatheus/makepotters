<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Services\CharacterService;
use App\Services\HouseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class CharacterController extends Controller
{
    /**
     * @var CharacterService
     */
    private $characterService;

    public function teste()
    {
        $service = new HouseService();
        return $service->getHouse();
    }

    public function __construct(CharacterService $characterService)
    {
        $this->characterService = $characterService;
    }

    public function list(Request $request)
    {
        $queryStrung = $request->getQueryString();

        if (strpos($queryStrung, 'house') !== false) {
            $house = (explode('=',$queryStrung))[1];
            return $this->characterService->findByHouse($house);
        }

        return $this->characterService->list();
    }

    public function find(Request $request)
    {

        return $this->characterService->find($request->id);
    }

    public function create(CreateCharacterRequest $request)
    {
        $character = $this->characterService->create($request->all());

        return response()->json($character, Response::HTTP_CREATED);
    }

    public function delete(Request $request)
    {
        return $this->characterService->delete($request->id);
    }

    public function update(UpdateCharacterRequest $request)
    {
        return $this->characterService->update($request->all(), $request->id);
    }
}
