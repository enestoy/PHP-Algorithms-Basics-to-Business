<?php
/* 
Interview Question:

In a city, there are different locations (e.g., buildings or landmarks) connected by roads, and each road has a specific distance (cost). 
These connections are represented as a graph using an adjacency list, where each edge has a weight. 
Your task is to find the shortest paths (least-cost paths) from a given starting point to all other locations. 
You must implement this using Dijkstra’s Algorithm.
*/

/**
 * Finds the shortest paths from a starting point to all other locations using Dijkstra’s Algorithm.
 *
 * @param array $graph The graph representing locations and their distances.
 * @param string $startPoint The starting location.
 * @return array Shortest distances from the starting point to all other locations.
 */

function dijkstra(array $graph, string $startPoint): array
{
    // Initialize distances with infinity (INF).
    $distances = [];
    foreach (array_keys($graph) as $node) {
        $distances[$node] = INF;
    }
    $distances[$startPoint] = 0; // The starting point has a distance of 0.

    // Keep track of visited nodes.
    $visited = [];

    // Continue until all nodes are visited.
    while (count($visited) < count($graph)) {
        // Find the unvisited node with the shortest distance.
        $currentNode = null;
        foreach (array_keys($graph) as $node) {
            if (!in_array($node, $visited) && ($currentNode === null || $distances[$node] < $distances[$currentNode])) {
                $currentNode = $node;
            }
        }

        // Update distances for neighboring nodes.
        foreach ($graph[$currentNode] as $neighbor => $distance) {
            if (!in_array($neighbor, $visited)) {
                $newDistance = $distances[$currentNode] + $distance;
                if ($newDistance < $distances[$neighbor]) {
                    $distances[$neighbor] = $newDistance;
                }
            }
        }

        // Mark the current node as visited.
        $visited[] = $currentNode;
    }

    return $distances;
}

// Example usage:
$graph = [
    'A' => ['B' => 1, 'C' => 4],
    'B' => ['A' => 1, 'C' => 2, 'D' => 5],
    'C' => ['A' => 4, 'B' => 2, 'D' => 1],
    'D' => ['B' => 5, 'C' => 1]
];

$startPoint = 'A';
$result = dijkstra($graph, $startPoint);

echo "Starting point: $startPoint<br>";
echo "Shortest distances:<br>";
print_r($result);

// Expected Output:
/*
[
    'A' => 0,
    'B' => 1,
    'C' => 3,
    'D' => 4
]
*/

?>
