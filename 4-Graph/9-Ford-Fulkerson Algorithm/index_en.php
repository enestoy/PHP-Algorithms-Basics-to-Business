<?php

// Flow network represented by adjacency matrix
$graph = [
    [0, 16, 13, 0, 0, 0],
    [0, 0, 10, 12, 0, 0],
    [0, 4, 0, 0, 14, 0],
    [0, 0, 9, 0, 0, 20],
    [0, 0, 0, 7, 0, 4],
    [0, 0, 0, 0, 0, 0]
];

// BFS to find a path with remaining capacity
function bfs($graph, $source, $sink, &$parentNodes) {
    $nodeCount = count($graph);
    $visitedNodes = array_fill(0, $nodeCount, false);
    $queue = [];
    $visitedNodes[$source] = true;
    $queue[] = $source;
    
    while (count($queue) > 0) {
        $node = array_shift($queue);
        
        // Check neighboring nodes
        for ($i = 0; $i < $nodeCount; $i++) {
            if ($visitedNodes[$i] === false && $graph[$node][$i] > 0) {
                $queue[] = $i;
                $visitedNodes[$i] = true;
                $parentNodes[$i] = $node;
                
                // End the process if the sink is reached
                if ($i == $sink) {
                    return true;
                }
            }
        }
    }
    
    return false;
}

// Ford-Fulkerson algorithm
function fordFulkerson($graph, $source, $sink) {
    $nodeCount = count($graph);
    $parentNodes = array_fill(0, $nodeCount, -1);
    $totalFlow = 0;
    
    // Continue while there's a path with remaining flow
    while (bfs($graph, $source, $sink, $parentNodes)) {
        // Track the path and find the smallest capacity
        $pathFlow = PHP_INT_MAX;
        $node = $sink;
        
        while ($node != $source) {
            $pathFlow = min($pathFlow, $graph[$parentNodes[$node]][$node]);
            $node = $parentNodes[$node];
        }
        
        // Update the flow by following the path
        $node = $sink;
        while ($node != $source) {
            $graph[$parentNodes[$node]][$node] -= $pathFlow;
            $graph[$node][$parentNodes[$node]] += $pathFlow;
            $node = $parentNodes[$node];
        }
        
        // Update the total flow
        $totalFlow += $pathFlow;
    }
    
    return $totalFlow;
}

// Run the algorithm and print the result
$source = 0;
$sink = 5;
$totalFlow = fordFulkerson($graph, $source, $sink);

echo "Maximum Flow: " . $totalFlow . "\n";

?>
