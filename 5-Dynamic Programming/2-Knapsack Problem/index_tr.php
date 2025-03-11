<?php

/**
 * Knapsack (Sırt Çantası) Problemini Dynamic Programming ile çözen fonksiyon
 *
 * @param int $kapasite Çantanın maksimum taşıma kapasitesi
 * @param array $agirliklar Nesnelerin ağırlıklarını içeren dizi
 * @param array $degerler Nesnelerin değerlerini içeren dizi
 * @param int $nesneSayisi Toplam nesne sayısı
 * @return int Maksimum elde edilebilecek değer
 */
function knapsackHesapla(int $kapasite, array $agirliklar, array $degerler, int $nesneSayisi): int {
    // Dinamik programlama tablosu oluşturuluyor
    $dp = array_fill(0, $nesneSayisi + 1, array_fill(0, $kapasite + 1, 0));
    
    // Tabloyu doldurma işlemi
    for ($i = 1; $i <= $nesneSayisi; $i++) {
        for ($w = 1; $w <= $kapasite; $w++) {
            if ($agirliklar[$i - 1] <= $w) {
                $dp[$i][$w] = max(
                    $dp[$i - 1][$w], 
                    $degerler[$i - 1] + $dp[$i - 1][$w - $agirliklar[$i - 1]]
                );
            } else {
                $dp[$i][$w] = $dp[$i - 1][$w];
            }
        }
    }
    
    return $dp[$nesneSayisi][$kapasite];
}

// Örnek kullanım
$agirliklar = [2, 3, 4, 5];
$degerler = [3, 4, 5, 6];
$kapasite = 5;
$nesneSayisi = count($agirliklar);

echo "Maksimum elde edilebilecek değer: " . knapsackHesapla($kapasite, $agirliklar, $degerler, $nesneSayisi);

?>
