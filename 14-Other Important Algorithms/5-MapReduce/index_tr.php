<?php

class MapReduce {
    private array $veri;

    public function __construct(array $veri) {
        $this->veri = $veri;
    }

    // Map işlemi: Kelimeleri ayrıştır ve her biri için 1 değeri ata
    private function map(): array {
        $sonuc = [];
        foreach ($this->veri as $satir) {
            $kelimeler = explode(' ', strtolower($satir));
            foreach ($kelimeler as $kelime) {
                $kelime = preg_replace('/[^a-zçğıöşü]/u', '', $kelime); // Noktalama temizleme
                if (!empty($kelime)) {
                    $sonuc[] = [$kelime, 1];
                }
            }
        }
        return $sonuc;
    }

    // Reduce işlemi: Aynı kelimeleri gruplayıp toplamlarını hesapla
    private function reduce(array $mapSonucu): array {
        $kelimeFrekansi = [];
        foreach ($mapSonucu as [$kelime, $deger]) {
            if (!isset($kelimeFrekansi[$kelime])) {
                $kelimeFrekansi[$kelime] = 0;
            }
            $kelimeFrekansi[$kelime] += $deger;
        }
        return $kelimeFrekansi;
    }

    // MapReduce sürecini başlatan fonksiyon
    public function calistir(): array {
        $mapSonucu = $this->map();
        return $this->reduce($mapSonucu);
    }
}

// Örnek veri kümesi
$veri = [
    "Merhaba dünya!",
    "PHP ile MapReduce uygulaması",
    "Dünya üzerinde birçok dil vardır ve PHP popülerdir."
];

// MapReduce işlemini başlat
$mapReduce = new MapReduce($veri);
$sonuc = $mapReduce->calistir();

// Sonucu ekrana yazdır
print_r($sonuc);

?>
