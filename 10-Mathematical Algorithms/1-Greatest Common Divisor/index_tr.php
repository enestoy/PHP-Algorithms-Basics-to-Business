<?php

// GCD hesaplayan fonksiyon
function enBuyukOrtakBolen($sayi1, $sayi2) {
    // İlk sayı ve ikinci sayı sıfır değilse
    while ($sayi2 != 0) {
        // Kalanı bul ve sayıları güncelle
        $kalan = $sayi1 % $sayi2;
        $sayi1 = $sayi2;
        $sayi2 = $kalan;
    }

    // Sonuç: En büyük ortak bölen
    return $sayi1;
}

// Kullanıcıdan iki sayı al
$sayi1 = 36; // İlk sayı
$sayi2 = 60; // İkinci sayı

// GCD'yi hesapla
$gcd = enBuyukOrtakBolen($sayi1, $sayi2);

// Sonucu ekrana yazdır
echo "Sayıların En Büyük Ortak Böleni: " . $gcd . "\n";

?>
