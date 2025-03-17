<?php

// Function to calculate Euclidean distance
function calculateDistance($point1, $point2) {
    return sqrt(pow($point1[0] - $point2[0], 2) + pow($point1[1] - $point2[1], 2));
}

// DBSCAN Algorithm
function dbscan($data, $eps, $minPoints) {
    $clusterNumber = 0;
    $visited = array_fill(0, count($data), false);
    $clustering = array_fill(0, count($data), -1);

    foreach ($data as $index => $point) {
        if ($visited[$index]) continue;
        $visited[$index] = true;

        // Find neighbors
        $neighbors = findNeighbors($data, $index, $eps);

        if (count($neighbors) < $minPoints) {
            $clustering[$index] = 0; // Mark as noise
            continue;
        }

        $clusterNumber++;
        $clustering[$index] = $clusterNumber;
        
        // Process neighbors and add to cluster
        for ($i = 0; $i < count($neighbors); $i++) {
            $neighborIndex = $neighbors[$i];
            if (!$visited[$neighborIndex]) {
                $visited[$neighborIndex] = true;
                $newNeighbors = findNeighbors($data, $neighborIndex, $eps);
                if (count($newNeighbors) >= $minPoints) {
                    $neighbors = array_merge($neighbors, $newNeighbors);
                }
            }
            if ($clustering[$neighborIndex] === -1) {
                $clustering[$neighborIndex] = $clusterNumber;
            }
        }
    }
    return $clustering;
}

// Function to find neighbors within the given eps distance for a point
function findNeighbors($data, $index, $eps) {
    $neighbors = [];
    foreach ($data as $i => $point) {
        if ($i !== $index && calculateDistance($data[$index], $point) <= $eps) {
            $neighbors[] = $i;
        }
    }
    return $neighbors;
}

// Function to generate random data points
function generateRandomDataPoints($count, $min, $max) {
    $data = [];
    for ($i = 0; $i < $count; $i++) {
        $data[] = [rand($min, $max), rand($min, $max)];
    }
    return $data;
}

// Create sample data set and apply DBSCAN
$dataPoints = generateRandomDataPoints(20, 0, 100);
$eps = 15; // Neighborhood distance
$minPoints = 3; // Minimum number of points
$result = dbscan($dataPoints, $eps, $minPoints);

// Print the results
foreach ($result as $index => $cluster) {
    echo "Point (" . $dataPoints[$index][0] . ", " . $dataPoints[$index][1] . ") -> Cluster: " . ($cluster === 0 ? 'Noise' : $cluster) . "<br>";
}

?>
