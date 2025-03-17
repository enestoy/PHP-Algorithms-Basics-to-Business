<?php

// Generate random data points
function generateRandomDataPoints($count, $min, $max) {
    $data = [];
    for ($i = 0; $i < $count; $i++) {
        $data[] = [rand($min, $max), rand($min, $max)];
    }
    return $data;
}

// Calculate Euclidean distance
function calculateDistance($point1, $point2) {
    return sqrt(pow($point1[0] - $point2[0], 2) + pow($point1[1] - $point2[1], 2));
}

// K-Means Clustering Algorithm
function kMeans($data, $k, $iterationCount = 100) {
    // Choose random centroids
    $centroids = array_slice($data, 0, $k);
    $clustering = [];

    for ($i = 0; $i < $iterationCount; $i++) {
        // Reset the clusters
        $clustering = array_fill(0, $k, []);

        // Assign each data point to the nearest centroid
        foreach ($data as $point) {
            $closestCentroid = 0;
            $smallestDistance = calculateDistance($point, $centroids[0]);
            
            for ($j = 1; $j < $k; $j++) {
                $distance = calculateDistance($point, $centroids[$j]);
                if ($distance < $smallestDistance) {
                    $smallestDistance = $distance;
                    $closestCentroid = $j;
                }
            }
            
            $clustering[$closestCentroid][] = $point;
        }

        // Recalculate the centroids
        for ($j = 0; $j < $k; $j++) {
            if (!empty($clustering[$j])) {
                $xSum = array_sum(array_column($clustering[$j], 0));
                $ySum = array_sum(array_column($clustering[$j], 1));
                $centroids[$j] = [
                    $xSum / count($clustering[$j]),
                    $ySum / count($clustering[$j])
                ];
            }
        }
    }
    return [$centroids, $clustering];
}

// Create sample data set and cluster
$dataPoints = generateRandomDataPoints(20, 0, 100);
$k = 3; // Number of clusters
list($centroids, $clustering) = kMeans($dataPoints, $k);

// Print the results
foreach ($clustering as $index => $cluster) {
    echo "<b>Cluster " . ($index + 1) . "</b>:<br>";
    foreach ($cluster as $point) {
        echo "(" . $point[0] . ", " . $point[1] . ")<br>";
    }
    echo "<br>";
}
?>
