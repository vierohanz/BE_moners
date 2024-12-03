<?php

namespace App\Mail;

use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param  Users  $user
     * @return void
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        Log::debug('User: ', [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'reset_password_token' => $this->user->reset_password_token,
        ]);
        $resetUrl = url('api/reset-password-form') . '?token=' . $this->user->reset_password_token;
        Log::debug('Reset URL: ', ['resetUrl' => $resetUrl]);
        return $this->view('emails.resetPassword')
            ->with('resetUrl', $resetUrl)
            ->subject('Reset Your Password');
    }
}
