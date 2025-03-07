<?php

class Yigin
{
    private $yigin = []; // Yığını temsil eden dizi

    // Yığına eleman ekler
    public function elemanEkle($eleman)
    {
        array_push($this->yigin, $eleman); // Yeni elemanı yığına ekler
    }

    // Yığından eleman çıkarır
    public function elemanCikar()
    {
        if ($this->yiginBosMu()) {
            return "Yığın boş!"; // Eğer yığın boşsa hata mesajı döndürür
        }
        return array_pop($this->yigin); // Yığının en üstündeki elemanı çıkarır
    }

    // Yığının en üstündeki elemanı gösterir
    public function enUstEleman()
    {
        if ($this->yiginBosMu()) {
            return "Yığın boş!"; // Eğer yığın boşsa hata mesajı döndürür
        }
        return end($this->yigin); // Yığının en üstündeki elemanı döndürür
    }

    // Yığının boş olup olmadığını kontrol eder
    public function yiginBosMu()
    {
        return empty($this->yigin); // Yığın boşsa true, değilse false döndürür
    }

    // Yığının içeriğini yazdırır
    public function yiginiYazdir()
    {
        if ($this->yiginBosMu()) {
            echo "Yığın boş!\n"; // Yığın boşsa mesaj gösterir
            return;
        }

        foreach ($this->yigin as $eleman) {
            echo $eleman . " "; // Yığındaki tüm elemanları yazdırır
        }
        echo "\n";
    }
}

// Kullanım örneği
$yigin = new Yigin();
$yigin->elemanEkle(10); // Yığına 10 ekleniyor
$yigin->elemanEkle(20); // Yığına 20 ekleniyor
$yigin->elemanEkle(30); // Yığına 30 ekleniyor

$yigin->yiginiYazdir(); // Yığın: 10 20 30

echo "Çıkarılan Eleman: " . $yigin->elemanCikar() . "\n"; // 30 çıkarılır
$yigin->yiginiYazdir(); // Yığın: 10 20

echo "En Üst Eleman: " . $yigin->enUstEleman() . "\n"; // 20
?>
