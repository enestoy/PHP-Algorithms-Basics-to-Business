<?php

// Bubble Sort fonksiyonu
function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        // Her geçişte, büyük öğeler sona kayar
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Yer değiştirme
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Test listesi
$numbers = [5, 3, 8, 4, 2];

// Sıralama
$sortedNumbers = bubbleSort($numbers);

// Sonucu yazdırma
echo "<pre style='color:white;background-color:rgb(9, 117, 18); border: 1px solid #ccc; padding: 10px;'>";
echo "Sıralı Liste: ";
print_r($sortedNumbers);
echo "</pre>";
?>
