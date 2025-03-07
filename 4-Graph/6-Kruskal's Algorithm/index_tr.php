<?php

// Kenar sınıfı
class Kenar {
    public $başlangıç;
    public $bitiş;
    public $ağırlık;

    public function __construct($başlangıç, $bitiş, $ağırlık) {
        $this->başlangıç = $başlangıç;
        $this->bitiş = $bitiş;
        $this->ağırlık = $ağırlık;
    }
}

// Graf sınıfı
class Graf {
    private $düğümSayısı;
    private $kenarlar;

    /**
     * Yapılandırıcı (Constructor)
     * @param mixed $düğümSayısı Grafın düğüm sayısını alır
     * @return void
     */
    public function __construct($düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        $this->kenarlar = array(); // Kenarları tutan dizi
    }

    /**
     * Grafın düğüm sayısını döndüren fonksiyon
     * @return int $düğümSayısı
     */
    public function getDüğümSayısı() {
        return $this->düğümSayısı;
    }

    /**
     * Kenar eklemek için fonksiyon
     * @param mixed $başlangıç Başlangıç düğümü
     * @param mixed $bitiş Bitiş düğümü
     * @param mixed $ağırlık Kenarın ağırlığı
     * @return void
     */
    public function kenarEkle($başlangıç, $bitiş, $ağırlık) {
        $this->kenarlar[] = new Kenar($başlangıç, $bitiş, $ağırlık);
    }

    /**
     * Küme bulma fonksiyonu (Union-Find)
     * @param mixed $düğümler Düğümler dizisi
     * @param mixed $düğüm Aranan düğüm
     * @return mixed
     */
    private function kümeBul($düğümler, $düğüm) {
        if ($düğümler[$düğüm] == $düğüm) {
            return $düğüm;
        }
        // Rekürsif olarak küme bul
        return $this->kümeBul($düğümler, $düğümler[$düğüm]);
    }

    /**
     * Küme birleştirme fonksiyonu
     * @param mixed $düğümler Düğümler dizisi
     * @param mixed $düğüm1 Birinci düğüm
     * @param mixed $düğüm2 İkinci düğüm
     * @return void
     */
    private function kümeBirleştir($düğümler, $düğüm1, $düğüm2) {
        $küme1 = $this->kümeBul($düğümler, $düğüm1);
        $küme2 = $this->kümeBul($düğümler, $düğüm2);

        // Küme1'i Küme2'ye bağla
        if ($küme1 != $küme2) {
            $düğümler[$küme1] = $küme2;
        }
    }

    /**
     * Kruskal algoritması ile MST hesaplamak
     * @return array $mst Minimum Spanning Tree (MST)
     */
    public function kruskal() {
        $düğümler = array();
        $mst = array(); // Minimum Spanning Tree

        // Başlangıçta her düğüm kendi kümesindedir
        foreach ($this->kenarlar as $kenar) {
            $düğümler[$kenar->başlangıç] = $kenar->başlangıç;
            $düğümler[$kenar->bitiş] = $kenar->bitiş;
        }

        // Kenarları ağırlıklarına göre küçükten büyüğe sıralayalım
        usort($this->kenarlar, function($a, $b) {
            return $a->ağırlık - $b->ağırlık;
        });

        // Kenarları işleyelim
        foreach ($this->kenarlar as $kenar) {
            $başlangıçKümesi = $this->kümeBul($düğümler, $kenar->başlangıç);
            $bitişKümesi = $this->kümeBul($düğümler, $kenar->bitiş);

            // Eğer başlangıç ve bitiş düğümleri farklı kümelerdeyse, bu kenarı MST'ye ekle
            if ($başlangıçKümesi != $bitişKümesi) {
                $mst[] = $kenar;  // MST'ye ekle
                $this->kümeBirleştir($düğümler, $kenar->başlangıç, $kenar->bitiş); // Küme birleştir
            }
        }

        return $mst;
    }

    /**
     * MST'yi yazdırmak için fonksiyon
     * @param array $mst Minimum Spanning Tree (MST)
     * @return void
     */
    public function mstYazdır($mst) {
        echo "Minimum Spanning Tree (MST):\n";
        foreach ($mst as $kenar) {
            echo "Düğüm " . $kenar->başlangıç . " -> Düğüm " . $kenar->bitiş . " (Ağırlık: " . $kenar->ağırlık . ")\n";
        }
    }
}

// Grafı başlatmak için örnek kullanım:
$graf = new Graf(5); // 5 düğümlü bir graf
echo "Grafın düğüm sayısı: " . $graf->getDüğümSayısı() . "\n";

// Kenarları ekleyelim:
$graf->kenarEkle("A", "B", 1);
$graf->kenarEkle("B", "C", 2);
$graf->kenarEkle("A", "C", 3);
$graf->kenarEkle("C", "D", 4);
$graf->kenarEkle("B", "D", 2);

// Kruskal algoritmasını çalıştırıyoruz
$mst = $graf->kruskal();

// Sonuçları yazdırıyoruz
$graf->mstYazdır($mst);

?>
