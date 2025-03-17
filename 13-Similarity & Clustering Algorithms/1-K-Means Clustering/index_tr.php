<?php

// Rastgele veri noktaları oluştur
function rastgeleVeriNoktalari($adet, $min, $max) {
    $veri = [];
    for ($i = 0; $i < $adet; $i++) {
        $veri[] = [rand($min, $max), rand($min, $max)];
    }
    return $veri;
}

// Öklid Mesafesi Hesaplama
function mesafeHesapla($nokta1, $nokta2) {
    return sqrt(pow($nokta1[0] - $nokta2[0], 2) + pow($nokta1[1] - $nokta2[1], 2));
}

// K-Means Kümeleme Algoritması
function kMeans($veri, $k, $iterasyonSayisi = 100) {
    // Rastgele merkezleri seç
    $merkezler = array_slice($veri, 0, $k);
    $kumeleme = [];

    for ($i = 0; $i < $iterasyonSayisi; $i++) {
        // Küme gruplarını sıfırla
        $kumeleme = array_fill(0, $k, []);

        // Her veri noktasını en yakın merkeze ata
        foreach ($veri as $nokta) {
            $enYakinMerkez = 0;
            $enKucukMesafe = mesafeHesapla($nokta, $merkezler[0]);
            
            for ($j = 1; $j < $k; $j++) {
                $mesafe = mesafeHesapla($nokta, $merkezler[$j]);
                if ($mesafe < $enKucukMesafe) {
                    $enKucukMesafe = $mesafe;
                    $enYakinMerkez = $j;
                }
            }
            
            $kumeleme[$enYakinMerkez][] = $nokta;
        }

        // Yeni merkezleri hesapla
        for ($j = 0; $j < $k; $j++) {
            if (!empty($kumeleme[$j])) {
                $xToplam = array_sum(array_column($kumeleme[$j], 0));
                $yToplam = array_sum(array_column($kumeleme[$j], 1));
                $merkezler[$j] = [
                    $xToplam / count($kumeleme[$j]),
                    $yToplam / count($kumeleme[$j])
                ];
            }
        }
    }
    return [$merkezler, $kumeleme];
}

// Örnek veri seti oluştur ve kümele
$veriNoktalari = rastgeleVeriNoktalari(20, 0, 100);
$k = 3; // Küme sayısı
list($merkezler, $kumeleme) = kMeans($veriNoktalari, $k);

// Sonuçları ekrana yazdır
foreach ($kumeleme as $index => $kume) {
    echo "<b>Küme " . ($index + 1) . "</b>:<br>";
    foreach ($kume as $nokta) {
        echo "(" . $nokta[0] . ", " . $nokta[1] . ")<br>";
    }
    echo "<br>";
}
?>