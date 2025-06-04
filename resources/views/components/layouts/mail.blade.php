<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pengajuan Surat Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2a5885;
            padding-bottom: 15px;
        }

        .logo {
            margin-bottom: 10px;
        }

        .title {
            color: #2a5885;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #5d7290;
            font-size: 16px;
            margin-top: 0;
        }

        .notification-box {
            background-color: #f8f9fa;
            border-left: 4px solid #2a5885;
            padding: 15px;
            margin-bottom: 20px;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e3e3e3;
            margin-bottom: 20px;
        }

        .details {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr td {
            padding: 8px 12px;
            border-bottom: 1px solid #e3e3e3;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #555;
            width: 35%;
        }

        .value {
            width: 65%;
        }

        .footer {
            font-size: 12px;
            text-align: center;
            color: #777;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .button {
            display: inline-block;
            background-color: #2a5885;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .urgent {
            background-color: #ffe9e9;
            border-left: 4px solid #d9534f;
            padding: 10px 15px;
            margin-bottom: 15px;
            color: #d9534f;
            font-weight: bold;
        }

        @media only screen and (max-width: 480px) {
            body {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <!-- Logo universitas -->
            <img src="{{ url('assets/images/logo-uim.png') }}" alt="Logo Universitas" height="60">
        </div>
        <h1 class="title">{{ $title }}</h1>
        <p class="subtitle">{{ config('app.alt_name') }}</p>
    </div>

    {{ $slot }}

    <div class="footer">
        <p>Email ini dikirim secara otomatis oleh {{ config('app.alt_name') }}.</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}</p>
    </div>
</body>

</html>
