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
            margin-bottom: 12pt;
        }

        h1 {
            text-align: center;
        }

        h1,
        p {
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        p {
            text-align: justify;
        }

        b,
        strong,
        u {
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .salam {
            font-style: italic;
        }

        table {
            border-spacing: 0;
            border: 0;
        }

        table td {
            vertical-align: top;
            padding: 0;
            border: 0;
            font-size: 10pt;
        }

        .center {
            text-align: center;
        }

        ol li {
            text-align: justify;
            font-size: 10pt;
        }

        .list-alpha {
            list-style-type: lower-alpha;
            padding-left: 20pt;
            margin: 0;
        }

        .list-num {
            list-style-type: decimal;
            padding-left: 20pt;
            margin: 0;
        }

        .mb {
            margin-bottom: 12pt;
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
            font-size: 8pt;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/kop_fakultas.png') }}" alt=""
        style="width: 100%; height: auto; margin-bottom: 12pt;">

    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 80pt">Nomor</td>
            <td class="center" style="width: 10pt">:</td>
            <td>{{ $surat->nomor_undangan }}</td>
            <td rowspan="3" style="width: 200pt">
                <table>
                    <tr>
                        <td>Makassar,</td>
                        <td style="width: 10pt"></td>
                        <td><u>{{ tanggalHijri($surat->tanggal_surat) }} H</u></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ tanggal($surat->tanggal_surat) }} M</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td class="center" style="width: 10pt">:</td>
            <td>1 (satu) berkas</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td class="center" style="width: 10pt">:</td>
            <td><b>Undangan Ujian Seminar Proposal</b></td>
        </tr>
    </table>

    <p><b>Kepada Yang Terhormat,</b></p>
    <table class="mb">
        @if ($surat->kategori == 'non-skripsi')
            <tr>
                <td style="width: 120pt">{{ $surat->ketua_sekertaris }}</td>
                <td>(Ketua Sidang)</td>
            </tr>
            <tr>
                <td style="width: 120pt">{{ $surat->pembimbing }}</td>
                <td>(Pembimbing Utama)</td>
            </tr>
            <tr>
                <td style="width: 120pt">{{ $surat->penguji }}</td>
                <td>(Penguji)</td>
            </tr>
        @else
            @foreach (explode(PHP_EOL, $surat->pembimbing) as $pembimbing)
                <tr>
                    <td style="width: 200pt">{{ $pembimbing }}</td>
                    <td>
                        ({{ $loop->index == 0 ? 'Pembimbing' : 'Co. Pembimbing' }})
                    </td>
                </tr>
            @endforeach
            @foreach (explode(PHP_EOL, $surat->penguji) as $penguji)
                <tr>
                    <td style="width: 200pt">{{ $penguji }}</td>
                    <td>
                        (Penguji)
                    </td>
                </tr>
            @endforeach
            @foreach (explode(PHP_EOL, $surat->ketua_sekertaris) as $ketuaSekertaris)
                <tr>
                    <td style="width: 200pt">{{ $ketuaSekertaris }}</td>
                    <td>
                        ({{ $loop->index == 0 ? 'Ketua Sdiang' : 'Sekertaris' }})
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

    <p class="mb">Di - <br> Makassar</p>

    <div class="salam mb">
        <p>Bismillahirrahmanirrahim</p>
        <p>Assalamu 'Alaikum Warrahmatullahi Wabarakatuh</p>
    </div>

    <p class="mb">Salam silaturahmi, semoga segala aktivitas keseharian kita bernilai ibadah di sisi Allah SWT.
        Bersama ini kami
        mengundang Bapak/Ibu pada Ujian <b>Seminar Proposal</b> yang akan dipersentasekan oleh Saudara:</p>

    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 120pt">Nama Mahasiswa</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->nama }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Stambuk</td>
            <td style="width: 10pt">:</td>
            <td>{{ nim($pengajuan->nim) }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Program Studi</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->prodi }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Judul Skripsi</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->judul_skripsi }}</td>
        </tr>
    </table>

    <p class="mb">Insya Allah dilaksanakan pada :</p>
    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 120pt">Hari/Tanggal</td>
            <td style="width: 10pt">:</td>
            <td>{{ tanggalHari($surat->tanggal_ujian) }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Waktu</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->waktu }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Tempat</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->tempat }}</td>
        </tr>
    </table>

    <p class="mb">Demikian penyampaian kami, atas pengertian dan kerjasamanya kami ucapkan terima kasih.</p>

    <div class="salam">
        <p>Wallahul Muaffiq Ilaa Aqwamith Tharieq</p>
        <p>Wassalamu'alaikum Wr.Wb</p>
    </div>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">
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
            <li>Ketua Umum Yayasan;</li>
            <li>Rektor UIM;</li>
            <li>Arsip</li>
        </ol>
    </div>
</body>

</html>
