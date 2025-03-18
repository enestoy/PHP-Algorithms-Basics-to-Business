<?php
/* 
Mülakat Sorusu:

Problem:
Bir metin ($text) ve bir alt dize ($pattern) verildiğinde, 
bu alt dizenin metin içinde kaç kez geçtiğini ve hangi pozisyonlarda bulunduğunu Rabin-Karp algoritmasını kullanarak bulun.

 */
function rabinKarp($text, $pattern) {
    $n = strlen($text);
    $m = strlen($pattern);
    $prime = 101; // Asal sayı (hash hesaplamak için)
    $positions = []; // Eşleşme pozisyonlarını saklamak için

    // Pattern ve ilk pencerenin hash değerlerini hesapla
    $patternHash = calculateHash($pattern, $prime);
    $textHash = calculateHash(substr($text, 0, $m), $prime);

    // Metin üzerinde kaydırma penceresi ile ilerle
    for ($i = 0; $i <= $n - $m; $i++) {
        // Hash değerleri eşleşiyorsa, karakterleri karşılaştır
        if ($patternHash == $textHash && substr($text, $i, $m) == $pattern) {
            $positions[] = $i; // Eşleşme pozisyonunu kaydet
        }

        // Bir sonraki pencere için hash değerini güncelle
        if ($i < $n - $m) {
            $textHash = recalculateHash($text, $i, $m, $textHash, $prime);
        }
    }

    return $positions;
}

function calculateHash($string, $prime) {
    $hash = 0;
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $hash = ($hash * 256 + ord($string[$i])) % $prime;
    }
    return $hash;
}

function recalculateHash($text, $oldIndex, $patternLength, $oldHash, $prime) {
    $newHash = ($oldHash - ord($text[$oldIndex]) * pow(256, $patternLength - 1)) % $prime;
    $newHash = ($newHash * 256 + ord($text[$oldIndex + $patternLength])) % $prime;
    return $newHash < 0 ? $newHash + $prime : $newHash;
}

// Örnek kullanım
$text = "ABCCDABECCAB";
$pattern = "AB";
$positions = rabinKarp($text, $pattern);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>