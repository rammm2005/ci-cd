<?php
/**
 * Math.php - Library Fungsi Matematika
 * Praktikum CI/CD Pipeline
 */

namespace App\Functions;

class Math
{
    /**
     * Penjumlahan dua bilangan
     */
    public static function tambah($a, $b)
    {
        return $a + $b;
    }

    /**
     * Pengurangan dua bilangan
     */
    public static function kurang($a, $b)
    {
        return $a - $b;
    }

    /**
     * Perkalian dua bilangan
     */
    public static function kali($a, $b)
    {
        return $a * $b;
    }

    /**
     * Pembagian dua bilangan
     */
    public static function bagi($a, $b)
    {
        if ($b == 0) {
            return "Error: Tidak bisa membagi dengan nol";
        }
        return $a / $b;
    }

    /**
     * Hitung persentase
     * @param float $nilai - nilai yang dihitung
     * @param float $total - nilai total
     * @return float persentase
     */
    public static function persentase($nilai, $total)
    {
        if ($total == 0) {
            return 0;
        }
        return ($nilai / $total) * 100;
    }

    /**
     * Hitung diskon
     * @param float $harga - harga asli
     * @param float $persen_diskon - persentase diskon (0-100)
     * @return array [harga_diskon, potongan]
     */
    public static function hitungDiskon($harga, $persen_diskon)
    {
        $potongan = $harga * ($persen_diskon / 100);
        $harga_diskon = $harga - $potongan;
        return [
            'harga_asli' => $harga,
            'persen_diskon' => $persen_diskon,
            'potongan' => $potongan,
            'harga_diskon' => $harga_diskon
        ];
    }

    /**
     * Hitung pangkat
     */
    public static function pangkat($base, $exp)
    {
        return pow($base, $exp);
    }

    /**
     * Hitung akar kuadrat
     */
    public static function akarKuadrat($angka)
    {
        if ($angka < 0) {
            return "Error: Tidak bisa menghitung akar dari bilangan negatif";
        }
        return sqrt($angka);
    }

    /**
     * Hitung faktorial
     */
    public static function faktorial($n)
    {
        if ($n < 0) {
            return "Error: Faktorial tidak didefinisikan untuk bilangan negatif";
        }
        if ($n == 0 || $n == 1) {
            return 1;
        }
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    /**
     * Cek bilangan prima
     */
    public static function isPrima($n)
    {
        if ($n <= 1) return false;
        if ($n <= 3) return true;
        if ($n % 2 == 0 || $n % 3 == 0) return false;
        for ($i = 5; $i * $i <= $n; $i += 6) {
            if ($n % $i == 0 || $n % ($i + 2) == 0) {
                return false;
            }
        }
        return true;
    }
}
