<?php

/**
 * Linear Search (Doğrusal Arama) algoritması
 *
 * @param array $liste Arama yapılacak liste
 * @param mixed $aranan Bulunması istenen değer
 * @return int|false Bulunan elemanın indeksi veya false
 */
function dogrusalArama(array $liste, $aranan)
{
    foreach ($liste as $indeks => $deger) {
        if ($deger === $aranan) {
            return $indeks; // Eleman bulundu, indeks döndürülüyor
        }
    }
    return false; // Eleman bulunamadı
}

// Örnek kullanım
$sayilar = [10, 25, 30, 45, 50];
$arananSayi = 30;

$sonuc = dogrusalArama($sayilar, $arananSayi);

if ($sonuc !== false) {
    echo "Aranan sayı $sonuc. indekste bulundu.";
} else {
    echo "Aranan sayı listede bulunamadı.";
}

?>
