<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $product_id = $this->route('product')->id;
        return [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]*$/',
            'description' => 'nullable|string',
            'image' => 'image',
            'barcode' => 'required|string|max:50|regex:/^[a-zA-Z0-9_.-]*$/|unique:products,barcode,' . $product_id,
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'status' => 'required|boolean',
        ];
    }
}
