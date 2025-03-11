<?php

// Define matrix dimensions
$matrixDimensions = [10, 20, 30, 40];  // A1: 10x20, A2: 20x30, A3: 30x40

// Dynamic programming function to determine the optimal matrix multiplication order
function matrixChainMultiplication($matrixDimensions) {
    $n = count($matrixDimensions) - 1; // Number of matrices
    // Initialize the DP table
    $dp = array_fill(0, $n, array_fill(0, $n, 0));
    
    // Fill the table based on chain length
    for ($length = 2; $length <= $n; $length++) {
        for ($i = 0; $i <= $n - $length; $i++) {
            $j = $i + $length - 1;
            $dp[$i][$j] = PHP_INT_MAX; // Initialize with a high value
            
            // Try all possible split points for optimal division
            for ($k = $i; $k < $j; $k++) {
                $cost = $dp[$i][$k] + $dp[$k+1][$j] + $matrixDimensions[$i] * $matrixDimensions[$k+1] * $matrixDimensions[$j+1];
                // Find the minimum cost
                if ($cost < $dp[$i][$j]) {
                    $dp[$i][$j] = $cost;
                }
            }
        }
    }
    
    return $dp[0][$n-1]; // Result is the minimum cost for multiplying all matrices
}

// Start the multiplication process
$minimumCost = matrixChainMultiplication($matrixDimensions);

// Print the result
echo "Minimum scalar multiplication cost: " . $minimumCost;

?>