<?php

class MonteCarloPiHesaplama {
    private int $toplamAtis;
    private int $daireIcindekiNokta;

    public function __construct(int $toplamAtis) {
        $this->toplamAtis = $toplamAtis;
        $this->daireIcindekiNokta = 0;
    }

    // Pi sayısını Monte Carlo yöntemi ile hesaplayan fonksiyon
    public function piHesapla(): float {
        for ($i = 0; $i < $this->toplamAtis; $i++) {
            $x = mt_rand() / mt_getrandmax(); // 0 ile 1 arasında rastgele X koordinatı
            $y = mt_rand() / mt_getrandmax(); // 0 ile 1 arasında rastgele Y koordinatı
            
            if (($x * $x + $y * $y) <= 1) {
                $this->daireIcindekiNokta++;
            }
        }
        
        // Pi ≈ 4 * (daire içindeki noktalar / toplam atış sayısı)
        return 4 * ($this->daireIcindekiNokta / $this->toplamAtis);
    }
}

// Monte Carlo ile Pi hesaplamayı başlat
$deney = new MonteCarloPiHesaplama(1000000);
$piYaklasik = $deney->piHesapla();

// Sonucu ekrana yazdır
echo "Yaklaşık Pi Değeri: " . $piYaklasik . "\n";

?>
