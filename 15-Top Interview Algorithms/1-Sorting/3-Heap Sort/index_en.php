<?php
/* 
Interview Question:

In a gaming platform, you need to sort user scores in descending order (from highest to lowest). 
You have an array containing user scores, and you need to sort this array using the Heap Sort algorithm. 
Additionally, you are expected to provide a detailed explanation of each step during the sorting process.

*/

/**
 * Sorts an array using the Heap Sort algorithm.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */

function heapSort(array $array): array
{
    $n = count($array);

    // Build a max heap.
    for ($i = (int)($n / 2) - 1; $i >= 0; $i--) {
        heapify($array, $n, $i);
    }

    // Extract elements from the heap one by one to sort the array.
    for ($i = $n - 1; $i > 0; $i--) {
        // Swap the root (largest element) with the last element.
        [$array[0], $array[$i]] = [$array[$i], $array[0]];

        // Rebuild the heap after swapping.
        heapify($array, $i, 0);
    }

    return $array;
}

/**
 * Converts the given array into a heap structure.
 *
 * @param array &$array The array.
 * @param int $n The size of the heap.
 * @param int $i The root index.
 */
function heapify(array &$array, int $n, int $i): void
{
    $largest = $i; // Index of the largest element.
    $left = 2 * $i + 1; // Index of the left child.
    $right = 2 * $i + 2; // Index of the right child.

    // If the left child is larger than the root, mark it as the largest.
    if ($left < $n && $array[$left] > $array[$largest]) {
        $largest = $left;
    }

    // If the right child is larger than the current largest, mark it as the largest.
    if ($right < $n && $array[$right] > $array[$largest]) {
        $largest = $right;
    }

    // If the largest element is not the root, swap and recursively heapify.
    if ($largest != $i) {
        [$array[$i], $array[$largest]] = [$array[$largest], $array[$i]];
        heapify($array, $n, $largest);
    }
}

/**
 * Sorts the array and provides a detailed explanation of each step.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */
function explainHeapSort(array $array): array
{
    $n = count($array);
    echo "Initial Array: " . implode(", ", $array) . "\n";

    // Build a max heap.
    for ($i = (int)($n / 2) - 1; $i >= 0; $i--) {
        echo "Heapify Operation: Root index $i\n";
        heapify($array, $n, $i);
        echo "Heap Structure: " . implode(", ", $array) . "\n";
    }

    // Extract elements from the heap one by one to sort the array.
    for ($i = $n - 1; $i > 0; $i--) {
        echo "Swapping the root (largest element) with the last element: {$array[0]} <-> {$array[$i]}\n";
        [$array[0], $array[$i]] = [$array[$i], $array[0]];
        echo "Array After Swapping: " . implode(", ", $array) . "\n";

        echo "Heapify Operation: New root index 0\n";
        heapify($array, $i, 0);
        echo "Heap Structure: " . implode(", ", $array) . "\n";
    }

    return $array;
}

// Example usage:
$scores = [85, 92, 78, 90, 88, 95];
echo "Scores to be Sorted: " . implode(", ", $scores) . "\n";

$sortedScores = explainHeapSort($scores);
echo "Final Sorted Scores: " . implode(", ", $sortedScores) . "\n";

?>