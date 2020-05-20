<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WorkOrder extends Mailable
{
    public $post;
    public $subject;
    public $file;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post, $subject, $file)
    {
        $this->post = $post;
        $this->subject = $subject;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->markdown('emails.work-order')
                ->subject($subject)
                ->attach($file);
       /* return $this->view('emails.work-order')
                ->subject('Orden de Trabajo de '.config('app.name'));*/
    }
}
