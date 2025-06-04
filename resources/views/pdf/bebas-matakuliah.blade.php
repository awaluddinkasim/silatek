<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Surat {{ $layanan['label'] }}</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        .judul {
            text-align: center;
            margin-bottom: 24pt;
        }

        h1 {
            text-align: center;
            text-decoration: underline;
        }

        h1,
        p {
            margin: 0;
            padding: 0;
        }

        p {
            text-align: justify;
        }

        .salam {
            font-weight: bold;
            font-style: italic;
        }

        .center {
            text-align: center;
        }

        .mb {
            margin-bottom: 12pt;
        }

        table {
            margin: 12pt 0;
            border-spacing: 0;
            border: 0;
        }

        table.detail tr td:nth-child(1) {
            width: 160pt;
        }

        td {
            border: 0;
        }

        .ttd {
            font-weight: bold;
            text-decoration: underline;
        }

        .qr {
            padding: 0 46pt;
        }

        .tembusan * {
            margin: 0;
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/kop_fakultas.png') }}" alt=""
        style="width: 100%; height: auto; margin-bottom: 12pt;">

    <div class="judul">
        <h1>SURAT KETERANGAN BEBAS MATA KULIAH</h1>
        <p class="center">Nomor: {{ $surat->nomor }}</p>
    </div>

    <p class="salam mb">Assalamu'alaikum Wr.Wb</p>

    <p>Dengan Rahmat Allah SWT,</p>
    <p>Dekan Fakultas Teknik Universitas Islam Makassar menerangkan bahwa:</p>

    <table class="detail">
        <tr>
            <td>Nama</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->nama }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td style="width: 10pt">:</td>
            <td>{{ nim($pengajuan->nim) }}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->prodi }}</td>
        </tr>
    </table>

    <p class="mb">
        Adalah benar mahasiswa Program Studi <b>Teknik Informatika</b> Fakultas Teknik Universitas Islam Makassar yang
        bersangkutan telah <b>Bebas Akademik</b> T.A {{ ucfirst($surat->periode) }} {{ $surat->tahun_ajaran }} dan dapat
        mengikuti Ujian Tugas Akhir (Skripsi).
    </p>

    <p class="mb">Demikian surat keterangan ini dibuat untuk dipergunakan <b>seperlunya</b>.</p>

    <p class="salam">Wallahul Muaffiq Ilaa Aqwamith Tharieq</p>
    <p class="salam">Wassalamu'alaikum Wr.Wb</p>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">

                <table style="padding: 0; ">
                    <tr>
                        <td style="padding: 0">Makassar,</td>
                        <td style="padding: 0 5pt"><u>{{ tanggalHijri($surat->tanggal_surat) }} H</u></td>
                    </tr>
                    <tr>
                        <td style="padding: 0"></td>
                        <td style="padding: 0 5pt">{{ tanggal($surat->tanggal_surat) }} M</td>
                    </tr>
                </table>


                <p>{{ ucwords(str_replace('_', ' ', $surat->penandatangan)) }},</p>
                @if ($ttd)
                    <div class="qr">
                        <img src="data:image/png;base64, {{ $ttd }}">
                    </div>

                    <p class="ttd">{{ $surat->ttd->nama }}</p>
                    <p>NUPTK. {{ $surat->ttd->nuptk }}</p>
                @else
                    <div style="height: 100px"></div>
                @endif
            </td>
        </tr>
    </table>

    <div class="tembusan">
        <span>Tembusan:</span>
        <ol>
            <li>Ketua Yayasan Perguruan Tinggi Al-Gazali di Makassar;</li>
            <li>Rektor Universitas Islam Makassar;</li>
            <li>Ketua Prodi {{ $pengajuan->prodi }}</li>
        </ol>
    </div>
</body>

</html>
