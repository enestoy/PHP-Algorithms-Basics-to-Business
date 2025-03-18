<?php
/* 
Mülakat Sorusu:

Problem:
Bir miktar para ($amount) ve bir bozukluk dizisi ($coins) verildiğinde, bu miktarı ödemek için gereken en az sayıda bozukluğu bulun. 
Eğer verilen bozukluklarla bu miktar ödenemiyorsa, -1 döndürün.
*/

function coinChange($coins, $amount) {
    // DP tablosunu oluştur ve başlangıç değerlerini ayarla
    $dp = array_fill(0, $amount + 1, $amount + 1); // Maksimum değerle başlat
    $dp[0] = 0; // 0 miktarı için 0 bozukluk gerekiyor

    // DP tablosunu doldur
    for ($i = 1; $i <= $amount; $i++) {
        foreach ($coins as $coin) {
            if ($coin <= $i) {
                // Mevcut miktar için en az bozukluk sayısını güncelle
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }
    }

    // Eğer $dp[$amount] değeri değişmemişse, çözüm yoktur
    return $dp[$amount] > $amount ? -1 : $dp[$amount];
}

// Örnek kullanım
$coins = [1, 2, 5];
$amount = 11;
$result = coinChange($coins, $amount);
echo "Minimum number of coins needed: " . $result; // Çıktı: 3 (5 + 5 + 1)

?>