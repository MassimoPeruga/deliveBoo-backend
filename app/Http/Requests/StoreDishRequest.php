<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'price' => ['required', 'min:1', 'max:999', 'numeric'],
            'description' => ['nullable', 'string', 'max:500'],
            'availability' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome non è valido',
            'price.numeric' => 'Il prezzo inserito non è valido.',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.min' => 'Il campo prezzo deve essere almeno :min',
            'price.max' => 'Il campo prezzo deve essere al massimo :max',
            'description.string' => 'Il campo descrizione non è valido.',
            'description.max' => 'Il campo descrizione non può superare i :max caratteri.',
            'availability.boolean' => 'Il valore del campo Disponibilità non è corretto.',
            'availability.required' => 'seleziona la disponibilità del piatto',
            'image.image' => 'Il file inserito non è un immagine.',
            'image.max' => 'Il file inserito non può superare i 4MB.',
        ];
    }
}
