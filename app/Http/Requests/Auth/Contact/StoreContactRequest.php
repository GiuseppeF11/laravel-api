<?php

namespace App\Http\Requests\Auth\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'username' => 'required|max:64',
            'email' => 'required|email|max:255',
            'message' => 'required|max:2048',
            'accepted' => 'required|boolean|accepted',
        ];
    }
}
