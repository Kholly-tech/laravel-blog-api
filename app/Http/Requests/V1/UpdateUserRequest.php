<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'name' => ['reequired', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'postalCode' => ['required', 'string', 'max:255'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'string', 'max:255'],
                'email' => ['sometimes', 'required', 'email', 'max:255', 'unique:users'],
                'password' => ['sometimes', 'required', 'string', 'min:8', 'confirmed'],
                'address' => ['sometimes', 'required', 'string', 'max:255'],
                'city' => ['sometimes', 'required', 'string', 'max:255'],
                'state' => ['sometimes', 'required', 'string', 'max:255'],
                'postalCode' => ['sometimes', 'required', 'string', 'max:255'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if($this->postalCode) {
            $this->merge([
                'postal_code' => $this->postalCode
            ]);
        }
    }
}
