<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectMembersRequest extends FormRequest
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
                'Project' => ['required', 'string', 'max:255'],
                'Member' => ['required', 'string', 'max:255'],
            ];
        } else {
            return [
                'Project' => ['required', 'string', 'max:255'],
                'Member' => ['required', 'string', 'max:255'],
            ];
        }
    }
}
