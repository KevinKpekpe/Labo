<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDocteurFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $docteurId = $this->route('docteur');
        return [
            'name' => 'required|string',
            'matricule' => 'required|string',
            'postnom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'sexe' => 'in:M,F',
            'date_de_naissance' => 'required|date',
            // 'role' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($docteurId, 'id'),
            ],
            'password' => [
                'required',
                'string',
                'confirmed', // Vérifie que le champ de confirmation du mot de passe correspond
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
                // Mot de passe fort :
                // - Au moins une lettre majuscule
                // - Au moins une lettre minuscule
                // - Au moins un chiffre
                // - Au moins un caractère spécial parmi @$!%*?&
                // - Longueur minimale de 8 caractères
            ],
            'cnom'=> 'required',
            'specialite'=> 'required',
        ];
    }
}
