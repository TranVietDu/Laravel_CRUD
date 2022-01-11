<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePricingRequest extends FormRequest
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
            'price' => 'required',
            'package' => 'required',
            'content_1' => 'required',
            'content_2' => 'required',
            'content_3' => 'required',
            'content_4' => 'required',
            'content_5' => 'required',
            'content_6' => 'required',
        ];
    }
}
