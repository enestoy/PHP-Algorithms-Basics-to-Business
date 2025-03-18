<?php
/* 
Interview Question:

An e-commerce website needs to sort products based on their prices.
You have an array containing product prices, and you need to sort this array in ascending order using the Quick Sort algorithm.
Additionally, you are expected to provide a detailed explanation of each step during the sorting process.
*/

/**
 * Sorts an array using the Quick Sort algorithm.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */

function quickSort(array $array): array
{
    // Base case: If the array has 1 or fewer elements, it is already sorted.
    if (count($array) <= 1) {
        return $array;
    }

    // Choosing a pivot: Selecting the first element as the pivot.
    $pivot = $array[0];

    // Partitioning the array into two parts: left (smaller) and right (greater).
    $left = $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    // Recursively sorting the left and right subarrays.
    $left = quickSort($left);
    $right = quickSort($right);

    // Merging the sorted left subarray, pivot, and sorted right subarray.
    return array_merge($left, [$pivot], $right);
}

/**
 * Sorts the array and provides a detailed explanation of each step.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */
function explainQuickSort(array $array): array
{
    echo "Initial Array: " . implode(", ", $array) . "\n";

    if (count($array) <= 1) {
        echo "Array has 1 or fewer elements, already sorted.\n";
        return $array;
    }

    $pivot = $array[0];
    echo "Pivot Selected: $pivot\n";

    $left = $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    echo "Left Partition (Smaller): " . implode(", ", $left) . "\n";
    echo "Right Partition (Greater): " . implode(", ", $right) . "\n";

    $left = explainQuickSort($left);
    $right = explainQuickSort($right);

    $result = array_merge($left, [$pivot], $right);
    echo "Sorted Array: " . implode(", ", $result) . "\n";

    return $result;
}

// Example usage:
$products = [34, 7, 23, 32, 5, 62];
echo "Array to be Sorted: " . implode(", ", $products) . "\n";

$sortedProducts = explainQuickSort($products);
echo "Final Sorted Array: " . implode(", ", $sortedProducts) . "\n";

?>
