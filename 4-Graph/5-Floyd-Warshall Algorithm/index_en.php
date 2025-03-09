<?php

// Defining the Graph class
class Graph {
    public $nodeCount;
    public $distances;

    // Constructor to initialize the graph
    public function __construct($nodeCount) {
        $this->nodeCount = $nodeCount;
        $this->distances = array();

        // Initialize distances to infinity for all nodes
        for ($i = 0; $i < $nodeCount; $i++) {
            for ($j = 0; $j < $nodeCount; $j++) {
                if ($i == $j) {
                    $this->distances[$i][$j] = 0;  // Distance to itself is 0
                } else {
                    $this->distances[$i][$j] = INF;  // Other distances are set to infinity
                }
            }
        }
    }

    // Function to add an edge
    public function addEdge($start, $end, $weight) {
        $this->distances[$start][$end] = $weight;
    }

    // Floyd-Warshall algorithm
    public function floydWarshall() {
        for ($k = 0; $k < $this->nodeCount; $k++) {
            for ($i = 0; $i < $this->nodeCount; $i++) {
                for ($j = 0; $j < $this->nodeCount; $j++) {
                    // If the path i -> k -> j is shorter than the direct path i -> j
                    if ($this->distances[$i][$k] + $this->distances[$k][$j] < $this->distances[$i][$j]) {
                        // Update the shortest path and distance
                        $this->distances[$i][$j] = $this->distances[$i][$k] + $this->distances[$k][$j];
                    }
                }
            }
        }
    }

    // Function to print the results
    public function printResults() {
        echo "Shortest distances:<br>";
        for ($i = 0; $i < $this->nodeCount; $i++) {
            for ($j = 0; $j < $this->nodeCount; $j++) {
                if ($this->distances[$i][$j] == INF) {
                    echo "Node " . $i . " -> Node " . $j . ": Unreachable <br>";
                } else {
                    echo "Node " . $i . " -> Node " . $j . ": " . $this->distances[$i][$j] . "<br>";
                }
            }
        }
    }
}

// Creating an example graph
$graph = new Graph(4);  // A graph with 4 nodes
$graph->addEdge(0, 1, 5);
$graph->addEdge(0, 2, 10);
$graph->addEdge(1, 2, 2);
$graph->addEdge(1, 3, 1);
$graph->addEdge(2, 3, 3);

// Running the Floyd-Warshall algorithm
$graph->floydWarshall();

// Printing the results
$graph->printResults();

?>
