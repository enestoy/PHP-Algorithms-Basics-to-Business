<?php

// Düğüm sınıfı: Ağaçtaki her bir düğümü temsil eder.
class Dugum
{
    public $veri;          // Düğümde saklanan veri
    public $renk;          // Düğümün rengi (true: Kırmızı, false: Siyah)
    public $solCocuk;      // Sol çocuk düğüm
    public $sagCocuk;      // Sağ çocuk düğüm
    public $ebeveyn;       // Ebeveyn düğüm

    // Kurucu metod: Yeni bir düğüm oluşturur.
    public function __construct($veri, $renk = true)
    {
        $this->veri = $veri;
        $this->renk = $renk; // Varsayılan olarak kırmızı renk
        $this->solCocuk = null;
        $this->sagCocuk = null;
        $this->ebeveyn = null;
    }
}

// Red-Black Tree sınıfı: Ağacın temel işlemlerini yönetir.
class RedBlackTree
{
    private $kok; // Ağacın kök düğümü
    private $NIL; // NIL düğümü (yaprak düğümlerini temsil eder)

    // Kurucu metod: Ağacı başlatır ve NIL düğümünü oluşturur.
    public function __construct()
    {
        $this->NIL = new Dugum(0, false); // NIL düğümü siyah olarak tanımlanır
        $this->kok = $this->NIL; // Başlangıçta kök NIL'dir
    }

    // Ağaca yeni bir düğüm ekler.
    public function ekle($veri)
    {
        $yeniDugum = new Dugum($veri); // Yeni düğüm oluştur
        $yeniDugum->solCocuk = $this->NIL; // Sol çocuk NIL olarak ayarla
        $yeniDugum->sagCocuk = $this->NIL; // Sağ çocuk NIL olarak ayarla

        $this->ekleDugum($yeniDugum); // Düğümü ağaca ekle
        $this->ekleSonrasiDengele($yeniDugum); // Ağacı dengede tut
    }

    // Ağaca düğüm ekleme işlemi.
    private function ekleDugum($yeniDugum)
    {
        $geciciDugum = null; // Geçici düğüm, ebeveyni bulmak için kullanılır
        $mevcutDugum = $this->kok; // Kökten başla

        // Ağaçta uygun pozisyonu bul
        while ($mevcutDugum !== $this->NIL) {
            $geciciDugum = $mevcutDugum;
            if ($yeniDugum->veri < $mevcutDugum->veri) {
                $mevcutDugum = $mevcutDugum->solCocuk; // Sola git
            } else {
                $mevcutDugum = $mevcutDugum->sagCocuk; // Sağa git
            }
        }

        $yeniDugum->ebeveyn = $geciciDugum; // Ebeveyni ayarla

        // Eğer ağaç boşsa, yeni düğüm kök olur
        if ($geciciDugum === null) {
            $this->kok = $yeniDugum;
        } elseif ($yeniDugum->veri < $geciciDugum->veri) {
            $geciciDugum->solCocuk = $yeniDugum; // Sol çocuk olarak ekle
        } else {
            $geciciDugum->sagCocuk = $yeniDugum; // Sağ çocuk olarak ekle
        }
    }

    // Ekleme işleminden sonra ağacı dengeler.
    private function ekleSonrasiDengele($dugum)
    {
        // Ebeveyn kırmızı olduğu sürece dengeleme yap
        while ($dugum->ebeveyn !== null && $dugum->ebeveyn->renk === true) {
            // Ebeveyn sol çocuk ise
            if ($dugum->ebeveyn === $dugum->ebeveyn->ebeveyn->solCocuk) {
                $amca = $dugum->ebeveyn->ebeveyn->sagCocuk; // Amca düğümü

                // Amca kırmızı ise renkleri değiştir
                if ($amca->renk === true) {
                    $dugum->ebeveyn->renk = false; // Ebeveyni siyah yap
                    $amca->renk = false; // Amcayı siyah yap
                    $dugum->ebeveyn->ebeveyn->renk = true; // Büyük ebeveyni kırmızı yap
                    $dugum = $dugum->ebeveyn->ebeveyn; // Büyük ebeveyni kontrol et
                } else {
                    // Eğer düğüm sağ çocuk ise sola döndür
                    if ($dugum === $dugum->ebeveyn->sagCocuk) {
                        $dugum = $dugum->ebeveyn;
                        $this->solaDondur($dugum);
                    }

                    // Renkleri değiştir ve sağa döndür
                    $dugum->ebeveyn->renk = false;
                    $dugum->ebeveyn->ebeveyn->renk = true;
                    $this->sagaDondur($dugum->ebeveyn->ebeveyn);
                }
            } else {
                // Ebeveyn sağ çocuk ise
                $amca = $dugum->ebeveyn->ebeveyn->solCocuk; // Amca düğümü

                // Amca kırmızı ise renkleri değiştir
                if ($amca->renk === true) {
                    $dugum->ebeveyn->renk = false;
                    $amca->renk = false;
                    $dugum->ebeveyn->ebeveyn->renk = true;
                    $dugum = $dugum->ebeveyn->ebeveyn;
                } else {
                    // Eğer düğüm sol çocuk ise sağa döndür
                    if ($dugum === $dugum->ebeveyn->solCocuk) {
                        $dugum = $dugum->ebeveyn;
                        $this->sagaDondur($dugum);
                    }

                    // Renkleri değiştir ve sola döndür
                    $dugum->ebeveyn->renk = false;
                    $dugum->ebeveyn->ebeveyn->renk = true;
                    $this->solaDondur($dugum->ebeveyn->ebeveyn);
                }
            }
        }

        // Kök düğümü her zaman siyah yap
        $this->kok->renk = false;
    }

    // Sola döndürme işlemi
    private function solaDondur($dugum)
    {
        $sagCocuk = $dugum->sagCocuk;
        $dugum->sagCocuk = $sagCocuk->solCocuk;

        if ($sagCocuk->solCocuk !== $this->NIL) {
            $sagCocuk->solCocuk->ebeveyn = $dugum;
        }

        $sagCocuk->ebeveyn = $dugum->ebeveyn;

        if ($dugum->ebeveyn === null) {
            $this->kok = $sagCocuk;
        } elseif ($dugum === $dugum->ebeveyn->solCocuk) {
            $dugum->ebeveyn->solCocuk = $sagCocuk;
        } else {
            $dugum->ebeveyn->sagCocuk = $sagCocuk;
        }

        $sagCocuk->solCocuk = $dugum;
        $dugum->ebeveyn = $sagCocuk;
    }

    // Sağa döndürme işlemi
    private function sagaDondur($dugum)
    {
        $solCocuk = $dugum->solCocuk;
        $dugum->solCocuk = $solCocuk->sagCocuk;

        if ($solCocuk->sagCocuk !== $this->NIL) {
            $solCocuk->sagCocuk->ebeveyn = $dugum;
        }

        $solCocuk->ebeveyn = $dugum->ebeveyn;

        if ($dugum->ebeveyn === null) {
            $this->kok = $solCocuk;
        } elseif ($dugum === $dugum->ebeveyn->sagCocuk) {
            $dugum->ebeveyn->sagCocuk = $solCocuk;
        } else {
            $dugum->ebeveyn->solCocuk = $solCocuk;
        }

        $solCocuk->sagCocuk = $dugum;
        $dugum->ebeveyn = $solCocuk;
    }

    // Ağacı ekrana yazdır
    public function agaciGoster()
    {
        $this->agaciGosterRecursive($this->kok);
    }

    // Ağacı rekürsif olarak dolaş ve düğümleri yazdır
    private function agaciGosterRecursive($dugum)
    {
        if ($dugum !== $this->NIL) {
            $this->agaciGosterRecursive($dugum->solCocuk);
            echo $dugum->veri . " (" . ($dugum->renk ? "Kırmızı" : "Siyah") . ")\n";
            $this->agaciGosterRecursive($dugum->sagCocuk);
        }
    }
}

// Örnek Kullanım
$rbTree = new RedBlackTree();
$rbTree->ekle(10);
$rbTree->ekle(20);
$rbTree->ekle(30);
$rbTree->ekle(15);
$rbTree->ekle(25);

echo "Red-Black Tree İçeriği:\n";
$rbTree->agaciGoster();
?>