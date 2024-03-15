<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages(): array
    {
        return [
            //user
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome non è valido',
            'name.max' => 'Il nome può essere al massimo :max caratteri.',
            'surname.required' => 'Il campo cognome è obbligatorio.',
            'surname.string' => 'Il campo cognome non è valido',
            'surname.max' => 'Il cognome può essere al massimo :max caratteri.',
            'email.required' => 'Il campo email è obbligatorio.',
            'email.string' => 'Il campo email non è valido',
            'email.lowercase' => 'Il campo email non è valido.',
            'email.email' => 'Il campo email non è valido.',
            'email.max' => 'La mail può essere al massimo :max caratteri.',
            'email.unique' => 'La mail è già stata usata.',
            'password.required' => 'Il campo password è obbligatorio.',
            'password.confirmed' => 'Le password devono coincidere.',
            //user
        ];
    }
}
