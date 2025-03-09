<?php

class Graph {
    private array $adjacencyList;

    public function __construct() {
        $this->adjacencyList = [];
    }

    public function addNode(string $node): void {
        if (!isset($this->adjacencyList[$node])) {
            $this->adjacencyList[$node] = [];
        }
    }

    public function addEdge(string $source, string $destination): void {
        $this->adjacencyList[$source][] = $destination;
        $this->adjacencyList[$destination][] = $source;
    }

    public function breadthFirstSearch(string $start): array {
        $visitedNodes = [];
        $queue = [$start];

        while (!empty($queue)) {
            $node = array_shift($queue);

            if (!in_array($node, $visitedNodes)) {
                $visitedNodes[] = $node;
                foreach ($this->adjacencyList[$node] as $neighbor) {
                    if (!in_array($neighbor, $visitedNodes)) {
                        $queue[] = $neighbor;
                    }
                }
            }
        }

        return $visitedNodes;
    }
}

// Create graph
$graph = new Graph();
$graph->addNode("A");
$graph->addNode("B");
$graph->addNode("C");
$graph->addNode("D");
$graph->addNode("E");

// Add edges
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "E");
$graph->addEdge("D", "E");

// Run BFS
$result = $graph->breadthFirstSearch("A");

// Print result
echo "Breadth First Search Result: " . implode(" -> ", $result);
