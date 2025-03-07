<?php

// Yönlendirilmiş grafı temsil eden komşuluk listesi (adjacency list)
$graf = [
    0 => [2, 3],
    1 => [2],
    2 => [3],
    3 => []
];

// Topolojik sıralama fonksiyonu
function topolojikSiralama($graf) {
    $düğümSayisi = count($graf);
    $ziyaretEdilenDüğümler = array_fill(0, $düğümSayisi, false); // Ziyaret edilen düğümleri takip et
    $sonuç = []; // Topolojik sıralama sonucunu tutacak dizi
    
    // DFS fonksiyonu
    function dfs($düğüm, &$graf, &$ziyaretEdilenDüğümler, &$sonuç) {
        $ziyaretEdilenDüğümler[$düğüm] = true;
        
        // Komşuları kontrol et
        foreach ($graf[$düğüm] as $komsu) {
            if (!$ziyaretEdilenDüğümler[$komsu]) {
                dfs($komsu, $graf, $ziyaretEdilenDüğümler, $sonuç);
            }
        }
        
        // Düğümü sona ekle
        $sonuç[] = $düğüm;
    }
    
    // Tüm düğümleri ziyaret et
    for ($i = 0; $i < $düğümSayisi; $i++) {
        if (!$ziyaretEdilenDüğümler[$i]) {
            dfs($i, $graf, $ziyaretEdilenDüğümler, $sonuç);
        }
    }
    
    // Sonuçları ters çevir ve döndür
    return array_reverse($sonuç);
}

// Algoritmayı çalıştır ve sonucu yazdır
$sonuç = topolojikSiralama($graf);

echo "Topolojik Sıralama: ";
foreach ($sonuç as $düğüm) {
    echo $düğüm . " ";
}

?>
