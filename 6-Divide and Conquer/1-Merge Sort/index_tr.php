<?php

// İki alt diziyi sıralı şekilde birleştiren fonksiyon
function birlestir(array &$dizi, array $sol, array $sag): void {
    $i = $j = $k = 0;
    
    // İki alt dizinin elemanlarını karşılaştır ve ana diziye ekle
    while ($i < count($sol) && $j < count($sag)) {
        if ($sol[$i] < $sag[$j]) {
            $dizi[$k++] = $sol[$i++];
        } else {
            $dizi[$k++] = $sag[$j++];
        }
    }
    
    // Eğer sol alt dizide kalan elemanlar varsa ekle
    while ($i < count($sol)) {
        $dizi[$k++] = $sol[$i++];
    }
    
    // Eğer sağ alt dizide kalan elemanlar varsa ekle
    while ($j < count($sag)) {
        $dizi[$k++] = $sag[$j++];
    }
}

// Merge Sort algoritmasını uygulayan fonksiyon
function birlesmeliSirala(array &$dizi): void {
    $uzunluk = count($dizi);
    if ($uzunluk < 2) {
        return;
    }
    
    // Diziyi iki alt diziye böl
    $orta = intdiv($uzunluk, 2);
    $sol = array_slice($dizi, 0, $orta);
    $sag = array_slice($dizi, $orta);
    
    // Alt dizileri sıralamak için Merge Sort'u uygula
    birlesmeliSirala($sol);
    birlesmeliSirala($sag);
    
    // Alt dizileri birleştir
    birlestir($dizi, $sol, $sag);
}

// Test için bir örnek dizi tanımla
$dizi = [38, 27, 43, 3, 9, 82, 10];

// Merge Sort algoritmasını uygula
birlesmeliSirala($dizi);

// Sıralanmış diziyi ekrana yazdır
echo "Sıralı Dizi: " . implode(", ", $dizi);

?>
