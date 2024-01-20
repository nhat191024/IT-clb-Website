<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsersRequest extends FormRequest
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
            'Name' => ['required', 'string', 'max:40'],
            'Birthday' => ['required', 'date'],
            'JoinDate' => ['required', 'date'],
            'Major' => ['required', 'integer', 'gte:0'],
            'Course' => ['required', 'integer', 'gte:0'],
            'Email' => ['required', 'email', 'max:40'],
            'Phone' => ['integer', 'min:10', 'max:12'],
            'Avatar' => ['string'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'max:20'],
            'Active' => ['required', 'integer'],
            'SocialAccount' => ['json'],
            'Role' => ['required', 'string', 'max:1', Rule::in(['M', 'D', 'A'])],
        ];
    }
}
