<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendResetPasswordRequest;
use App\Http\Requests\SendVerifyEmailRequest;
use App\Http\Resources\LoginResources;
use App\Http\Resources\ProfileResources;
use App\Http\Resources\RegisterResources;
use App\Http\Resources\SendRequestPasswordResources;
use App\Http\Resources\SendVerifyEmailResources;
use App\Mail\ResetPasswordMail;
use App\Models\Users;
use App\Mail\VerifyEmail;  // Import Mailable
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class authController extends Controller
{
    public function register(RegisterRequest $request): RegisterResources
    {
        $data = $request->validated();
        $user = new Users($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        Mail::to($user->email)->send(new VerifyEmail($user));
        return new RegisterResources($user);
    }


    public function login(LoginRequest $request): LoginResources
    {
        $data = $request->validated();
        $user = Users::where('username', $data['username'])->first();
        $user->token = $user->createToken('auth_token')->plainTextToken;

        return new LoginResources($user);
    }

    public function profile(): ProfileResources
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        return new ProfileResources($user);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function sendVerifyEmail(SendVerifyEmailRequest $request): SendVerifyEmailResources
    {
        $data = $request->validated();
        $user = Users::where('email', $data['email'])->first();
        Mail::to($user->email)->send(new VerifyEmail($user));
        return new SendVerifyEmailResources($user);
    }

    public function verifyEmail($id)
    {
        $user = Users::find($id);
        if ($user->email_verified_at !== null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your email has already been verified.'
            ], 400);
        }

        $user->email_verified_at = now();
        $user->save();

        // Redirect to the success route
        return redirect()->route('verifySuccess');
    }

    public function sendResetPassword(SendResetPasswordRequest $request): SendRequestPasswordResources
    {
        $data = $request->validated();
        $user = Users::where('email', $data['email'])->first();
        $token = Str::random(60);

        $user->reset_password_token = $token;
        $user->save();

        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return new SendRequestPasswordResources($user);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        $user = Users::where('reset_password_token', $data['token'])->first();
        $user->password = Hash::make($request->password);
        $user->reset_password_token = null;
        $user->save();

        return redirect()->route('resetSuccess');
    }
}
