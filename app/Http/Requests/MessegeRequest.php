<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessegeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'email' => 'required|email',
            'message' => 'required|min:5|max:1000',
        ];
    }
}
