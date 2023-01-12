<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:customers,id',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'country_id' => 'required',
            'customer_type' => 'nullable',
            'nid' => 'nullable|string|max:191',
            'company_name' => 'nullable|string|max:191',
        ];
    }


    public function messages()
    {
       return [
           'name.required' => __('Name has to given'),
           'email.required' => __('Email has to given'),
       ];
    }
}
