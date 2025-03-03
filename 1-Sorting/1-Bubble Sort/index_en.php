<?php

// Bubble Sort function
function bubbleSort($array) {
    $elementsCount = count($array);
    
    for ($i = 0; $i < $elementsCount - 1; $i++) {
        // In each pass, the largest elements are pushed to the end
        for ($j = 0; $j < $elementsCount - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Swap the elements
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    
    return $array;
}

// Example array for testing
$numbers = [5, 3, 8, 4, 2];

// Sorting the array
$sortedNumbers = bubbleSort($numbers);

// Display the result
echo "<pre style='color:white; background-color:rgb(9, 117, 18); border: 1px solid #ccc; padding: 10px;'>";
echo "Sorted List: ";
print_r($sortedNumbers);
echo "</pre>";

?>
