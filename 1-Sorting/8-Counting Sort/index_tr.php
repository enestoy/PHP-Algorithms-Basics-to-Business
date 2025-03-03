<?php

// Counting Sort algoritmasını uygulayan fonksiyon
function countingSort($dizi) {
    // Dizideki en büyük sayıyı buluyoruz
    $maksimumDeger = max($dizi);

    // Frekans dizisini oluşturuyoruz ve sıfırlıyoruz
    $frekansDizisi = array_fill(0, $maksimumDeger + 1, 0);

    // Dizideki her sayıyı sayıyoruz ve frekans dizisinde yerini işaretliyoruz
    foreach ($dizi as $sayi) {
        $frekansDizisi[$sayi]++;
    }

    // Sıralı diziyi oluşturuyoruz
    $siraliDizi = [];
    for ($i = 0; $i <= $maksimumDeger; $i++) {
        while ($frekansDizisi[$i] > 0) {
            $siraliDizi[] = $i;
            $frekansDizisi[$i]--;
        }
    }

    return $siraliDizi;
}

// Örnek bir dizi
$dizi = [4, 2, 2, 8, 3, 3, 1];

// Diziyi Counting Sort ile sıralıyoruz
$siraliDizi = countingSort($dizi);

// Sıralı diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
