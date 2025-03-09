<?php

// Grafı temsil eden 2D dizi (komşuluk matrisi)
$graf = [
    [0, 2, 0, 6, 0],
    [2, 0, 3, 8, 5],
    [0, 3, 0, 0, 7],
    [6, 8, 0, 0, 9],
    [0, 5, 7, 9, 0]
];

// Prim Algoritması
function primAlgoritmasi($graf) {
    $düğümSayisi = count($graf);
    
    // En küçük ağırlığı saklamak için diziler
    $anahtarDeğerleri = array_fill(0, $düğümSayisi, PHP_INT_MAX);
    $ebeveynDüğümleri = array_fill(0, $düğümSayisi, -1);
    
    // Başlangıç düğümü
    $anahtarDeğerleri[0] = 0;
    
    // Ziyaret edilip edilmediğini kontrol etmek için dizi
    $ziyaretEdilenDüğümler = array_fill(0, $düğümSayisi, false);
    
    // Tüm düğümler ziyaret edilene kadar döngü
    for ($i = 0; $i < $düğümSayisi - 1; $i++) {
        // En küçük anahtar değerine sahip düğümü seç
        $minAnahtar = PHP_INT_MAX;
        $minDüğüm = -1;
        
        for ($j = 0; $j < $düğümSayisi; $j++) {
            if (!$ziyaretEdilenDüğümler[$j] && $anahtarDeğerleri[$j] < $minAnahtar) {
                $minAnahtar = $anahtarDeğerleri[$j];
                $minDüğüm = $j;
            }
        }
        
        // Seçilen düğümü ziyaret et
        $ziyaretEdilenDüğümler[$minDüğüm] = true;
        
        // Komşu düğümlerle anahtar değerlerini güncelle
        for ($j = 0; $j < $düğümSayisi; $j++) {
            if ($graf[$minDüğüm][$j] && !$ziyaretEdilenDüğümler[$j] && $graf[$minDüğüm][$j] < $anahtarDeğerleri[$j]) {
                $anahtarDeğerleri[$j] = $graf[$minDüğüm][$j];
                $ebeveynDüğümleri[$j] = $minDüğüm;
            }
        }
    }
    
    // Sonuçları yazdır
    echo "Minimum Yayılma Ağacı (MST):<br>";
    for ($i = 1; $i < $düğümSayisi; $i++) {
        echo "Düğüm $i, ebeveyn düğüm: " . $ebeveynDüğümleri[$i] . ", Ağırlık: " . $graf[$ebeveynDüğümleri[$i]][$i] . "<br>";
    }
}

// Algoritmayı çalıştır
primAlgoritmasi($graf);

?>
