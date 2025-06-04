<?php

namespace App\Listeners;

use App\Events\PengajuanDitolak;
use App\Mail\MailPengajuanDitolak;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotifikasiPengajuanDitolak
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
    public function handle(PengajuanDitolak $event): void
    {
        $mahasiswa = User::where('nim', $event->pengajuan->nim)->first();

        if ($mahasiswa) {
            Mail::to($mahasiswa->email)->send(new MailPengajuanDitolak($event->pengajuan));
        }
    }
}
