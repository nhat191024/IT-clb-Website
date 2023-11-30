<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
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
                'Job' => ['required', 'string', 'max:255'],
                'Project' => ['required', 'string', 'max:255'],
                'WorkMember' => ['required', 'string', 'max:255'],
            ];
        } else {
            return [
                'Job' => ['sometimes','required', 'string', 'max:255'],
                'Project' => ['sometimes', 'required', 'string', 'max:255'],
                'WorkMember' => ['sometimes', 'required', 'string', 'max:255'],
            ];
        }
    }
}
