<?php

// Matris boyutlarını tanımla
$matrisBoyutlari = [10, 20, 30, 40];  // A1: 10x20, A2: 20x30, A3: 30x40

// Matrislerin çarpılma sırasını belirleyen dinamik programlama fonksiyonu
function matrisZinciriCarpma($matrisBoyutlari) {
    $n = count($matrisBoyutlari) - 1; // Matris sayısı
    // dp tablosunu başlat
    $dp = array_fill(0, $n, array_fill(0, $n, 0));
    
    // Zincir uzunluğuna göre tabloyu doldur
    for ($uzunluk = 2; $uzunluk <= $n; $uzunluk++) {
        for ($i = 0; $i <= $n - $uzunluk; $i++) {
            $j = $i + $uzunluk - 1;
            $dp[$i][$j] = PHP_INT_MAX; // Başlangıçta yüksek değer ata
            
            // Optimal bölme noktası için tüm olasılıkları dene
            for ($k = $i; $k < $j; $k++) {
                $kucukMaliyet = $dp[$i][$k] + $dp[$k+1][$j] + $matrisBoyutlari[$i] * $matrisBoyutlari[$k+1] * $matrisBoyutlari[$j+1];
                // Minimum maliyeti bul
                if ($kucukMaliyet < $dp[$i][$j]) {
                    $dp[$i][$j] = $kucukMaliyet;
                }
            }
        }
    }
    
    return $dp[0][$n-1]; // Sonuç, tüm matrislerin çarpılması için minimum maliyet
}

// Çarpma işlemini başlat
$minimumMaliyet = matrisZinciriCarpma($matrisBoyutlari);

// Sonucu yazdır
echo "Minimum skaler çarpma maliyeti: " . $minimumMaliyet;

?>
