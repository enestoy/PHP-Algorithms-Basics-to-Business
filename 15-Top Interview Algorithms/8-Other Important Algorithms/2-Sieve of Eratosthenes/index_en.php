<?php
/* 
Interview Question:

In an e-commerce platform, special discounts will be applied based on the prices of the products. 
Discounts will be determined according to whether the price is a prime number or not. 
For example, if a product's price is a prime number, a 10% discount will be applied. 
Thus, we need to quickly find all the prime numbers within a certain price range.

Problem:
- We need to find all prime numbers between 2 and n.

- n is the upper limit given by the user.

- After finding the prime numbers, we need to return the list of these numbers.
*/


class SieveOfEratosthenes {
    /**
     * Finds prime numbers up to a given limit.
     *
     * @param int $n Upper limit.
     * @return array List of prime numbers.
     */
    public function findPrimes($n) {
        // 0 and 1 are not prime, so mark them as false initially.
        $isPrime = array_fill(0, $n + 1, true);
        $isPrime[0] = $isPrime[1] = false;

        // Check numbers from 2 up to sqrt(n).
        for ($i = 2; $i * $i <= $n; $i++) {
            // If $i is prime, mark its multiples as non-prime.
            if ($isPrime[$i]) {
                for ($j = $i * $i; $j <= $n; $j += $i) {
                    $isPrime[$j] = false;
                }
            }
        }

        // Collect and return prime numbers.
        $primes = [];
        for ($i = 2; $i <= $n; $i++) {
            if ($isPrime[$i]) {
                $primes[] = $i;
            }
        }

        return $primes;
    }
}

// Example Usage:
$sieve = new SieveOfEratosthenes();
$n = 50; // Find prime numbers up to 50.
$primes = $sieve->findPrimes($n);

echo "Prime numbers from 2 to $n:\n";
echo implode(", ", $primes) . "\n";

?>
