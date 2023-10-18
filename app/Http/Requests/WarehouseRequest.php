<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'products' => ['required', 'array'],
            'products.id' => ['required', 'integer'],
            'products.quantity' => ['required', 'integer'],
        ];
    }
}
