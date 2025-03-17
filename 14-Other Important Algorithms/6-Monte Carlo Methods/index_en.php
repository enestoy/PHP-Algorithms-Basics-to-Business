<?php

class MonteCarloPiCalculation {
    private int $totalThrows;
    private int $pointsInsideCircle;

    public function __construct(int $totalThrows) {
        $this->totalThrows = $totalThrows;
        $this->pointsInsideCircle = 0;
    }

    // Function to calculate Pi using the Monte Carlo method
    public function calculatePi(): float {
        for ($i = 0; $i < $this->totalThrows; $i++) {
            $x = mt_rand() / mt_getrandmax(); // Random X coordinate between 0 and 1
            $y = mt_rand() / mt_getrandmax(); // Random Y coordinate between 0 and 1
            
            if (($x * $x + $y * $y) <= 1) {
                $this->pointsInsideCircle++;
            }
        }
        
        // Pi ≈ 4 * (points inside the circle / total throws)
        return 4 * ($this->pointsInsideCircle / $this->totalThrows);
    }
}

// Start calculating Pi using Monte Carlo
$experiment = new MonteCarloPiCalculation(1000000);
$approxPi = $experiment->calculatePi();

// Print the result
echo "Approximate Pi Value: " . $approxPi . "\n";

?>
