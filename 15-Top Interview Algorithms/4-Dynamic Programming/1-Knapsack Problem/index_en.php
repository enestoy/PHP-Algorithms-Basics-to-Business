<?php

/* 
Interview Question:

A knapsack problem is given where there is a bag with a certain capacity, and a list of items that can be placed in the bag. 
Each item has a weight and a value. 
Your task is to maximize the total value of the items placed in the bag without exceeding its capacity.
*/

/**
 * Solves the 0/1 Knapsack Problem to find the maximum value without exceeding the bag's capacity.
 *
 * @param array $items An array containing the weight and value of items.
 * @param int $capacity The capacity of the knapsack.
 * @return int The maximum value that can be obtained.
 */
function knapsack(array $items, int $capacity): int
{
    $n = count($items); // Number of items.

    // Create a DP table: dp[i][w] stores the maximum value for i items and capacity w.
    $dp = array_fill(0, $n + 1, array_fill(0, $capacity + 1, 0));

    // Fill the DP table.
    for ($i = 1; $i <= $n; $i++) {
        $weight = $items[$i - 1]['weight'];
        $value = $items[$i - 1]['value'];

        for ($w = 0; $w <= $capacity; $w++) {
            // If the item fits in the knapsack, we consider two choices:
            // 1. Include the item.
            // 2. Do not include the item.
            if ($weight <= $w) {
                $dp[$i][$w] = max($dp[$i - 1][$w], $dp[$i - 1][$w - $weight] + $value);
            } else {
                // If the item does not fit, we do not include it.
                $dp[$i][$w] = $dp[$i - 1][$w];
            }
        }
    }

    // Return the maximum value.
    return $dp[$n][$capacity];
}

// Example usage:
$items = [
    ['weight' => 2, 'value' => 3],
    ['weight' => 3, 'value' => 4],
    ['weight' => 4, 'value' => 5],
    ['weight' => 5, 'value' => 6]
];
$capacity = 5;

$result = knapsack($items, $capacity);
echo "Maximum value: $result\n";

?>
