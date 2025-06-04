<x-layouts.mail title="Notifikasi Surat Baru">
    <div class="notification-box">
        <p>Kepada Yth. {{ $dekan->nama }},</p>
        <p>Informasi pengajuan surat telah dibuat dan memerlukan persetujuan Anda. Silakan tinjau dan berikan
            persetujuan melalui sistem.</p>
    </div>

    <div class="content">
        <h3>Detail Surat:</h3>

        <div class="details">
            <table>
                @if ($pengajuan->layanan == 'seminar-ta')
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
                    <td class="label">Tanggal Surat</td>
                    <td class="value">{{ tanggal($pengajuan->surat->tanggal_surat) }}</td>
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
