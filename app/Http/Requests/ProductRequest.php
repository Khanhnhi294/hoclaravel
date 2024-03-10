<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'product_name' => 'required|min:6',
            'price' => 'required|integer'
        ];
    }
    public function messages(){

        return ['product_name.required' => 'Please enter :attribute',
        'product_name.min' => 'Please enter more than :min chracter',
        'price.required' => 'Please enter :attribute',
        'price.integer' => 'Please enter number'];
    }
    public function attributes(){
        return[
            'product_name'=>'Ten san pham',
            'price'=>'Gia san pham'
        ];
    }
}