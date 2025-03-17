<?php

class MapReduce {
    private array $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    // Map function: Split words and assign a value of 1 to each
    private function map(): array {
        $result = [];
        foreach ($this->data as $line) {
            $words = explode(' ', strtolower($line));
            foreach ($words as $word) {
                $word = preg_replace('/[^a-zA-Zçğıöşü]/u', '', $word); // Clean punctuation
                if (!empty($word)) {
                    $result[] = [$word, 1];
                }
            }
        }
        return $result;
    }

    // Reduce function: Group the same words and calculate their totals
    private function reduce(array $mapResult): array {
        $wordFrequency = [];
        foreach ($mapResult as [$word, $value]) {
            if (!isset($wordFrequency[$word])) {
                $wordFrequency[$word] = 0;
            }
            $wordFrequency[$word] += $value;
        }
        return $wordFrequency;
    }

    // Function to start the MapReduce process
    public function run(): array {
        $mapResult = $this->map();
        return $this->reduce($mapResult);
    }
}

// Example data set
$data = [
    "Hello world hello!",
    "PHP with MapReduce application",
    "There are many languages in the world and PHP is popular."
];

// Start the MapReduce process
$mapReduce = new MapReduce($data);
$result = $mapReduce->run();

// Print the result
print_r($result);

?>
