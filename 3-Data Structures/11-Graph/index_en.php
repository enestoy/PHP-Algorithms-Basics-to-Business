<?php

// Class representing a Graph data structure
class Graph
{
    private $adjacencyList = []; // Adjacency list representing the graph

    // Adds a new node to the graph
    public function addNode($node)
    {
        if (!isset($this->adjacencyList[$node])) {
            $this->adjacencyList[$node] = [];
        }
    }

    // Adds an edge between two nodes (undirected graph)
    public function addEdge($node1, $node2)
    {
        $this->addNode($node1);
        $this->addNode($node2);

        // Since it's an undirected graph, an edge is added in both directions
        $this->adjacencyList[$node1][] = $node2;
        $this->adjacencyList[$node2][] = $node1;
    }

    // BFS (Breadth-First Search) algorithm
    public function BFS($startNode)
    {
        $visited = []; // Keeps track of visited nodes
        $queue = new SplQueue(); // Queue data structure for BFS

        // Enqueue the start node and mark it as visited
        $queue->enqueue($startNode);
        $visited[$startNode] = true;

        echo "BFS Traversal Result: ";

        while (!$queue->isEmpty()) {
            $currentNode = $queue->dequeue(); // Dequeue a node
            echo $currentNode . " "; // Print the node

            // Traverse the neighbors of the current node
            foreach ($this->adjacencyList[$currentNode] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    $visited[$neighbor] = true; // Mark the neighbor as visited
                    $queue->enqueue($neighbor); // Enqueue the neighbor
                }
            }
        }

        echo "\n";
    }

    // Prints the graph's adjacency list
    public function printGraph()
    {
        echo "Graph Adjacency List:<br>";
        foreach ($this->adjacencyList as $node => $neighbors) {
            echo $node . " -> " . implode(", ", $neighbors) . "<br>";
        }
    }
}

// Example Usage
$graph = new Graph();

// Add nodes and edges
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "E");
$graph->addEdge("D", "E");

// Print the graph
$graph->printGraph();

// Perform BFS traversal
$graph->BFS("A");
