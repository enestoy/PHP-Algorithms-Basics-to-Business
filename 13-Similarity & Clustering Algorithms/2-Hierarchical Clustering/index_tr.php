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

// Hiyerarşik Kümeleme Algoritması
function hiyerarsikKumeleme($veri) {
    $kumeSayisi = count($veri);
    $kümeler = array_map(fn($nokta) => [$nokta], $veri);
    
    while ($kumeSayisi > 1) {
        $minMesafe = PHP_FLOAT_MAX;
        $birlesecekKumeler = [0, 0];

        // En yakın iki kümeyi bul
        for ($i = 0; $i < count($kümeler); $i++) {
            for ($j = $i + 1; $j < count($kümeler); $j++) {
                $ortalamaMesafe = 0;
                foreach ($kümeler[$i] as $nokta1) {
                    foreach ($kümeler[$j] as $nokta2) {
                        $ortalamaMesafe += mesafeHesapla($nokta1, $nokta2);
                    }
                }
                $ortalamaMesafe /= (count($kümeler[$i]) * count($kümeler[$j]));

                if ($ortalamaMesafe < $minMesafe) {
                    $minMesafe = $ortalamaMesafe;
                    $birlesecekKumeler = [$i, $j];
                }
            }
        }

        // Kümeleri birleştir
        $kümeler[$birlesecekKumeler[0]] = array_merge($kümeler[$birlesecekKumeler[0]], $kümeler[$birlesecekKumeler[1]]);
        unset($kümeler[$birlesecekKumeler[1]]);
        $kümeler = array_values($kümeler);
        
        $kumeSayisi--;
    }
    
    return $kümeler;
}

// Örnek veri noktaları oluştur ve kümele
$veriNoktalari = rastgeleVeriNoktalari(10, 0, 100);
$sonKume = hiyerarsikKumeleme($veriNoktalari);

// Sonuçları ekrana yazdır
foreach ($sonKume as $index => $kume) {
    echo "<b>Küme " . ($index + 1) . "</b>:<br>";
    foreach ($kume as $nokta) {
        echo "(" . $nokta[0] . ", " . $nokta[1] . ")<br>";
    }
    echo "<br>";
}

?>
