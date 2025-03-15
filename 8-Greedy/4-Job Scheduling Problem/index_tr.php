<?php

/**
 * İş sınıfı, her bir işin kazanç ve son teslim süresini tutar.
 */
class Is {
    public string $isim;
    public int $kazanc;
    public int $sonTeslimSuresi;
    
    public function __construct(string $isim, int $kazanc, int $sonTeslimSuresi) {
        $this->isim = $isim;
        $this->kazanc = $kazanc;
        $this->sonTeslimSuresi = $sonTeslimSuresi;
    }
}

/**
 * Greedy yöntemiyle maksimum kazanç sağlayan iş zamanlamasını gerçekleştiren fonksiyon.
 * @param Is[] $isler - İşlerin bulunduğu dizi.
 * @return array - Seçilen işler ve toplam kazanç.
 */
function isZamanlamasi(array $isler): array {
    // İşleri kazanca göre azalan şekilde sırala
    usort($isler, fn($a, $b) => $b->kazanc <=> $a->kazanc);
    
    // Maksimum teslim süresini belirle
    $maksSure = max(array_map(fn($is) => $is->sonTeslimSuresi, $isler));
    
    // Zaman çizelgesi
    $zamanCizelgesi = array_fill(1, $maksSure, null);
    $toplamKazanc = 0;
    
    foreach ($isler as $is) {
        // İşin yerleştirilebileceği en geç zamandan geriye doğru kontrol et
        for ($zaman = $is->sonTeslimSuresi; $zaman > 0; $zaman--) {
            if ($zamanCizelgesi[$zaman] === null) {
                $zamanCizelgesi[$zaman] = $is;
                $toplamKazanc += $is->kazanc;
                break;
            }
        }
    }
    
    return [
        'secilenIsler' => array_filter($zamanCizelgesi),
        'toplamKazanc' => $toplamKazanc
    ];
}

// Örnek Kullanım
$isler = [
    new Is("A", 100, 2),
    new Is("B", 50, 1),
    new Is("C", 200, 2),
    new Is("D", 20, 1),
    new Is("E", 150, 3)
];

$sonuc = isZamanlamasi($isler);

echo "Seçilen İşler:\n";
foreach ($sonuc['secilenIsler'] as $is) {
    echo "İş: {$is->isim}, Kazanç: {$is->kazanc}, Son Teslim Süresi: {$is->sonTeslimSuresi}\n";
}

echo "Toplam Kazanç: {$sonuc['toplamKazanc']}";

?>
