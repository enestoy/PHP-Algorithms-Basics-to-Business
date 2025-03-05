<?php
// Exponential Search Fonksiyonu
function usselArama($dizi, $hedef) {
    $diziBoyutu = count($dizi);
    
    // İlk eleman kontrolü
    if ($dizi[0] == $hedef) {
        return 0; // İlk eleman hedefle eşleşiyorsa, direkt 0 indexini döndür
    }
    
    // Arama alanını belirleme (aralığı büyütüyoruz)
    $i = 1;
    while ($i < $diziBoyutu && $dizi[$i] <= $hedef) {
        $i *= 2;  // Aralığı iki katına çıkar
    }

    // Binary Search ile arama yapılır
    return ikiliArama($dizi, $hedef, intdiv($i, 2), min($i, $diziBoyutu - 1));
}

// intdiv() PHP'de, iki sayının tam sayı bölümünü almak için kullanılan bir fonksiyondur. Yani, iki sayıyı bölerken kesirli kısmı atar ve sadece tam sayı kısmını döndürür.

// Binary Search Fonksiyonu
function ikiliArama($dizi, $hedef, $sol, $sag) {
    while ($sag >= $sol) {
        $orta = intdiv($sol + $sag, 2);
        
        // Hedef değeri bulduk
        if ($dizi[$orta] == $hedef) {
            return $orta; // Hedefin indexini döndür
        }
        
        // Hedef küçükse, sağ yarıya bakarız
        if ($dizi[$orta] > $hedef) {
            $sag = $orta - 1;
        } else {
            // Hedef büyükse, sol yarıya bakarız
            $sol = $orta + 1;
        }
    }
    
    return -1;  // Eğer eleman bulunmazsa -1 döndür
}

// Test kısmı
$dizi = [1, 3, 5, 7, 9, 11, 15, 19, 25, 30];
$hedef = 15; // Aradığımız değer
$sonuc = usselArama($dizi, $hedef);

// Sonucu ekrana yazdırma
if ($sonuc != -1) {
    echo "Eleman " . $sonuc . " indexinde bulundu.\n";
} else {
    echo "Eleman dizide mevcut değil.\n";
}
?>
