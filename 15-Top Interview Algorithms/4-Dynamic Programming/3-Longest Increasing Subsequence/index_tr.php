<?php
/* 
Mülakat Sorusu:

Problem:
Bir tamsayı dizisi verildiğinde, bu dizideki en uzun artan alt diziyi (LIS) bulun. 
Örneğin, [10, 22, 9, 33, 21, 50, 41, 60, 80] dizisi verildiğinde, LIS [10, 22, 33, 50, 60, 80] olacaktır.
*/

function longestIncreasingSubsequence($nums) {
    $n = count($nums);
    if ($n == 0) return [];

    // DP tablosunu oluştur ve her bir eleman için LIS uzunluğunu 1 olarak başlat
    $dp = array_fill(0, $n, 1);
    $prev = array_fill(0, $n, -1); // Önceki indeksleri tutmak için

    // En uzun LIS'in son indeksini ve uzunluğunu tut
    $maxLength = 1;
    $maxIndex = 0;

    // DP tablosunu doldur
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$i] > $nums[$j] && $dp[$i] < $dp[$j] + 1) {
                $dp[$i] = $dp[$j] + 1;
                $prev[$i] = $j; // Önceki indeksi güncelle
            }
        }
        // En uzun LIS'i güncelle
        if ($dp[$i] > $maxLength) {
            $maxLength = $dp[$i];
            $maxIndex = $i;
        }
    }

    // LIS'i geriye doğru takip ederek bul
    $lis = [];
    for ($i = $maxIndex; $i >= 0; $i = $prev[$i]) {
        array_unshift($lis, $nums[$i]);
        if ($prev[$i] == -1) break;
    }

    return $lis;
}

// Örnek kullanım
$nums = [10, 22, 9, 33, 21, 50, 41, 60, 80];
$result = longestIncreasingSubsequence($nums);
echo "Longest Increasing Subsequence: " . implode(", ", $result); // Çıktı: 10, 22, 33, 50, 60, 80

?>