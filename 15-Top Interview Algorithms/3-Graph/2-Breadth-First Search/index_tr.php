<?php

/*

Mülakat Sorusu:

Bir şehirdeki metro istasyonları arasındaki bağlantıları temsil eden bir graf (graph) verildi. 
Bu graf, komşuluk listesi (adjacency list) şeklinde temsil edilmiştir. 
Göreviniz, belirli bir metro istasyonundan başlayarak, bu istasyondan en az aktarmayla ulaşılabilecek tüm istasyonları bulmaktır. 
Bu işlemi BFS algoritmasını kullanarak gerçekleştirmelisiniz.

*/

/**
 * BFS algoritması kullanarak bir metro istasyonundan ulaşılabilir tüm istasyonları bulur.
 *
 * @param array $graf Metro istasyonlarının bağlantılarını temsil eden graf.
 * @param string $baslangicIstasyon Başlangıç istasyonu.
 * @return array Ulaşılabilir tüm istasyonların listesi.
*/

function bfsIstasyonalariBul(array $graf, string $baslangicIstasyon): array
{
    // Ziyaret edilen istasyonları tutmak için bir dizi oluşturuyoruz.
    $ziyaretEdilenler = [];

    // BFS algoritmasını uygulamak için bir kuyruk (queue) oluşturuyoruz.
    $kuyruk = new SplQueue();

    // Başlangıç istasyonunu kuyruğa ekliyoruz ve ziyaret edildi olarak işaretliyoruz.
    $kuyruk->enqueue($baslangicIstasyon);
    $ziyaretEdilenler[$baslangicIstasyon] = true;

    // Kuyruk boşalana kadar BFS algoritmasını uyguluyoruz.
    while (!$kuyruk->isEmpty()) {
        // Kuyruğun başındaki istasyonu alıyoruz.
        $mevcutIstasyon = $kuyruk->dequeue();

        // Mevcut istasyonun komşularını gezmeye devam ediyoruz.
        foreach ($graf[$mevcutIstasyon] as $komsuIstasyon) {
            // Eğer komşu istasyon daha önce ziyaret edilmediyse işleme devam ediyoruz.
            if (!isset($ziyaretEdilenler[$komsuIstasyon])) {
                // Komşu istasyonu ziyaret edildi olarak işaretliyoruz.
                $ziyaretEdilenler[$komsuIstasyon] = true;

                // Komşu istasyonu kuyruğa ekliyoruz.
                $kuyruk->enqueue($komsuIstasyon);
            }
        }
    }

    // Ziyaret edilen istasyonların listesini döndürüyoruz.
    return array_keys($ziyaretEdilenler);
}

// Örnek kullanım:
$metroGraf = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D', 'E'],
    'C' => ['A', 'F'],
    'D' => ['B'],
    'E' => ['B', 'F'],
    'F' => ['C', 'E'],
    'G' => [] // G istasyonunun hiç bağlantısı yok
];

$baslangicIstasyon = 'A';
$sonuc = bfsIstasyonalariBul($metroGraf, $baslangicIstasyon);

echo "Başlangıç istasyonu: $baslangicIstasyon<br>";
echo "Ulaşılabilir istasyonlar: " . implode(', ', $sonuc) . "<br>";

?>