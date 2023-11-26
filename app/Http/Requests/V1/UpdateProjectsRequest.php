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
                'Name' => ['required', 'string', 'max:255'],
                'StartDate' => ['required', 'date',],
                'WorkTime' => ['required', 'time'],
                'EndDate' => ['required', 'date'],
                'ProjectSrc' => ['required', 'string'],
                'Status' => ['required', 'string'],
                'Description' => ['required', 'string']
            ];
        } else {
            return [
                'Name' => ['required', 'string', 'max:255'],
                'StartDate' => ['required', 'date',],
                'WorkTime' => ['required', 'time'],
                'EndDate' => ['required', 'date'],
                'ProjectSrc' => ['required', 'string'],
                'Status' => ['required', 'string'],
                'Description' => ['required', 'string']
            ];
        }
    }
}
