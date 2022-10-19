<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

	public $userName;

	public $now;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName)
    {
        //

	    $this->userName = $userName;

		$this->now = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		echo __LINE__ . ' ' . __METHOD__ . PHP_EOL;
		echo 'Now : ' . $this->now . PHP_EOL;

        return $this
	        ->subject('subject')
	        ->view('emails.test_content');
    }
}
