<?php

// Rastgele veri noktaları oluşturma fonksiyonu
function rastgeleVeriNoktalari($adet, $min, $max) {
    $veri = [];
    for ($i = 0; $i < $adet; $i++) {
        $veri[] = [rand($min, $max), rand($min, $max)];
    }
    return $veri;
}

// Öklid mesafesi hesaplama fonksiyonu
function mesafeHesapla($nokta1, $nokta2) {
    return sqrt(pow($nokta1[0] - $nokta2[0], 2) + pow($nokta1[1] - $nokta2[1], 2));
}

// En yakın komşuları bulma fonksiyonu
function enYakinKomsular($veri, $hedefNokta, $k) {
    $mesafeler = [];

    // Tüm veri noktaları için mesafeleri hesapla
    foreach ($veri as $nokta) {
        $mesafeler[] = [
            'nokta' => $nokta,
            'mesafe' => mesafeHesapla($nokta, $hedefNokta)
        ];
    }

    // Mesafeye göre sırala
    usort($mesafeler, fn($a, $b) => $a['mesafe'] <=> $b['mesafe']);

    // En yakın k komşuyu döndür
    return array_slice($mesafeler, 0, $k);
}

// Örnek veri noktaları oluştur
$veriNoktalari = rastgeleVeriNoktalari(10, 0, 100);
$hedefNokta = [50, 50]; // Hedef nokta
$k = 3; // En yakın 3 komşuyu bul
$yakınKomsular = enYakinKomsular($veriNoktalari, $hedefNokta, $k);

// Sonuçları ekrana yazdır
echo "<b>Hedef Nokta:</b> (" . $hedefNokta[0] . ", " . $hedefNokta[1] . ")<br><br>";
echo "<b>En Yakın $k Komşu:</b><br>";
foreach ($yakınKomsular as $komsu) {
    echo "(" . $komsu['nokta'][0] . ", " . $komsu['nokta'][1] . ") - Mesafe: " . round($komsu['mesafe'], 2) . "<br>";
}

?>
