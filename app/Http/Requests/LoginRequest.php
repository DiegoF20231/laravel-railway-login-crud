<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{

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
            "email" => ["required", "", "string"],
            "password" => ["required", "string"]
        ];
    }



    public function messages()
    {
        return [
            "email.required" => "Ingrese un email",
            //"email.email" => "Ingrese un email valido",
            "password.required" => "Ingrese una contraseña"

        ];
    }

    // public function failedValidation(Validator $validator)
    // {


    //     // throw new HttpResponseException(
    //     //     response()->json(
    //     //         [
    //     //             'success' => false,
    //     //             'message' => 'Errores de validacion',
    //     //             'code' => 400,
    //     //             'errors' => $validator->errors()
    //     //         ],
    //     //         400

    //     //     )
    //     // );
    // }



}
