<x-layouts.mail title="Notifikasi Surat Selesai">
    <div class="notification-box">
        <p>Selamat! Pengajuan surat Anda telah disetujui. Surat Anda dapat diakses langsung melalui sistem.</p>
    </div>

    <div class="content">
        <h3>Detail Surat:</h3>

        <div class="details">
            <table>
                @if (config('layanan')[$pengajuan->layanan]['tipe'] == 'seminar-ta')
                    <tr>
                        <td class="label">Nomor Surat Keputusan</td>
                        <td class="value">{{ $pengajuan->surat->nomor_sk }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nomor Surat Undangan</td>
                        <td class="value">{{ $pengajuan->surat->nomor_undangan }}</td>
                    </tr>
                @else
                    <tr>
                        <td class="label">Nomor Surat</td>
                        <td class="value">{{ $pengajuan->surat->nomor }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="label">Jenis Layanan</td>
                    <td class="value">{{ config('layanan')[$pengajuan->layanan]['label'] }}</td>
                </tr>
                <tr>
                    <td class="label">Waktu Pengajuan</td>
                    <td class="value">{{ $pengajuan->created_at->isoFormat('dddd, D MMMM Y - HH:mm') }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Surat</td>
                    <td class="value">{{ tanggal($pengajuan->surat->tanggal_surat) }}</td>
                </tr>
                <tr>
                    <td class="label">Penandatangan</td>
                    <td class="value">{{ $pengajuan->surat->ttd->nama }}</td>
                </tr>
            </table>
        </div>

        <div class="button-container">
            <a href="{{ route('pengajuan', $pengajuan->layanan) }}" class="button">Buka Pengajuan Surat</a>
        </div>
    </div>
</x-layouts.mail>
