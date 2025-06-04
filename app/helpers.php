<?php

use Carbon\Carbon;
use App\Utils\HijriDate;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Format tanggal ke format DD MMMM YYYY
 *
 * @param  string $date tanggal dalam format Y-m-d
 * @return string tanggal dalam format DD MMMM YYYY
 */
if (!function_exists('tanggal')) {
  function tanggal($date)
  {
    return Carbon::parse($date)->isoFormat('DD MMMM YYYY');
  }
}

/**
 * Format tanggal ke format dddd, DD MMMM YYYY
 *
 * @param  string $date tanggal dalam format Y-m-d
 * @return string tanggal dalam format dddd, DD MMMM YYYY
 */
if (!function_exists('tanggalHari')) {
  function tanggalHari($date)
  {
    return Carbon::parse($date)->isoFormat('dddd, DD MMMM YYYY');
  }
}

/**
 * Konversi tanggal Masehi ke tanggal Hijriah
 *
 * @param  string $date tanggal dalam format Y-m-d
 * @return string tanggal dalam format DD MMMM YYYY di format Hijriah
 */
if (!function_exists('tanggalHijri')) {
  function tanggalHijri($date)
  {
    $hijri = new HijriDate($date);

    return $hijri->getDate(true);
  }
}

/**
 * Membuat PDF dari view
 *
 * @param  string $view nama view yang akan dijadikan PDF
 * @param  array $data data yang akan di passing ke view
 * @return PDF
 */
if (!function_exists('pdf')) {
  function pdf(string $view, array $data = [])
  {
    $pdf = Pdf::loadView($view, $data);

    $pdf->setPaper(
      [0, 0, 595.28, 935.43],
      'portrait'
    );

    return $pdf->stream();
  }
}

/**
 * Format NIM
 *
 * @param  string $nim NIM
 * @return string NIM yang sudah diformat
 */
if (!function_exists('nim')) {
  function nim($nim)
  {
    $formattedNim = substr($nim, 0, 2) . '.' .
      substr($nim, 2, 3) . '.' .
      substr($nim, 5, 3) . '.' .
      substr($nim, 8, 3);

    return $formattedNim;
  }
}

/**
 * Generate QR Code
 *
 * @param  string $text teks yang akan dijadikan QR Code
 * @param  int $size ukuran QR Code
 * @return string QR Code dalam bentuk base64
 */
if (!function_exists('generateQr')) {
  function generateQr($text, $size = 80)
  {
    return QrCode::size($size)
      ->margin(1)
      ->generate($text);
  }
}

/**
 * Konversi angka ke romawi
 *
 * @param  int $number angka yang akan dikonversi
 * @return string angka dalam bentuk romawi
 */
if (!function_exists('romawi')) {
  function romawi($number)
  {
    $map = [
      'M' => 1000,
      'CM' => 900,
      'D' => 500,
      'CD' => 400,
      'C' => 100,
      'XC' => 90,
      'L' => 50,
      'XL' => 40,
      'X' => 10,
      'IX' => 9,
      'V' => 5,
      'IV' => 4,
      'I' => 1,
    ];

    $returnValue = '';
    while ($number > 0) {
      foreach ($map as $roman => $int) {
        if ($number >= $int) {
          $number -= $int;
          $returnValue .= $roman;
          break;
        }
      }
    }
    return $returnValue;
  }
}

/**
 * Konversi angka ke urutan dalam bentuk bahasa indonesia
 *
 * @param  int $angka angka yang akan dikonversi
 * @return string angka dalam bentuk urutan bahasa indonesia
 */
if (!function_exists('konversiAngka')) {
  function konversiAngka($angka)
  {
    $daftar = [
      1 => 'pertama',
      2 => 'kedua',
      3 => 'ketiga',
      4 => 'keempat',
      5 => 'kelima',
      6 => 'keenam',
      7 => 'ketujuh',
      8 => 'kedelapan',
      9 => 'kesembilan',
      10 => 'kesepuluh'
    ];

    if (isset($daftar[$angka])) {
      return $daftar[$angka];
    } else {
      return "ke-" . $angka;
    }
  }
}
