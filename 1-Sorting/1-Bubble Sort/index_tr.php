<?php

// Bubble Sort (Kabarcık Sıralama) fonksiyonu
function bubbleSort($dizi) {
    $elemanSayisi = count($dizi);
    
    for ($i = 0; $i < $elemanSayisi - 1; $i++) {
        // Her geçişte en büyük öğeler sona doğru kaydırılır
        for ($j = 0; $j < $elemanSayisi - 1 - $i; $j++) {
            if ($dizi[$j] > $dizi[$j + 1]) {
                // Yer değişimi yapılır
                $gecici = $dizi[$j];
                $dizi[$j] = $dizi[$j + 1];
                $dizi[$j + 1] = $gecici;
            }
        }
    }
    
    return $dizi;
}

// Test için örnek sayı listesi
$sayilar = [5, 3, 8, 4, 2];

// Sıralama işlemi
$siralanmisSayilar = bubbleSort($sayilar);

// Sonucu ekrana yazdırma
echo "<pre style='color:white; background-color:rgb(9, 117, 18); border: 1px solid #ccc; padding: 10px;'>";
echo "Sıralanmış Liste: ";
print_r($siralanmisSayilar);
echo "</pre>";

?>
