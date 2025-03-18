<?php
/* 
Mülakat Sorusu:

Bir oyun platformunda, kullanıcıların puanlarını yüksekten düşüğe doğru sıralamanız gerekiyor. 
Kullanıcı puanlarını içeren bir diziniz var ve bu diziyi Heap Sort algoritmasını kullanarak sıralamanız gerekiyor. 
Ayrıca, sıralama işlemi sırasında her bir adımı detaylı bir şekilde açıklayan bir çözüm sunmanız bekleniyor.

*/

/**
 * Heap Sort algoritmasını kullanarak bir diziyi sıralar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */

function heapSort(array $array): array
{
    $n = count($array);

    // Max Heap yapısını oluşturuyoruz.
    for ($i = (int)($n / 2) - 1; $i >= 0; $i--) {
        heapify($array, $n, $i);
    }

    // Heap'ten elemanları tek tek çıkararak sıralama yapıyoruz.
    for ($i = $n - 1; $i > 0; $i--) {
        // Kök (en büyük eleman) ile son elemanı yer değiştiriyoruz.
        [$array[0], $array[$i]] = [$array[$i], $array[0]];

        // Yer değiştirme sonrası heap yapısını yeniden düzenliyoruz.
        heapify($array, $i, 0);
    }

    return $array;
}

/**
 * Verilen diziyi heap yapısına dönüştürür.
 *
 * @param array $array Dizi.
 * @param int $n Heap boyutu.
 * @param int $i Kök indeksi.
 */
function heapify(array &$array, int $n, int $i): void
{
    $largest = $i; // En büyük elemanın indeksi.
    $left = 2 * $i + 1; // Sol çocuk indeksi.
    $right = 2 * $i + 2; // Sağ çocuk indeksi.

    // Sol çocuk kökten büyükse, en büyük olarak sol çocuğu işaretle.
    if ($left < $n && $array[$left] > $array[$largest]) {
        $largest = $left;
    }

    // Sağ çocuk en büyükten daha büyükse, en büyük olarak sağ çocuğu işaretle.
    if ($right < $n && $array[$right] > $array[$largest]) {
        $largest = $right;
    }

    // En büyük eleman kök değilse, yer değiştir ve heapify'ı recursive olarak çağır.
    if ($largest != $i) {
        [$array[$i], $array[$largest]] = [$array[$largest], $array[$i]];
        heapify($array, $n, $largest);
    }
}

/**
 * Diziyi sıralar ve her adımı detaylı bir şekilde açıklar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */
function explainHeapSort(array $array): array
{
    $n = count($array);
    echo "Başlangıç Dizisi: " . implode(", ", $array) . "\n";

    // Max Heap yapısını oluşturuyoruz.
    for ($i = (int)($n / 2) - 1; $i >= 0; $i--) {
        echo "Heapify İşlemi: Kök indeksi $i\n";
        heapify($array, $n, $i);
        echo "Heap Yapısı: " . implode(", ", $array) . "\n";
    }

    // Heap'ten elemanları tek tek çıkararak sıralama yapıyoruz.
    for ($i = $n - 1; $i > 0; $i--) {
        echo "Kök (en büyük eleman) ile son eleman yer değiştiriliyor: {$array[0]} <-> {$array[$i]}\n";
        [$array[0], $array[$i]] = [$array[$i], $array[0]];
        echo "Yer Değiştirme Sonrası Dizi: " . implode(", ", $array) . "\n";

        echo "Heapify İşlemi: Yeni kök indeksi 0\n";
        heapify($array, $i, 0);
        echo "Heap Yapısı: " . implode(", ", $array) . "\n";
    }

    return $array;
}

// Örnek kullanım:
$scores = [85, 92, 78, 90, 88, 95];
echo "Sıralanacak Puanlar: " . implode(", ", $scores) . "\n";

$sortedScores = explainHeapSort($scores);
echo "Final Sıralanmış Puanlar: " . implode(", ", $sortedScores) . "\n";

?>