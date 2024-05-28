<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserPurchase extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('emails.new_user_purchase')
                    ->with([
                        'name' => $this->user->name,
                        'password' => $this->user->password,
                    ]);
    }
}
