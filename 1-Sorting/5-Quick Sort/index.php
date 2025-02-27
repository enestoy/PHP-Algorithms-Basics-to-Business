<?php

// Quick Sort algoritması ile diziyi sıralama fonksiyonu
function quickSort($dizi) {
    // Dizi bir elemandan küçükse, sıralama işlemi gereksizdir
    if (count($dizi) <= 1) {
        return $dizi;
    }

    // Pivot elemanını seçiyoruz (bu örnekte, son eleman pivot olarak seçiliyor)
    $pivot = array_pop($dizi);
    // array_pop() PHP'de bir dizi fonksiyonudur ve dizinin son elemanını kaldırır. Kaldırılan eleman, geri döndürülür.
    
    // Pivot'tan küçük ve büyük elemanları tutacak diziler
    $kucukler = [];
    $buyukler = [];

    // Diziyi pivot ile karşılaştırarak, küçük ve büyük elemanları ayırıyoruz
    foreach ($dizi as $eleman) {
        if ($eleman < $pivot) {
            $kucukler[] = $eleman;  // Pivot'tan küçük olanları küçükler dizisine ekliyoruz
        } else {
            $buyukler[] = $eleman;  // Pivot'tan büyük olanları büyükler dizisine ekliyoruz
        }
    }

    // Küçükler dizisini sıralıyoruz, pivot'u doğru yere yerleştiriyoruz ve büyükler dizisini sıralıyoruz
    return array_merge(quickSort($kucukler), [$pivot], quickSort($buyukler));
}

// Sabit bir dizi tanımlıyoruz
$dizi = [10, 80, 30, 90, 40, 50, 70];

// Diziyi Quick Sort algoritmasıyla sıralıyoruz
$siraliDizi = quickSort($dizi);

// Sıralanmış diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
