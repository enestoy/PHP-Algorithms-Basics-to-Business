<?php

/* 
Mülakat Sorusu:

Problem:
İki metin dizisi verildiğinde, bu iki dizi arasındaki en uzun ortak alt diziyi (LCS) bulun. 
Örneğin, "ABCBDAB" ve "BDCAB" dizileri verildiğinde, LCS "BCAB" veya "BDAB" olacaktır.

*/

function longestCommonSubsequence($text1, $text2) {
    $m = strlen($text1);
    $n = strlen($text2);

    // DP tablosunu oluştur ve sıfırla başlat
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    // DP tablosunu doldur
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($text1[$i - 1] == $text2[$j - 1]) {
                // Eğer karakterler eşleşiyorsa, bir önceki değere 1 ekle
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                // Eşleşme yoksa, sol veya üstteki en büyük değeri al
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    // LCS'yi bulmak için DP tablosunu geriye doğru takip et
    $lcs = "";
    $i = $m;
    $j = $n;
    while ($i > 0 && $j > 0) {
        if ($text1[$i - 1] == $text2[$j - 1]) {
            // Eşleşme bulundu, LCS'ye ekle
            $lcs = $text1[$i - 1] . $lcs;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            // Sol taraf daha büyükse, sola git
            $i--;
        } else {
            // Üst taraf daha büyükse, üste git
            $j--;
        }
    }

    return $lcs;
}

// Örnek kullanım
$text1 = "ABCBDAB";
$text2 = "BDCAB";
echo "Longest Common Subsequence: " . longestCommonSubsequence($text1, $text2); // Çıktı: BCAB veya BDAB

?>