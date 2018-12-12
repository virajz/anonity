<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsersLog extends Mailable
{
    use Queueable, SerializesModels;

    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::where('created_at', '>', Carbon::now()->startOfDay())->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.log.users')->subject(Carbon::now()->toFormattedDateString() . ' - Daily Users Log');
    }
}
