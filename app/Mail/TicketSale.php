<?php

namespace App\Mail;


use App\Models\Sales;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketSale extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(protected Sales $sale)
    {
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: env('MAIL_FROM_ADRESS'),
            subject: 'Ticket Sale',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {


        return new Content(
            markdown: 'mail.ticket-sale',
            with: [
                'ticket_number' => $this->sale->ticket_num
            ]
        );
    }
    public function build()
    {
        $pdf_size = array(0, 0, 400, 700);
        $pdf = PDF::loadView('mail.ticket')->setPaper($pdf_size);
        $ticket_name = $this->sale->ticket_num . '.pdf';

        $pdf->save(storage_path($ticket_name));


        return $this->markdown('mail.ticket-sale')->attach(storage_path($ticket_name), [
            'as' => $this->sale->ticket_num . '.pdf',
            'mime' => 'application/pdf',
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
