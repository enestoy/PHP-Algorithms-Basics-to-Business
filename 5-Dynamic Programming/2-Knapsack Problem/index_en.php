<?php

/**
 * Function to solve the Knapsack Problem using Dynamic Programming
 *
 * @param int $capacity Maximum carrying capacity of the knapsack
 * @param array $weights Array containing the weights of the objects
 * @param array $values Array containing the values of the objects
 * @param int $itemCount Total number of objects
 * @return int Maximum achievable value
 */
function calculateKnapsack(int $capacity, array $weights, array $values, int $itemCount): int {
    // Create the dynamic programming table
    $dp = array_fill(0, $itemCount + 1, array_fill(0, $capacity + 1, 0));
    
    // Fill the table
    for ($i = 1; $i <= $itemCount; $i++) {
        for ($w = 1; $w <= $capacity; $w++) {
            if ($weights[$i - 1] <= $w) {
                $dp[$i][$w] = max(
                    $dp[$i - 1][$w], 
                    $values[$i - 1] + $dp[$i - 1][$w - $weights[$i - 1]]
                );
            } else {
                $dp[$i][$w] = $dp[$i - 1][$w];
            }
        }
    }
    
    return $dp[$itemCount][$capacity];
}

// Example usage
$weights = [2, 3, 4, 5];
$values = [3, 4, 5, 6];
$capacity = 5;
$itemCount = count($weights);

echo "Maximum achievable value: " . calculateKnapsack($capacity, $weights, $values, $itemCount);

?>