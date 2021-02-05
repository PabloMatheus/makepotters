<?php

namespace App\Rules;

use App\Services\HouseService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Redis;

class HouseRule implements Rule
{
    /**
     * @var HouseService
     */
    private $houseService;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->houseService = app(HouseService::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->houseService->find($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'House could not be found.';
    }
}
