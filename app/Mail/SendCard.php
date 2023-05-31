<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCard extends Mailable
{
    use Queueable, SerializesModels;

    private $card_url;
    private $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($card_url, $name = '')
    {
        $this->card_url = $card_url;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from(config('mail.from.address'), config('mail.from.name'))
            ->markdown('emails.send-card', [
                'card_url' => $this->card_url,
                'name' => $this->name
            ]);
        return $mail;
    }
}
