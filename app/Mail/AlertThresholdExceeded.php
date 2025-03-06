<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertThresholdExceeded extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $totalExpense;
    private $seuil;
    private $category;
    private $type;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $totalExpense, $seuil, $category, $type)
    {
        //
        $this->user = $user;
        $this->totalExpense = $totalExpense;
        $this->seuil = $seuil;
        $this->category = $category;    
        $this->type = $type;
    }
    public function build()
    {
        if($this->type == 'global'){
            return $this->subject('🚨 Budget Alert: You Exceeded Your Threshold!')
                    ->view('emails.alertThresholdExceeded')
                    ->with([
                'user' => $this->user,
                'totalExpense' => $this->totalExpense,
                'seuil' => $this->seuil,
                    ]);
        }else{
            return $this->subject('🚨 Budget Alert: You Exceeded Your Threshold!')
                    ->view('emails.alertThresholdExceeded')
                    ->with([
                'user' => $this->user,
                'totalExpense' => $this->totalExpense,
                'seuil' => $this->seuil,
                'category' => $this->category,
                    ]);
        }
      
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alert Threshold Exceeded',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
