<?php

function coinDegisim($miktar, $madeniParalar) {
    // Madeni paralar için en küçük sayıyı başlatıyoruz
    $dp = array_fill(0, $miktar + 1, PHP_INT_MAX);
    $dp[0] = 0; // 0 miktarı için 0 madeni para gerekir

    // Dinamik programlamayı uygulayalım
    for ($i = 1; $i <= $miktar; $i++) {
        foreach ($madeniParalar as $para) {
            if ($i - $para >= 0) {
                $dp[$i] = min($dp[$i], $dp[$i - $para] + 1);
            }
        }
    }

    // Sonuçları döndürüyoruz. Eğer çözüm yoksa -1 döndürür.
    return $dp[$miktar] == PHP_INT_MAX ? -1 : $dp[$miktar];
}

// Örnek kullanım
$madeniParalar = [1, 2, 5]; // Kullanılabilir madeni paralar
$miktar = 11; // Hedeflenen miktar

echo "Minimum madeni para sayısı: " . coinDegisim($miktar, $madeniParalar);

?>
