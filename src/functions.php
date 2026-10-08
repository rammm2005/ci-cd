<?php

require_once __DIR__ . '/Functions/Math.php';

use App\Functions\Math;

function tambah($a, $b) {
    return Math::tambah($a, $b);
}

function kurang($a, $b) {
    return Math::kurang($a, $b);
}

function kali($a, $b) {
    return Math::kali($a, $b);
}

function bagi($a, $b) {
    return Math::bagi($a, $b);
}

function persentase($nilai, $total) {
    return Math::persentase($nilai, $total);
}

function hitungDiskon($harga, $persen_diskon) {
    return Math::hitungDiskon($harga, $persen_diskon);
}

function pangkat($base, $exp) {
    return Math::pangkat($base, $exp);
}

function akarKuadrat($angka) {
    return Math::akarKuadrat($angka);
}

function faktorial($n) {
    return Math::faktorial($n);
}

function isPrima($n) {
    return Math::isPrima($n);
}
