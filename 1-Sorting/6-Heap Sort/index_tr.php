<?php

// Heap Sort algoritmasını uygulayan fonksiyon
function heapSort($dizi) {
    // Dizi boyutunu alıyoruz
    $n = count($dizi);
    
    // Maksimum heap oluşturmak için dizi üzerinde yukarıdan aşağıya doğru işlemi yapıyoruz
    for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
        heapify($dizi, $n, $i);
    }
    // floor() PHP'de bir matematik fonksiyonudur ve verilen sayıyı aşağı yuvarlayarak en yakın tam sayıyı döndürür.

    // Sıralama işlemi
    for ($i = $n - 1; $i > 0; $i--) {
        // Kök eleman (en büyük eleman) ile son elemanı yer değiştiriyoruz
        $gecici = $dizi[0];
        $dizi[0] = $dizi[$i];
        $dizi[$i] = $gecici;

        // Yeni kök elemanı heapify ile düzenliyoruz
        heapify($dizi, $i, 0);
    }

    return $dizi;
}

// Heapify fonksiyonu (diziyi heap yapısına göre düzenler)
function heapify(&$dizi, $n, $i) {
    $enBuyuk = $i; // Başlangıçta en büyük eleman olarak kök alınır
    $sol = 2 * $i + 1; // Sol çocuk
    $sag = 2 * $i + 2; // Sağ çocuk

    // Sol çocuğun dizinin boyutundan küçük olup olmadığını kontrol et
    if ($sol < $n && $dizi[$sol] > $dizi[$enBuyuk]) {
        $enBuyuk = $sol;
    }

    // Sağ çocuğun dizinin boyutundan küçük olup olmadığını kontrol et
    if ($sag < $n && $dizi[$sag] > $dizi[$enBuyuk]) {
        $enBuyuk = $sag;
    }

    // Eğer en büyük eleman kök değilse, elemanları yer değiştir ve tekrar heapify yap
    if ($enBuyuk != $i) {
        $gecici = $dizi[$i];
        $dizi[$i] = $dizi[$enBuyuk];
        $dizi[$enBuyuk] = $gecici;

        // Rekürsif olarak heapify fonksiyonunu çağırıyoruz
        heapify($dizi, $n, $enBuyuk);
    }
}

// Sabit bir dizi tanımlıyoruz
$dizi = [4, 10, 3, 5, 1];

// Diziyi Heap Sort algoritmasıyla sıralıyoruz
$siraliDizi = heapSort($dizi);

// Sıralanmış diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
