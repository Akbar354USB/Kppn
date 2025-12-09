<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


// class AbsensiReminderMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $type;
//     public $recipient;

//     public function __construct($type, $recipient)
//     {
//         $this->type = $type;
//         $this->recipient = $recipient;
//     }

//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: "Reminder Absensi " . ucfirst($this->type),
//         );
//     }

//     public function content(): Content
//     {
//         return new Content(
//             view: 'emails.absensi_reminder',
//             with: [
//                 'type' => $this->type,
//                 'recipient' => $this->recipient,
//             ]
//         );
//     }

//     public function attachments(): array
//     {
//         return [];
//     }
// }

class AbsensiReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $recipient;
    public $template;

    public function __construct($type, $recipient)
    {
        $this->type = $type;
        $this->recipient = $recipient;

        // ⬅️ TEMPLATE EMAIL DIAMBIL DI SINI
        $this->template = EmailTemplate::where('type', $type)->first();
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->template ? $this->template->title : "Reminder Absensi"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.absensi_reminder',
            with: [
                'recipient' => $this->recipient,
                'body'      => $this->template ? $this->template->body : "Tidak ada template",
            ]
        );
    }
}
