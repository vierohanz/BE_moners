<?php

namespace App\Http\Requests;

use App\Models\Users;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class SendVerifyEmailRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    public function prepareForValidation()
    {
        $user = Users::where('email', $this->email)->first();

        // Check if the email is already verified
        if ($user && $user->email_verified_at !== null) {
            throw new HttpResponseException(response()->json([
                'status' => 'error',
                'massage' => 'Your email has already been verified.'

            ], 400));
        }
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $validator->errors(),
        ], 400));
    }
}
