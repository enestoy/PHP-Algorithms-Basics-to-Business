<?php

/**
 * Floyd's Cycle Detection Algorithm (Tortoise and Hare)
 * 
 * This algorithm is used for detecting cycles in linked lists.
 * Two pointers (tortoise and hare) move at different speeds,
 * if there's a cycle they will meet, otherwise the hare reaches the end.
 */
class FloydCycleDetection {
    
    /**
     * Node class for linked list
     */
    private $Node;
    
    /**
     * Constructor - Defines the Node class
     */
    public function __construct() {
        // Anonymous class definition for inner class usage in PHP
        $this->Node = new class {
            public $value;
            public $next;
            
            public function __construct($value = null) {
                $this->value = $value;
                $this->next = null;
            }
        };
    }
    
    /**
     * Creates a new Node
     * 
     * @param mixed $value Node value
     * @return object Created node
     */
    public function createNode($value) {
        return new $this->Node($value);
    }
    
    /**
     * Detects if there is a cycle in the linked list
     * 
     * @param object $head Head node of the linked list
     * @return bool Returns true if a cycle exists, false otherwise
     */
    public function detectCycle($head) {
        // Check for empty list
        if ($head === null || $head->next === null) {
            return false;
        }
        
        // Tortoise and hare pointers initially point to the head
        $tortoise = $head;
        $hare = $head;
        
        // Continue until the hare reaches the end or the tortoise and hare meet
        while ($hare !== null && $hare->next !== null) {
            // Tortoise moves 1 step, hare moves 2 steps
            $tortoise = $tortoise->next;         // 1 step
            $hare = $hare->next->next;           // 2 steps
            
            // If tortoise and hare meet at the same node, there is a cycle
            if ($tortoise === $hare) {
                return true;
            }
        }
        
        // Hare reached the end, no cycle exists
        return false;
    }
    
    /**
     * Finds the starting point of the cycle
     * 
     * @param object $head Head node of the linked list
     * @return object|null Cycle start node or null if no cycle exists
     */
    public function findCycleStart($head) {
        // Check for empty list
        if ($head === null || $head->next === null) {
            return null;
        }
        
        // Phase 1: Detect cycle
        $tortoise = $head;
        $hare = $head;
        $cycleExists = false;
        
        while ($hare !== null && $hare->next !== null) {
            $tortoise = $tortoise->next;
            $hare = $hare->next->next;
            
            if ($tortoise === $hare) {
                $cycleExists = true;
                break;
            }
        }
        
        // Return null if no cycle exists
        if (!$cycleExists) {
            return null;
        }
        
        // Phase 2: Find the start of the cycle
        // Move tortoise to head, keep hare at meeting point
        $tortoise = $head;
        
        // Both pointers move at the same speed, they will meet at cycle start
        while ($tortoise !== $hare) {
            $tortoise = $tortoise->next;
            $hare = $hare->next;
        }
        
        return $tortoise;
    }
    
    /**
     * Calculates the length of the cycle in the linked list
     * 
     * @param object $head Head node of the linked list
     * @return int Cycle length, 0 if no cycle exists
     */
    public function cycleLength($head) {
        // Find the start of the cycle
        $cycleStart = $this->findCycleStart($head);
        
        // Return 0 if no cycle exists
        if ($cycleStart === null) {
            return 0;
        }
        
        // Calculate the cycle length
        $length = 1;
        $current = $cycleStart->next;
        
        while ($current !== $cycleStart) {
            $length++;
            $current = $current->next;
        }
        
        return $length;
    }
}

/**
 * Example usage of Floyd's Cycle Detection algorithm
 */
function exampleUsage() {
    $floyd = new FloydCycleDetection();
    
    // Create a sample linked list: 1->2->3->4->5->3 (a cycle that returns to 3)
    $head = $floyd->createNode(1);
    $node2 = $floyd->createNode(2);
    $node3 = $floyd->createNode(3);
    $node4 = $floyd->createNode(4);
    $node5 = $floyd->createNode(5);
    
    $head->next = $node2;
    $node2->next = $node3;
    $node3->next = $node4;
    $node4->next = $node5;
    $node5->next = $node3; // Create cycle: after 5 return to 3
    
    // Cycle detection
    $hasCycle = $floyd->detectCycle($head);
    echo "Does cycle exist: " . ($hasCycle ? "Yes" : "No") . "\n";
    
    // Find the cycle start
    $cycleStart = $floyd->findCycleStart($head);
    if ($cycleStart !== null) {
        echo "Cycle start value: " . $cycleStart->value . "\n";
    }
    
    // Calculate the cycle length
    $length = $floyd->cycleLength($head);
    echo "Cycle length: " . $length . "\n";
    
    // Example of a linked list without cycles
    $acyclicHead = $floyd->createNode(10);
    $acyclicHead->next = $floyd->createNode(20);
    $acyclicHead->next->next = $floyd->createNode(30);
    
    $hasNoCycle = $floyd->detectCycle($acyclicHead);
    echo "Does acyclic list have a cycle: " . ($hasNoCycle ? "Yes" : "No") . "\n";
}

// Run the example usage
exampleUsage();
?>