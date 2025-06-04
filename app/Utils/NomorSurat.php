<?php

namespace App\Utils;

class NomorSurat
{
  private static function formatSurat($nomor, $kode)
  {
    $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'];
    $bulan = date('n');
    $tahun = date('Y');
    $romawi = $romawi[$bulan - 1];
    $nomor = str_pad($nomor, 3, '0', STR_PAD_LEFT);

    return "$nomor/UIM/A.13/$kode/$romawi/$tahun";
  }

  public static function undangan($nomor = 0)
  {
    return self::formatSurat($nomor, 'Und');
  }

  public static function keputusan($nomor = 0)
  {
    return self::formatSurat($nomor, 'SKep');
  }

  public static function umum($nomor = 0)
  {
    return self::formatSurat($nomor, 'AK');
  }
}
