<?php

// Edit Distance hesaplama fonksiyonu
function editDistance($kelime1, $kelime2) {
    // Kelimelerin uzunluklarını al
    $uzunluk1 = strlen($kelime1);
    $uzunluk2 = strlen($kelime2);

    // Dinamik programlama için dp matrisini oluştur
    $dp = array();

    // dp matrisini başlat
    for ($i = 0; $i <= $uzunluk1; $i++) {
        for ($j = 0; $j <= $uzunluk2; $j++) {
            if ($i == 0) {
                // Eğer birinci kelime boşsa, diğer kelimenin uzunluğu kadar ekleme yapılır
                $dp[$i][$j] = $j;
            } elseif ($j == 0) {
                // Eğer ikinci kelime boşsa, birinci kelimenin uzunluğu kadar silme yapılır
                $dp[$i][$j] = $i;
            } elseif ($kelime1[$i - 1] == $kelime2[$j - 1]) {
                // Eğer iki karakter eşleşiyorsa, hiçbir işlem yapmadan bir önceki duruma geç
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            } else {
                // Karakterler farklıysa, ekleme, silme veya değiştirme işlemlerinin en küçük değerini al
                $dp[$i][$j] = min(
                    $dp[$i - 1][$j] + 1,   // Silme
                    $dp[$i][$j - 1] + 1,   // Ekleme
                    $dp[$i - 1][$j - 1] + 1 // Değiştirme
                );
            }
        }
    }

    // Sonuç, dp matrisinin sağ alt köşesinde bulunur
    return $dp[$uzunluk1][$uzunluk2];
}

// Örnek kelimeler
$kelime1 = "kitten";
$kelime2 = "sitting";

// Edit mesafesini hesapla
$mesafe = editDistance($kelime1, $kelime2);

// Sonucu yazdır
echo "Edit mesafesi: " . $mesafe;

?>
