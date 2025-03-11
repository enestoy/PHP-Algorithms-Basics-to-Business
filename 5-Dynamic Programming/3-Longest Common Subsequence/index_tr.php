<?php

/**
 * İki dizgi arasındaki En Uzun Ortak Alt Diziyi (LCS) Dynamic Programming ile bulan fonksiyon
 *
 * @param string $dizgi1 İlk dizgi
 * @param string $dizgi2 İkinci dizgi
 * @return string En uzun ortak alt dizi
 */
function lcsHesapla(string $dizgi1, string $dizgi2): string {
    $uzunluk1 = strlen($dizgi1);
    $uzunluk2 = strlen($dizgi2);
    
    // Dinamik programlama tablosu oluşturuluyor
    $dp = array_fill(0, $uzunluk1 + 1, array_fill(0, $uzunluk2 + 1, 0));
    
    // Tabloyu doldurma işlemi
    for ($i = 1; $i <= $uzunluk1; $i++) {
        for ($j = 1; $j <= $uzunluk2; $j++) {
            if ($dizgi1[$i - 1] === $dizgi2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }
    
    // LCS'yi geri izleme (Backtracking) ile bulma
    $i = $uzunluk1;
    $j = $uzunluk2;
    $sonuc = "";
    
    while ($i > 0 && $j > 0) {
        if ($dizgi1[$i - 1] === $dizgi2[$j - 1]) {
            $sonuc = $dizgi1[$i - 1] . $sonuc;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            $i--;
        } else {
            $j--;
        }
    }
    
    return $sonuc;
}

// Örnek kullanım
$dizgi1 = "ACDBE";
$dizgi2 = "ABCDE";

echo "En uzun ortak alt dizi: " . lcsHesapla($dizgi1, $dizgi2);

?>
