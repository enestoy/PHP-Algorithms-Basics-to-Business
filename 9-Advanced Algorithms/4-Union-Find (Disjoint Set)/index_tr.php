<?php

/**
 * Union-Find (Disjoint Set) Veri Yapısı
 * 
 * Bu sınıf, birbirinden ayrık kümeleri yönetmek için kullanılır.
 * İki temel işlemi destekler:
 * - Birleştirme (Union): İki kümeyi birleştirir
 * - Bulma (Find): Bir elemanın hangi kümede olduğunu bulur
 */
class AyrıkKümeler {
    private array $ebeveyn;  // Her elemanın kök elemanını tutar
    private array $rank;     // Her kümenin derinliğini tutar

    /**
     * AyrıkKümeler sınıfını başlatır
     * 
     * @param int $elemanSayısı Toplam eleman sayısı
     */
    public function __construct(int $elemanSayısı) {
        $this->ebeveyn = [];
        $this->rank = [];

        // Her elemanı kendi başına bir küme olarak başlat
        for ($i = 0; $i < $elemanSayısı; $i++) {
            $this->ebeveyn[$i] = $i;    // Başlangıçta her eleman kendi kökü
            $this->rank[$i] = 0;        // Başlangıç rankı 0
        }
    }

    /**
     * Bir elemanın kök temsilcisini bulur (Path Compression optimizasyonu ile)
     * 
     * @param int $eleman Kökü bulunacak eleman
     * @return int Elemanın bulunduğu kümenin kök elemanı
     */
    public function bul(int $eleman): int {
        // Path Compression: Arama sırasında yolu düzleştir
        if ($this->ebeveyn[$eleman] !== $eleman) {
            $this->ebeveyn[$eleman] = $this->bul($this->ebeveyn[$eleman]);
        }
        return $this->ebeveyn[$eleman];
    }

    /**
     * İki kümeyi birleştirir (Union by Rank optimizasyonu ile)
     * 
     * @param int $eleman1 Birinci kümedeki bir eleman
     * @param int $eleman2 İkinci kümedeki bir eleman
     * @return bool Birleştirme işlemi başarılı olursa true, elemanlar zaten aynı kümede ise false
     */
    public function birleştir(int $eleman1, int $eleman2): bool {
        $kök1 = $this->bul($eleman1);
        $kök2 = $this->bul($eleman2);

        // Elemanlar zaten aynı kümede ise işlem yapma
        if ($kök1 === $kök2) {
            return false;
        }

        // Union by Rank: Daha küçük rankı olan ağacı, büyük olana bağla
        if ($this->rank[$kök1] < $this->rank[$kök2]) {
            $this->ebeveyn[$kök1] = $kök2;
        } elseif ($this->rank[$kök1] > $this->rank[$kök2]) {
            $this->ebeveyn[$kök2] = $kök1;
        } else {
            // Ranklar eşitse, herhangi biri diğerine bağlanabilir, 
            // ama bağlananın rankı artırılır
            $this->ebeveyn[$kök2] = $kök1;
            $this->rank[$kök1]++;
        }

        return true;
    }

    /**
     * İki elemanın aynı kümede olup olmadığını kontrol eder
     * 
     * @param int $eleman1 Birinci eleman
     * @param int $eleman2 İkinci eleman
     * @return bool Aynı kümede iseler true, değilse false
     */
    public function aynıKümedeMi(int $eleman1, int $eleman2): bool {
        return $this->bul($eleman1) === $this->bul($eleman2);
    }

    /**
     * Küme sayısını döndürür
     * 
     * @return int Mevcut küme sayısı
     */
    public function kümeSayısı(): int {
        $kümeler = [];
        
        foreach ($this->ebeveyn as $eleman => $değer) {
            $kök = $this->bul($eleman);
            $kümeler[$kök] = true;
        }
        
        return count($kümeler);
    }

    /**
     * Her bir kümenin elemanlarını döndürür
     * 
     * @return array Küme elemanlarını içeren dizi
     */
    public function kümeleriGetir(): array {
        $kümeler = [];
        
        foreach ($this->ebeveyn as $eleman => $değer) {
            $kök = $this->bul($eleman);
            
            if (!isset($kümeler[$kök])) {
                $kümeler[$kök] = [];
            }
            
            $kümeler[$kök][] = $eleman;
        }
        
        return $kümeler;
    }
}

// Kullanım örneği
function örneğiÇalıştır() {
    echo "Union-Find (Disjoint Set) Örneği\n";
    
    // 10 elemanlı bir ayrık küme oluştur
    $ayrıkKümeler = new AyrıkKümeler(10);
    
    // Bazı kümeleri birleştir
    $ayrıkKümeler->birleştir(0, 1);
    $ayrıkKümeler->birleştir(2, 3);
    $ayrıkKümeler->birleştir(0, 2);
    $ayrıkKümeler->birleştir(4, 5);
    $ayrıkKümeler->birleştir(6, 7);
    $ayrıkKümeler->birleştir(8, 9);
    $ayrıkKümeler->birleştir(4, 8);
    
    // Kontrol et
    echo "1 ve 3 aynı kümede mi? " . ($ayrıkKümeler->aynıKümedeMi(1, 3) ? "Evet" : "Hayır") . "\n";
    echo "4 ve 9 aynı kümede mi? " . ($ayrıkKümeler->aynıKümedeMi(4, 9) ? "Evet" : "Hayır") . "\n";
    echo "1 ve 5 aynı kümede mi? " . ($ayrıkKümeler->aynıKümedeMi(1, 5) ? "Evet" : "Hayır") . "\n";
    
    // Mevcut küme sayısını göster
    echo "Toplam küme sayısı: " . $ayrıkKümeler->kümeSayısı() . "\n";
    
    // Tüm kümeleri göster
    echo "Kümeler:\n";
    foreach ($ayrıkKümeler->kümeleriGetir() as $kök => $elemanlar) {
        echo "Kök $kök: " . implode(", ", $elemanlar) . "\n";
    }
}

// Örneği çalıştır
örneğiÇalıştır();
?>