<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'business_type_id' => 'numeric|required|exists:business_types,id',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ];
    }
}