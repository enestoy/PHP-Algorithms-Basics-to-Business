<?php
/* 
Mülakat Sorusu:

Bir şehirdeki farklı noktalar (örneğin, binalar veya lokasyonlar) arasındaki yollar ve bu yolların uzunlukları (maliyetleri) verilmiştir. 
Bu bilgiler, bir graf (graph) şeklinde temsil edilmiştir. 
Graf, komşuluk listesi (adjacency list) şeklinde verilmiştir ve her kenarın (edge) bir ağırlığı (weight) vardır.
Göreviniz, belirli bir başlangıç noktasından diğer tüm noktalara olan en kısa yolları (en düşük maliyetli yolları) bulmaktır. 
Bu işlemi Dijkstra’s Algorithm kullanarak gerçekleştirmelisiniz.

*/

/**
 * Dijkstra’s Algorithm kullanarak bir başlangıç noktasından diğer tüm noktalara olan en kısa yolları bulur.
 *
 * @param array $graf Noktalar ve aralarındaki mesafeleri temsil eden graf.
 * @param string $baslangicNoktasi Başlangıç noktası.
 * @return array Başlangıç noktasından diğer noktalara olan en kısa mesafeler.
*/

function dijkstra(array $graf, string $baslangicNoktasi): array
{
    // En kısa mesafeleri tutmak için bir dizi oluşturuyoruz.
    $mesafeler = [];
    foreach (array_keys($graf) as $nokta) {
        $mesafeler[$nokta] = INF; // Başlangıçta tüm mesafeler sonsuz (INF) olarak ayarlanır.
    }
    $mesafeler[$baslangicNoktasi] = 0; // Başlangıç noktasının mesafesi 0'dır.

    // Ziyaret edilen noktaları tutmak için bir dizi oluşturuyoruz.
    $ziyaretEdilenler = [];

    // Tüm noktalar ziyaret edilene kadar devam ediyoruz.
    while (count($ziyaretEdilenler) < count($graf)) {
        // Henüz ziyaret edilmemiş ve en kısa mesafeye sahip noktayı buluyoruz.
        $mevcutNokta = null;
        foreach (array_keys($graf) as $nokta) {
            if (!in_array($nokta, $ziyaretEdilenler) && ($mevcutNokta === null || $mesafeler[$nokta] < $mesafeler[$mevcutNokta])) {
                $mevcutNokta = $nokta;
            }
        }

        // Mevcut noktanın komşularını gezerek mesafeleri güncelliyoruz.
        foreach ($graf[$mevcutNokta] as $komsuNokta => $mesafe) {
            if (!in_array($komsuNokta, $ziyaretEdilenler)) {
                $yeniMesafe = $mesafeler[$mevcutNokta] + $mesafe;
                if ($yeniMesafe < $mesafeler[$komsuNokta]) {
                    $mesafeler[$komsuNokta] = $yeniMesafe;
                }
            }
        }

        // Mevcut noktayı ziyaret edildi olarak işaretliyoruz.
        $ziyaretEdilenler[] = $mevcutNokta;
    }

    return $mesafeler;
}

// Örnek kullanım:
$graf = [
    'A' => ['B' => 1, 'C' => 4],
    'B' => ['A' => 1, 'C' => 2, 'D' => 5],
    'C' => ['A' => 4, 'B' => 2, 'D' => 1],
    'D' => ['B' => 5, 'C' => 1]
];

$baslangicNoktasi = 'A';
$sonuc = dijkstra($graf, $baslangicNoktasi);

echo "Başlangıç noktası: $baslangicNoktasi<br>";
echo "En kısa mesafeler:<br>";
print_r($sonuc);

// Beklenen Çıktı:
/*
[
    'A' => 0,
    'B' => 1,
    'C' => 3,
    'D' => 4
]
*/


?>