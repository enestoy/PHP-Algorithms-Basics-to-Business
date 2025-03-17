<?php

class KarnaughMap {
    private array $table;
    private int $size;

    public function __construct(int $size) {
        $this->size = $size;
        $this->table = array_fill(0, $size, array_fill(0, $size, 0));
    }

    // Function to add a value to the Karnaugh map
    public function addValue(int $row, int $column, int $value): void {
        if ($row < $this->size && $column < $this->size) {
            $this->table[$row][$column] = $value;
        }
    }

    // Simple function to minimize the Boolean expression
    public function minimize(): array {
        $result = [];
        
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                if ($this->table[$i][$j] === 1) {
                    $result[] = "($i, $j)";
                }
            }
        }
        
        return $result;
    }

    // Function to display the map
    public function displayMap(): void {
        foreach ($this->table as $row) {
            echo implode(" ", $row) . "\n";
        }
    }
}

// Create a 2x2 Karnaugh map
$karnaugh = new KarnaughMap(2);

// Add values to the map
$karnaugh->addValue(0, 0, 1);
$karnaugh->addValue(0, 1, 0);
$karnaugh->addValue(1, 0, 1);
$karnaugh->addValue(1, 1, 1);

// Display the map
echo "Karnaugh Map:<br>";
$karnaugh->displayMap();

// Display the minimized result
echo "\nMinimized Results:<br>";
print_r($karnaugh->minimize());

?>
