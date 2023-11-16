<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required|min:5|max:2000',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unit_id' => 'required',
            'manufacturer' => 'required',
            'department_id' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required', 
            'low_stock_level' => 'required|min:1|numeric'
        ];
    }
}
