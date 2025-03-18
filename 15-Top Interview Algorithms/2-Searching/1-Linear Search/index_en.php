<?php

/* 
Interview Question:

A company stores its employees' salary information in an array.
We need to check whether a specific salary value exists in this array, and if it does, return its index.
If the salary is not found in the array, we should return -1.
*/

/**
 * Finds the index of a specific salary in the array using the Linear Search algorithm.
 *
 * @param array $salaries The array containing salary values.
 * @param int $targetSalary The salary value to search for.
 * @return int The index of the salary if found, or -1 if not found.
 */

function linearSearch(array $salaries, int $targetSalary): int
{
    // Get the size of the array.
    $arraySize = count($salaries);

    // Perform a linear search through the array.
    for ($i = 0; $i < $arraySize; $i++) {
        // If the target salary is found, return its index.
        if ($salaries[$i] === $targetSalary) {
            return $i;
        }
    }

    // If the target salary is not found, return -1.
    return -1;
}

// Example usage:
$salaries = [3000, 4500, 5000, 6000, 7500];
$targetSalary = 5000;

// Expected Output: 2 (Salary 5000 is at index 2 in the array)

$result = linearSearch($salaries, $targetSalary);

if ($result !== -1) {
    echo "The target salary is found at index $result.";
} else {
    echo "The target salary was not found in the array.";
}

?>
