<?php

// Ant Colony Optimization class
class AntColonyOptimization
{
    // Parameters
    private $antCount;
    private $generationCount;
    private $pheromoneAmount;
    private $evolutionRate;
    private $objectiveFunction;
    private $pheromoneTable;
    
    // Constructor to initialize parameters
    public function __construct($antCount, $generationCount, $pheromoneAmount, $evolutionRate, $objectiveFunction)
    {
        $this->antCount = $antCount;
        $this->generationCount = $generationCount;
        $this->pheromoneAmount = $pheromoneAmount;
        $this->evolutionRate = $evolutionRate;
        $this->objectiveFunction = $objectiveFunction;

        // Initialize the pheromone table at the start
        $this->pheromoneTable = [];
    }

    // Initializes pheromones (equal amount for each path)
    private function initializePheromones($pathCount)
    {
        for ($i = 0; $i < $pathCount; $i++) {
            $this->pheromoneTable[$i] = 1.0;  // All paths initially have the same pheromone level
        }
    }

    // Ant travels existing paths to generate a solution
    private function antPath($pathCount)
    {
        $path = [];
        for ($i = 0; $i < $pathCount; $i++) {
            $path[] = rand(0, 1);  // Simple solution generation (e.g., decisions between 0 and 1)
        }
        return $path;
    }

    // Objective function (the function to be optimized)
    private function objectiveFunction($path)
    {
        return call_user_func($this->objectiveFunction, $path);  // Measure the fitness of the path using the objective function
    }

    // Updates the pheromone table
    private function updatePheromones($path, $value)
    {
        for ($i = 0; $i < count($path); $i++) {
            $this->pheromoneTable[$i] = (1 - $this->evolutionRate) * $this->pheromoneTable[$i] + $this->evolutionRate * $value;
        }
    }

    // Runs the Ant Colony Optimization
    public function optimize()
    {
        // Initialize pheromones at the start
        $pathCount = 10;  // Assume there are 10 paths as an example
        $this->initializePheromones($pathCount);

        // Start the ant colony loop for each generation
        for ($generation = 0; $generation < $this->generationCount; $generation++) {
            $bestValue = INF;
            $bestPath = [];

            // Path selection for each ant
            for ($ant = 0; $ant < $this->antCount; $ant++) {
                $path = $this->antPath($pathCount);  // Create an ant path
                $value = $this->objectiveFunction($path);  // Evaluate the path using the objective function

                // Find the best path
                if ($value < $bestValue) {
                    $bestValue = $value;
                    $bestPath = $path;
                }
            }

            // Update pheromones for the best path
            $this->updatePheromones($bestPath, $bestValue);

            // Print the best result at the end of each generation
            echo "Generation: " . ($generation + 1) . " - Best solution value: " . $bestValue . "\n";
        }

        // Return the best solution
        return $bestPath;
    }
}

// Objective function (e.g., a simple function like x^2 - 5x + 6)
$objectiveFunction = function($path) {
    // Treat the path as a binary value (0 and 1) and convert it to an integer
    $value = bindec(implode('', $path));  // Convert binary to integer
    return ($value - 3) * ($value - 3);  // Objective function example: (x-3)^2
};

// Parameters
$antCount = 20;
$generationCount = 50;
$pheromoneAmount = 1.0;
$evolutionRate = 0.5;  // Determines how fast pheromones evolve
$maxGenerationCount = 100;

// Start the Ant Colony Optimization
$antOptimization = new AntColonyOptimization($antCount, $generationCount, $pheromoneAmount, $evolutionRate, $objectiveFunction);
$result = $antOptimization->optimize();

// Print the best solution
echo "Best solution: " . bindec(implode('', $result)) . "\n"; // Convert the solution from binary back to decimal
?>
