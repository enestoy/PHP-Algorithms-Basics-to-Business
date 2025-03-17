<?php

class ReservoirSampling {
    private array $reservoir;
    private int $capacity;
    private int $counter;

    public function __construct(int $capacity) {
        $this->capacity = $capacity;
        $this->reservoir = [];
        $this->counter = 0;
    }

    // Function to process the new data stream
    public function addData($data): void {
        $this->counter++;

        // Add the first N elements directly to the reservoir
        if (count($this->reservoir) < $this->capacity) {
            $this->reservoir[] = $data;
        } else {
            // Randomly select an index
            $randomIndex = rand(0, $this->counter - 1);
            
            // If the random index is within the reservoir size, replace the element
            if ($randomIndex < $this->capacity) {
                $this->reservoir[$randomIndex] = $data;
            }
        }
    }

    // Function to return the current samples in the reservoir
    public function getSamples(): array {
        return $this->reservoir;
    }
}

// Create an object for reservoir sampling
$reservoirSampling = new ReservoirSampling(5);

// Simulate a data stream
$dataList = range(1, 100);
foreach ($dataList as $data) {
    $reservoirSampling->addData($data);
}

// Print the sampled data
print_r($reservoirSampling->getSamples());

?>
