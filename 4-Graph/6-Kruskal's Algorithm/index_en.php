<?php

// Edge class
class Edge {
    public $start;
    public $end;
    public $weight;

    public function __construct($start, $end, $weight) {
        $this->start = $start;
        $this->end = $end;
        $this->weight = $weight;
    }
}

// Graph class
class Graph {
    private $nodeCount;
    private $edges;

    /**
     * Constructor
     * @param mixed $nodeCount The number of nodes in the graph
     * @return void
     */
    public function __construct($nodeCount) {
        $this->nodeCount = $nodeCount;
        $this->edges = array(); // Array to hold edges
    }

    /**
     * Function to get the number of nodes in the graph
     * @return int $nodeCount
     */
    public function getNodeCount() {
        return $this->nodeCount;
    }

    /**
     * Function to add an edge
     * @param mixed $start The starting node
     * @param mixed $end The ending node
     * @param mixed $weight The weight of the edge
     * @return void
     */
    public function addEdge($start, $end, $weight) {
        $this->edges[] = new Edge($start, $end, $weight);
    }

    /**
     * Find the set of a node (Union-Find)
     * @param mixed $nodes Array of nodes
     * @param mixed $node The node to search
     * @return mixed
     */
    private function findSet($nodes, $node) {
        if ($nodes[$node] == $node) {
            return $node;
        }
        // Recursively find the set
        return $this->findSet($nodes, $nodes[$node]);
    }

    /**
     * Union of two sets
     * @param mixed $nodes Array of nodes
     * @param mixed $node1 The first node
     * @param mixed $node2 The second node
     * @return void
     */
    private function unionSets($nodes, $node1, $node2) {
        $set1 = $this->findSet($nodes, $node1);
        $set2 = $this->findSet($nodes, $node2);

        // Connect set1 to set2
        if ($set1 != $set2) {
            $nodes[$set1] = $set2;
        }
    }

    /**
     * Calculate MST using Kruskal's algorithm
     * @return array $mst Minimum Spanning Tree (MST)
     */
    public function kruskal() {
        $nodes = array();
        $mst = array(); // Minimum Spanning Tree

        // Initially, each node is in its own set
        foreach ($this->edges as $edge) {
            $nodes[$edge->start] = $edge->start;
            $nodes[$edge->end] = $edge->end;
        }

        // Sort edges by weight in ascending order
        usort($this->edges, function($a, $b) {
            return $a->weight - $b->weight;
        });

        // Process the edges
        foreach ($this->edges as $edge) {
            $startSet = $this->findSet($nodes, $edge->start);
            $endSet = $this->findSet($nodes, $edge->end);

            // If the start and end nodes are in different sets, add the edge to MST
            if ($startSet != $endSet) {
                $mst[] = $edge;  // Add to MST
                $this->unionSets($nodes, $edge->start, $edge->end); // Union the sets
            }
        }

        return $mst;
    }

    /**
     * Print the MST
     * @param array $mst Minimum Spanning Tree (MST)
     * @return void
     */
    public function printMST($mst) {
        echo "Minimum Spanning Tree (MST):\n";
        foreach ($mst as $edge) {
            echo "Node " . $edge->start . " -> Node " . $edge->end . " (Weight: " . $edge->weight . ")\n";
        }
    }
}

// Example usage to start the graph:
$graph = new Graph(5); // A graph with 5 nodes
echo "The number of nodes in the graph: " . $graph->getNodeCount() . "\n";

// Add edges:
$graph->addEdge("A", "B", 1);
$graph->addEdge("B", "C", 2);
$graph->addEdge("A", "C", 3);
$graph->addEdge("C", "D", 4);
$graph->addEdge("B", "D", 2);

// Run Kruskal's algorithm
$mst = $graph->kruskal();

// Print the results
$graph->printMST($mst);

?>
