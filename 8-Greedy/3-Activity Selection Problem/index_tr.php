<?php

/**
 * Etkinlik sınıfı, her bir etkinliğin başlangıç ve bitiş zamanlarını tutar.
 */
class Etkinlik {
    public int $baslangic;
    public int $bitis;
    
    public function __construct(int $baslangic, int $bitis) {
        $this->baslangic = $baslangic;
        $this->bitis = $bitis;
    }
}

/**
 * Greedy yöntemiyle maksimum etkinlik seçimini gerçekleştiren fonksiyon.
 * @param Etkinlik[] $etkinlikler - Etkinliklerin bulunduğu dizi.
 * @return Etkinlik[] - Seçilen etkinliklerin listesi.
 */
function etkinlikSecimi(array $etkinlikler): array {
    // Etkinlikleri bitiş zamanına göre artan şekilde sırala
    usort($etkinlikler, fn($a, $b) => $a->bitis <=> $b->bitis);
    
    $secilenEtkinlikler = [];
    $sonSecilenBitisZamani = 0;
    
    foreach ($etkinlikler as $etkinlik) {
        // Eğer etkinlik önceki seçilen etkinlik ile çakışmıyorsa ekle
        if ($etkinlik->baslangic >= $sonSecilenBitisZamani) {
            $secilenEtkinlikler[] = $etkinlik;
            $sonSecilenBitisZamani = $etkinlik->bitis;
        }
    }
    
    return $secilenEtkinlikler;
}

// Örnek Kullanım
$etkinlikler = [
    new Etkinlik(1, 3),
    new Etkinlik(2, 5),
    new Etkinlik(3, 9),
    new Etkinlik(6, 8),
    new Etkinlik(5, 7),
    new Etkinlik(8, 9)
];

$sonuc = etkinlikSecimi($etkinlikler);

echo "Seçilen Etkinlikler:\n";
foreach ($sonuc as $index => $etkinlik) {
    echo "Etkinlik ".($index+1).": Başlangıç = {$etkinlik->baslangic}, Bitiş = {$etkinlik->bitis}\n<br>";
}

?>
