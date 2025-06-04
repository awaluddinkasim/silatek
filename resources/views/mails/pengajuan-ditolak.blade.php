<x-layouts.mail title="Notifikasi Pengajuan Surat Baru">
    <div class="notification-box-danger">
        <p>Pengajuan surat Anda telah ditolak. Silahkan buka sistem untuk mengajukan ulang dan pastikan mengupload
            berkas dengan benar.</p>
    </div>

    <div class="content">
        <h3>Detail Pengajuan:</h3>

        <div class="details">
            <table>
                <tr>
                    <td class="label">Jenis Layanan</td>
                    <td class="value">{{ config('layanan')[$pengajuan->layanan]['label'] }}</td>
                </tr>
                <tr>
                    <td class="label">Alasan Pengajuan Tidak Diterima</td>
                    <td class="value">{{ $pengajuan->alasan_ditolak }}</td>
                </tr>
                <tr>
                    <td class="label">Waktu Ditolak</td>
                    <td class="value">{{ $pengajuan->updated_at->isoFormat('dddd, D MMMM Y - HH:mm') }}</td>
                </tr>
            </table>
        </div>

        <div class="button-container">
            <a href="{{ route('pengajuan', $pengajuan->layanan) }}" class="button">Buka Pengajuan Layanan</a>
        </div>
    </div>
</x-layouts.mail>
