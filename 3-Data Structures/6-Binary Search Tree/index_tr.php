<?php

class Düğüm
{
    public $değer;
    public $sol;
    public $sağ;

    public function __construct($değer)
    {
        $this->değer = $değer;
        $this->sol = null;
        $this->sağ = null;
    }
}

class IkiliAramaAğacı
{
    private $kök;

    // Constructor
    public function __construct()
    {
        $this->kök = null;
    }

    // Ağaca yeni bir düğüm ekler
    public function ekle($değer)
    {
        $yeniDüğüm = new Düğüm($değer);
        if ($this->kök === null) {
            $this->kök = $yeniDüğüm; // Eğer ağaç boşsa, yeni düğüm kök olur
        } else {
            $this->kök = $this->ekleDüğümü($this->kök, $yeniDüğüm); // Ağaçta uygun yere yerleştirilir
        }
    }

    // Ağaca düğüm eklemek için yardımcı fonksiyon
    private function ekleDüğümü($mevcutDüğüm, $yeniDüğüm)
    {
        if ($yeniDüğüm->değer < $mevcutDüğüm->değer) {
            // Sol alt ağaç
            if ($mevcutDüğüm->sol === null) {
                $mevcutDüğüm->sol = $yeniDüğüm;
            } else {
                $mevcutDüğüm->sol = $this->ekleDüğümü($mevcutDüğüm->sol, $yeniDüğüm);
            }
        } else {
            // Sağ alt ağaç
            if ($mevcutDüğüm->sağ === null) {
                $mevcutDüğüm->sağ = $yeniDüğüm;
            } else {
                $mevcutDüğüm->sağ = $this->ekleDüğümü($mevcutDüğüm->sağ, $yeniDüğüm);
            }
        }

        return $mevcutDüğüm;
    }

    // Düğüm arar
    public function ara($değer)
    {
        return $this->araDüğümü($this->kök, $değer);
    }

    // Düğüm aramak için yardımcı fonksiyon
    private function araDüğümü($mevcutDüğüm, $değer)
    {
        if ($mevcutDüğüm === null || $mevcutDüğüm->değer === $değer) {
            return $mevcutDüğüm; // Düğüm bulunduysa
        }

        if ($değer < $mevcutDüğüm->değer) {
            // Sol alt ağaçta ara
            return $this->araDüğümü($mevcutDüğüm->sol, $değer);
        } else {
            // Sağ alt ağaçta ara
            return $this->araDüğümü($mevcutDüğüm->sağ, $değer);
        }
    }

    // Düğüm silme işlemi
    public function sil($değer)
    {
        $this->kök = $this->silDüğümü($this->kök, $değer);
    }

    // Düğüm silmek için yardımcı fonksiyon
    private function silDüğümü($mevcutDüğüm, $değer)
    {
        if ($mevcutDüğüm === null) {
            return null; // Düğüm bulunamazsa, null döndür
        }

        if ($değer < $mevcutDüğüm->değer) {
            // Sol alt ağaçta sil
            $mevcutDüğüm->sol = $this->silDüğümü($mevcutDüğüm->sol, $değer);
        } elseif ($değer > $mevcutDüğüm->değer) {
            // Sağ alt ağaçta sil
            $mevcutDüğüm->sağ = $this->silDüğümü($mevcutDüğüm->sağ, $değer);
        } else {
            // Düğüm bulundu
            if ($mevcutDüğüm->sol === null) {
                return $mevcutDüğüm->sağ; // Sağ çocuk tek başına alır
            } elseif ($mevcutDüğüm->sağ === null) {
                return $mevcutDüğüm->sol; // Sol çocuk tek başına alır
            }

            // İki çocuğu varsa, en küçük elemanı sağ alt ağaçtan alır
            $minDüğüm = $this->minDüğüm($mevcutDüğüm->sağ);
            $mevcutDüğüm->değer = $minDüğüm->değer;
            $mevcutDüğüm->sağ = $this->silDüğümü($mevcutDüğüm->sağ, $minDüğüm->değer);
        }

        return $mevcutDüğüm;
    }

    // Sağ alt ağaçtaki en küçük düğümü bulma
    private function minDüğüm($düğüm)
    {
        while ($düğüm->sol !== null) {
            $düğüm = $düğüm->sol;
        }
        return $düğüm;
    }

    // Ağacın inorder gezintisini yaparak sıralı şekilde yazdırma
    public function inorderGezinti()
    {
        $this->inorderDüğüm($this->kök);
    }

    // Inorder gezinti için yardımcı fonksiyon
    private function inorderDüğüm($mevcutDüğüm)
    {
        if ($mevcutDüğüm !== null) {
            $this->inorderDüğüm($mevcutDüğüm->sol);
            echo $mevcutDüğüm->değer . " ";
            $this->inorderDüğüm($mevcutDüğüm->sağ);
        }
    }
}

// Kullanım örneği
$ikiliAramaAğacı = new IkiliAramaAğacı();
$ikiliAramaAğacı->ekle(50);
$ikiliAramaAğacı->ekle(30);
$ikiliAramaAğacı->ekle(70);
$ikiliAramaAğacı->ekle(20);
$ikiliAramaAğacı->ekle(40);
$ikiliAramaAğacı->ekle(60);
$ikiliAramaAğacı->ekle(80);

// Ağacı inorder gezintisi ile sıralı şekilde yazdır
echo "İnorder Gezintisi: ";
$ikiliAramaAğacı->inorderGezinti(); // 20 30 40 50 60 70 80

// Anahtar arama
echo "\n60 değeri " . ($ikiliAramaAğacı->ara(60) ? "bulundu" : "bulunamadı") . ".\n"; // Bulundu

// Anahtar silme
$ikiliAramaAğacı->sil(70);
echo "70 silindi, İnorder Gezintisi: ";
$ikiliAramaAğacı->inorderGezinti(); // 20 30 40 50 60 80
?>
