<?php

/* 
Mülakat Sorusu:

Bir şirket, çalışanlarının maaş bilgilerini bir dizi (array) içinde tutmaktadır. 
Bu dizi içinde belirli bir maaş değerinin olup olmadığını kontrol etmek ve eğer varsa bu maaşın dizideki indeksini (index) döndürmek istiyoruz. 
Eğer maaş dizide bulunmuyorsa, -1 değerini döndürmeliyiz.

*/

/**
 * Linear Search algoritması kullanarak belirli bir maaşın dizideki indeksini bulur.
 *
 * @param array $maaslar Maaşların bulunduğu dizi.
 * @param int $arananMaas Aranan maaş değeri.
 * @return int Aranan maaşın indeksi veya -1 (bulunamazsa).
*/



function linearSearch(array $maaslar, int $arananMaas): int
{
    // Dizinin boyutunu alıyoruz.
    $diziBoyutu = count($maaslar);

    // Dizi üzerinde lineer bir şekilde arama yapıyoruz.
    for ($i = 0; $i < $diziBoyutu; $i++) {
        // Eğer aranan maaş bulunursa, indeksini döndürüyoruz.
        if ($maaslar[$i] === $arananMaas) {
            return $i;
        }
    }

    // Eğer aranan maaş bulunamazsa -1 döndürüyoruz.
    return -1;
}

// Örnek kullanım:
$maaslar = [3000, 4500, 5000, 6000, 7500];
$arananMaas = 5000;

// Beklenen Çıktı: 2 (5000 maaşı dizinin 2. indeksinde bulunuyor)

$sonuc = linearSearch($maaslar, $arananMaas);

if ($sonuc !== -1) {
    echo "Aranan maaş dizinin $sonuc. indeksinde bulundu.";
} else {
    echo "Aranan maaş dizide bulunamadı.";
}

?>