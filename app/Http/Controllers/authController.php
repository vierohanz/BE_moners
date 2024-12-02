<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResources;
use App\Http\Resources\ProfileResources;
use App\Http\Resources\RegisterResources;
use App\Models\Users;
use App\Mail\VerifyEmail;  // Import Mailable
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

    public function verifyEmail($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ], 404);
        }
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route('verifySuccess');
    }
}
