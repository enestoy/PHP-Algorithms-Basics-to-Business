<?php

// Function to check Fermat's Little Theorem
function fermatLittleTheorem($a, $p) {
    // Check that a is not divisible by p
    if ($a % $p == 0) {
        return "a is divisible by p, the theorem does not apply.";
    }

    // According to Fermat's Little Theorem, a^(p-1) mod p should be 1
    $result = bcpowmod($a, $p - 1, $p);  // Using bcpowmod for handling large numbers in PHP

    // Check the result
    if ($result == 1) {
        return "Fermat's Little Theorem holds: $a^($p-1) mod $p = 1";
    } else {
        return "Fermat's Little Theorem does not hold: $a^($p-1) mod $p != 1";
    }
}

// Get values of a and p from the user
$a = 2;   // Example value for a (2)
$p = 5;   // Example value for p (5)

// Check Fermat's Little Theorem
$result = fermatLittleTheorem($a, $p);

// Print the result
echo $result . "\n";

?>
