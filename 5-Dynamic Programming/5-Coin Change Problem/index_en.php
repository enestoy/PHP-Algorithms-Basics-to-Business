<?php

function coinChange($amount, $coins) {
    // Initialize the minimum number of coins required for each amount
    $dp = array_fill(0, $amount + 1, PHP_INT_MAX);
    $dp[0] = 0; // 0 coins are needed for amount 0

    // Apply dynamic programming
    for ($i = 1; $i <= $amount; $i++) {
        foreach ($coins as $coin) {
            if ($i - $coin >= 0) {
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }
    }

    // Return the result. If no solution exists, return -1.
    return $dp[$amount] == PHP_INT_MAX ? -1 : $dp[$amount];
}

// Example usage
$coins = [1, 2, 5]; // Available coins
$amount = 11; // Target amount

echo "Minimum number of coins required: " . coinChange($amount, $coins);

?>