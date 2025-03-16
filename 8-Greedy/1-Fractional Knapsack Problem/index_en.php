<?php

/**
 * Item class holds the weight and value information of each item.
 */
class Item {
    public float $weight;
    public float $value;
    
    public function __construct(float $weight, float $value) {
        $this->weight = $weight;
        $this->value = $value;
    }
    
    /**
     * Returns the value/weight ratio of the item.
     */
    public function getRatio(): float {
        return $this->value / $this->weight;
    }
}

/**
 * Fractional Knapsack problem solution function.
 * @param Item[] $itemList - An array of items.
 * @param float $maxCapacity - Maximum capacity of the bag.
 * @return float - Maximum total value that can be placed in the bag.
 */
function fractionalKnapsack(array $itemList, float $maxCapacity): float {
    // Sort items by value/weight ratio in descending order
    usort($itemList, fn($a, $b) => $b->getRatio() <=> $a->getRatio());
    
    $totalValue = 0.0;
    $remainingCapacity = $maxCapacity;
    
    foreach ($itemList as $item) {
        // Stop if the bag is full
        if ($remainingCapacity <= 0) {
            break;
        }
        
        // If the item fits completely into the bag, add its value
        if ($item->weight <= $remainingCapacity) {
            $totalValue += $item->value;
            $remainingCapacity -= $item->weight;
        } else {
            // If the item doesn't fit completely, add the proportional value of the part that fits
            $totalValue += $item->getRatio() * $remainingCapacity;
            break;
        }
    }
    
    return $totalValue;
}

// Example Usage
$itemList = [
    new Item(10, 60), // Item with 10 kg weight and 60 units of value
    new Item(20, 100), // Item with 20 kg weight and 100 units of value
    new Item(30, 120)  // Item with 30 kg weight and 120 units of value
];

$maxCapacity = 50; // Maximum capacity of the bag
$maxValue = fractionalKnapsack($itemList, $maxCapacity);

echo "Maximum Total Value: $maxValue"; // Print the result

?>
