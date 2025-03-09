<?php

// Graph represented as a 2D array (adjacency matrix)
$graph = [
    [0, 2, 0, 6, 0],
    [2, 0, 3, 8, 5],
    [0, 3, 0, 0, 7],
    [6, 8, 0, 0, 9],
    [0, 5, 7, 9, 0]
];

// Prim's Algorithm
function primAlgorithm($graph) {
    $nodeCount = count($graph);
    
    // Arrays to store the smallest weights
    $keyValues = array_fill(0, $nodeCount, PHP_INT_MAX);
    $parentNodes = array_fill(0, $nodeCount, -1);
    
    // Starting node
    $keyValues[0] = 0;
    
    // Array to check if nodes are visited
    $visitedNodes = array_fill(0, $nodeCount, false);
    
    // Loop until all nodes are visited
    for ($i = 0; $i < $nodeCount - 1; $i++) {
        // Select the node with the smallest key value
        $minKey = PHP_INT_MAX;
        $minNode = -1;
        
        for ($j = 0; $j < $nodeCount; $j++) {
            if (!$visitedNodes[$j] && $keyValues[$j] < $minKey) {
                $minKey = $keyValues[$j];
                $minNode = $j;
            }
        }
        
        // Mark the selected node as visited
        $visitedNodes[$minNode] = true;
        
        // Update key values for neighboring nodes
        for ($j = 0; $j < $nodeCount; $j++) {
            if ($graph[$minNode][$j] && !$visitedNodes[$j] && $graph[$minNode][$j] < $keyValues[$j]) {
                $keyValues[$j] = $graph[$minNode][$j];
                $parentNodes[$j] = $minNode;
            }
        }
    }
    
    // Print results
    echo "Minimum Spanning Tree (MST):<br>";
    for ($i = 1; $i < $nodeCount; $i++) {
        echo "Node $i, parent node: " . $parentNodes[$i] . ", Weight: " . $graph[$parentNodes[$i]][$i] . "<br>";
    }
}

// Run the algorithm
primAlgorithm($graph);

?>
