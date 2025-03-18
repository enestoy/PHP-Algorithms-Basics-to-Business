<?php
/* 
Mülakat Sorusu:

Bir e-ticaret sitesinde, ürünlerin fiyatlarına göre sıralanması gerekiyor. 
Ürünlerin fiyatlarını içeren bir diziniz var ve bu diziyi Quick Sort algoritmasını kullanarak küçükten büyüğe doğru sıralamanız gerekiyor. 
Ayrıca, sıralama işlemi sırasında her bir adımı detaylı bir şekilde açıklayan bir çözüm sunmanız bekleniyor.

*/

/**
 * Quick Sort algoritmasını kullanarak bir diziyi sıralar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */

function quickSort(array $array): array
{
    // Base case: Eğer dizi 1 veya daha az elemana sahipse, zaten sıralıdır.
    if (count($array) <= 1) {
        return $array;
    }

    // Pivot seçimi: Dizinin ilk elemanını pivot olarak seçiyoruz.
    $pivot = $array[0];

    // Diziyi pivotun soluna (küçükler) ve sağına (büyükler) olmak üzere ikiye ayırıyoruz.
    $left = $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    // Recursive olarak sol ve sağ dizileri sıralıyoruz.
    $left = quickSort($left);
    $right = quickSort($right);

    // Sıralanmış sol dizi, pivot ve sıralanmış sağ diziyi birleştiriyoruz.
    return array_merge($left, [$pivot], $right);
}

/**
 * Diziyi sıralar ve her adımı detaylı bir şekilde açıklar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */
function explainQuickSort(array $array): array
{
    echo "Başlangıç Dizisi: " . implode(", ", $array) . "\n";

    if (count($array) <= 1) {
        echo "Dizi 1 veya daha az elemana sahip, zaten sıralı.\n";
        return $array;
    }

    $pivot = $array[0];
    echo "Pivot Seçildi: $pivot\n";

    $left = $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    echo "Pivotun Solu (Küçükler): " . implode(", ", $left) . "\n";
    echo "Pivotun Sağı (Büyükler): " . implode(", ", $right) . "\n";

    $left = explainQuickSort($left);
    $right = explainQuickSort($right);

    $result = array_merge($left, [$pivot], $right);
    echo "Sıralanmış Dizi: " . implode(", ", $result) . "\n";

    return $result;
}

// Örnek kullanım:
$products = [34, 7, 23, 32, 5, 62];
echo "Sıralanacak Dizi: " . implode(", ", $products) . "\n";

$sortedProducts = explainQuickSort($products);
echo "Final Sıralanmış Dizi: " . implode(", ", $sortedProducts) . "\n";

?>