<?php

// Graf sınıfı tanımlanıyor
class Graf {
    public $düğümSayısı;
    public $graf;

    public function __construct($düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        $this->graf = array();

        for ($i = 0; $i < $düğümSayısı; $i++) {
            $this->graf[$i] = array_fill(0, $düğümSayısı, INF);  // Her düğüm için başlangıçta sonsuz mesafe
        }
    }

    // Düğümler arasındaki kenarları ekleyen fonksiyon
    public function kenarEkle($başlangıç, $bitiş, $mesafe) {
        $this->graf[$başlangıç][$bitiş] = $mesafe;
        $this->graf[$bitiş][$başlangıç] = $mesafe; // Eğer yönsüz bir graf ise
    }

    // Dijkstra algoritması
    public function dijkstra($başlangıçDüğümü) {
        $mesafeler = array_fill(0, $this->düğümSayısı, INF);
        $mesafeler[$başlangıçDüğümü] = 0;

        $ziyaretEdilen = array_fill(0, $this->düğümSayısı, false);
        $öncekiDüğüm = array_fill(0, $this->düğümSayısı, -1);

        for ($i = 0; $i < $this->düğümSayısı - 1; $i++) {
            $minMesafe = INF;
            $minDüğüm = -1;

            // Henüz ziyaret edilmemiş düğümü bul
            for ($j = 0; $j < $this->düğümSayısı; $j++) {
                if (!$ziyaretEdilen[$j] && $mesafeler[$j] < $minMesafe) {
                    $minMesafe = $mesafeler[$j];
                    $minDüğüm = $j;
                }
            }

            // Bulunan düğümü ziyaret et
            $ziyaretEdilen[$minDüğüm] = true;

            // Komşu düğümleri güncelle
            for ($j = 0; $j < $this->düğümSayısı; $j++) {
                if (!$ziyaretEdilen[$j] && $this->graf[$minDüğüm][$j] != INF) {
                    $yeniMesafe = $mesafeler[$minDüğüm] + $this->graf[$minDüğüm][$j];
                    if ($yeniMesafe < $mesafeler[$j]) {
                        $mesafeler[$j] = $yeniMesafe;
                        $öncekiDüğüm[$j] = $minDüğüm;
                    }
                }
            }
        }

        return array($mesafeler, $öncekiDüğüm);
    }

    // En kısa yolu geri döndürme
    public function enKısaYol($başlangıçDüğümü, $hedefDüğüm) {
        list($mesafeler, $öncekiDüğüm) = $this->dijkstra($başlangıçDüğümü);
        $yol = array();
        $geçerliDüğüm = $hedefDüğüm;

        while ($geçerliDüğüm != -1) {
            array_unshift($yol, $geçerliDüğüm);
            $geçerliDüğüm = $öncekiDüğüm[$geçerliDüğüm];
        }

        return array($mesafeler[$hedefDüğüm], $yol);
    }
}

// Örnek bir grafik oluşturuyoruz
$graf = new Graf(6);  // 6 düğümlü bir graf
$graf->kenarEkle(0, 1, 7);
$graf->kenarEkle(0, 2, 9);
$graf->kenarEkle(0, 5, 14);
$graf->kenarEkle(1, 2, 10);
$graf->kenarEkle(1, 3, 15);
$graf->kenarEkle(2, 3, 11);
$graf->kenarEkle(2, 5, 2);
$graf->kenarEkle(3, 4, 6);
$graf->kenarEkle(4, 5, 9);

// Başlangıç düğümünden hedef düğümüne en kısa yolu bulalım
list($mesafe, $yol) = $graf->enKısaYol(0, 4);

// Sonuçları yazdıralım
echo "En kısa mesafe: " . $mesafe . "<br>";
echo "En kısa yol: " . implode(" -> ", $yol) . "<br>";

?>
