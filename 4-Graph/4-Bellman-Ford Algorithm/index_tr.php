<?php

// Graf sınıfı tanımlanıyor
class Graf {
    public $düğümSayısı;
    public $kenarlar;

    public function __construct($düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        $this->kenarlar = array();
    }

    // Kenar eklemek için fonksiyon
    public function kenarEkle($başlangıç, $bitiş, $ağırlık) {
        $this->kenarlar[] = array('başlangıç' => $başlangıç, 'bitiş' => $bitiş, 'ağırlık' => $ağırlık);
    }

    // Bellman-Ford algoritması
    public function bellmanFord($başlangıçDüğümü) {
        $mesafeler = array_fill(0, $this->düğümSayısı, INF); // Mesafeleri sonsuz olarak başlat
        $mesafeler[$başlangıçDüğümü] = 0; // Başlangıç düğümünün mesafesini sıfır olarak ayarla

        // V-1 kez kenarları kontrol et (V düğüm sayısı)
        for ($i = 0; $i < $this->düğümSayısı - 1; $i++) {
            foreach ($this->kenarlar as $kenar) {
                $başlangıç = $kenar['başlangıç'];
                $bitiş = $kenar['bitiş'];
                $ağırlık = $kenar['ağırlık'];

                // Eğer başlangıç düğümüne daha kısa bir yol bulunmuşsa, mesafeyi güncelle
                if ($mesafeler[$başlangıç] != INF && $mesafeler[$başlangıç] + $ağırlık < $mesafeler[$bitiş]) {
                    $mesafeler[$bitiş] = $mesafeler[$başlangıç] + $ağırlık;
                }
            }
        }

        // Negatif ağırlıklı döngü var mı kontrol et
        foreach ($this->kenarlar as $kenar) {
            $başlangıç = $kenar['başlangıç'];
            $bitiş = $kenar['bitiş'];
            $ağırlık = $kenar['ağırlık'];

            if ($mesafeler[$başlangıç] != INF && $mesafeler[$başlangıç] + $ağırlık < $mesafeler[$bitiş]) {
                echo "Negatif ağırlıklı döngü tespit edildi.\n";
                return;
            }
        }

        return $mesafeler;
    }
}

// Örnek bir graf oluşturuyoruz
$graf = new Graf(5);  // 5 düğümlü bir graf
$graf->kenarEkle(0, 1, -1);
$graf->kenarEkle(0, 2, 4);
$graf->kenarEkle(1, 2, 3);
$graf->kenarEkle(1, 3, 2);
$graf->kenarEkle(1, 4, 2);
$graf->kenarEkle(3, 2, 5);
$graf->kenarEkle(3, 1, 1);
$graf->kenarEkle(4, 3, -3);

// Bellman-Ford algoritmasını başlatıyoruz ve sonuçları yazdırıyoruz
$mesafeler = $graf->bellmanFord(0);

if ($mesafeler !== null) {
    echo "Başlangıç düğümünden diğer düğümlere olan en kısa mesafeler:\n";
    for ($i = 0; $i < count($mesafeler); $i++) {
        echo "Düğüm " . $i . ": " . ($mesafeler[$i] == INF ? "Erişilemiyor" : $mesafeler[$i]) . "\n";
    }
}

?>
