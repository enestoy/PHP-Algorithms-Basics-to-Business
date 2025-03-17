<?php

class ReservoirSampling {
    private array $rezervuar;
    private int $kapasite;
    private int $sayac;

    public function __construct(int $kapasite) {
        $this->kapasite = $kapasite;
        $this->rezervuar = [];
        $this->sayac = 0;
    }

    // Yeni veri akışını işleyen fonksiyon
    public function veriEkle($veri): void {
        $this->sayac++;

        // İlk N elemanı doğrudan rezervuara ekle
        if (count($this->rezervuar) < $this->kapasite) {
            $this->rezervuar[] = $veri;
        } else {
            // Rastgele bir indeks belirle
            $rastgeleIndeks = rand(0, $this->sayac - 1);
            
            // Eğer rastgele indeks rezervuarın içindeyse, değiştir
            if ($rastgeleIndeks < $this->kapasite) {
                $this->rezervuar[$rastgeleIndeks] = $veri;
            }
        }
    }

    // Rezervuardaki mevcut örnekleri döndüren fonksiyon
    public function ornekleriGetir(): array {
        return $this->rezervuar;
    }
}

// Rezervuar örnekleme için nesne oluştur
$rezervuarOrnekleme = new ReservoirSampling(5);

// Veri akışını simüle et
$veriListesi = range(1, 100);
foreach ($veriListesi as $veri) {
    $rezervuarOrnekleme->veriEkle($veri);
}

// Örneklenmiş verileri ekrana yazdır
print_r($rezervuarOrnekleme->ornekleriGetir());

?>
