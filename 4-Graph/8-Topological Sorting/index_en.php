<?php

// Directed graph represented by adjacency list
$graph = [
    0 => [2, 3],
    1 => [2],
    2 => [3],
    3 => []
];

// Topological sort function
function topologicalSort($graph) {
    $nodeCount = count($graph);
    $visitedNodes = array_fill(0, $nodeCount, false); // Track visited nodes
    $result = []; // Array to store the result of topological sorting
    
    // DFS function
    function dfs($node, &$graph, &$visitedNodes, &$result) {
        $visitedNodes[$node] = true;
        
        // Check neighbors
        foreach ($graph[$node] as $neighbor) {
            if (!$visitedNodes[$neighbor]) {
                dfs($neighbor, $graph, $visitedNodes, $result);
            }
        }
        
        // Add node to the result at the end
        $result[] = $node;
    }
    
    // Visit all nodes
    for ($i = 0; $i < $nodeCount; $i++) {
        if (!$visitedNodes[$i]) {
            dfs($i, $graph, $visitedNodes, $result);
        }
    }
    
    // Reverse the result and return
    return array_reverse($result);
}

// Run the algorithm and print the result
$result = topologicalSort($graph);

echo "Topological Sort: ";
foreach ($result as $node) {
    echo $node . " ";
}

?>
