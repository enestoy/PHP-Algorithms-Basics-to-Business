<?php

// Function to divide the matrix into submatrices
function divideMatrix($matrix) {
    $n = count($matrix); // Get matrix size
    $half = $n / 2; // Find the midpoint (half size)

    // Extract the first half
    $A11 = array_slice(array_map(function($row) {
        return array_slice($row, 0, count($row) / 2); // Split rows in half
    }, array_slice($matrix, 0, $half)), 0, $half); // Get the first half

    $A12 = array_slice(array_map(function($row) {
        return array_slice($row, count($row) / 2); // Split rows into the other half
    }, array_slice($matrix, 0, $half)), 0, $half); // Get the second half

    // Extract the second half
    $A21 = array_slice(array_map(function($row) {
        return array_slice($row, 0, count($row) / 2); // Split rows again in half
    }, array_slice($matrix, $half)), 0, $half); // Get the lower half

    $A22 = array_slice(array_map(function($row) {
        return array_slice($row, count($row) / 2); // Get the other lower half
    }, array_slice($matrix, $half)), 0, $half); // Extract lower right part

    return [$A11, $A12, $A21, $A22]; // Return submatrices
}

// Function to add two matrices
function addMatrix($matrix1, $matrix2) {
    $result = [];
    for ($i = 0; $i < count($matrix1); $i++) {
        $result[] = array_map(function($x, $y) {
            return $x + $y; // Add elements
        }, $matrix1[$i], $matrix2[$i]);
    }
    return $result; // Return the summed matrix
}

// Function to subtract two matrices
function subtractMatrix($matrix1, $matrix2) {
    $result = [];
    for ($i = 0; $i < count($matrix1); $i++) {
        $result[] = array_map(function($x, $y) {
            return $x - $y; // Subtract elements
        }, $matrix1[$i], $matrix2[$i]);
    }
    return $result; // Return the subtracted matrix
}

// Strassen's Matrix Multiplication Algorithm
function strassenMatrixMultiplication($A, $B) {
    $n = count($A); // Get matrix size
    
    if ($n == 1) {
        return [[ $A[0][0] * $B[0][0] ]]; // If the matrix is 1x1, multiply directly
    }

    // Divide matrices into 4 submatrices
    list($A11, $A12, $A21, $A22) = divideMatrix($A); // Split matrix A into four parts
    list($B11, $B12, $B21, $B22) = divideMatrix($B); // Split matrix B into four parts

    // Compute 7 auxiliary matrices (specific to Strassen's algorithm)
    $M1 = strassenMatrixMultiplication(addMatrix($A11, $A22), addMatrix($B11, $B22)); // (A11 + A22) * (B11 + B22)
    $M2 = strassenMatrixMultiplication(addMatrix($A21, $A22), $B11); // (A21 + A22) * B11
    $M3 = strassenMatrixMultiplication($A11, subtractMatrix($B12, $B22)); // A11 * (B12 - B22)
    $M4 = strassenMatrixMultiplication($A22, subtractMatrix($B21, $B11)); // A22 * (B21 - B11)
    $M5 = strassenMatrixMultiplication(addMatrix($A11, $A12), $B22); // (A11 + A12) * B22
    $M6 = strassenMatrixMultiplication(subtractMatrix($A21, $A11), addMatrix($B11, $B12)); // (A21 - A11) * (B11 + B12)
    $M7 = strassenMatrixMultiplication(subtractMatrix($A12, $A22), addMatrix($B21, $B22)); // (A12 - A22) * (B21 + B22)

    // Compute C1, C2, C3, C4 matrices
    $C11 = addMatrix(subtractMatrix(addMatrix($M1, $M4), $M5), $M7); // Compute C11
    $C12 = addMatrix($M3, $M5); // Compute C12
    $C21 = addMatrix($M2, $M4); // Compute C21
    $C22 = addMatrix(subtractMatrix(addMatrix($M1, $M3), $M2), $M6); // Compute C22

    // Merge the final result matrix
    $topMatrix = array_merge($C11, $C12); // Merge the upper part
    $bottomMatrix = array_merge($C21, $C22); // Merge the lower part

    return array_merge($topMatrix, $bottomMatrix); // Merge upper and lower matrices
}

// Example usage
$A = [
    [1, 2],
    [3, 4]
];

$B = [
    [5, 6],
    [7, 8]
];

// Perform matrix multiplication using Strassen's algorithm
$result = strassenMatrixMultiplication($A, $B);

echo "Result Matrix:\n";
foreach ($result as $row) {
    echo implode(" ", $row) . "\n"; // Print the resulting matrix
}
?>
