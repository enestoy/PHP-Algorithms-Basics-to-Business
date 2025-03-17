<?php

// Öklid mesafesi hesaplama fonksiyonu
function mesafeHesapla($nokta1, $nokta2) {
    return sqrt(pow($nokta1[0] - $nokta2[0], 2) + pow($nokta1[1] - $nokta2[1], 2));
}

// DBSCAN Algoritması
function dbscan($veri, $eps, $minNokta) {
    $kumeNo = 0;
    $ziyaretEdildi = array_fill(0, count($veri), false);
    $kumeleme = array_fill(0, count($veri), -1);

    foreach ($veri as $index => $nokta) {
        if ($ziyaretEdildi[$index]) continue;
        $ziyaretEdildi[$index] = true;

        // Komşuları bul
        $komsular = komsulariBul($veri, $index, $eps);

        if (count($komsular) < $minNokta) {
            $kumeleme[$index] = 0; // Gürültü noktası olarak işaretle
            continue;
        }

        $kumeNo++;
        $kumeleme[$index] = $kumeNo;
        
        // Komşuları işleyerek kümeye dahil et
        for ($i = 0; $i < count($komsular); $i++) {
            $komsuIndex = $komsular[$i];
            if (!$ziyaretEdildi[$komsuIndex]) {
                $ziyaretEdildi[$komsuIndex] = true;
                $yeniKomsular = komsulariBul($veri, $komsuIndex, $eps);
                if (count($yeniKomsular) >= $minNokta) {
                    $komsular = array_merge($komsular, $yeniKomsular);
                }
            }
            if ($kumeleme[$komsuIndex] === -1) {
                $kumeleme[$komsuIndex] = $kumeNo;
            }
        }
    }
    return $kumeleme;
}

// Belirtilen noktaya verilen eps mesafesindeki komşuları bul
function komsulariBul($veri, $index, $eps) {
    $komsular = [];
    foreach ($veri as $i => $nokta) {
        if ($i !== $index && mesafeHesapla($veri[$index], $nokta) <= $eps) {
            $komsular[] = $i;
        }
    }
    return $komsular;
}

// Rastgele veri noktaları oluştur
function rastgeleVeriNoktalari($adet, $min, $max) {
    $veri = [];
    for ($i = 0; $i < $adet; $i++) {
        $veri[] = [rand($min, $max), rand($min, $max)];
    }
    return $veri;
}

// Örnek veri seti oluştur ve DBSCAN uygula
$veriNoktalari = rastgeleVeriNoktalari(20, 0, 100);
$eps = 15; // Komşuluk mesafesi
$minNokta = 3; // Minimum nokta sayısı
$sonuc = dbscan($veriNoktalari, $eps, $minNokta);

// Sonuçları ekrana yazdır
foreach ($sonuc as $index => $kume) {
    echo "Nokta (" . $veriNoktalari[$index][0] . ", " . $veriNoktalari[$index][1] . ") -> Küme: " . ($kume === 0 ? 'Gürültü' : $kume) . "<br>";
}

?>
