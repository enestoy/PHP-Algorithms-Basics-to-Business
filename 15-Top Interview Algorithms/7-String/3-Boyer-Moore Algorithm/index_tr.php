<?php
/* 
Mülakat Sorusu:

Problem:
Bir metin ($text) ve bir alt dize ($pattern) verildiğinde, 
bu alt dizenin metin içinde kaç kez geçtiğini ve hangi pozisyonlarda bulunduğunu Boyer-Moore algoritmasını kullanarak bulun.

*/

function boyerMooreSearch($text, $pattern) {
    $n = strlen($text);
    $m = strlen($pattern);
    $positions = []; // Eşleşme pozisyonlarını saklamak için

    // Bad Character Tablosunu oluştur
    $badCharTable = buildBadCharTable($pattern);

    $s = 0; // Metin üzerinde kaydırma pozisyonu
    while ($s <= $n - $m) {
        $j = $m - 1;

        // Pattern'i sağdan sola doğru karşılaştır
        while ($j >= 0 && $pattern[$j] == $text[$s + $j]) {
            $j--;
        }

        // Eğer pattern tamamen eşleştiyse
        if ($j < 0) {
            $positions[] = $s; // Eşleşme pozisyonunu kaydet
            // Kaydırma miktarını güncelle
            $s += ($s + $m < $n) ? $m - ($badCharTable[ord($text[$s + $m])] ?? $m) : 1;
        } else {
            // Kötü karakter kuralına göre kaydırma miktarını hesapla
            $s += max(1, $j - ($badCharTable[ord($text[$s + $j])] ?? -1));
        }
    }

    return $positions;
}

function buildBadCharTable($pattern) {
    $m = strlen($pattern);
    $badCharTable = [];

    // Pattern'deki her karakter için en sağdaki indeksi kaydet
    for ($i = 0; $i < $m; $i++) {
        $badCharTable[ord($pattern[$i])] = $i;
    }

    return $badCharTable;
}

// Örnek kullanım
$text = "ABAAABCDBBABCDDEBCABC";
$pattern = "ABC";
$positions = boyerMooreSearch($text, $pattern);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>