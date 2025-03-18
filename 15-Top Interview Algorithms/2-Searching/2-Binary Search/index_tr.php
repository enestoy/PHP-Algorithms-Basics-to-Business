<?php

/* 
Mülakat Sorusu:

Bir e-ticaret platformunda, ürünlerin ID'lerine göre sıralı bir listesi bulunmaktadır. 
Bu listede belirli bir ürün ID'sinin olup olmadığını kontrol etmeniz gerekiyor. Ürün ID'leri sıralı olduğu için Binary Search algoritmasını kullanarak bu işlemi gerçekleştirmeniz bekleniyor. 
Ayrıca, her adımı detaylı bir şekilde açıklayan bir çözüm sunmanız gerekiyor.

*/

/**
 * Binary Search algoritmasını kullanarak sıralı bir dizide eleman arar.
 *
 * @param array $array Sıralı dizi.
 * @param int $target Aranacak eleman.
 * @return int|null Elemanın indeksi (bulunursa) veya null (bulunamazsa).
*/

function binarySearch(array $array, int $target): ?int
{
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);

        // Ortadaki elemanı kontrol ediyoruz.
        if ($array[$mid] === $target) {
            return $mid; // Eleman bulundu.
        }

        // Eğer hedef ortadaki elemandan küçükse, sağ tarafı ele.
        if ($array[$mid] > $target) {
            $high = $mid - 1;
        } else {
            // Eğer hedef ortadaki elemandan büyükse, sol tarafı ele.
            $low = $mid + 1;
        }
    }

    return null; // Eleman bulunamadı.
}

/**
 * Binary Search işlemini detaylı bir şekilde açıklar.
 *
 * @param array $array Sıralı dizi.
 * @param int $target Aranacak eleman.
 * @return int|null Elemanın indeksi (bulunursa) veya null (bulunamazsa).
 */
function explainBinarySearch(array $array, int $target): ?int
{
    echo "Sıralı Dizi: " . implode(", ", $array) . "\n";
    echo "Aranan Eleman: $target\n";

    $low = 0;
    $high = count($array) - 1;
    $step = 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);
        echo "\nAdım $step:\n";
        echo "  Düşük (low): $low, Yüksek (high): $high, Orta (mid): $mid\n";
        echo "  Orta Eleman: {$array[$mid]}\n";

        if ($array[$mid] === $target) {
            echo "  Hedef bulundu! İndeks: $mid\n";
            return $mid;
        }

        if ($array[$mid] > $target) {
            echo "  Hedef ortadaki elemandan küçük, sağ taraf ele alınıyor.\n";
            $high = $mid - 1;
        } else {
            echo "  Hedef ortadaki elemandan büyük, sol taraf ele alınıyor.\n";
            $low = $mid + 1;
        }

        $step++;
    }

    echo "\nHedef bulunamadı.\n";
    return null;
}

// Örnek kullanım:
$productIDs = [101, 203, 305, 407, 509, 612, 714, 815, 917, 1020];
$targetID = 509;

echo "Binary Search Başlıyor...\n";
$result = explainBinarySearch($productIDs, $targetID);

if ($result !== null) {
    echo "Ürün ID $targetID, indeks $result'de bulundu.\n";
} else {
    echo "Ürün ID $targetID bulunamadı.\n";
}

?>