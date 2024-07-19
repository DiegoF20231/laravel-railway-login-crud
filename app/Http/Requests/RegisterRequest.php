<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            "email" => [
                "required",
                "string"
            ],
            "password" => ["required", "string"],
            "username" => ["required", "string"]
        ];
    }


    public function messages()
    {
        return [
            "email.required" => "Ingrese un email",
            // "email.email" => "Ingrese un email valido",
            "password.required" => "Ingrese una contraseña",
            "email.string" => "El email debe ser un texto",
            "password.string" => "La contraseña debe ser un texto",
            "username.string" => "El nombre de usuario debe de ser un texto",
            "username.required" => "Ingrese un nombre de usuario"
        ];
    }


    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(
    //         response()->json(
    //             [
    //                 "success" => false,
    //                 "message" => "Errores de validacion",
    //                 "code" => 400,
    //                 "erros" => $validator->errors()
    //             ],
    //             400
    //         )
    //     );
    // }
}
