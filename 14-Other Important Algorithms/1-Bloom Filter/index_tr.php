<?php

class BloomFilter {
    private array $bitDizisi;
    private int $boyut;
    private int $hashFonksiyonSayisi;

    public function __construct(int $boyut, int $hashFonksiyonSayisi) {
        $this->boyut = $boyut;
        $this->hashFonksiyonSayisi = $hashFonksiyonSayisi;
        $this->bitDizisi = array_fill(0, $boyut, 0);
    }

    // Veriyi Bloom Filter'a ekleyen fonksiyon
    public function ekle(string $veri): void {
        for ($i = 0; $i < $this->hashFonksiyonSayisi; $i++) {
            $indeks = $this->hashHesapla($veri, $i);
            $this->bitDizisi[$indeks] = 1;
        }
    }

    // Verinin daha önce eklenip eklenmediğini kontrol eden fonksiyon
    public function kontrolEt(string $veri): bool {
        for ($i = 0; $i < $this->hashFonksiyonSayisi; $i++) {
            $indeks = $this->hashHesapla($veri, $i);
            if ($this->bitDizisi[$indeks] === 0) {
                return false; // Veri kesinlikle yok
            }
        }
        return true; // Veri olabilir (false positive ihtimali var)
    }

    // Basit bir hash fonksiyonu
    private function hashHesapla(string $veri, int $tohum): int {
        return (crc32($veri . $tohum) % $this->boyut);
    }
}

// Bloom Filter oluşturma
$bloomFilter = new BloomFilter(100, 3);

// Verileri ekleme
$bloomFilter->ekle("girisimvadisi");
$bloomFilter->ekle("enes toy");

// Kontrol etme
var_dump($bloomFilter->kontrolEt("girisimvadisi")); // true dönmeli
var_dump($bloomFilter->kontrolEt("kirklar")); // false olma ihtimali yüksek

?>
