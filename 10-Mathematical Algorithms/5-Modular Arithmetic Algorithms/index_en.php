<?php

// Modular Addition Operation
function modularAddition($a, $b, $m) {
    // Get the modulus of a and b, then add them, and apply the modulus to the result
    return (($a % $m) + ($b % $m)) % $m;
}

// Modular Subtraction Operation
function modularSubtraction($a, $b, $m) {
    // Get the modulus of a and b, then subtract them, and apply the modulus to the result
    return (($a % $m) - ($b % $m) + $m) % $m;
}

// Modular Multiplication Operation
function modularMultiplication($a, $b, $m) {
    // Get the modulus of a and b, then multiply them, and apply the modulus to the result
    return (($a % $m) * ($b % $m)) % $m;
}

// Modular Division Operation (Using Modular Inverse)
function modularDivision($a, $b, $m) {
    // Find the modular inverse of b
    $bInverse = modularInverse($b, $m);
    
    // If b does not have a modular inverse, the operation is invalid
    if ($bInverse === null) {
        return "b does not have a modular inverse!";
    }
    
    // Modular division operation: a * b^(-1) mod m
    return modularMultiplication($a, $bInverse, $m);
}

// Modular Inverse Calculation (Using Extended Euclidean Algorithm)
function modularInverse($a, $m) {
    // Using Extended Euclidean Algorithm to find the modular inverse of a
    $t = 0;
    $newT = 1;
    $r = $m;
    $newR = $a;

    while ($newR != 0) {
        $quotient = intdiv($r, $newR);

        $tempT = $t;
        $t = $newT;
        $newT = $tempT - $quotient * $newT;

        $tempR = $r;
        $r = $newR;
        $newR = $tempR - $quotient * $newR;
    }

    // If the final remainder is greater than 1, the modular inverse does not exist
    if ($r > 1) {
        return null; // No modular inverse
    }

    // If the modular inverse is negative, add modulus m to make it positive
    if ($t < 0) {
        $t = $t + $m;
    }

    return $t;
}

// Test Values
$a = 15;
$b = 7;
$m = 13;

// Modular Addition
echo "Modular Addition: " . modularAddition($a, $b, $m) . "<br>";

// Modular Subtraction
echo "Modular Subtraction: " . modularSubtraction($a, $b, $m) . "<br>";

// Modular Multiplication
echo "Modular Multiplication: " . modularMultiplication($a, $b, $m) . "<br>";

// Modular Division
echo "Modular Division: " . modularDivision($a, $b, $m) . "<br>";

?>
