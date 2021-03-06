<?php
/** @noinspection NullPointerExceptionInspection */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (Auth::user()->auth === 9) || (Auth::user()->id === request()->get('id'));
    }

    public function rules(): array
    {
        return request()->method() === 'DELETE' ? [] : [
            'username' => ['required', 'min:3', 'unique:users,username'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            //Regex from: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
            'password_confirmation' => ['required', 'same:password']
        ];
    }
}
