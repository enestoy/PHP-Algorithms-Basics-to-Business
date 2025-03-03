<?php

// Merge Sort algoritması ile diziyi sıralama fonksiyonu
function mergeSort($dizi) {
    // Dizi bir elemandan fazla ise, bölme işlemi yapılır
    if (count($dizi) <= 1) {
        return $dizi;
    }

    // Diziyi ikiye ayırıyoruz
    $ortada = floor(count($dizi) / 2);
    $solDizi = array_slice($dizi, 0, $ortada);  // Sol yarı
    $sagDizi = array_slice($dizi, $ortada);     // Sağ yarı

    // Sol ve sağ dizileri sıralayıp birleştiriyoruz
    return birlestir(mergeSort($solDizi), mergeSort($sagDizi));
}

// İki sıralı diziyi birleştiren fonksiyon
function birlestir($solDizi, $sagDizi) {
    $siraliDizi = [];
    
    // Sol ve sağ dizilerdeki elemanlar karşılaştırılarak sıralı diziye eklenir
    while (count($solDizi) > 0 && count($sagDizi) > 0) {
        if ($solDizi[0] < $sagDizi[0]) {
            $siraliDizi[] = array_shift($solDizi);  // Sol diziden en küçük eleman alınır
        } else {
            $siraliDizi[] = array_shift($sagDizi);  // Sağ diziden en küçük eleman alınır
        }
    }
    // array_shift() PHP'de bir dizi (array) fonksiyonudur ve dizinin ilk elemanını kaldırır. Kaldırılan eleman geri döndürülür ve dizinin elemanları bir sola kaydırılır.


    // Kalan elemanlar varsa, onları da sıralı diziye ekleriz
    return array_merge($siraliDizi, $solDizi, $sagDizi);
}

// Sabit bir dizi tanımlıyoruz
$dizi = [38, 27, 43, 3, 9, 82, 10];

// Diziyi Merge Sort algoritmasıyla sıralıyoruz
$siraliDizi = mergeSort($dizi);

// Sıralanmış diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
