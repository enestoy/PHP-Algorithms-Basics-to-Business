<?php

// Function to calculate GCD
function greatestCommonDivisor($number1, $number2) {
    // While the second number is not zero
    while ($number2 != 0) {
        // Find the remainder and update the numbers
        $remainder = $number1 % $number2;
        $number1 = $number2;
        $number2 = $remainder;
    }

    // Result: Greatest common divisor
    return $number1;
}

// Get two numbers from the user
$number1 = 36; // First number
$number2 = 60; // Second number

// Calculate the GCD
$gcd = greatestCommonDivisor($number1, $number2);

// Print the result
echo "The Greatest Common Divisor of the numbers: " . $gcd . "\n";

?>