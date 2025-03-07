<?php

// Düğüm sınıfı
class Dugum
{
    public $deger;
    public $sol;
    public $sag;
    public $yukseklik;

    public function __construct($deger)
    {
        $this->deger = $deger;
        $this->sol = null;
        $this->sag = null;
        $this->yukseklik = 1;
    }
}

// AVL Ağaç sınıfı
class AvlAgaci
{
    private $kok;

    public function __construct()
    {
        $this->kok = null;
    }

    // Ağaca yeni bir düğüm ekler
    public function ekle($deger)
    {
        $this->kok = $this->ekleDugumu($this->kok, $deger);
    }

    // Ağaca düğüm eklemek için yardımcı fonksiyon
    private function ekleDugumu($dugum, $deger)
    {
        if ($dugum === null) {
            return new Dugum($deger);
        }

        // Değeri yerleştir
        if ($deger < $dugum->deger) {
            $dugum->sol = $this->ekleDugumu($dugum->sol, $deger);
        } else {
            $dugum->sag = $this->ekleDugumu($dugum->sag, $deger);
        }

        // Düğümün yüksekliğini güncelle
        $dugum->yukseklik = 1 + max($this->getYukseklik($dugum->sol), $this->getYukseklik($dugum->sag));

        // Dengeyi kontrol et ve gerekirse dengeleme işlemi yap
        return $this->dengele($dugum, $deger);
    }

    // Düğümün yüksekliğini alır
    private function getYukseklik($dugum)
    {
        if ($dugum === null) {
            return 0;
        }
        return $dugum->yukseklik;
    }

    // Düğümün denge faktörünü hesaplar
    private function dengeFaktoru($dugum)
    {
        if ($dugum === null) {
            return 0;
        }
        return $this->getYukseklik($dugum->sol) - $this->getYukseklik($dugum->sag);
    }

    // Düğümü dengeleme işlemi (rotation)
    private function dengele($dugum, $deger)
    {
        $dengeFaktoru = $this->dengeFaktoru($dugum);

        // Sol sol durumu - sağa dön
        if ($dengeFaktoru > 1 && $deger < $dugum->sol->deger) {
            return $this->sagaDon($dugum);
        }

        // Sağ sağ durumu - sola dön
        if ($dengeFaktoru < -1 && $deger > $dugum->sag->deger) {
            return $this->solaDon($dugum);
        }

        // Sol sağ durumu - önce sola sonra sağa dön
        if ($dengeFaktoru > 1 && $deger > $dugum->sol->deger) {
            $dugum->sol = $this->solaDon($dugum->sol);
            return $this->sagaDon($dugum);
        }

        // Sağ sol durumu - önce sağa sonra sola dön
        if ($dengeFaktoru < -1 && $deger < $dugum->sag->deger) {
            $dugum->sag = $this->sagaDon($dugum->sag);
            return $this->solaDon($dugum);
        }

        return $dugum;
    }

    // Sağ dönüş (Right Rotation)
    private function sagaDon($dugum)
    {
        $solAlt = $dugum->sol;
        $dugum->sol = $solAlt->sag;
        $solAlt->sag = $dugum;

        // Yükseklikleri güncelle
        $dugum->yukseklik = 1 + max($this->getYukseklik($dugum->sol), $this->getYukseklik($dugum->sag));
        $solAlt->yukseklik = 1 + max($this->getYukseklik($solAlt->sol), $this->getYukseklik($solAlt->sag));

        return $solAlt;
    }

    // Sol dönüş (Left Rotation)
    private function solaDon($dugum)
    {
        $sagAlt = $dugum->sag;
        $dugum->sag = $sagAlt->sol;
        $sagAlt->sol = $dugum;

        // Yükseklikleri güncelle
        $dugum->yukseklik = 1 + max($this->getYukseklik($dugum->sol), $this->getYukseklik($dugum->sag));
        $sagAlt->yukseklik = 1 + max($this->getYukseklik($sagAlt->sol), $this->getYukseklik($sagAlt->sag));

        return $sagAlt;
    }

    // Inorder gezintisi
    public function inorderGezinti()
    {
        return $this->inorderDugumu($this->kok);
    }

    // Inorder gezintisi için yardımcı fonksiyon (şimdi bir dizi döndürüyor)
    private function inorderDugumu($dugum)
    {
        // Eğer düğüm null ise, boş bir dizi döndür
        if ($dugum === null) {
            return [];
        }
    
        // Sol alt ağaç
        $degerler = $this->inorderDugumu($dugum->sol);
    
        // Kök düğüm
        $degerler[] = $dugum->deger;
    
        // Sağ alt ağaç
        $degerler = array_merge($degerler, $this->inorderDugumu($dugum->sag));
    
        return $degerler;
    }
    
}

// Kullanım örneği
$avlAgaci = new AvlAgaci();
$avlAgaci->ekle(10);
$avlAgaci->ekle(20);
$avlAgaci->ekle(30);
$avlAgaci->ekle(40);
$avlAgaci->ekle(50);
$avlAgaci->ekle(25);

// Ağacı inorder gezintisi ile sıralı şekilde yazdır

echo "İnorder Gezintisi: ";
echo implode(", ", $avlAgaci->inorderGezinti()); // 10, 20, 25, 30, 40, 50
?>
