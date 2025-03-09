<?php

// Akış ağını temsil eden komşuluk matrisi (adjacency matrix)
$graf = [
    [0, 16, 13, 0, 0, 0],
    [0, 0, 10, 12, 0, 0],
    [0, 4, 0, 0, 14, 0],
    [0, 0, 9, 0, 0, 20],
    [0, 0, 0, 7, 0, 4],
    [0, 0, 0, 0, 0, 0]
];

// BFS kullanarak kapasitesi kalan bir yol arama
function bfs($graf, $kaynak, $hedef, &$anneDüğümleri) {
    $düğümSayisi = count($graf);
    $ziyaretEdilenDüğümler = array_fill(0, $düğümSayisi, false);
    $kuvvetliKuyruk = [];
    $ziyaretEdilenDüğümler[$kaynak] = true;
    $kuvvetliKuyruk[] = $kaynak;
    
    while (count($kuvvetliKuyruk) > 0) {
        $düğüm = array_shift($kuvvetliKuyruk);
        
        // Komşu düğümleri kontrol et
        for ($i = 0; $i < $düğümSayisi; $i++) {
            if ($ziyaretEdilenDüğümler[$i] === false && $graf[$düğüm][$i] > 0) {
                $kuvvetliKuyruk[] = $i;
                $ziyaretEdilenDüğümler[$i] = true;
                $anneDüğümleri[$i] = $düğüm;
                
                // Hedefe ulaşıldığında işlemi bitir
                if ($i == $hedef) {
                    return true;
                }
            }
        }
    }
    
    return false;
}

// Ford-Fulkerson algoritması
function fordFulkerson($graf, $kaynak, $hedef) {
    $düğümSayisi = count($graf);
    $anneDüğümleri = array_fill(0, $düğümSayisi, -1);
    $toplamAkış = 0;
    
    // Artık akış yolu bulundukça işlemi devam ettir
    while (bfs($graf, $kaynak, $hedef, $anneDüğümleri)) {
        // Yolu takip et ve en küçük kapasiteyi bul
        $yolAkışı = PHP_INT_MAX;
        $düğüm = $hedef;
        
        while ($düğüm != $kaynak) {
            $yolAkışı = min($yolAkışı, $graf[$anneDüğümleri[$düğüm]][$düğüm]);
            $düğüm = $anneDüğümleri[$düğüm];
        }
        
        // Yolu takip ederek akışı güncelle
        $düğüm = $hedef;
        while ($düğüm != $kaynak) {
            $graf[$anneDüğümleri[$düğüm]][$düğüm] -= $yolAkışı;
            $graf[$düğüm][$anneDüğümleri[$düğüm]] += $yolAkışı;
            $düğüm = $anneDüğümleri[$düğüm];
        }
        
        // Toplam akışı güncelle
        $toplamAkış += $yolAkışı;
    }
    
    return $toplamAkış;
}

// Algoritmayı çalıştır ve sonucu yazdır
$kaynak = 0;
$hedef = 5;
$toplamAkış = fordFulkerson($graf, $kaynak, $hedef);

echo "Maksimum Akış: " . $toplamAkış . "<br>";

?>
