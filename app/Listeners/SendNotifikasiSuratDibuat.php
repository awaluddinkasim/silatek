<?php

namespace App\Listeners;

use App\Events\SuratDibuat;
use App\Mail\MailSuratDibuat;
use App\Models\Dekan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotifikasiSuratDibuat
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
    public function handle(SuratDibuat $event): void
    {
        $surat = $event->pengajuan->surat;

        $penandatangan = $surat->penandatangan;

        $dekan = Dekan::where('jabatan', $penandatangan)->first();

        Mail::to($dekan->email)->send(new MailSuratDibuat($dekan, $event->pengajuan));
    }
}
