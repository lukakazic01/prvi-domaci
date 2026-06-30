<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isPost = $this->method() === 'POST';
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                $isPost ? Rule::unique('products') : null,
            ],
            'description' => 'required|min:3|max:255',
            'price' => 'required|gt:0|decimal:2|max:99999',
            'amount' => 'required|integer|gt:0|max_digits:10',
            'image' => [
                $isPost ? 'required' : 'sometimes',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:2048',
            ],
        ];
    }
}
