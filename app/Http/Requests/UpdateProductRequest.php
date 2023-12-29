<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'desc' => [
                'required',
            ],
        ];
    }
}
