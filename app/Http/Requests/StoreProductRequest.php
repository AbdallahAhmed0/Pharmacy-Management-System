<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProductsController;
use App\Models\Products;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'purchase_id' => 'required',
            'price' => 'required|max:800000',
            'discount' => 'max:1000',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'purchase_id.required' => 'Product field is required!',
            'price.required' => 'Price field is required!',
            'price.max' => 'Price exceeded the maximum value, it must be under 80000!',
            'discount.max' => 'Discount exceeded the maximum value!',
            'description.required' => 'Description Field is required!'
        ];
    }

}
