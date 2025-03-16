<?php
/**
 * Prim's Algorithm (Minimum Spanning Tree) Implementation
 * 
 * This application uses Prim's algorithm to find the minimum spanning tree (MST) of a weighted, connected graph.
 */

/**
 * Graph class - Holds the nodes and edges.
 */
class Graph {
    private $nodeCount;
    private $adjacencyMatrix;
    
    /**
     * Graph constructor
     * 
     * @param int $nodeCount Number of nodes in the graph
     */
    public function __construct($nodeCount) {
        $this->nodeCount = $nodeCount;
        
        // Initialize the adjacency matrix (all values set to INF)
        $this->adjacencyMatrix = array_fill(0, $nodeCount, array_fill(0, $nodeCount, PHP_INT_MAX));
        
        // Set the edges to 0 for the node to itself
        for ($i = 0; $i < $nodeCount; $i++) {
            $this->adjacencyMatrix[$i][$i] = 0;
        }
    }
    
    /**
     * Add an edge to the graph
     * 
     * @param int $source The source node of the edge
     * @param int $target The target node of the edge
     * @param int $weight The weight of the edge
     */
    public function addEdge($source, $target, $weight) {
        // Set the same weight for both directions (undirected graph)
        $this->adjacencyMatrix[$source][$target] = $weight;
        $this->adjacencyMatrix[$target][$source] = $weight;
    }
    
    /**
     * Find the node with the minimum key value that is not yet included in MST
     * 
     * @param array $keys Key values of the nodes
     * @param array $mstSet MST set that tracks the included nodes
     * @return int Index of the node with the minimum key value
     */
    private function minimumKeyNode($keys, $mstSet) {
        $min = PHP_INT_MAX;
        $minIndex = -1;
        
        for ($v = 0; $v < $this->nodeCount; $v++) {
            if ($mstSet[$v] == false && $keys[$v] < $min) {
                $min = $keys[$v];
                $minIndex = $v;
            }
        }
        
        return $minIndex;
    }
    
    /**
     * Use Prim's algorithm to construct and display the MST
     * 
     * @param int $startNode The node to start the MST construction
     */
    public function primMST($startNode = 0) {
        // Array to store the MST
        $parent = array_fill(0, $this->nodeCount, -1);
        
        // Key values to track the minimum edge weight
        $keys = array_fill(0, $this->nodeCount, PHP_INT_MAX);
        
        // Array to track the nodes included in MST
        $mstSet = array_fill(0, $this->nodeCount, false);
        
        // Set the starting node key value to 0
        $keys[$startNode] = 0;
        
        // MST will contain |V| nodes
        for ($counter = 0; $counter < $this->nodeCount; $counter++) {
            // Choose the node with the minimum key value to add to the MST
            $u = $this->minimumKeyNode($keys, $mstSet);
            
            // Add the chosen node to MST set
            $mstSet[$u] = true;
            
            // Update the key values of adjacent nodes
            for ($v = 0; $v < $this->nodeCount; $v++) {
                // If there is an edge u-v, v is not in MST, and edge weight is smaller than the current key value
                if (
                    $this->adjacencyMatrix[$u][$v] != PHP_INT_MAX &&
                    $mstSet[$v] == false &&
                    $this->adjacencyMatrix[$u][$v] < $keys[$v]
                ) {
                    // Update key value and parent index
                    $parent[$v] = $u;
                    $keys[$v] = $this->adjacencyMatrix[$u][$v];
                }
            }
        }
        
        // Display the MST
        $this->displayMST($parent);
    }
    
    /**
     * Display the constructed MST
     * 
     * @param array $parent The parent node of each node in the MST
     */
    private function displayMST($parent) {
        $totalCost = 0;
        
        echo "Edge Weight<br>";
        for ($i = 1; $i < $this->nodeCount; $i++) {
            echo $parent[$i] . " - " . $i . " - " . $this->adjacencyMatrix[$i][$parent[$i]] . "<br>";
            $totalCost += $this->adjacencyMatrix[$i][$parent[$i]];
        }
        
        echo "Total Cost of Minimum Spanning Tree: " . $totalCost . "<br>";
    }
}

// Example usage
echo "Prim's Algorithm for Minimum Spanning Tree (MST) Example:<br>";

// Create a graph with 5 nodes
$graph = new Graph(5);

// Add edges (source, target, weight)
$graph->addEdge(0, 1, 2);
$graph->addEdge(0, 3, 6);
$graph->addEdge(1, 2, 3);
$graph->addEdge(1, 3, 8);
$graph->addEdge(1, 4, 5);
$graph->addEdge(2, 4, 7);
$graph->addEdge(3, 4, 9);

// Compute and display the MST
$graph->primMST();
?>
