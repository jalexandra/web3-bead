<?php
/** @noinspection NullPointerExceptionInspection */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (Auth::user()->auth === 9) || (Auth::user()->id === request()->get('id'));
    }

    public function rules(): array
    {
        return [
            //'id' => ['required', 'excluded'],
            'username' => ['required', 'min:3', Rule::unique('users', 'username')->ignore($this->request->get('id'))],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->ignore($this->request->get('id'))],
            'password' => ['regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            //Regex from: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
            'password_confirmation' => ['required_with:password', 'same:password'],
            'current_password' => ['required', 'password'],
        ];
    }
}
