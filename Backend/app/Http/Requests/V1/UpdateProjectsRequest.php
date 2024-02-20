<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
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
                "code" => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/g', 'min:5', 'max:20'],
                "name" => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/g', 'min:5', 'max:20'],
                "thumbnailPath" => ['string'],
            ];
        } else {
            return [
                "code" => ['sometimes', 'required', 'regex:/^[a-zA-Z0-9]+$/g', 'string', 'min:5', 'max:20'],
                "name" => ['sometimes', 'required', 'regex:/^[a-zA-Z0-9]+$/g', 'string', 'min:5', 'max:20'],
                "thumbnailPath" => ['sometimes', 'string'],
            ];
        }
    }
}
