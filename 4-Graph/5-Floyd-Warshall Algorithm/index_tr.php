<?php

// Graf sınıfı tanımlanıyor
class Graf {
    public $düğümSayısı;
    public $mesafeler;

    // Yapıcı fonksiyon, grafı başlatır
    public function __construct($düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        $this->mesafeler = array();

        // Grafın mesafelerini sonsuzla başlat
        for ($i = 0; $i < $düğümSayısı; $i++) {
            for ($j = 0; $j < $düğümSayısı; $j++) {
                if ($i == $j) {
                    $this->mesafeler[$i][$j] = 0;  // Aynı düğüme olan mesafe sıfır
                } else {
                    $this->mesafeler[$i][$j] = INF;  // Diğer düğümlere mesafe sonsuz
                }
            }
        }
    }

    // Kenar eklemek için fonksiyon
    public function kenarEkle($başlangıç, $bitiş, $ağırlık) {
        $this->mesafeler[$başlangıç][$bitiş] = $ağırlık;
    }

    // Floyd-Warshall algoritması
    public function floydWarshall() {
        for ($k = 0; $k < $this->düğümSayısı; $k++) {
            for ($i = 0; $i < $this->düğümSayısı; $i++) {
                for ($j = 0; $j < $this->düğümSayısı; $j++) {
                    // Eğer i -> k -> j yolu, doğrudan i -> j yolundan daha kısa ise
                    if ($this->mesafeler[$i][$k] + $this->mesafeler[$k][$j] < $this->mesafeler[$i][$j]) {
                        // En kısa yolu bul ve mesafeyi güncelle
                        $this->mesafeler[$i][$j] = $this->mesafeler[$i][$k] + $this->mesafeler[$k][$j];
                    }
                }
            }
        }
    }

    // Sonuçları yazdırma fonksiyonu
    public function sonuçlarıYazdır() {
        echo "En kısa mesafeler:\n";
        for ($i = 0; $i < $this->düğümSayısı; $i++) {
            for ($j = 0; $j < $this->düğümSayısı; $j++) {
                if ($this->mesafeler[$i][$j] == INF) {
                    echo "Düğüm " . $i . " -> Düğüm " . $j . ": Erişilemiyor\n";
                } else {
                    echo "Düğüm " . $i . " -> Düğüm " . $j . ": " . $this->mesafeler[$i][$j] . "\n";
                }
            }
        }
    }
}

// Örnek bir graf oluşturuyoruz
$graf = new Graf(4);  // 4 düğümlü bir graf
$graf->kenarEkle(0, 1, 5);
$graf->kenarEkle(0, 2, 10);
$graf->kenarEkle(1, 2, 2);
$graf->kenarEkle(1, 3, 1);
$graf->kenarEkle(2, 3, 3);

// Floyd-Warshall algoritmasını başlatıyoruz
$graf->floydWarshall();

// Sonuçları yazdırıyoruz
$graf->sonuçlarıYazdır();

?>
