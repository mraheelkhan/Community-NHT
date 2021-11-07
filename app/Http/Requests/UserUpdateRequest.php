<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'user_image' => 'nullable',
            'email' => "required|email|", Rule::unique('users', 'email')->ignore($this->id),
            'username' => "required|min:5|max:15|", Rule::unique('users', 'username')->ignore($this->id),
        ];
    }
}
