<?php

// Function to generate random data points
function generateRandomDataPoints($count, $min, $max) {
    $data = [];
    for ($i = 0; $i < $count; $i++) {
        $data[] = [rand($min, $max), rand($min, $max)];
    }
    return $data;
}

// Function to calculate Euclidean distance
function calculateDistance($point1, $point2) {
    return sqrt(pow($point1[0] - $point2[0], 2) + pow($point1[1] - $point2[1], 2));
} 

// Function to find the nearest neighbors
function findNearestNeighbors($data, $targetPoint, $k) {
    $distances = [];

    // Calculate distances for all data points
    foreach ($data as $point) {
        $distances[] = [
            'point' => $point,
            'distance' => calculateDistance($point, $targetPoint)
        ];
    }

    // Sort by distance
    usort($distances, fn($a, $b) => $a['distance'] <=> $b['distance']);

    // Return the closest k neighbors
    return array_slice($distances, 0, $k);
}

// Create sample data points
$dataPoints = generateRandomDataPoints(10, 0, 100);
$targetPoint = [50, 50]; // Target point
$k = 3; // Find the closest 3 neighbors
$nearestNeighbors = findNearestNeighbors($dataPoints, $targetPoint, $k);

// Print the results
echo "<b>Target Point:</b> (" . $targetPoint[0] . ", " . $targetPoint[1] . ")<br><br>";
echo "<b>Nearest $k Neighbors:</b><br>";
foreach ($nearestNeighbors as $neighbor) {
    echo "(" . $neighbor['point'][0] . ", " . $neighbor['point'][1] . ") - Distance: " . round($neighbor['distance'], 2) . "<br>";
}

?>
