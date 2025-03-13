<?php

// Quick Sort algoritmasını uygulayan fonksiyon
function hizliSirala(array $dizi): array {
    // Eğer dizinin uzunluğu 1 veya daha az ise, zaten sıralıdır
    if (count($dizi) < 2) {
        return $dizi;
    }
    
    // Pivot elemanını seç (genellikle ilk eleman seçilir)
    $pivot = $dizi[0];
    
    // Küçük ve büyük elemanları ayrı dizilere ayır
    $kucukler = [];
    $buyukler = [];
    
    for ($i = 1; $i < count($dizi); $i++) {
        if ($dizi[$i] < $pivot) {
            $kucukler[] = $dizi[$i];
        } else {
            $buyukler[] = $dizi[$i];
        }
    }
    
    // Alt dizileri sıralayarak sonucu birleştir
    return array_merge(hizliSirala($kucukler), [$pivot], hizliSirala($buyukler));
}

// Test için bir örnek dizi tanımla
$dizi = [38, 27, 43, 3, 9, 82, 10];

// Quick Sort algoritmasını uygula
$siraliDizi = hizliSirala($dizi);

// Sıralanmış diziyi ekrana yazdır
echo "Sıralı Dizi: " . implode(", ", $siraliDizi);

?>