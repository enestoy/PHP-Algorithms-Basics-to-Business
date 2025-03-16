<?php

/**
 * Sieve of Eratosthenes Algorithm
 * 
 * This algorithm efficiently finds all prime numbers up to a certain limit.
 * Its basic principle is based on the elimination (sieving) of non-prime numbers.
 */
class SieveOfEratosthenes {
    
    /**
     * Finds all prime numbers up to a specified limit
     * 
     * @param int $upperLimit Upper limit for the prime numbers to search
     * @return array Array of found prime numbers
     */
    public function findPrimes(int $upperLimit): array {
        // Return empty array for values less than 2
        if ($upperLimit < 2) {
            return [];
        }
        
        // Initially assume all numbers are prime
        $isPrime = array_fill(0, $upperLimit + 1, true);
        
        // 0 and 1 are not prime, mark them as false
        $isPrime[0] = $isPrime[1] = false;
        
        // Sieving process: check up to the square root of the limit
        $bound = (int)sqrt($upperLimit);
        
        for ($number = 2; $number <= $bound; $number++) {
            // If the number hasn't been eliminated (is prime)
            if ($isPrime[$number]) {
                // Eliminate all multiples of the number (mark as not prime)
                for ($multiple = $number * $number; $multiple <= $upperLimit; $multiple += $number) {
                    $isPrime[$multiple] = false;
                }
            }
        }
        
        // Collect and return prime numbers
        $primeNumbers = [];
        for ($number = 2; $number <= $upperLimit; $number++) {
            if ($isPrime[$number]) {
                $primeNumbers[] = $number;
            }
        }
        
        return $primeNumbers;
    }
    
    /**
     * Finds prime numbers within a specified range
     * 
     * @param int $lowerLimit Lower limit of the range
     * @param int $upperLimit Upper limit of the range
     * @return array Array of prime numbers within the specified range
     */
    public function findPrimesInRange(int $lowerLimit, int $upperLimit): array {
        // Limit validation
        if ($lowerLimit < 0 || $upperLimit < $lowerLimit) {
            return [];
        }
        
        // First find all primes up to the upper limit
        $allPrimes = $this->findPrimes($upperLimit);
        
        // Filter those greater than or equal to the lower limit
        $primesInRange = array_filter($allPrimes, function($number) use ($lowerLimit) {
            return $number >= $lowerLimit;
        });
        
        // Reindex the array
        return array_values($primesInRange);
    }
    
    /**
     * Calculates the number of primes up to a certain limit (Prime Counting Function)
     * 
     * @param int $upperLimit Upper limit
     * @return int Count of prime numbers found
     */
    public function countPrimes(int $upperLimit): int {
        $primes = $this->findPrimes($upperLimit);
        return count($primes);
    }
    
    /**
     * Memory-efficient implementation of the Sieve of Eratosthenes
     * 
     * @param int $upperLimit Upper limit for the prime numbers to search
     * @return array Array of found prime numbers
     */
    public function findPrimesMemoryEfficient(int $upperLimit): array {
        // Return empty array for values less than 2
        if ($upperLimit < 2) {
            return [];
        }
        
        // Use even number elimination method to halve memory usage
        // Only store odd numbers (all even numbers except 2 are not prime)
        $bound = (int)(($upperLimit - 1) / 2);
        $isPrime = array_fill(0, $bound + 1, true);
        
        // Sieving process
        $crossBound = (int)((sqrt($upperLimit) - 1) / 2);
        
        for ($i = 1; $i <= $crossBound; $i++) {
            if ($isPrime[$i]) {
                // 2*i+1 is a prime, eliminate its multiples
                $number = 2 * $i + 1;
                // j = 2*i*(i+1) formula gives the index of number*number
                for ($j = 2 * $i * ($i + 1); $j <= $bound; $j += $number) {
                    $isPrime[$j] = false;
                }
            }
        }
        
        // Collect results
        $primeNumbers = [2]; // Manually add 2
        for ($i = 1; $i <= $bound; $i++) {
            if ($isPrime[$i]) {
                $primeNumbers[] = 2 * $i + 1;
            }
        }
        
        return $primeNumbers;
    }
    
    /**
     * Segmented Sieve of Eratosthenes - Suitable for very large number ranges
     * 
     * @param int $upperLimit Upper limit for the prime numbers to search
     * @param int $segmentSize Size of each segment
     * @return array Array of found prime numbers
     */
    public function findPrimesSegmented(int $upperLimit, int $segmentSize = 1000000): array {
        // Return empty array for values less than 2
        if ($upperLimit < 2) {
            return [];
        }
        
        // Find root primes (to be used for segments)
        $rootLimit = (int)sqrt($upperLimit);
        $rootPrimes = $this->findPrimes($rootLimit);
        $primeNumbers = $rootPrimes; // Add root primes to result array
        
        // Process segments
        $lowLimit = $rootLimit + 1;
        $highLimit = min($lowLimit + $segmentSize - 1, $upperLimit);
        
        while ($lowLimit <= $upperLimit) {
            // Create a mark array for the segment
            $segmentSize = $highLimit - $lowLimit + 1;
            $mark = array_fill(0, $segmentSize, true);
            
            // Sieving process on the segment using root primes
            foreach ($rootPrimes as $prime) {
                // Find the first multiple in the segment
                $start = (int)ceil($lowLimit / $prime) * $prime;
                if ($start < $lowLimit) {
                    $start += $prime;
                }
                
                // Mark all multiples in the segment
                for ($j = $start; $j <= $highLimit; $j += $prime) {
                    $mark[$j - $lowLimit] = false;
                }
            }
            
            // Add unmarked (prime) numbers from the segment
            for ($i = 0; $i < $segmentSize; $i++) {
                if ($mark[$i] && ($lowLimit + $i) > $rootLimit) {
                    $primeNumbers[] = $lowLimit + $i;
                }
            }
            
            // Move to next segment
            $lowLimit = $highLimit + 1;
            $highLimit = min($lowLimit + $segmentSize - 1, $upperLimit);
        }
        
        // Sort and return the numbers
        sort($primeNumbers);
        return $primeNumbers;
    }
}

/**
 * Example usage of the Sieve of Eratosthenes algorithm
 */
function exampleUsage() {
    $sieve = new SieveOfEratosthenes();
    
    echo "1. Basic Sieve of Eratosthenes:\n";
    echo "-----------------------------\n";
    
    $limit = 100;
    $startTime = microtime(true);
    $primeNumbers = $sieve->findPrimes($limit);
    $endTime = microtime(true);
    $duration = round(($endTime - $startTime) * 1000, 4);
    
    echo "Prime numbers up to $limit: " . implode(", ", $primeNumbers) . "\n";
    echo "Count of prime numbers: " . count($primeNumbers) . "\n";
    echo "Processing time: $duration ms\n\n";
    
    echo "2. Prime Numbers in a Specific Range:\n";
    echo "--------------------------------\n";
    
    $lowerLimit = 50;
    $upperLimit = 100;
    $primesInRange = $sieve->findPrimesInRange($lowerLimit, $upperLimit);
    
    echo "Prime numbers between $lowerLimit and $upperLimit: " . implode(", ", $primesInRange) . "\n";
    echo "Count of prime numbers: " . count($primesInRange) . "\n\n";
    
    echo "3. Memory-Efficient Sieve of Eratosthenes:\n";
    echo "-----------------------------------\n";
    
    $limit = 100;
    $startTime = microtime(true);
    $efficientPrimes = $sieve->findPrimesMemoryEfficient($limit);
    $endTime = microtime(true);
    $duration = round(($endTime - $startTime) * 1000, 4);
    
    echo "Prime numbers up to $limit (memory efficient): " . implode(", ", $efficientPrimes) . "\n";
    echo "Count of prime numbers: " . count($efficientPrimes) . "\n";
    echo "Processing time: $duration ms\n\n";
    
    echo "4. Performance Test for Larger Numbers:\n";
    echo "---------------------------------------\n";
    
    $limit = 1000000; // 1 million
    $startTime = microtime(true);
    $primeCount = $sieve->countPrimes($limit);
    $endTime = microtime(true);
    $duration = round(($endTime - $startTime) * 1000, 2);
    
    echo "Found $primeCount prime numbers up to $limit.\n";
    echo "Processing time: $duration ms\n";
}

// Run the example usage
exampleUsage();
?>