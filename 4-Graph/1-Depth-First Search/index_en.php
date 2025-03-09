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

    public function depthFirstSearch(string $start, array &$visitedNodes = []): array {
        if (!in_array($start, $visitedNodes)) {
            $visitedNodes[] = $start;
            foreach ($this->adjacencyList[$start] as $neighbor) {
                $this->depthFirstSearch($neighbor, $visitedNodes);
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

// Run DFS
$result = $graph->depthFirstSearch("A");

// Print result
echo "Depth First Search Result: " . implode(" -> ", $result);
