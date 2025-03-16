<?php

// Function to find prime numbers
function findPrimeNumbers($limit) {
    // Initially, assume all numbers are prime
    $primeNumbers = array_fill(0, $limit + 1, true);
    
    // 0 and 1 are not prime numbers, mark them
    $primeNumbers[0] = false;
    $primeNumbers[1] = false;

    // Start checking from 2 for each number
    for ($i = 2; $i * $i <= $limit; $i++) {
        // If i is prime, mark multiples of i as non-prime
        if ($primeNumbers[$i] == true) {
            for ($j = $i * $i; $j <= $limit; $j += $i) {
                $primeNumbers[$j] = false; // Mark multiples of i as non-prime
            }
        }
    }

    // Collect the prime numbers (those not marked as false)
    $primeNumbersList = [];
    for ($i = 2; $i <= $limit; $i++) {
        if ($primeNumbers[$i] == true) {
            $primeNumbersList[] = $i;
        }
    }

    return $primeNumbersList;
}

// Get the upper limit from the user for finding prime numbers
$limit = 30; // Example: find primes up to 30

// Calculate the prime numbers
$primeNumbers = findPrimeNumbers($limit);

// Print the results
echo "Prime numbers up to $limit: ";
echo implode(", ", $primeNumbers);
echo "<br>";

?>
