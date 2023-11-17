<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembersRequest extends FormRequest
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
            'Id' => 'required|string|max:10',
            'Name' => 'required|string|max:255',
            'Surname' => 'required|string|max:255',
            'Birthday' => 'required|date',
            'JoinDate' => 'required|date',
            'Major' => 'required|integer|gte:0',
            'Course' => 'required|integer|gte:0',
            'Mail' => 'required|string',
            'Phone' => 'string',
            'Avatar' => 'string',
            'Username' => 'required|string|max:20',
            'Password' => 'required|string|max:20',
            'Active' => 'required|boolean',
            'SocialAccount' => 'json',
            'Role' => 'required|string|max:1',
        ];
    }
}
