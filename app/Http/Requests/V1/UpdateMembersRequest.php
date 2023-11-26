<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMembersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule','array<mixed>','string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'Id' => ['required', 'string', 'max:8'],
                'Name' => ['required','string','max:10'],
                'Surname' => ['required','string','max:50'],
                'Birthday' => ['required','date'],
                'JoinDate' => ['required','date'],
                'Major' => ['required','integer','gte:0'],
                'Course' => ['required','integer','gte:0'],
                'Mail' => ['required','string'],
                'Phone' => ['string','max:13'],
                'Avatar' => ['string'],
                'Username' => ['required','string','max:20'],
                'Password' => ['required','string','max:20'],
                'Active' => ['required','integer'],
                'SocialAccount' => ['json'],
                'Role' => ['required','string','max:1', Rule::in(['M', 'D', 'A'])],
            ];
        } else {
            return [
                'Id' => ['sometimes', 'required', 'string', 'max:8'],
                'name' => ['sometimes','required','string','max:10'],
                'surname' => ['sometimes','required','string','max:50'],
                'birthday' => ['sometimes','required','date'],
                'joinDate' => ['sometimes','required','date'],
                'major' => ['sometimes','required','integer','gte:0'],
                'course' => ['sometimes','required','integer','gte:0'],
                'mail' => ['sometimes','required','string'],
                'phone' => ['sometimes','string','max:13'],
                'avatar' => ['sometimes','string'],
                'username' => ['sometimes','required','string','max:20'],
                'password' => ['sometimes','required','string','max:20'],
                'active' => ['sometimes','required','integer'],
                'socialAccount' => ['sometimes','json'],
                'role' => ['sometimes','required','string','max:1', Rule::in(['M', 'D', 'A'])],
            ];
        }
    }
}
