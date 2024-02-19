<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectDetailRequest extends FormRequest
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
                "leaderID" => ['required', 'integer'],
                "projectID" => ['required', 'integer'],
                "description" => ['text'],
                "projectSrc" => ['string', 'max:50'],
                "status" => ['required', 'integer', 'max:1', Rule::in([0, 1])],
                "show" => ['required', 'boolean'],
                "startDate" => ['required', 'date'],
                "endDate" => ['required', 'date'],
            ];
        } else {
            return [
                "leaderID" => ['sometimes', 'required', 'integer'],
                "projectID" => ['sometimes', 'required', 'integer'],
                "description" => ['sometimes', 'text'],
                "projectSrc" => ['sometimes', 'string', 'max:50'],
                "status" => ['sometimes', 'required', 'integer', 'max:1', Rule::in([0, 1])],
                "show" => ['sometimes', 'required', 'boolean'],
                "startDate" => ['sometimes', 'required', 'date'],
                "endDate" => ['sometimes', 'required', 'date'],
            ];
        }
    }
}
