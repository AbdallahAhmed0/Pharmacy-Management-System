<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuppliers extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'product' => 'required'
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'company.required' => 'Company is required',
            'product.required' => 'Product is required'
        ];
    }
}
