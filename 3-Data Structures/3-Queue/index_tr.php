<?php

class Kuyruk
{
    private $kuyruk = []; // Kuyruğu temsil eden dizi

    // Kuyruğa eleman ekler
    public function elemanEkle($eleman)
    {
        array_push($this->kuyruk, $eleman); // Elemanı kuyruğun sonuna ekler
    }

    // Kuyruktan eleman çıkarır
    public function elemanCikar()
    {
        if ($this->kuyrukBosMu()) {
            return "Kuyruk boş!"; // Eğer kuyruk boşsa hata mesajı döndürür
        }
        return array_shift($this->kuyruk); // Kuyruğun önündeki elemanı çıkarır
    }

    // Kuyruğun en önündeki elemanı gösterir
    public function enOnEleman()
    {
        if ($this->kuyrukBosMu()) {
            return "Kuyruk boş!"; // Eğer kuyruk boşsa hata mesajı döndürür
        }
        return $this->kuyruk[0]; // Kuyruğun en önündeki elemanı döndürür
    }

    // Kuyruğun boş olup olmadığını kontrol eder
    public function kuyrukBosMu()
    {
        return empty($this->kuyruk); // Kuyruk boşsa true, değilse false döndürür
    }

    // Kuyruğun içeriğini yazdırır
    public function kuyruğuYazdir()
    {
        if ($this->kuyrukBosMu()) {
            echo "Kuyruk boş!\n"; // Kuyruk boşsa mesaj gösterir
            return;
        }

        foreach ($this->kuyruk as $eleman) {
            echo $eleman . " "; // Kuyruğun tüm elemanlarını yazdırır
        }
        echo "\n";
    }
}

// Kullanım örneği
$kuyruk = new Kuyruk();
$kuyruk->elemanEkle(10); // Kuyruğa 10 ekleniyor
$kuyruk->elemanEkle(20); // Kuyruğa 20 ekleniyor
$kuyruk->elemanEkle(30); // Kuyruğa 30 ekleniyor

$kuyruk->kuyruğuYazdir(); // Kuyruk: 10 20 30

echo "Çıkarılan Eleman: " . $kuyruk->elemanCikar() . "\n"; // 10 çıkarılır
$kuyruk->kuyruğuYazdir(); // Kuyruk: 20 30

echo "En Ön Eleman: " . $kuyruk->enOnEleman() . "\n"; // 20
?>
