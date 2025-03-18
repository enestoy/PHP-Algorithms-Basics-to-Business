<?php
/* 
Mülakat Sorusu:

Bir e-ticaret platformunda, müşterilerin siparişlerini teslim tarihine göre sıralamanız gerekiyor. 
Siparişlerin teslim tarihlerini içeren bir diziniz var ve bu diziyi Merge Sort algoritmasını kullanarak küçükten büyüğe doğru (en eski tarihten en yeni tarihe) sıralamanız gerekiyor. 
Ayrıca, sıralama işlemi sırasında her bir adımı detaylı bir şekilde açıklayan bir çözüm sunmanız bekleniyor.

*/

/**
 * Merge Sort algoritmasını kullanarak bir diziyi sıralar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */

function mergeSort(array $array): array
{
    // Base case: Eğer dizi 1 veya daha az elemana sahipse, zaten sıralıdır.
    if (count($array) <= 1) {
        return $array;
    }

    // Diziyi ikiye bölüyoruz.
    $middle = (int)(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    // Recursive olarak sol ve sağ dizileri sıralıyoruz.
    $left = mergeSort($left);
    $right = mergeSort($right);

    // Sıralanmış sol ve sağ dizileri birleştiriyoruz.
    return merge($left, $right);
}

/**
 * İki sıralı diziyi birleştirir.
 *
 * @param array $left Sıralanmış sol dizi.
 * @param array $right Sıralanmış sağ dizi.
 * @return array Birleştirilmiş ve sıralanmış dizi.
 */
function merge(array $left, array $right): array
{
    $result = [];
    $i = $j = 0;

    // İki diziyi karşılaştırarak birleştiriyoruz.
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    // Sol dizide kalan elemanları ekliyoruz.
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }

    // Sağ dizide kalan elemanları ekliyoruz.
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

/**
 * Diziyi sıralar ve her adımı detaylı bir şekilde açıklar.
 *
 * @param array $array Sıralanacak dizi.
 * @return array Sıralanmış dizi.
 */
function explainMergeSort(array $array): array
{
    echo "Başlangıç Dizisi: " . implode(", ", $array) . "\n";

    if (count($array) <= 1) {
        echo "Dizi 1 veya daha az elemana sahip, zaten sıralı.\n";
        return $array;
    }

    $middle = (int)(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    echo "Dizi İkiye Bölündü:\n";
    echo "  Sol Dizi: " . implode(", ", $left) . "\n";
    echo "  Sağ Dizi: " . implode(", ", $right) . "\n";

    $left = explainMergeSort($left);
    $right = explainMergeSort($right);

    $result = merge($left, $right);
    echo "Birleştirilmiş Dizi: " . implode(", ", $result) . "\n";

    return $result;
}

// Örnek kullanım:
$deliveryDates = ["2023-10-15", "2023-09-01", "2023-11-20", "2023-08-05", "2023-12-01"];
echo "Sıralanacak Teslim Tarihleri: " . implode(", ", $deliveryDates) . "\n";

$sortedDates = explainMergeSort($deliveryDates);
echo "Final Sıralanmış Teslim Tarihleri: " . implode(", ", $sortedDates) . "\n";

?>