<x-layouts.mail title="Notifikasi Pengajuan Surat Baru">
    <div class="notification-box">
        <p>Sistem telah menerima pengajuan surat baru yang memerlukan tindak lanjut dari staf.</p>
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
                    <td class="label">Waktu Pengajuan</td>
                    <td class="value">{{ $pengajuan->created_at->isoFormat('dddd, D MMMM Y - HH:mm') }}</td>
                </tr>
                <tr>
                    <td class="label">NIM</td>
                    <td class="value">{{ nim($pengajuan->nim) }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Mahasiswa</td>
                    <td class="value">{{ $pengajuan->nama }}</td>
                </tr>
                <tr>
                    <td class="label">Program Studi</td>
                    <td class="value">{{ $pengajuan->prodi }}</td>
                </tr>
                <tr>
                    <td class="label">Angkatan</td>
                    <td class="value">{{ $pengajuan->angkatan }}</td>
                </tr>
                <tr>
                    <td class="label">No. Telepon</td>
                    <td class="value">{{ $pengajuan->no_telp }}</td>
                </tr>
            </table>
        </div>
    </div>
</x-layouts.mail>
