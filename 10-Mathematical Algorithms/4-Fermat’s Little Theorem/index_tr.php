<?php

// Fermat'ın Küçük Teoremi'ni kontrol eden fonksiyon
function fermatKucukTeoremi($a, $p) {
    // a'nın p'ye bölünmemesi gerektiğini kontrol ediyoruz
    if ($a % $p == 0) {
        return "a sayısı p'ye bölünebiliyor, teorem geçerli değil.";
    }

    // Fermat'ın Küçük Teoremi'ne göre, a^(p-1) mod p = 1 olmalı
    $sonuc = bcpowmod($a, $p - 1, $p);  // PHP'de büyük sayılarla işlem yapmak için bcpowmod fonksiyonu kullanılır

    // Sonucu kontrol et
    if ($sonuc == 1) {
        return "Fermat'ın Küçük Teoremi geçerlidir: $a^($p-1) mod $p = 1";
    } else {
        return "Fermat'ın Küçük Teoremi geçerli değil: $a^($p-1) mod $p != 1";
    }
}

// Kullanıcıdan a ve p değerlerini alıyoruz
$a = 2;   // Örnek a değeri (2)
$p = 5;   // Örnek p değeri (5)

// Fermat'ın Küçük Teoremi'ni kontrol et
$sonuc = fermatKucukTeoremi($a, $p);

// Sonucu ekrana yazdırıyoruz
echo $sonuc . "\n";

?>
