<?php

/**
 * En Uzun Artan Alt Dizi (LIS) uzunluğunu Dynamic Programming ile hesaplayan fonksiyon
 *
 * @param array $dizi Girdi olarak verilen sayı dizisi
 * @return int En uzun artan alt dizinin uzunluğu
 */
function lisHesapla(array $dizi): int {
    $uzunluk = count($dizi);
    if ($uzunluk === 0) return 0;
    
    // DP dizisi, her eleman için başlangıçta 1 olarak atanır
    $dp = array_fill(0, $uzunluk, 1);
    
    // LIS hesaplama
    for ($i = 1; $i < $uzunluk; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($dizi[$i] > $dizi[$j] && $dp[$i] < $dp[$j] + 1) {
                $dp[$i] = $dp[$j] + 1;
            }
        }
    }
    
    // En uzun artan alt dizinin uzunluğunu döndür
    return max($dp);
}

// Örnek kullanım
$dizi = [10, 22, 9, 33, 21, 50, 41, 60, 80];
echo "En uzun artan alt dizi uzunluğu: " . lisHesapla($dizi);

?>