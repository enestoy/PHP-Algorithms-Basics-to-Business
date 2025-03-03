<?php

// Bucket Sort algoritmasını uygulayan fonksiyon
function bucketSort($dizi) {
    // Dizinin en küçük ve en büyük değerlerini buluyoruz
    $minDeger = min($dizi);
    $maxDeger = max($dizi);

    // Kovaların sayısını belirliyoruz
    $kovaSayisi = count($dizi);
    
    // Her kova için boş bir dizi oluşturuyoruz
    $kovalar = array_fill(0, $kovaSayisi, []);

    // Elemanları uygun kovalarına yerleştiriyoruz
    foreach ($dizi as $deger) {
        // Kovaya yerleştirilecek index hesaplanıyor
        $kovaIndex = floor(($deger - $minDeger) / ($maxDeger - $minDeger + 1) * $kovaSayisi);
        $kovalar[$kovaIndex][] = $deger;
    }

    // Her kova içindeki elemanları sıralıyoruz
    foreach ($kovalar as &$kova) {
        sort($kova);
    }

    // Sıralı diziyi oluşturmak için tüm kovaları birleştiriyoruz
    $siraliDizi = [];
    foreach ($kovalar as $kova) {
        foreach ($kova as $deger) {
            $siraliDizi[] = $deger;
        }
    }

    return $siraliDizi;
}

// Örnek bir dizi
$dizi = [0.42, 0.32, 0.23, 0.51, 0.12, 0.33];

// Diziyi Bucket Sort ile sıralıyoruz
$siraliDizi = bucketSort($dizi);

// Sıralı diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
