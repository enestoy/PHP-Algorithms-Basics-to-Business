<?php

// Selection Sort fonksiyonu
function selectionSort($dizi) {
    // Dizinin uzunluğunu al
    $uzunluk = count($dizi);

    // Dizi üzerindeki her elemanı kontrol et
    for ($i = 0; $i < $uzunluk - 1; $i++) {
        // En küçük elemanı bulmak için varsayalım ki şu anki eleman en küçüğü
        $enKucukIndex = $i;

        // Kalan elemanlarla karşılaştırma yap
        for ($j = $i + 1; $j < $uzunluk; $j++) {
            if ($dizi[$j] < $dizi[$enKucukIndex]) {
                $enKucukIndex = $j;  // Daha küçük eleman bulundu
            }
        }

        // En küçük elemanı bulduktan sonra, o elemanla şu anki elemanı yer değiştir
        if ($enKucukIndex != $i) {
            $gecici = $dizi[$i];
            $dizi[$i] = $dizi[$enKucukIndex];
            $dizi[$enKucukIndex] = $gecici;
        }
    }

    // Sıralanmış diziyi döndür
    return $dizi;
}

// Test dizisi
$girdiDizisi = [64, 34, 25, 12, 22, 11, 90];

// Selection Sort algoritmasını uygula
$siraliDizi = selectionSort($girdiDizisi);

// Sonucu ekrana yazdır
echo "Sıralı Dizi: ";
foreach ($siraliDizi as $eleman) {
    echo $eleman . " ";
}

?>
