<?php

namespace App\Listeners;

use App\Events\SuratSelesai;
use App\Mail\MailSuratSelesai;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotifikasiSuratSelesai
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SuratSelesai $event): void
    {
        $mahasiswa = User::where('nim', $event->pengajuan->nim)->first();

        Mail::to($mahasiswa->email)->send(new MailSuratSelesai($event->pengajuan));
    }
}
