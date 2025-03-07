<?php

class Grafik {
    private array $komsulukListesi;

    public function __construct() {
        $this->komsulukListesi = [];
    }

    public function dugumEkle(string $dugum): void {
        if (!isset($this->komsulukListesi[$dugum])) {
            $this->komsulukListesi[$dugum] = [];
        }
    }

    public function kenarEkle(string $kaynak, string $hedef): void {
        $this->komsulukListesi[$kaynak][] = $hedef;
        $this->komsulukListesi[$hedef][] = $kaynak;
    }

    public function genislikOncelikliArama(string $baslangic): array {
        $ziyaretEdilenler = [];
        $kuyruk = [$baslangic];

        while (!empty($kuyruk)) {
            $dugum = array_shift($kuyruk);

            if (!in_array($dugum, $ziyaretEdilenler)) {
                $ziyaretEdilenler[] = $dugum;
                foreach ($this->komsulukListesi[$dugum] as $komsu) {
                    if (!in_array($komsu, $ziyaretEdilenler)) {
                        $kuyruk[] = $komsu;
                    }
                }
            }
        }

        return $ziyaretEdilenler;
    }
}

// Grafik oluştur
$grafik = new Grafik();
$grafik->dugumEkle("A");
$grafik->dugumEkle("B");
$grafik->dugumEkle("C");
$grafik->dugumEkle("D");
$grafik->dugumEkle("E");

// Kenarları ekle
$grafik->kenarEkle("A", "B");
$grafik->kenarEkle("A", "C");
$grafik->kenarEkle("B", "D");
$grafik->kenarEkle("C", "E");
$grafik->kenarEkle("D", "E");

// BFS Çalıştır
$sonuc = $grafik->genislikOncelikliArama("A");

// Sonucu yazdır
echo "Genişlik Öncelikli Arama Sonucu: " . implode(" -> ", $sonuc);
