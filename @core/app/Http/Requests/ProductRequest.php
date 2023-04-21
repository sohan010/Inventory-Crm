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
            'product_name' => 'required',
            'product_code' => 'required',
            'product_category_id' => 'required|string|max:191',
            'product_subcategory_id' => 'required|string|max:191',
            'brand_id' => 'nullable|string|max:191',
            'unit_id' => 'required',
            'product_colors' => 'nullable',
            'product_sizes' => 'nullable',
            'product_description' => 'nullable',
            'alert_message' => 'nullable|string',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'barcode' => 'nullable|string|max:191',
            'alert_qty' => 'nullable',
            'image' => 'nullable|string|max:191',
            'feature' => 'nullable|string|max:191',
            'status' => 'nullable',
        ];
    }


    public function messages()
    {
       return [
           'product_name.required' => __('Product Name has to given'),
           'product_code.required' => __('Product code has to given'),
       ];
    }
}
