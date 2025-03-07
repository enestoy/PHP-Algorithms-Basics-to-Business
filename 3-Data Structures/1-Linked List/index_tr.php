<?php

class Dugum
{
    public $veri;    // Düğümdeki veri
    public $sonraki; // Sonraki düğümü işaret eden bağlantı

    // Düğüm oluşturulurken veri ve sonraki bağlantı ayarlanır
    public function __construct($veri)
    {
        $this->veri = $veri;
        $this->sonraki = null;
    }
}

class BaglantiliListe
{
    public $baslangic; // Listenin ilk elemanını tutar

    // Bağlantılı listeyi başlatır
    public function __construct()
    {
        $this->baslangic = null;
    }

    // Listeye eleman ekler (sona ekleme)
    public function elemanEkle($veri)
    {
        $yeniDugum = new Dugum($veri);

        // Eğer liste boşsa, yeni düğüm ilk eleman olur
        if ($this->baslangic === null) {
            $this->baslangic = $yeniDugum;
        } else {
            $sonDugum = $this->baslangic;
            while ($sonDugum->sonraki !== null) {
                $sonDugum = $sonDugum->sonraki; // Son düğüme ulaş
            }
            $sonDugum->sonraki = $yeniDugum; // Yeni düğümü sona ekle
        }
    }

    // Listeyi ekrana yazdırır
    public function listeyiYazdir()
    {
        if ($this->baslangic === null) {
            echo "Liste boş.\n";
            return;
        }

        $geciciDugum = $this->baslangic;
        while ($geciciDugum !== null) {
            echo $geciciDugum->veri . " -> ";
            $geciciDugum = $geciciDugum->sonraki;
        }
        echo "Son.\n";
    }

    // Listeyi arar ve belirli bir değeri bulur
    public function elemanAra($arananVeri)
    {
        $geciciDugum = $this->baslangic;
        while ($geciciDugum !== null) {
            if ($geciciDugum->veri === $arananVeri) {
                return true; // Eleman bulundu
            }
            $geciciDugum = $geciciDugum->sonraki;
        }
        return false; // Eleman bulunamadı
    }
}

// Kullanım örneği:
$baglantiliListe = new BaglantiliListe();

// Elemanlar ekleniyor
$baglantiliListe->elemanEkle(10);
$baglantiliListe->elemanEkle(20);
$baglantiliListe->elemanEkle(30);

// Liste yazdırılıyor
$baglantiliListe->listeyiYazdir(); // 10 -> 20 -> 30 -> Son.

// Eleman aranıyor
$bulunduMu = $baglantiliListe->elemanAra(20);
echo $bulunduMu ? "Eleman bulundu.\n" : "Eleman bulunamadı.\n"; // Eleman bulundu.
?>
