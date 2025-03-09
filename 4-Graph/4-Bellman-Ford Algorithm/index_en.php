<?php

// Defining the Graph class
class Graph {
    public $nodeCount;
    public $edges;

    public function __construct($nodeCount) {
        $this->nodeCount = $nodeCount;
        $this->edges = array();
    }

    // Function to add an edge
    public function addEdge($start, $end, $weight) {
        $this->edges[] = array('start' => $start, 'end' => $end, 'weight' => $weight);
    }

    // Bellman-Ford algorithm
    public function bellmanFord($startNode) {
        $distances = array_fill(0, $this->nodeCount, INF); // Start with infinite distances
        $distances[$startNode] = 0; // Set the distance of the start node to zero

        // Check the edges V-1 times (V is the number of nodes)
        for ($i = 0; $i < $this->nodeCount - 1; $i++) {
            foreach ($this->edges as $edge) {
                $start = $edge['start'];
                $end = $edge['end'];
                $weight = $edge['weight'];

                // If a shorter path to the start node is found, update the distance
                if ($distances[$start] != INF && $distances[$start] + $weight < $distances[$end]) {
                    $distances[$end] = $distances[$start] + $weight;
                }
            }
        }

        // Check for negative weight cycles
        foreach ($this->edges as $edge) {
            $start = $edge['start'];
            $end = $edge['end'];
            $weight = $edge['weight'];

            if ($distances[$start] != INF && $distances[$start] + $weight < $distances[$end]) {
                echo "Negative weight cycle detected.\n";
                return;
            }
        }

        return $distances;
    }
}

// Creating an example graph
$graph = new Graph(5);  // A graph with 5 nodes
$graph->addEdge(0, 1, -1);
$graph->addEdge(0, 2, 4);
$graph->addEdge(1, 2, 3);
$graph->addEdge(1, 3, 2);
$graph->addEdge(1, 4, 2);
$graph->addEdge(3, 2, 5);
$graph->addEdge(3, 1, 1);
$graph->addEdge(4, 3, -3);

// Running the Bellman-Ford algorithm and printing the results
$distances = $graph->bellmanFord(0);

if ($distances !== null) {
    echo "Shortest distances from the start node to other nodes:\n";
    for ($i = 0; $i < count($distances); $i++) {
        echo "Node " . $i . ": " . ($distances[$i] == INF ? "Unreachable" : $distances[$i]) . "\n";
    }
}

?>
