<?php

// Simulated Annealing algorithm basic class
class SimulatedAnnealing
{
    // Initial parameters
    private $temperature;
    private $finalTemperature;
    private $coolingRate;
    
    // Objective function (the function to be optimized)
    private $objectiveFunction;

    // Constructor to initialize the parameters
    public function __construct($initialTemperature, $finalTemperature, $coolingRate, $objectiveFunction)
    {
        $this->temperature = $initialTemperature;
        $this->finalTemperature = $finalTemperature;
        $this->coolingRate = $coolingRate;
        $this->objectiveFunction = $objectiveFunction;
    }

    // Generates a new solution (x) based on the current solution
    private function generateSolution($x)
    {
        return $x + rand(-1, 1); // Simple modification of x
    }

    // Starts the algorithm
    public function optimize()
    {
        // Initial solution
        $x = rand(-10, 10); // Initial point is randomly chosen
        $bestX = $x;
        $bestValue = call_user_func($this->objectiveFunction, $x); // Initial value

        while ($this->temperature > $this->finalTemperature) {
            // Generate a new solution
            $y = $this->generateSolution($x);
            $value = call_user_func($this->objectiveFunction, $y);

            // Accept or reject the change
            if ($value < $bestValue || rand(0, 100) < $this->acceptanceProbability($bestValue, $value)) {
                $x = $y;
                $bestValue = $value;
                $bestX = $x;
            }

            // Reduce the temperature
            $this->temperature *= $this->coolingRate;
        }

        // Return the best found solution
        return $bestX;
    }

    // The probability of accepting a new solution
    private function acceptanceProbability($currentValue, $newValue)
    {
        if ($newValue < $currentValue) {
            return 1.0; // A better solution is always accepted
        }

        // A worse solution can be accepted depending on the temperature
        return exp(($currentValue - $newValue) / $this->temperature);
    }
}

// Objective function (for example, y = x^2)
$objectiveFunction = function($x) {
    return $x * $x; // A simple function
};

// Parameters for the algorithm
$initialTemperature = 100;
$finalTemperature = 0.01;
$coolingRate = 0.99;

// Run the algorithm
$simulatedAnnealing = new SimulatedAnnealing($initialTemperature, $finalTemperature, $coolingRate, $objectiveFunction);
$result = $simulatedAnnealing->optimize();

// Print the results
echo "Best solution: " . $result . "\n";
echo "Objective function value: " . $objectiveFunction($result) . "\n";

?>
