<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\HttpClientException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
    public function messages()
    {

        return [
            'product_name.required' => 'Please enter :attribute',
            'product_name.min' => 'Please enter more than :min chracter',
            'price.required' => 'Please enter :attribute',
            'price.integer' => 'Please enter number'
        ];
    }
    public function attributes()
    {
        return [
            'product_name' => 'Ten san pham',
            'price' => 'Gia san pham'
        ];
    }
    public function withValidate($validator)
    {
        $validator->after(function ($validator) {
            // if ($this->somethingElseInvalid()) {
            // $validator->errors()->add('file','Some thing with wrong') ;
            // }
            if($validator->errors->count()>0){
                $validator->errors()->add('file','Some thing with wrong') ;
            }
        });
    }
    protected function prepareForValidation(){
        $this->merge([
            'create_at'=> date('Y-m-d H:i:s')
        ]);
    }
    protected function failedAuthorization()
    {
        // throw new AuthorizationException(redirect('/')->with('msg','You can not access here '));
        throw new HttpClientException(abort(404));
    }
}
