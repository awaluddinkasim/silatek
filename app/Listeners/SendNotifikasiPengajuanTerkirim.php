<?php

namespace App\Listeners;

use App\Events\PengajuanTerkirim;
use App\Mail\MailPengajuanTerkirim;
use App\Models\Staf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotifikasiPengajuanTerkirim
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
    public function handle(PengajuanTerkirim $event): void
    {
        $stafList = Staf::all();

        Mail::to($stafList)->send(new MailPengajuanTerkirim($event->pengajuan));
    }
}
