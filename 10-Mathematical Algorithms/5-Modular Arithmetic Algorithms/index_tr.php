<?php

// Modüler Toplama İşlemi
function modulerToplama($a, $b, $m) {
    // a ve b'nin modülünü alıp, toplamlarını alıyoruz ve sonuçtaki modüle göre işlemi yapıyoruz
    return (($a % $m) + ($b % $m)) % $m;
}

// Modüler Çıkarma İşlemi
function modulerCikarma($a, $b, $m) {
    // a ve b'nin modülünü alıp, farklarını alıyoruz ve sonuçtaki modüle göre işlemi yapıyoruz
    return (($a % $m) - ($b % $m) + $m) % $m;
}

// Modüler Çarpma İşlemi
function modulerCarpma($a, $b, $m) {
    // a ve b'nin modülünü alıp, çarpımlarını alıyoruz ve sonuçtaki modüle göre işlemi yapıyoruz
    return (($a % $m) * ($b % $m)) % $m;
}

// Modüler Bölme İşlemi (Modüler Ters ile)
function modulerBolme($a, $b, $m) {
    // b'nin modüler tersini bulmamız lazım
    $bTers = modulerTers($b, $m);
    
    // Eğer b'nin modüler tersi yoksa, işlem geçersizdir
    if ($bTers === null) {
        return "b sayısının modüler tersi yok!";
    }
    
    // Modüler bölme işlemi: a * b^(-1) mod m
    return modulerCarpma($a, $bTers, $m);
}

// Modüler Ters Hesaplama (Extended Euclidean Algorithm ile)
function modulerTers($a, $m) {
    // Genişletilmiş Öklid Algoritması kullanarak a'nın modüler tersini buluyoruz
    $t = 0;
    $newT = 1;
    $r = $m;
    $newR = $a;

    while ($newR != 0) {
        $quotient = intdiv($r, $newR);

        $tempT = $t;
        $t = $newT;
        $newT = $tempT - $quotient * $newT;

        $tempR = $r;
        $r = $newR;
        $newR = $tempR - $quotient * $newR;
    }

    // Eğer en son kalan 1 ise, modüler ters var demektir
    if ($r > 1) {
        return null; // Modüler ters yok
    }

    // Modüler tersin pozitif olması için mod m ekliyoruz
    if ($t < 0) {
        $t = $t + $m;
    }

    return $t;
}

// Test Değerleri
$a = 15;
$b = 7;
$m = 13;

// Modüler Toplama
echo "Modüler Toplama: " . modulerToplama($a, $b, $m) . "<br>";

// Modüler Çıkarma
echo "Modüler Çıkarma: " . modulerCikarma($a, $b, $m) . "<br>";

// Modüler Çarpma
echo "Modüler Çarpma: " . modulerCarpma($a, $b, $m) . "<br>";

// Modüler Bölme
echo "Modüler Bölme: " . modulerBolme($a, $b, $m) . "<br>";

?>
