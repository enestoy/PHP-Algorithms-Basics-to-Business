<?php

// Fast Exponentiation function
function fastExponentiation($base, $exponent) {
    // Initial result is 1
    $result = 1;
    
    // When the exponent is 0, the result is 1 because any number raised to the power of 0 is 1
    while ($exponent > 0) {
        // If the exponent is odd, multiply the result by the base
        if ($exponent % 2 == 1) {
            $result *= $base;
        }

        // Square the base
        $base *= $base;

        // Halve the exponent
        $exponent = floor($exponent / 2);
    }

    return $result;
}

// Get the base and exponent from the user
$base = 2;    // Example base (2)
$exponent = 13;   // Example exponent (13)

// Call the fast exponentiation function
$result = fastExponentiation($base, $exponent);

// Print the result
echo "$base raised to the power of $exponent = $result\n";

?>
