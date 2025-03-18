<?php

/* 
Mülakat Sorusu:

Bir sırt çantası (knapsack) problemi verildi. Bu problemde, belirli bir kapasiteye sahip bir çanta ve bu çantaya konulabilecek eşyaların listesi bulunmaktadır. 
Her eşyanın bir ağırlığı (weight) ve bir değeri (value) vardır. 
Göreviniz, çantanın kapasitesini aşmadan, çantaya konulacak eşyaların toplam değerini maksimize etmektir.

*/

/**
 * 0/1 Knapsack Problem algoritması kullanarak çantanın kapasitesini aşmadan maksimum değeri bulur.
 *
 * @param array $esyalar Eşyaların ağırlık ve değerlerini içeren dizi.
 * @param int $kapasite Çantanın kapasitesi.
 * @return int Maksimum değer.
 */
function knapsack(array $esyalar, int $kapasite): int
{
    $n = count($esyalar); // Eşya sayısı.

    // DP tablosu oluşturuyoruz: dp[i][w], i eşya ve w kapasite için maksimum değeri tutar.
    $dp = array_fill(0, $n + 1, array_fill(0, $kapasite + 1, 0));

    // DP tablosunu dolduruyoruz.
    for ($i = 1; $i <= $n; $i++) {
        $agirlik = $esyalar[$i - 1]['agirlik'];
        $deger = $esyalar[$i - 1]['deger'];

        for ($w = 0; $w <= $kapasite; $w++) {
            // Eğer eşya çantaya sığıyorsa, iki seçeneği değerlendiriyoruz:
            // 1. Eşyayı ekleme.
            // 2. Eşyayı eklememe.
            if ($agirlik <= $w) {
                $dp[$i][$w] = max($dp[$i - 1][$w], $dp[$i - 1][$w - $agirlik] + $deger);
            } else {
                // Eşya çantaya sığmıyorsa, eklemiyoruz.
                $dp[$i][$w] = $dp[$i - 1][$w];
            }
        }
    }

    // Maksimum değeri döndürüyoruz.
    return $dp[$n][$kapasite];
}

// Örnek kullanım:
$esyalar = [
    ['agirlik' => 2, 'deger' => 3],
    ['agirlik' => 3, 'deger' => 4],
    ['agirlik' => 4, 'deger' => 5],
    ['agirlik' => 5, 'deger' => 6]
];
$kapasite = 5;

$sonuc = knapsack($esyalar, $kapasite);
echo "Maksimum değer: $sonuc\n";

?>