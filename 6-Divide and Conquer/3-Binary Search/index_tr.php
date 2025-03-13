<?php

// Binary Search algoritmasını uygulayan fonksiyon
function ikiliArama(array $dizi, int $aranan, int $baslangic, int $bitis): int {
    // Arama aralığı geçerli mi?
    if ($baslangic > $bitis) {
        return -1; // Eleman bulunamadı
    }
    
    // Orta noktayı bul
    $orta = intdiv($baslangic + $bitis, 2);
    
    // Eğer ortadaki eleman aranan değerse, indexini döndür
    if ($dizi[$orta] == $aranan) {
        return $orta;
    }
    
    // Aranan değer ortadaki elemandan küçükse, sol tarafta ara
    if ($aranan < $dizi[$orta]) {
        return ikiliArama($dizi, $aranan, $baslangic, $orta - 1);
    }
    
    // Aranan değer ortadaki elemandan büyükse, sağ tarafta ara
    return ikiliArama($dizi, $aranan, $orta + 1, $bitis);
}

// Test için sıralı bir dizi tanımla
$dizi = [3, 9, 10, 27, 38, 43, 82];
$aranan = 27;

// Binary Search algoritmasını uygula
$sonuc = ikiliArama($dizi, $aranan, 0, count($dizi) - 1);

// Sonucu ekrana yazdır
if ($sonuc != -1) {
    echo "Aranan değer ($aranan) dizinin $sonuc. indeksinde bulundu.";
} else {
    echo "Aranan değer ($aranan) dizide bulunamadı.";
}

?>
