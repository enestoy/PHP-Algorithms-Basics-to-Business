<?php

// Graph veri yapısını temsil eden sınıf
class Graph
{
    private $komşulukListesi = []; // Graph'ı temsil eden komşuluk listesi

    // Graph'a yeni bir düğüm ekler
    public function düğümEkle($düğüm)
    {
        if (!isset($this->komşulukListesi[$düğüm])) {
            $this->komşulukListesi[$düğüm] = [];
        }
    }

    // İki düğüm arasına bir kenar ekler (yönsüz graph)
    public function kenarEkle($düğüm1, $düğüm2)
    {
        $this->düğümEkle($düğüm1);
        $this->düğümEkle($düğüm2);

        // Yönsüz graph olduğu için her iki yönde de kenar eklenir
        $this->komşulukListesi[$düğüm1][] = $düğüm2;
        $this->komşulukListesi[$düğüm2][] = $düğüm1;
    }

    // BFS (Breadth-First Search) algoritması
    public function BFS($başlangıçDüğümü)
    {
        $ziyaretEdilenler = []; // Ziyaret edilen düğümleri tutar
        $kuyruk = new SplQueue(); // BFS için kuyruk veri yapısı

        // Başlangıç düğümünü kuyruğa ekle ve ziyaret edildi olarak işaretle
        $kuyruk->enqueue($başlangıçDüğümü);
        $ziyaretEdilenler[$başlangıçDüğümü] = true;

        echo "BFS Gezinti Sonucu: ";

        while (!$kuyruk->isEmpty()) {
            $mevcutDüğüm = $kuyruk->dequeue(); // Kuyruktan bir düğüm çıkar
            echo $mevcutDüğüm . " "; // Düğümü ekrana yazdır

            // Mevcut düğümün komşularını gez
            foreach ($this->komşulukListesi[$mevcutDüğüm] as $komşu) {
                if (!isset($ziyaretEdilenler[$komşu])) {
                    $ziyaretEdilenler[$komşu] = true; // Komşuyu ziyaret edildi olarak işaretle
                    $kuyruk->enqueue($komşu); // Komşuyu kuyruğa ekle
                }
            }
        }

        echo "\n";
    }

    // Graph'ı ekrana yazdır
    public function yazdır()
    {
        echo "Graph Komşuluk Listesi:\n";
        foreach ($this->komşulukListesi as $düğüm => $komşular) {
            echo $düğüm . " -> " . implode(", ", $komşular) . "\n";
        }
    }
}

// Örnek Kullanım
$graph = new Graph();

// Düğümler ve kenarlar ekle
$graph->kenarEkle("A", "B");
$graph->kenarEkle("A", "C");
$graph->kenarEkle("B", "D");
$graph->kenarEkle("C", "E");
$graph->kenarEkle("D", "E");

// Graph'ı ekrana yazdır
$graph->yazdır();

// BFS gezintisi yap
$graph->BFS("A");