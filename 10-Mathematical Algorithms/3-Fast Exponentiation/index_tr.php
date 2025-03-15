<?php

// Hızlı üssü alma (Fast Exponentiation) fonksiyonu
function hizliUssuAl($taban, $us) {
    // Sonuç başlangıçta 1
    $sonuc = 1;
    
    // Üs sıfır olduğunda, sonuç 1'dir çünkü her sayının sıfırıncı kuvveti 1'dir
    while ($us > 0) {
        // Eğer üs tekse, sonucu taban ile çarp
        if ($us % 2 == 1) {
            $sonuc *= $taban;
        }

        // Tabanı karesini al
        $taban *= $taban;

        // Üs değerini yarıya indir
        $us = floor($us / 2);
    }

    return $sonuc;
}

// Kullanıcıdan tabanı ve üssü alıyoruz
$taban = 2; // Örnek taban (2)
$us = 13;   // Örnek üs (13)

// Hızlı üssü alma fonksiyonunu çağırıyoruz
$sonuc = hizliUssuAl($taban, $us);

// Sonucu ekrana yazdırıyoruz
echo "$taban üssü $us = $sonuc\n";

?>
