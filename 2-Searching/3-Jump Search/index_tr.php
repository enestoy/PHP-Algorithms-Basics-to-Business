<?php

/**
 * Jump Search Algoritması
 *
 * @param array $liste Sıralı liste içinde arama yapılacak
 * @param mixed $aranan Bulunması istenen değer
 * @return int|false Bulunan elemanın indeksi veya false
 */
function jumpSearch(array $liste, $aranan)
{
    $listeUzunlugu = count($liste);
    $adimUzunlugu = floor(sqrt($listeUzunlugu)); // Adım büyüklüğü, genellikle listenin karekökü
    $solIndex = 0;
    $sagIndex = 0;

    // Adım adım ilerleyerek ve bloğun içinde hedef elemanı arayarak
    while ($sagIndex < $listeUzunlugu && $liste[$sagIndex] < $aranan) {
        $solIndex = $sagIndex;
        $sagIndex += $adimUzunlugu; // Bir sonraki bloğa geç
    }

    // Bulunduğunda bloğun içinde doğrusal arama yap
    for ($i = $solIndex; $i < min($sagIndex, $listeUzunlugu); $i++) {
        if ($liste[$i] === $aranan) {
            return $i; // Eleman bulundu, indeks döndürülüyor
        }
    }

    return false; // Eleman bulunamadı
}

// Örnek kullanım
$sayilar = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
$arananSayi = 15;

$sonuc = jumpSearch($sayilar, $arananSayi);

if ($sonuc !== false) {
    echo "Aranan sayı $sonuc. indekste bulundu.";
} else {
    echo "Aranan sayı listede bulunamadı.";
}

?>
