<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogsRequest extends FormRequest
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
                'Name' => ['required', 'string', 'max:255'],
                'Content' => ['required', 'min:1'],
                'Author' => ['required', 'string', 'max:10'],
            ];
        } else {
            return [
                'Name' => ['sometimes', 'required', 'string', 'max:255'],
                'Content' => ['sometimes', 'required', 'min:1'],
                'Author' => ['sometimes', 'required', 'string', 'max:255'],
            ];
        }
    }
}
