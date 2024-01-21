<?php

namespace Battleroad\Championship\Infra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterNewChampionship extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'eventStart' => ['required', 'datetime'],
            'picture' => ['required', 'string'],
        ];
    }
}
