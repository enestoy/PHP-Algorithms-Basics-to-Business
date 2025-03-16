<?php

// Function to calculate modular inverse
function modularInverse($a, $m) {
    // The GCD of a and m must be 1, otherwise, no modular inverse exists
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return null; // No modular inverse
}

// Function to solve Chinese Remainder Theorem (CRT)
function solveCRT($a, $m) {
    // Step 1: Calculate the product of all moduli
    $M = array_product($m);  // Calculate the product of all moduli

    $x = 0;

    // Step 2: Calculate the helper variables M_i and find their modular inverses
    for ($i = 0; $i < count($m); $i++) {
        // M_i = M / m_i
        $M_i = $M / $m[$i];

        // Find the modular inverse of M_i mod m_i
        $modularInverse = modularInverse($M_i, $m[$i]);

        // Sum up the effect of each solution
        $x += $a[$i] * $M_i * $modularInverse;
    }

    // Step 3: Take the result mod M
    return $x % $M;
}

// Test data
$a = [2, 3, 1]; // Remainders in the system of equations
$m = [3, 5, 7]; // Moduli

// Calculate the solution
$result = solveCRT($a, $m);

// Print the result
echo "Solution: x = " . $result . "\n";

?>
