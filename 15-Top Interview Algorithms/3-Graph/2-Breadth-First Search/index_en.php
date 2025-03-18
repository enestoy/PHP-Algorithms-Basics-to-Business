<?php

/*

Interview Question:

A graph representing the connections between metro stations in a city is given.
This graph is represented as an adjacency list.
Your task is to find all stations that can be reached from a given metro station with the least number of transfers.
This should be implemented using the BFS algorithm.

*/

/**
 * Uses the BFS algorithm to find all reachable metro stations from a given station.
 *
 * @param array $graph The graph representing metro station connections.
 * @param string $startStation The starting station.
 * @return array List of all reachable stations.
*/

function bfsFindStations(array $graph, string $startStation): array
{
    // Create an array to keep track of visited stations.
    $visited = [];

    // Create a queue to implement the BFS algorithm.
    $queue = new SplQueue();

    // Add the starting station to the queue and mark it as visited.
    $queue->enqueue($startStation);
    $visited[$startStation] = true;

    // Apply the BFS algorithm until the queue is empty.
    while (!$queue->isEmpty()) {
        // Dequeue the front station.
        $currentStation = $queue->dequeue();

        // Iterate through the neighboring stations.
        foreach ($graph[$currentStation] as $neighborStation) {
            // If the neighboring station has not been visited, continue processing.
            if (!isset($visited[$neighborStation])) {
                // Mark the neighboring station as visited.
                $visited[$neighborStation] = true;

                // Add the neighboring station to the queue.
                $queue->enqueue($neighborStation);
            }
        }
    }

    // Return the list of visited stations.
    return array_keys($visited);
}

// Example usage:
$metroGraph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D', 'E'],
    'C' => ['A', 'F'],
    'D' => ['B'],
    'E' => ['B', 'F'],
    'F' => ['C', 'E'],
    'G' => [] // Station G has no connections
];

$startStation = 'A';
$result = bfsFindStations($metroGraph, $startStation);

echo "Starting station: $startStation<br>";
echo "Reachable stations: " . implode(', ', $result) . "<br>";

?>
