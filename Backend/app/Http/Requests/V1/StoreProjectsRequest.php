<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectsRequest extends FormRequest
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
            'Id' => ['required', 'string', 'max:255'],
            'Name' => ['required', 'string', 'max:255'],
            'Leader' => ['required', 'string', 'max:255'],
            'StartDate' => ['required', 'date',],
            'EndDate' => ['required', 'date'],
            'ProjectSrc' => ['required', 'string'],
            'Status' => ['required', 'string'],
        ];
    }
}
