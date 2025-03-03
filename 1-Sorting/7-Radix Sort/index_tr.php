<?php

// Radix Sort algoritmasını uygulayan fonksiyon
function radixSort($dizi) {
    // Dizinin en büyük elemanını bulmamız gerekiyor
    $maksimumDeger = max($dizi);

    // En büyük basamağa kadar sıralama yapıyoruz
    for ($basamak = 1; $maksimumDeger / $basamak >= 1; $basamak *= 10) {
        $dizi = countingSortBasamağaGöre($dizi, $basamak);
    }

    return $dizi;
}

// Basamağa göre Counting Sort uygulayan fonksiyon
function countingSortBasamağaGöre($dizi, $basamak) {
    $n = count($dizi);
    $cikisDizisi = array_fill(0, $n, 0);
    $sayacDizisi = array_fill(0, 10, 0); // 0'dan 9'a kadar olan basamağı tutacak
    // array_fill() PHP'de belirli bir dizin aralığını, belirli bir değere sahip elemanlarla doldurmak için kullanılan bir fonksiyondur.

    // Sayıları basamağa göre gruplama
    foreach ($dizi as $sayi) {
        $basamaktakiDeger = floor($sayi / $basamak) % 10;
        $sayacDizisi[$basamaktakiDeger]++;
    }

    // Sayac dizisini, sayılar için doğru yerleri belirleyecek şekilde düzenleme
    for ($i = 1; $i < 10; $i++) {
        $sayacDizisi[$i] += $sayacDizisi[$i - 1];
    }

    // Diziyi sıralama (gerçek sıralama işlemi burada yapılır)
    for ($i = $n - 1; $i >= 0; $i--) {
        $sayi = $dizi[$i];
        $basamaktakiDeger = floor($sayi / $basamak) % 10;
        $cikisDizisi[$sayacDizisi[$basamaktakiDeger] - 1] = $sayi;
        $sayacDizisi[$basamaktakiDeger]--;
    }

    return $cikisDizisi;
}

// Sabit bir dizi tanımlıyoruz
$dizi = [170, 45, 75, 90, 802, 24, 2, 66];

// Diziyi Radix Sort algoritmasıyla sıralıyoruz
$siraliDizi = radixSort($dizi);

// Sıralanmış diziyi ekrana yazdırıyoruz
echo "Sıralanmış dizi: " . implode(", ", $siraliDizi) . "\n";

?>
