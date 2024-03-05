<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'price' => ['nullable', 'min:0.01', 'max:999.99'],
            'description' => ['nullable', 'string', 'max:500'],
            'avaibility' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome non è valido',
            'price.decimal' => 'Il prezzo inserito non è valido.',
            'description.string' => 'Il campo descrizione non è valido.',
            'description.max' => 'Il campo descrizione non può superare i :max caratteri.',
            'avaibility.boolean' => 'Il valore del campo Disponibilità non è corretto.',
            'image.image' => 'Il file inserito non è un immagine.',
            'image.max' => 'Il file inserito non può superare i 4MB.',
        ];
    }
}
