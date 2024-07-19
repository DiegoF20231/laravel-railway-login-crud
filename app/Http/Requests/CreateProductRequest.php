<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductRequest extends FormRequest
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
            "price" => ["required", "int",],
            "name" => ["required", "string"],
            "file" => ["required"]
        ];
    }

    public function messages()
    {
        return [
            "price.required" => "Ingrese un precio",
            "name.required" => "Ingrese un nombre",
            "file.required" => "Suba un archivo",
            "descripcion.required" => "Ingrese una descripcion"
        ];
    }


    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json(["Error" => $validator->errors()]));
    }



}
