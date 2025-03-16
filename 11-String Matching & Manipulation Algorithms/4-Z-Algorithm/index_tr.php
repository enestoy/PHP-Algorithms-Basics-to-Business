<?php

// Z-Algorithm fonksiyonu
function zAlgoritmasi($metin) {
    // Metnin uzunluğunu al
    $metinUzunlugu = strlen($metin);
    
    // Z-array'ini oluştur (ilk başta tüm elemanlar 0 olarak başlar)
    $zArray = array_fill(0, $metinUzunlugu, 0);
    
    // Z[0] her zaman metnin uzunluğudur
    $zArray[0] = $metinUzunlugu;
    
    // Z-algoritmasını uygulamak için iki gösterici (window) başlatıyoruz
    $sol = 0;
    $sag = 0;
    
    // Z-array'ini hesapla
    for ($i = 1; $i < $metinUzunlugu; $i++) {
        // Eğer şu anki indeks, sağ sınırın dışına çıkmışsa
        if ($i > $sag) {
            $sol = $sag = $i;
            // Karakter karşılaştırması başlat
            while ($sag < $metinUzunlugu && $metin[$sag] == $metin[$sag - $sol]) {
                $sag++;
            }
            // Z-array'ini güncelle
            $zArray[$i] = $sag - $sol;
            $sag--;
        } else {
            // Z[sol..sag] aralığındaki değerleri kullanarak işlem yap
            $k = $i - $sol;
            // Eğer karşılaştırma sınırı aşılmamışsa
            if ($zArray[$k] < $sag - $i + 1) {
                $zArray[$i] = $zArray[$k];
            } else {
                // Yeni bir karşılaştırma başlat
                $sol = $i;
                while ($sag < $metinUzunlugu && $metin[$sag] == $metin[$sag - $sol]) {
                    $sag++;
                }
                // Z-array'ini güncelle
                $zArray[$i] = $sag - $sol;
                $sag--;
            }
        }
    }
    
    return $zArray;
}

// Örnek kullanım
$metin = "abacabadabacaba";  // Aranacak metin
$zArray = zAlgoritmasi($metin);

// Sonuçları yazdırma
echo "Z-array: ";
print_r($zArray);

?>
