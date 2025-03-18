<?php
/* 
Mülakat Sorusu:

Problem:
Bir metin ($text) ve bir alt dize ($pattern) verildiğinde, 
bu alt dizenin metin içinde kaç kez geçtiğini ve hangi pozisyonlarda bulunduğunu KMP algoritmasını kullanarak bulun.
*/


function KMPSearch($pattern, $text) {
    $n = strlen($text);
    $m = strlen($pattern);
    $positions = []; // Eşleşme pozisyonlarını saklamak için

    // Önek tablosunu (LPS) oluştur
    $lps = computeLPSArray($pattern);

    $i = 0; // Metin indeksi
    $j = 0; // Pattern indeksi

    while ($i < $n) {
        if ($pattern[$j] == $text[$i]) {
            $i++;
            $j++;
        }

        // Pattern tamamen eşleştiyse
        if ($j == $m) {
            $positions[] = $i - $j; // Eşleşme pozisyonunu kaydet
            $j = $lps[$j - 1]; // Pattern'i kaydır
        } elseif ($i < $n && $pattern[$j] != $text[$i]) {
            // Eşleşme yoksa, LPS tablosunu kullanarak pattern'i kaydır
            if ($j != 0) {
                $j = $lps[$j - 1];
            } else {
                $i++;
            }
        }
    }

    return $positions;
}

function computeLPSArray($pattern) {
    $m = strlen($pattern);
    $lps = array_fill(0, $m, 0); // LPS tablosunu sıfırla
    $len = 0; // Önceki en uzun önek/sonek uzunluğu
    $i = 1;

    while ($i < $m) {
        if ($pattern[$i] == $pattern[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } else {
            if ($len != 0) {
                $len = $lps[$len - 1];
            } else {
                $lps[$i] = 0;
                $i++;
            }
        }
    }

    return $lps;
}

// Örnek kullanım
$text = "ABABDABACDABABCABAB";
$pattern = "ABABCABAB";
$positions = KMPSearch($pattern, $text);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>