<?php

class BloomFilter {
    private array $bitArray;
    private int $size;
    private int $hashFunctionCount;

    public function __construct(int $size, int $hashFunctionCount) {
        $this->size = $size;
        $this->hashFunctionCount = $hashFunctionCount;
        $this->bitArray = array_fill(0, $size, 0);
    }

    // Function to add data to the Bloom Filter
    public function add(string $data): void {
        for ($i = 0; $i < $this->hashFunctionCount; $i++) {
            $index = $this->hashCalculate($data, $i);
            $this->bitArray[$index] = 1;
        }
    }

    // Function to check if the data has been added before
    public function check(string $data): bool {
        for ($i = 0; $i < $this->hashFunctionCount; $i++) {
            $index = $this->hashCalculate($data, $i);
            if ($this->bitArray[$index] === 0) {
                return false; // Data definitely not present
            }
        }
        return true; // Data might be present (false positive possibility exists)
    }

    // Simple hash function
    private function hashCalculate(string $data, int $seed): int {
        return (crc32($data . $seed) % $this->size);
    }
}

// Create a Bloom Filter
$bloomFilter = new BloomFilter(100, 3);

// Add data
$bloomFilter->add("girisimvadisi");
$bloomFilter->add("enes toy");

// Check data
var_dump($bloomFilter->check("girisimvadisi")); // should return true
var_dump($bloomFilter->check("kırklar")); // should likely return false

?>
