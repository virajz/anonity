<?php

namespace App\Mail;

use App\Story;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoriesLog extends Mailable
{
    use Queueable, SerializesModels;

    public $stories;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stories = Story::where('created_at', '>', Carbon::now()->startOfDay())->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.log.stories')->subject(Carbon::now()->toFormattedDateString() . ' - Daily Stories Log');
    }
}
