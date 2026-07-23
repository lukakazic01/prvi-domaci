<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CartAddRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:products',
            'amount' => 'required|integer|min:1',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $product = Product::query()->find($this->input('id'));
                if ($product->amount < $this->input('amount')) {
                    $validator->errors()->add("amount", "We only have $product->amount in our stock");
                }
            }
        ];
    }
}
