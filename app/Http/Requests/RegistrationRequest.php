<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Validation\Rules;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //ristoranti
            'restaurant_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'vat' => ['required', 'min:11', 'max:11', 'string', 'unique:restaurants,vat'],
            'description' => ['string', 'max:500', 'nullable'],
            'image' => ['nullable', 'image', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            //user
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome non è valido',
            //user

            //ristorante
            'restaurant_name.required' => 'Il campo nome ristorante è obbligatorio.',
            'restaurant_name.string' => 'Il campo nome ristorante non è valido',
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'address.string' => 'Il campo indirizzo non è valido.',
            'phone.required' => 'Il campo numero telefonico è obbligatorio.',
            'phone.string' => 'Il campo numero telefonico non è valido.',
            'vat.required' => 'Il campo P.IVA è obbligatorio.',
            'vat.string' => 'Il campo P.IVA non è valido.',
            'vat.unique' => 'la P.IVA è stata già utilizzata',
            'vat.min' => 'Il campo P.IVA deve essere di :min caratteri.',
            'vat.max' => 'Il campo P.IVA deve essere di :max caratteri.',
            'image.image' => 'Il file inserito non è un immagine.',
            'image.max' => 'Il file inserito non può superare i 4MB.',
            'description.string' => 'Il campo descrizione non è valido.',
            'description.max' => 'Il campo descrizione non può superare i :max caratteri.',
            //ristorante
        ];
    }
}
