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
            'studentID' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/u', 'min:5', 'max:10'],
            'mail' => ['required', 'email', 'min:10', 'max:50'],
            'username' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/u', 'min:5', 'max:20'],
            'name' => ['required', 'string', 'regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/u', 'min:5', 'max:20'],
            'avatarPath' => ['string', 'max:50'],
            'birthday' => ['required', 'date'],
            'joinDate' => ['required', 'date'],
            'majorID' => ['required', 'integer', 'gte:0'],
            'courseID' => ['required', 'integer', 'gte:0'],
            'phone' => ['string', 'min:9', 'max:10', 'gte:0'],
            'active' => ['required', 'integer', 'max:1', Rule::in([0, 1])],
            'socialLink' => ['json'],
            'role' => ['required', 'integer', 'max:1', Rule::in([0, 1, 2])],
        ];
    }
}
