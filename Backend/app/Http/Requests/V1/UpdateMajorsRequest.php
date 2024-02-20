<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMajorsRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'Name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/g', 'min:5', 'max:20'],
            ];
        } else {
            return [
                'Name' => ['sometime', 'required', 'regex:/^[a-zA-Z]+$/g', 'min:5', 'max:20'],
            ];
        }
    }
}
