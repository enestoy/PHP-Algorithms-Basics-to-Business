<?php

// Asal sayıları bulan fonksiyon
function asalSayilariBul($sinir) {
    // Başlangıçta, tüm sayıları asal olarak kabul ediyoruz
    $asalSayilar = array_fill(0, $sinir + 1, true);
    
    // 0 ve 1 asal sayılar değildir, onları işaretliyoruz
    $asalSayilar[0] = false;
    $asalSayilar[1] = false;

    // 2'den başlayarak her bir sayıyı kontrol ediyoruz
    for ($i = 2; $i * $i <= $sinir; $i++) {
        // Eğer i sayısı asal ise, i'nin katlarını işaretle
        if ($asalSayilar[$i] == true) {
            for ($j = $i * $i; $j <= $sinir; $j += $i) {
                $asalSayilar[$j] = false; // i'nin katı olan sayıyı asal olmayan olarak işaretle
            }
        }
    }

    // Asal sayıları elde etmek için işaretlenmemiş sayıları döndürüyoruz
    $asalSayilarListesi = [];
    for ($i = 2; $i <= $sinir; $i++) {
        if ($asalSayilar[$i] == true) {
            $asalSayilarListesi[] = $i;
        }
    }

    return $asalSayilarListesi;
}

// Kullanıcıdan asal sayıları bulmak için üst sınırı alıyoruz
$sinir = 30; // Örnek olarak 30'a kadar olan asal sayıları bulacağız

// Asal sayıları hesapla
$asalSayilar = asalSayilariBul($sinir);

// Sonuçları ekrana yazdır
echo "$sinir sayısına kadar olan asal sayılar: ";
echo implode(", ", $asalSayilar);
echo "<br>";

?>
