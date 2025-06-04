<?php

namespace App\Utils;

class HijriDate
{
  private $hijri;

  /**
   * Menginisialisasi class ini.
   *
   * @param int $time Tanggal yang akan di konversi. Nilai defaultnya adalah
   *                  waktu sekarang.
   */
  public function __construct($time = false)
  {
    if (!$time)
      $time = time();
    else
      $time = strtotime($time);

    $this->hijri = $this->convertToHijri($time);
  }

  /**
   * Mendapatkan tanggal hijriyah lengkap.
   * @param bool $zero Apakah tanggal dibuat menjadi 2 digit. Nilai defaultnya
   *                   adalah false.
   *
   * @return string Tanggal hijriyah lengkap.
   */
  public function getDate($zero = false)
  {
    $day = $this->hijri[1];
    $month = $this->getMonthName($this->hijri[0]);
    $year = $this->hijri[2];

    if ($zero && $day < 10) {
      $day = '0' . $day;
    }

    return "$day $month $year";
  }

  /**
   * Mendapatkan tanggal hijriyah.
   *
   * @return int Tanggal hijriyah.
   */
  public function getDay()
  {
    return $this->hijri[1];
  }

  /**
   * Mendapatkan bulan hijriyah.
   *
   * @return int Bulan hijriyah.
   */
  public function getMonth()
  {
    return $this->hijri[0];
  }

  /**
   * Mendapatkan tahun hijriyah.
   *
   * @return int Tahun hijriyah.
   */
  public function getYear()
  {
    return $this->hijri[2];
  }

  /**
   * Mendapatkan nama bulan hijriyah.
   *
   * @param int $i Nomor bulan hijriyah.
   *
   * @return string Nama bulan hijriyah.
   */
  public function getMonthName($i)
  {
    static $month = [
      'Muharram',
      'Shafar',
      'Rabi\'ul Awal',
      'Rabi\'ul Akhir',
      'Jumadil Awwal',
      'Jumadil Akhir',
      'Rajab',
      'Sya\'ban',
      'Ramadhan',
      'Syawal',
      'Dzulqaidah',
      'Dzulhijjah',
    ];

    return $month[$i - 1];
  }

  /**
   * Mengkonversi tanggal masehi ke tanggal hijriyah.
   *
   * @param int $time Tanggal yang akan di konversi.
   *
   * @return array Tanggal hijriyah yang terdiri dari bulan, tanggal, dan tahun.
   */
  private function convertToHijri($time = null)
  {
    if ($time === null) $time = time();

    $m = date('m', $time);
    $d = date('d', $time);
    $y = date('Y', $time);

    return $this->julianDayToHijri(cal_to_jd(CAL_GREGORIAN, $m, $d, $y));
  }

  /**
   * Mengkonversi tanggal julian ke tanggal hijriyah.
   *
   * @param int $masehi Tanggal yang akan di konversi.
   *
   * @return array Tanggal hijriyah yang terdiri dari bulan, tanggal, dan tahun.
   */
  private function julianDayToHijri($masehi)
  {
    $totalDays = $masehi - 1948440 + 10632;

    $monthsElapsed = (int)(($totalDays - 1) / 10631);
    $remainingDays = $totalDays - 10631 * $monthsElapsed + 354;

    $monthsElapsedInLeapYear = ((int)((10985 - $remainingDays) / 5316)) *
      ((int)(50 * $remainingDays / 17719)) +
      ((int)($remainingDays / 5670)) *
      ((int)(43 * $remainingDays / 15238));
    $remainingDaysInMonth = $remainingDays - ((int)((30 - $monthsElapsedInLeapYear) / 15)) *
      ((int)((17719 * $monthsElapsedInLeapYear) / 50)) -
      ((int)($monthsElapsedInLeapYear / 16)) *
      ((int)((15238 * $monthsElapsedInLeapYear) / 43)) + 29;

    $month = (int)(24 * $remainingDaysInMonth / 709);
    $day = $remainingDaysInMonth - (int)(709 * $month / 24);
    $year = 30 * $monthsElapsed + $monthsElapsedInLeapYear - 30;

    return [$month, $day, $year];
  }
}
