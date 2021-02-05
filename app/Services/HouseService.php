<?php


namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class HouseService
{

    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function getHouses()
    {
        $response = $this->httpClient->request('GET', env('POTTERAPI_HOST'), [
            'headers' => [
                'apiKey' => env('POTTERAPI_APIKEY')
            ]
        ]);

        if ($response->getStatusCode() == Response::HTTP_OK) {
            $houses = $response->getBody()->getContents();
            Redis::set('houses', $houses);
        }

        return $houses;
    }

    public function find(string $houseId): bool
    {
        $houses = $this->getCachedHouses();

        $filtered = $houses->search(function ($value, $key) use ($houseId) {
            return $value['id'] == $houseId;
        });

        if ($filtered !== false) {
            return true;
        }

        return false;
    }

    public function selectorHat(): string
    {
        $houses       = $this->getCachedHouses();
        $sortPosition = array_rand($houses->toArray());
        return $houses[$sortPosition]["id"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCachedHouses(): \Illuminate\Support\Collection
    {
        $cachedHouses = Redis::get('houses');

        if (is_null($cachedHouses)) {
            $this->getHouses();
        }

        $houses = json_decode($cachedHouses, true);
        $houses = collect($houses['houses']);
        return $houses;
    }
}
