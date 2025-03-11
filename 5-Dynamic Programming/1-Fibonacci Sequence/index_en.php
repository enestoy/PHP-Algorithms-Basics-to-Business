<?php

/**
 * Function to calculate the Fibonacci sequence using dynamic programming
 *
 * @param int $n The position of the number in the Fibonacci sequence to calculate
 * @return int The corresponding number in the Fibonacci sequence
 */
function calculateFibonacci(int $n): int {
    // Create an array to store previously computed results
    $results = [0, 1];
    
    // Calculate all Fibonacci numbers starting from 2
    for ($i = 2; $i <= $n; $i++) {
        $results[$i] = $results[$i - 1] + $results[$i - 2];
    }
    
    return $results[$n];
}

// Example usage
$position = 10;
echo "The $position-th Fibonacci number is: " . calculateFibonacci($position);

?>
