<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,gif,png',
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'email.unique' => 'Email duplicated',
            'avatar.image' => 'is not Image',
            'avatar.mimes' => 'Extension is not valid',
        ];
    }
}
