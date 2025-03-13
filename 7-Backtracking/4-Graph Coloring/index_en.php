<?php

// Function to check if it is valid to assign a color to a neighboring node
function isValidColorAssignment($graph, $nodes, $node, $color) {
    // Check all neighbors
    foreach ($graph[$node] as $neighbor) {
        // If the neighbor has the same color, it's not valid
        if ($nodes[$neighbor] == $color) {
            return false;
        }
    }
    return true; // If valid, return true
}

// Backtracking function to color the graph
function colorGraph($graph, $totalColors, &$nodes, $node) {
    // If all nodes are colored, a solution is found
    if ($node == count($graph)) {
        return true;
    }

    // Try each color
    for ($color = 1; $color <= $totalColors; $color++) {
        if (isValidColorAssignment($graph, $nodes, $node, $color)) {
            // If the color is valid, assign it to the node
            $nodes[$node] = $color;

            // Try to color the next node
            if (colorGraph($graph, $totalColors, $nodes, $node + 1)) {
                return true;
            }

            // If no solution is found, backtrack and remove the color
            $nodes[$node] = 0;
        }
    }

    // If no solution is found after trying all colors, return false
    return false;
}

// Main function to start the graph coloring process
function graphColoring($graph, $totalColors) {
    $nodes = array_fill(0, count($graph), 0); // Initialize the colors for nodes, all set to 0 (no color)

    if (colorGraph($graph, $totalColors, $nodes, 0)) {
        // If a solution is found, print the colors of the nodes
        echo "Graph coloring solution:\n";
        foreach ($nodes as $node => $color) {
            echo "Node " . $node . " => Color " . $color . "\n";
        }
    } else {
        echo "No valid solution found.\n"; // If no solution is found
    }
}

// Example usage (graph is represented as an adjacency list)
// Here, each node's neighbors are listed.
$graph = [
    [1, 2],       // Node 0: Neighbors are 1 and 2
    [0, 2, 3],    // Node 1: Neighbors are 0, 2, and 3
    [0, 1, 3],    // Node 2: Neighbors are 0, 1, and 3
    [1, 2]        // Node 3: Neighbors are 1 and 2
];

$totalColors = 3; // The total number of colors to be used
graphColoring($graph, $totalColors);

?>
