<?php

/**
 * İkili Arama (Binary Search) Algoritması
 *
 * @param array $liste Arama yapılacak sıralı liste
 * @param mixed $aranan Bulunması istenen değer
 * @return int|false Bulunan elemanın indeksi veya false
 */
function ikiliArama(array $liste, $aranan)
{
    $sol = 0;
    $sag = count($liste) - 1;

    while ($sol <= $sag) {
        $orta = floor(($sol + $sag) / 2);
        // floor() PHP fonksiyonu, bir sayıyı aşağıya doğru en yakın tam sayıya yuvarlar. Yani, verilen sayıyı bir alt tam sayıya indirir.

        if ($liste[$orta] === $aranan) {
            return $orta; // Eleman bulundu, indeks döndürülüyor
        }

        if ($liste[$orta] < $aranan) {
            $sol = $orta + 1; // Sağ tarafa bakmaya devam et
        } else {
            $sag = $orta - 1; // Sol tarafa bakmaya devam et
        }
    }
    
    return false; // Eleman bulunamadı
}

// Örnek kullanım
$sayilar = [5, 10, 15, 20, 25, 30, 35, 40];
$arananSayi = 25;

$sonuc = ikiliArama($sayilar, $arananSayi);

if ($sonuc !== false) {
    echo "Aranan sayı $sonuc. indekste bulundu.";
} else {
    echo "Aranan sayı listede bulunamadı.";
}

?>
