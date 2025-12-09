<?php

namespace App\Console\Commands;

use App\Mail\AbsensiReminderMail;
use App\Models\EmailLog;
use App\Models\EmailRecipient;
use App\Models\EmailTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAbsensiReminder extends Command
{
    protected $signature = 'reminder:absen {type}';
    protected $description = 'Kirim reminder absensi datang/pulang';

    // public function handle()
    // {
    //     $type = $this->argument('type');

    //     $recipients = EmailRecipient::all();

    //     foreach ($recipients as $r) {

    //         try {
    //             Mail::to($r->email)->send(new AbsensiReminderMail($type, $r));

    //             EmailLog::create([
    //                 'recipient_email' => $r->email,
    //                 'type' => $type,
    //                 'status' => 'sent',
    //                 'sent_at' => now(),
    //             ]);
    //         } catch (\Exception $e) {
    //             EmailLog::create([
    //                 'recipient_email' => $r->email,
    //                 'type' => $type,
    //                 'status' => 'failed',
    //                 'error_message' => $e->getMessage(),
    //                 'sent_at' => now(),
    //             ]);
    //         }
    //     }

    //     $this->info("Email reminder $type berhasil diproses.");
    // }

    public function handle()
    {
        $type = $this->argument('type');

        // Ambil template berdasarkan type (datang/pulang)
        $template = EmailTemplate::where('type', $type)->first();

        $recipients = EmailRecipient::all();

        foreach ($recipients as $r) {
            try {
                Mail::to($r->email)->send(new AbsensiReminderMail(
                    $type,
                    $r,
                    $template    // ⬅️ template dikirim ke Mailable di sini
                ));

                EmailLog::create([
                    'recipient_email' => $r->email,
                    'type'            => $type,
                    'status'          => 'sent',
                    'sent_at'         => now(),
                ]);
            } catch (\Exception $e) {
                EmailLog::create([
                    'recipient_email' => $r->email,
                    'type'            => $type,
                    'status'          => 'failed',
                    'error_message'   => $e->getMessage(),
                    'sent_at'         => now(),
                ]);
            }
        }

        $this->info("Email reminder $type berhasil diproses.");
    }
}
