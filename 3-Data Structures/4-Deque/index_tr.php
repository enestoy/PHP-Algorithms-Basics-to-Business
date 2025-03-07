<?php

class Deque
{
    private $deque = []; // Deque'i temsil eden dizi

    // Deque'e baştan eleman ekler
    public function bastanElemanEkle($eleman)
    {
        array_unshift($this->deque, $eleman); // Elemanı deque'in başına ekler
    }

    // Deque'e sondan eleman ekler
    public function sondanElemanEkle($eleman)
    {
        array_push($this->deque, $eleman); // Elemanı deque'in sonuna ekler
    }

    // Deque'den baştan eleman çıkarır
    public function bastanElemanCikar()
    {
        if ($this->dequeBosMu()) {
            return "Deque boş!"; // Eğer deque boşsa hata mesajı döndürür
        }
        return array_shift($this->deque); // Deque'in başındaki elemanı çıkarır
    }

    // Deque'den sondan eleman çıkarır
    public function sondanElemanCikar()
    {
        if ($this->dequeBosMu()) {
            return "Deque boş!"; // Eğer deque boşsa hata mesajı döndürür
        }
        return array_pop($this->deque); // Deque'in sonundaki elemanı çıkarır
    }

    // Deque'in başındaki öğeyi gösterir
    public function basondakiEleman()
    {
        if ($this->dequeBosMu()) {
            return "Deque boş!"; // Eğer deque boşsa hata mesajı döndürür
        }
        return $this->deque[0]; // Deque'in başındaki elemanı döndürür
    }

    // Deque'in sonundaki öğeyi gösterir
    public function sondakiEleman()
    {
        if ($this->dequeBosMu()) {
            return "Deque boş!"; // Eğer deque boşsa hata mesajı döndürür
        }
        return end($this->deque); // Deque'in sonundaki elemanı döndürür
    }

    // Deque'in boş olup olmadığını kontrol eder
    public function dequeBosMu()
    {
        return empty($this->deque); // Deque boşsa true, değilse false döndürür
    }

    // Deque'in içeriğini yazdırır
    public function dequeyiYazdir()
    {
        if ($this->dequeBosMu()) {
            echo "Deque boş!\n"; // Deque boşsa mesaj gösterir
            return;
        }

        foreach ($this->deque as $eleman) {
            echo $eleman . " "; // Deque'in tüm elemanlarını yazdırır
        }
        echo "\n";
    }
}

// Kullanım örneği
$deque = new Deque();
$deque->bastanElemanEkle(10); // Deque'e baştan 10 ekleniyor
$deque->sondanElemanEkle(20); // Deque'e sondan 20 ekleniyor
$deque->bastanElemanEkle(30); // Deque'e baştan 30 ekleniyor
$deque->sondanElemanEkle(40); // Deque'e sondan 40 ekleniyor

$deque->dequeyiYazdir(); // Deque: 30 10 20 40

echo "Başından Çıkarılan Eleman: " . $deque->bastanElemanCikar() . "\n"; // 30 çıkarılır
$deque->dequeyiYazdir(); // Deque: 10 20 40

echo "Sonundan Çıkarılan Eleman: " . $deque->sondanElemanCikar() . "\n"; // 40 çıkarılır
$deque->dequeyiYazdir(); // Deque: 10 20

echo "Başındaki Eleman: " . $deque->basondakiEleman() . "\n"; // 10
echo "Sonundaki Eleman: " . $deque->sondakiEleman() . "\n"; // 20
?>
