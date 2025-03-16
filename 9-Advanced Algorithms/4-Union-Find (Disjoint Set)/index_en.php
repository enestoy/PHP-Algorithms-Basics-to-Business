<?php

/**
 * Union-Find (Disjoint Set) Data Structure
 * 
 * This class is used to manage disjoint sets.
 * It supports two main operations:
 * - Union: Merges two sets
 * - Find: Determines which set an element belongs to
 */
class DisjointSets {
    private array $parent;  // Stores the root element for each element
    private array $rank;    // Stores the depth of each set

    /**
     * Initializes the DisjointSets class
     * 
     * @param int $elementCount Total number of elements
     */
    public function __construct(int $elementCount) {
        $this->parent = [];
        $this->rank = [];

        // Initialize each element as its own set
        for ($i = 0; $i < $elementCount; $i++) {
            $this->parent[$i] = $i;    // Initially each element is its own root
            $this->rank[$i] = 0;       // Initial rank is 0
        }
    }

    /**
     * Finds the root representative of an element (with Path Compression optimization)
     * 
     * @param int $element Element to find the root for
     * @return int Root element of the set containing the element
     */
    public function find(int $element): int {
        // Path Compression: Flatten the path during search
        if ($this->parent[$element] !== $element) {
            $this->parent[$element] = $this->find($this->parent[$element]);
        }
        return $this->parent[$element];
    }

    /**
     * Merges two sets (with Union by Rank optimization)
     * 
     * @param int $element1 An element from the first set
     * @param int $element2 An element from the second set
     * @return bool True if merger successful, false if elements are already in the same set
     */
    public function union(int $element1, int $element2): bool {
        $root1 = $this->find($element1);
        $root2 = $this->find($element2);

        // If elements are already in the same set, do nothing
        if ($root1 === $root2) {
            return false;
        }

        // Union by Rank: Attach the tree with smaller rank to the one with larger rank
        if ($this->rank[$root1] < $this->rank[$root2]) {
            $this->parent[$root1] = $root2;
        } elseif ($this->rank[$root1] > $this->rank[$root2]) {
            $this->parent[$root2] = $root1;
        } else {
            // If ranks are equal, either one can be attached to the other,
            // but the rank of the root must be increased
            $this->parent[$root2] = $root1;
            $this->rank[$root1]++;
        }

        return true;
    }

    /**
     * Checks if two elements are in the same set
     * 
     * @param int $element1 First element
     * @param int $element2 Second element
     * @return bool True if in the same set, false otherwise
     */
    public function inSameSet(int $element1, int $element2): bool {
        return $this->find($element1) === $this->find($element2);
    }

    /**
     * Returns the number of sets
     * 
     * @return int Current number of sets
     */
    public function setCount(): int {
        $sets = [];
        
        foreach ($this->parent as $element => $value) {
            $root = $this->find($element);
            $sets[$root] = true;
        }
        
        return count($sets);
    }

    /**
     * Returns the elements of each set
     * 
     * @return array Array containing the elements of each set
     */
    public function getSets(): array {
        $sets = [];
        
        foreach ($this->parent as $element => $value) {
            $root = $this->find($element);
            
            if (!isset($sets[$root])) {
                $sets[$root] = [];
            }
            
            $sets[$root][] = $element;
        }
        
        return $sets;
    }
}

// Usage example
function runExample() {
    echo "Union-Find (Disjoint Set) Example\n";
    
    // Create a disjoint set with 10 elements
    $disjointSets = new DisjointSets(10);
    
    // Merge some sets
    $disjointSets->union(0, 1);
    $disjointSets->union(2, 3);
    $disjointSets->union(0, 2);
    $disjointSets->union(4, 5);
    $disjointSets->union(6, 7);
    $disjointSets->union(8, 9);
    $disjointSets->union(4, 8);
    
    // Check
    echo "Are 1 and 3 in the same set? " . ($disjointSets->inSameSet(1, 3) ? "Yes" : "No") . "\n";
    echo "Are 4 and 9 in the same set? " . ($disjointSets->inSameSet(4, 9) ? "Yes" : "No") . "\n";
    echo "Are 1 and 5 in the same set? " . ($disjointSets->inSameSet(1, 5) ? "Yes" : "No") . "\n";
    
    // Show the current number of sets
    echo "Total number of sets: " . $disjointSets->setCount() . "\n";
    
    // Show all sets
    echo "Sets:\n";
    foreach ($disjointSets->getSets() as $root => $elements) {
        echo "Root $root: " . implode(", ", $elements) . "\n";
    }
}

// Run the example
runExample();
?>