<?php

namespace App\Http\Requests;

use App\Rules\HouseRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'string',
            'role'     => 'string',
            'patronus' => 'string',
            'school'   => 'string',
            'house'    => ['string', new HouseRule]
        ];
    }
}
