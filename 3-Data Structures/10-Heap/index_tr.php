<?php

// Max Heap veri yapısını temsil eden sınıf
class MaxHeap
{
    private $dizi = []; // Heap'i temsil eden dizi

    // Yeni bir eleman ekler
    public function ekle($deger)
    {
        $this->dizi[] = $deger; // Elemanı dizinin sonuna ekle
        $this->yukariDogruDuzenle(); // Heap özelliğini koru
    }

    // Kök düğümü (en büyük elemanı) çıkarır ve döndürür
    public function kokCikar()
    {
        if ($this->bosMu()) {
            throw new Exception("Heap boş, çıkarılacak eleman yok.");
        }

        $kok = $this->dizi[0]; // Kök düğümü al
        $sonEleman = array_pop($this->dizi); // Dizinin son elemanını al ve diziden çıkar

        if (!$this->bosMu()) {
            $this->dizi[0] = $sonEleman; // Son elemanı kök düğüme taşı
            $this->asagiDogruDuzenle(); // Heap özelliğini koru
        }

        return $kok; // Kök düğümü döndür
    }

    // Heap boş mu kontrolü
    public function bosMu()
    {
        return empty($this->dizi);
    }

    // Heap'i ekrana yazdır
    public function yazdir()
    {
        echo "Heap: " . implode(", ", $this->dizi) . "\n";
    }

    // Yeni eklenen elemanı yukarı doğru düzenle (heapify up)
    private function yukariDogruDuzenle()
    {
        $index = count($this->dizi) - 1; // Son eklenen elemanın indeksi

        while ($index > 0) {
            $ebeveynIndex = intval(($index - 1) / 2); // Ebeveyn düğümün indeksi

            // Eğer ebeveyn düğüm, çocuk düğümden küçükse yer değiştir
            if ($this->dizi[$ebeveynIndex] < $this->dizi[$index]) {
                $this->yerDegistir($ebeveynIndex, $index);
                $index = $ebeveynIndex; // İndeksi güncelle
            } else {
                break; // Heap özelliği korundu, döngüden çık
            }
        }
    }

    // Kök düğümü aşağı doğru düzenle (heapify down)
    private function asagiDogruDuzenle()
    {
        $index = 0; // Kök düğümün indeksi
        $uzunluk = count($this->dizi);

        while (true) {
            $solCocukIndex = 2 * $index + 1; // Sol çocuk düğümün indeksi
            $sagCocukIndex = 2 * $index + 2; // Sağ çocuk düğümün indeksi
            $enBuyukIndex = $index; // En büyük elemanın indeksi

            // Sol çocuk düğümü kontrol et
            if ($solCocukIndex < $uzunluk && $this->dizi[$solCocukIndex] > $this->dizi[$enBuyukIndex]) {
                $enBuyukIndex = $solCocukIndex;
            }

            // Sağ çocuk düğümü kontrol et
            if ($sagCocukIndex < $uzunluk && $this->dizi[$sagCocukIndex] > $this->dizi[$enBuyukIndex]) {
                $enBuyukIndex = $sagCocukIndex;
            }

            // Eğer en büyük eleman kök düğüm değilse, yer değiştir
            if ($enBuyukIndex !== $index) {
                $this->yerDegistir($index, $enBuyukIndex);
                $index = $enBuyukIndex; // İndeksi güncelle
            } else {
                break; // Heap özelliği korundu, döngüden çık
            }
        }
    }

    // İki düğümün yerini değiştir
    private function yerDegistir($index1, $index2)
    {
        $gecici = $this->dizi[$index1];
        $this->dizi[$index1] = $this->dizi[$index2];
        $this->dizi[$index2] = $gecici;
    }
}

// Örnek Kullanım
$maxHeap = new MaxHeap();

// Heap'e elemanlar ekle
$maxHeap->ekle(10);
$maxHeap->ekle(20);
$maxHeap->ekle(15);
$maxHeap->ekle(30);
$maxHeap->ekle(5);

// Heap'i yazdır
$maxHeap->yazdir(); // Heap: 30, 20, 15, 10, 5

// Kök düğümü çıkar ve yazdır
echo "Çıkarılan Kök: " . $maxHeap->kokCikar() . "\n"; // Çıkarılan Kök: 30
$maxHeap->yazdir(); // Heap: 20, 10, 15, 5

// Yeni kök düğümü çıkar ve yazdır
echo "Çıkarılan Kök: " . $maxHeap->kokCikar() . "\n"; // Çıkarılan Kök: 20
$maxHeap->yazdir(); // Heap: 15, 10, 5