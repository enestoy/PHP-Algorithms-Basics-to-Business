<?php

class KarnaughHaritasi {
    private array $tablo;
    private int $boyut;

    public function __construct(int $boyut) {
        $this->boyut = $boyut;
        $this->tablo = array_fill(0, $boyut, array_fill(0, $boyut, 0));
    }

    // Karnaugh haritasına değer ekleyen fonksiyon
    public function degerEkle(int $satir, int $sutun, int $deger): void {
        if ($satir < $this->boyut && $sutun < $this->boyut) {
            $this->tablo[$satir][$sutun] = $deger;
        }
    }

    // Boolean ifadeyi minimize eden basit fonksiyon
    public function minimizeEt(): array {
        $sonuc = [];
        
        for ($i = 0; $i < $this->boyut; $i++) {
            for ($j = 0; $j < $this->boyut; $j++) {
                if ($this->tablo[$i][$j] === 1) {
                    $sonuc[] = "($i, $j)";
                }
            }
        }
        
        return $sonuc;
    }

    // Haritayı ekrana yazdıran fonksiyon
    public function haritayiGoster(): void {
        foreach ($this->tablo as $satir) {
            echo implode(" ", $satir) . "\n";
        }
    }
}

// 2x2 boyutunda bir Karnaugh Haritası oluştur
$karnaugh = new KarnaughHaritasi(2);

// Değerleri ekleyelim
$karnaugh->degerEkle(0, 0, 1);
$karnaugh->degerEkle(0, 1, 0);
$karnaugh->degerEkle(1, 0, 1);
$karnaugh->degerEkle(1, 1, 1);

// Haritayı göster
echo "Karnaugh Haritası:<br>";
$karnaugh->haritayiGoster();

// Minimize edilmiş ifadeyi göster
echo "\nMinimize Edilmiş Sonuçlar:<br>";
print_r($karnaugh->minimizeEt());

?>
