<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockUsersAddMail extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        //return $this->view('view.name');
        
        
        
      return $this->from('hello@app.com', 'Your Application')
        ->subject('Your Reminder!')
        ->with(['content' => 'sad'])
        ->view('emails.contact');
            
        
        
        
        
        
        
    }

}
