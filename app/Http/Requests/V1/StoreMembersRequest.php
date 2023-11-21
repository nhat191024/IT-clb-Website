<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'Id' => ['required|string|min:7|max:10'],
            'Name' => ['required|string|max:10'],
            'Surname' => ['required|string|max:50'],
            'Birthday' => ['required|date'],
            'JoinDate' => ['required|date'],
            'Major' => ['required|integer|gte:0'],
            'Course' => ['required|integer|gte:0'],
            'Mail' => ['required|email'],
            'Phone' => ['integer|min:10|max:12'],
            'Avatar' => ['string'],
            'Username' => ['required|string|max:20'],
            'Password' => ['required|string|max:20'],
            'Active' => ['required|boolean'],
            'SocialAccount' => ['json'],
            'Role' => ['required|string|max:1', Rule::in(['M', 'D', 'A'])],
        ];
    }
}
