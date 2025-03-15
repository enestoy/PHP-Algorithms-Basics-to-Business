<?php

// Modüler tersini hesaplamak için kullanılan fonksiyon
function modulerTers($a, $m) {
    // a ve m'nin en büyük ortak böleni (GCD) 1 olmalı, aksi takdirde modüler ters yoktur
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return null; // Modüler ters yok
}

// Çin Kalan Teoremi'ni çözen fonksiyon
function cktCoz($a, $m) {
    // 1. Adım: Tüm modüllerin çarpımını hesapla
    $M = array_product($m);  // Tüm modüllerin çarpımını hesaplamak

    $x = 0;

    // 2. Adım: Yardımcı değişkenler M_i hesapla ve modüler terslerini bul
    for ($i = 0; $i < count($m); $i++) {
        // M_i = M / m_i
        $M_i = $M / $m[$i];

        // M_i'nin m_i'ye göre modüler tersini bul
        $modulerTers = modulerTers($M_i, $m[$i]);

        // Her bir çözümün etkisini toplamak
        $x += $a[$i] * $M_i * $modulerTers;
    }

    // 3. Adım: Sonucu mod M'ye göre al
    return $x % $M;
}

// Test verileri
$a = [2, 3, 1]; // Denklemlerdeki kalanlar
$m = [3, 5, 7]; // Modüller

// Çözümü hesapla
$sonuc = cktCoz($a, $m);

// Sonucu ekrana yazdır
echo "Çözüm: x = " . $sonuc . "\n";

?>
