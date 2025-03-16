<?php

// Genetic Algorithm class
class GeneticAlgorithm
{
    // Population size, genetic algorithm parameters
    private $populationSize;
    private $genomeLength;
    private $coolingRate;
    private $mutationRate;
    private $maxGenerationCount;
    
    // Objective function (the function to be optimized)
    private $objectiveFunction;

    // Constructor to initialize the parameters
    public function __construct($populationSize, $genomeLength, $coolingRate, $mutationRate, $maxGenerationCount, $objectiveFunction)
    {
        $this->populationSize = $populationSize;
        $this->genomeLength = $genomeLength;
        $this->coolingRate = $coolingRate;
        $this->mutationRate = $mutationRate;
        $this->maxGenerationCount = $maxGenerationCount;
        $this->objectiveFunction = $objectiveFunction;
    }

    // Generates a random genome
    private function generateGenome()
    {
        $genome = "";
        for ($i = 0; $i < $this->genomeLength; $i++) {
            $genome .= rand(0, 1);  // 0 or 1
        }
        return $genome;
    }

    // Creates the initial population
    private function createPopulation()
    {
        $population = [];
        for ($i = 0; $i < $this->populationSize; $i++) {
            $population[] = $this->generateGenome(); // Random genomes as initial population
        }
        return $population;
    }

    // Crossover between two individuals
    private function crossover($individual1, $individual2)
    {
        $cutPoint = rand(1, $this->genomeLength - 1); // Random crossover point
        $crossoverIndividual1 = substr($individual1, 0, $cutPoint) . substr($individual2, $cutPoint);
        $crossoverIndividual2 = substr($individual2, 0, $cutPoint) . substr($individual1, $cutPoint);
        return [$crossoverIndividual1, $crossoverIndividual2];
    }

    // Mutation (genetic change)
    private function mutation($genome)
    {
        $mutatedGenome = "";
        for ($i = 0; $i < $this->genomeLength; $i++) {
            if (rand(0, 100) < $this->mutationRate * 100) {
                // Flip a random bit
                $mutatedGenome .= $genome[$i] == "0" ? "1" : "0";
            } else {
                $mutatedGenome .= $genome[$i];
            }
        }
        return $mutatedGenome;
    }

    // Calculate the fitness of individuals
    private function fitness($genome)
    {
        return call_user_func($this->objectiveFunction, $genome); // Calculate fitness using the objective function
    }

    // Sort population by fitness
    private function sortPopulation($population)
    {
        usort($population, function($individual1, $individual2) {
            return $this->fitness($individual2) - $this->fitness($individual1); // Sort by fitness in descending order
        });
        return $population;
    }

    // Run the genetic algorithm
    public function run()
    {
        // Create the initial population
        $population = $this->createPopulation();

        // Track generation count
        for ($generation = 0; $generation < $this->maxGenerationCount; $generation++) {
            // Sort the population by fitness
            $population = $this->sortPopulation($population);

            // Print the best individual
            echo "Generation: " . ($generation + 1) . " - Best fitness: " . $this->fitness($population[0]) . "\n";

            // If the best individual reaches the desired value, stop
            if ($this->fitness($population[0]) == 0) {
                break;
            }

            // Create new population
            $newPopulation = [];
            for ($i = 0; $i < $this->populationSize / 2; $i++) {
                $individual1 = $population[$i];
                $individual2 = $population[$i + 1];

                // Crossover
                list($crossoverIndividual1, $crossoverIndividual2) = $this->crossover($individual1, $individual2);

                // Mutation
                $newPopulation[] = $this->mutation($crossoverIndividual1);
                $newPopulation[] = $this->mutation($crossoverIndividual2);
            }

            // Replace the old population with the new one
            $population = $newPopulation;

            // Cool down (reduce temperature)
            $this->coolingRate *= 0.99;
        }

        // Return the best individual
        return $population[0];
    }
}

// Objective function (e.g., x^2 - 5x + 6, a simple function)
$objectiveFunction = function($genome) {
    // Interpret the genome as a binary value and convert it to an integer
    $value = bindec($genome); // Convert binary to integer
    return ($value - 3) * ($value - 3); // Objective function example: (x-3)^2
};

// Parameters for the algorithm
$populationSize = 100;
$genomeLength = 10;
$coolingRate = 1;
$mutationRate = 0.01;
$maxGenerationCount = 100;

// Start the genetic algorithm
$geneticAlgorithm = new GeneticAlgorithm($populationSize, $genomeLength, $coolingRate, $mutationRate, $maxGenerationCount, $objectiveFunction);
$result = $geneticAlgorithm->run();

// Print the best solution
echo "Best solution: " . bindec($result[0]) . "\n"; // Convert binary back to decimal
?>
