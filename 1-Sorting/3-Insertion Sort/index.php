<?php

// Insertion Sort algoritması ile diziyi sıralama fonksiyonu
function insertionSort($dizi) {
    // Dizi içerisindeki her bir eleman için sıralama işlemi yapılır
    for ($i = 1; $i < count($dizi); $i++) {
        // Şu anki elemanı alıyoruz
        $key = $dizi[$i];
        
        // Şu anki elemandan önceki elemanı buluyoruz
        $j = $i - 1;

        // Eğer sıralı kısımdaki eleman, şu anki elemandan büyükse, sağa kaydırılacak
        while ($j >= 0 && $dizi[$j] > $key) {
            $dizi[$j + 1] = $dizi[$j];  // Elemanı sağa kaydırıyoruz
            $j--;  // Bir önceki elemana geçiyoruz
        }

        // Şu anki elemanı doğru pozisyona yerleştiriyoruz
        $dizi[$j + 1] = $key;
    }

    return $dizi;
}

// Sabit bir dizi tanımlıyoruz
$sayilar = [12, 5, 9, 1, 15, 6, 3];

// Diziyi Insertion Sort algoritmasıyla sıralıyoruz
$siraliSayilar = insertionSort($sayilar);

// Sıralanmış diziyi ekrana yazdırıyoruz
echo "Sıralanmış sayılar: " . implode(", ", $siraliSayilar) . "\n";

?>
