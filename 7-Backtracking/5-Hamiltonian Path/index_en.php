<?php

// Function to check if the Hamiltonian Path is valid for the current step
function isValidHamiltonianPath($graph, $path, $node, $step) {
    // If the node has already been visited, it's not valid
    for ($i = 0; $i < $step; $i++) {
        if ($path[$i] == $node) {
            return false;
        }
    }

    // If the node is not a neighbor of the previous node, it's not valid
    if ($graph[$path[$step - 1]][$node] == 0) {
        return false;
    }

    return true; // If valid, return true
}

// Backtracking function to find the Hamiltonian Path
function findHamiltonianPath($graph, &$path, $step) {
    // If all nodes are visited, a valid path has been found
    if ($step == count($graph)) {
        return true;
    }

    // Try each node
    for ($node = 0; $node < count($graph); $node++) {
        if (isValidHamiltonianPath($graph, $path, $node, $step)) {
            // If it's a valid node, add it to the path
            $path[$step] = $node;

            // Try to find the next step
            if (findHamiltonianPath($graph, $path, $step + 1)) {
                return true;
            }

            // If no solution is found, backtrack
            $path[$step] = -1;
        }
    }

    // If no solution is found, return false
    return false;
}

// Main function: Starts the Hamiltonian Path search
function hamiltonianPathSolver($graph) {
    $path = array_fill(0, count($graph), -1); // Initialize the path with no nodes
    $path[0] = 0; // Set the first node as the starting point

    if (findHamiltonianPath($graph, $path, 1)) {
        echo "Hamiltonian Path found:\n";
        foreach ($path as $node) {
            echo $node . " ";
        }
        echo "\n";
    } else {
        echo "No valid Hamiltonian Path found.\n";
    }
}

// Example usage (graph is represented as an adjacency matrix)
// Here, each node's neighbors are listed in the matrix.
$graph = [
    [0, 1, 0, 1, 0], // Node 0: Neighbors are 1 and 3
    [1, 0, 1, 1, 0], // Node 1: Neighbors are 0, 2, and 3
    [0, 1, 0, 0, 1], // Node 2: Neighbors are 1 and 4
    [1, 1, 0, 0, 0], // Node 3: Neighbors are 0 and 1
    [0, 0, 1, 0, 0]  // Node 4: Neighbors are 2
];

hamiltonianPathSolver($graph);

?>
