<?php

// Defining the Graph class
class Graph {
    public $nodeCount;
    public $graph;

    public function __construct($nodeCount) {
        $this->nodeCount = $nodeCount;
        $this->graph = array();

        for ($i = 0; $i < $nodeCount; $i++) {
            $this->graph[$i] = array_fill(0, $nodeCount, INF);  // Initially setting infinite distance for each node
        }
    }

    // Function to add edges between nodes
    public function addEdge($start, $end, $distance) {
        $this->graph[$start][$end] = $distance;
        $this->graph[$end][$start] = $distance; // If it's an undirected graph
    }

    // Dijkstra's algorithm
    public function dijkstra($startNode) {
        $distances = array_fill(0, $this->nodeCount, INF);
        $distances[$startNode] = 0;

        $visited = array_fill(0, $this->nodeCount, false);
        $previousNode = array_fill(0, $this->nodeCount, -1);

        for ($i = 0; $i < $this->nodeCount - 1; $i++) {
            $minDistance = INF;
            $minNode = -1;

            // Find the unvisited node with the minimum distance
            for ($j = 0; $j < $this->nodeCount; $j++) {
                if (!$visited[$j] && $distances[$j] < $minDistance) {
                    $minDistance = $distances[$j];
                    $minNode = $j;
                }
            }

            // Visit the found node
            $visited[$minNode] = true;

            // Update neighboring nodes
            for ($j = 0; $j < $this->nodeCount; $j++) {
                if (!$visited[$j] && $this->graph[$minNode][$j] != INF) {
                    $newDistance = $distances[$minNode] + $this->graph[$minNode][$j];
                    if ($newDistance < $distances[$j]) {
                        $distances[$j] = $newDistance;
                        $previousNode[$j] = $minNode;
                    }
                }
            }
        }

        return array($distances, $previousNode);
    }

    // Return the shortest path
    public function shortestPath($startNode, $endNode) {
        list($distances, $previousNode) = $this->dijkstra($startNode);
        $path = array();
        $currentNode = $endNode;

        while ($currentNode != -1) {
            array_unshift($path, $currentNode);
            $currentNode = $previousNode[$currentNode];
        }

        return array($distances[$endNode], $path);
    }
}

// Creating an example graph
$graph = new Graph(6);  // A graph with 6 nodes
$graph->addEdge(0, 1, 7);
$graph->addEdge(0, 2, 9);
$graph->addEdge(0, 5, 14);
$graph->addEdge(1, 2, 10);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 11);
$graph->addEdge(2, 5, 2);
$graph->addEdge(3, 4, 6);
$graph->addEdge(4, 5, 9);

// Find the shortest path from start node to target node
list($distance, $path) = $graph->shortestPath(0, 4);

// Print the results
echo "Shortest distance: " . $distance . "\n";
echo "Shortest path: " . implode(" -> ", $path) . "\n";

?>
