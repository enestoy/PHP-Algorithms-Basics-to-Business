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

    public function derinlikOncelikliArama(string $baslangic, array &$ziyaretEdilenler = []): array {
        if (!in_array($baslangic, $ziyaretEdilenler)) {
            $ziyaretEdilenler[] = $baslangic;
            foreach ($this->komsulukListesi[$baslangic] as $komsu) {
                $this->derinlikOncelikliArama($komsu, $ziyaretEdilenler);
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

// DFS Çalıştır
$sonuc = $grafik->derinlikOncelikliArama("A");

// Sonucu yazdır
echo "Derinlik Öncelikli Arama Sonucu: " . implode(" -> ", $sonuc);
