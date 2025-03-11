<?php

// Çubuğun farklı uzunluktaki parçalarının fiyatlarını tanımla
$fiyatlar = [0, 2, 5, 7, 8]; // p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8
$uzunluk = 4; // Çubuğun uzunluğu

// Dinamik programlama fonksiyonu
function enYuksekKar($fiyatlar, $uzunluk) {
    // dp dizisini başlat (Her uzunluk için maksimum karı sakla)
    $dp = array_fill(0, $uzunluk + 1, 0);

    // Her uzunluk için en yüksek karı hesapla
    for ($i = 1; $i <= $uzunluk; $i++) {
        // Her uzunluğu farklı parçalara ayırarak maksimum karı bul
        for ($j = 1; $j <= $i; $j++) {
            $dp[$i] = max($dp[$i], $fiyatlar[$j] + $dp[$i - $j]);
        }
    }

    // Sonuç, verilen uzunluk için en yüksek karı döndürür
    return $dp[$uzunluk];
}

// Çubuğun kesilmesinden elde edilecek maksimum karı hesapla
$maxKar = enYuksekKar($fiyatlar, $uzunluk);

// Sonucu yazdır
echo "Maksimum kar: " . $maxKar;

?>
