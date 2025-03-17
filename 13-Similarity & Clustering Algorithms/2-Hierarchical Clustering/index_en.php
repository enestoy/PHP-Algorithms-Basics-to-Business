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

// Hierarchical Clustering Algorithm
function hierarchicalClustering($data) {
    $clusterCount = count($data);
    $clusters = array_map(fn($point) => [$point], $data);
    
    while ($clusterCount > 1) {
        $minDistance = PHP_FLOAT_MAX;
        $clustersToMerge = [0, 0];

        // Find the two closest clusters
        for ($i = 0; $i < count($clusters); $i++) {
            for ($j = $i + 1; $j < count($clusters); $j++) {
                $averageDistance = 0;
                foreach ($clusters[$i] as $point1) {
                    foreach ($clusters[$j] as $point2) {
                        $averageDistance += calculateDistance($point1, $point2);
                    }
                }
                $averageDistance /= (count($clusters[$i]) * count($clusters[$j]));

                if ($averageDistance < $minDistance) {
                    $minDistance = $averageDistance;
                    $clustersToMerge = [$i, $j];
                }
            }
        }

        // Merge the clusters
        $clusters[$clustersToMerge[0]] = array_merge($clusters[$clustersToMerge[0]], $clusters[$clustersToMerge[1]]);
        unset($clusters[$clustersToMerge[1]]);
        $clusters = array_values($clusters);
        
        $clusterCount--;
    }
    
    return $clusters;
}

// Create sample data points and cluster
$dataPoints = generateRandomDataPoints(10, 0, 100);
$finalCluster = hierarchicalClustering($dataPoints);

// Print the results
foreach ($finalCluster as $index => $cluster) {
    echo "<b>Cluster " . ($index + 1) . "</b>:<br>";
    foreach ($cluster as $point) {
        echo "(" . $point[0] . ", " . $point[1] . ")<br>";
    }
    echo "<br>";
}

?>
