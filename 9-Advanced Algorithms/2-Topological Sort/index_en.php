<?php

/**
 * Topological Sort Algorithm Implementation
 * 
 * This algorithm sorts nodes in directed graphs assuming no cycles (DAG - Directed Acyclic Graph)
 * based on dependency relationships. If node A depends on node B,
 * in a topological sort B must come before A.
 */
class TopologicalSort {
    
    /**
     * Number of nodes
     * @var int
     */
    private $nodeCount;
    
    /**
     * Adjacency list representation of the graph
     * @var array
     */
    private $adjacencyList;
    
    /**
     * Class constructor
     * 
     * @param int $nodeCount Number of nodes in the graph
     */
    public function __construct(int $nodeCount) {
        $this->nodeCount = $nodeCount;
        $this->adjacencyList = array_fill(0, $nodeCount, []);
    }
    
    /**
     * Adds a directed edge to the graph
     * 
     * @param int $start Start node of the edge
     * @param int $end End node of the edge
     */
    public function addEdge(int $start, int $end): void {
        // Add an edge from $start to $end
        $this->adjacencyList[$start][] = $end;
    }
    
    /**
     * Helper function for topological sort using Depth-First Search (DFS)
     * 
     * @param int $node Current node
     * @param array $visited Array tracking visited nodes
     * @param array $stack Stack that will hold the topological order
     */
    private function topologicalSortHelper(int $node, array &$visited, array &$stack): void {
        // Mark the node as visited
        $visited[$node] = true;
        
        // Process neighboring nodes
        foreach ($this->adjacencyList[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                $this->topologicalSortHelper($neighbor, $visited, $stack);
            }
        }
        
        // Add current node to stack after all dependent nodes are processed
        array_unshift($stack, $node);
    }
    
    /**
     * Performs topological sort on the graph
     * 
     * @return array Array of topologically sorted nodes
     */
    public function topologicalSort(): array {
        // Array to track visited nodes
        $visited = array_fill(0, $this->nodeCount, false);
        
        // Result array
        $sorted = [];
        
        // Call DFS for all nodes
        for ($node = 0; $node < $this->nodeCount; $node++) {
            if (!$visited[$node]) {
                $this->topologicalSortHelper($node, $visited, $sorted);
            }
        }
        
        return $sorted;
    }
    
    /**
     * Performs topological sort using Kahn's Algorithm
     * 
     * @return array|null Array of topologically sorted nodes or null if a cycle exists
     */
    public function kahnTopologicalSort(): ?array {
        // Calculate in-degrees (number of dependencies) for each node
        $inDegrees = array_fill(0, $this->nodeCount, 0);
        
        foreach ($this->adjacencyList as $node => $neighbors) {
            foreach ($neighbors as $neighbor) {
                $inDegrees[$neighbor]++;
            }
        }
        
        // Add nodes with in-degree 0 to queue (nodes with no dependencies)
        $queue = [];
        for ($node = 0; $node < $this->nodeCount; $node++) {
            if ($inDegrees[$node] === 0) {
                $queue[] = $node;
            }
        }
        
        // Counter for visited nodes
        $visitCount = 0;
        
        // Result of topological sorting
        $sorted = [];
        
        // Process until queue is empty
        while (!empty($queue)) {
            // Remove a node from the front of the queue
            $currentNode = array_shift($queue);
            
            // Add to result array
            $sorted[] = $currentNode;
            $visitCount++;
            
            // Reduce in-degrees of neighboring nodes
            foreach ($this->adjacencyList[$currentNode] as $neighbor) {
                $inDegrees[$neighbor]--;
                
                // Add to queue when in-degree becomes 0
                if ($inDegrees[$neighbor] === 0) {
                    $queue[] = $neighbor;
                }
            }
        }
        
        // If all nodes weren't visited, there's a cycle in the graph
        if ($visitCount !== $this->nodeCount) {
            return null; // Cycle exists, topological sort not possible
        }
        
        return $sorted;
    }
    
    /**
     * Checks if the graph contains a cycle
     * 
     * @return bool True if cycle exists, false otherwise
     */
    public function hasCycle(): bool {
        // Arrays to track visited nodes
        $visited = array_fill(0, $this->nodeCount, false);
        $inPath = array_fill(0, $this->nodeCount, false);
        
        // Check for cycles in all nodes
        for ($node = 0; $node < $this->nodeCount; $node++) {
            if (!$visited[$node]) {
                if ($this->hasCycleHelper($node, $visited, $inPath)) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Helper DFS function for cycle detection
     * 
     * @param int $node Current node
     * @param array $visited Array tracking visited nodes
     * @param array $inPath Array tracking nodes in the current DFS path
     * @return bool True if cycle exists, false otherwise
     */
    private function hasCycleHelper(int $node, array &$visited, array &$inPath): bool {
        // Mark node as visited and in current path
        $visited[$node] = true;
        $inPath[$node] = true;
        
        // Check neighboring nodes
        foreach ($this->adjacencyList[$node] as $neighbor) {
            // If neighbor hasn't been visited, continue from there
            if (!$visited[$neighbor]) {
                if ($this->hasCycleHelper($neighbor, $visited, $inPath)) {
                    return true;
                }
            } 
            // If neighbor is on current path, there's a cycle
            elseif ($inPath[$neighbor]) {
                return true;
            }
        }
        
        // Remove from current path
        $inPath[$node] = false;
        
        return false;
    }
}

/**
 * Example usage of the Topological Sort algorithm
 */
function exampleUsage() {
    echo "Example 1: Course Prerequisite Relationships\n";
    echo "-----------------------------\n";
    
    // Course codes
    $courses = [
        0 => "Mathematics 101",
        1 => "English 101",
        2 => "Programming 101",
        3 => "Physics 101",
        4 => "Mathematics 102",
        5 => "Data Structures"
    ];
    
    // Create graph
    $graph = new TopologicalSort(count($courses));
    
    // Add edges (prerequisite relationships)
    $graph->addEdge(0, 4); // Mathematics 101 -> Mathematics 102
    $graph->addEdge(0, 5); // Mathematics 101 -> Data Structures 
    $graph->addEdge(2, 5); // Programming 101 -> Data Structures
    $graph->addEdge(3, 4); // Physics 101 -> Mathematics 102
    
    // Check for cycles in the graph
    if ($graph->hasCycle()) {
        echo "Graph contains a cycle! Topological sort is not possible.\n";
    } else {
        echo "Graph has no cycles. Topological sort is possible.\n";
        
        // Topological sort using DFS
        $sorted = $graph->topologicalSort();
        
        echo "Topological Sort using DFS:\n";
        foreach ($sorted as $courseIndex) {
            echo "- " . $courses[$courseIndex] . "\n";
        }
        
        // Topological sort using Kahn's algorithm
        $kahnSorted = $graph->kahnTopologicalSort();
        
        echo "\nTopological Sort using Kahn's Algorithm:\n";
        foreach ($kahnSorted as $courseIndex) {
            echo "- " . $courses[$courseIndex] . "\n";
        }
    }
    
    echo "\nExample 2: Graph with Cycle\n";
    echo "------------------------\n";
    
    // Graph with a cycle
    $cyclicGraph = new TopologicalSort(3);
    $cyclicGraph->addEdge(0, 1);
    $cyclicGraph->addEdge(1, 2);
    $cyclicGraph->addEdge(2, 0); // Edge creating a cycle
    
    if ($cyclicGraph->hasCycle()) {
        echo "Graph contains a cycle! Topological sort is not possible.\n";
        
        $kahnSorted = $cyclicGraph->kahnTopologicalSort();
        if ($kahnSorted === null) {
            echo "Kahn's algorithm also detected a cycle.\n";
        }
    } else {
        echo "Graph has no cycles. Topological sort is possible.\n";
    }
}

// Run the example usage
exampleUsage();
?>