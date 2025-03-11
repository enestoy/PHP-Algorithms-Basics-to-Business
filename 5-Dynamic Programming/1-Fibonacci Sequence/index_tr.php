<?php

/**
 * Fibonacci serisini dinamik programlama ile hesaplayan fonksiyon
 *
 * @param int $n Fibonacci serisinde kaçıncı sayıyı hesaplamak istediğimiz
 * @return int Fibonacci serisindeki ilgili sayı
 */
function fibonacciHesapla(int $n): int {
    // Önceki hesaplamaları saklamak için dizi oluşturuluyor
    $sonuclar = [0, 1];
    
    // 2'den başlayarak tüm Fibonacci sayıları hesaplanıyor
    for ($i = 2; $i <= $n; $i++) {
        $sonuclar[$i] = $sonuclar[$i - 1] + $sonuclar[$i - 2];
    }
    
    return $sonuclar[$n];
}

// Örnek kullanım
$sira = 10;
echo "$sira. Fibonacci sayısı: " . fibonacciHesapla($sira);

?>
