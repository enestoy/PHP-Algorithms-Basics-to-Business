<?php

// Function to print the Sudoku board
function printSudoku($board) {
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            echo $board[$i][$j] . " ";
        }
        echo "\n";
    }
}

// Function to check if a number is valid at a given position
function isValidNumber($board, $row, $col, $num) {
    // Check if the number exists in the same row
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num) {
            return false;
        }
    }

    // Check if the number exists in the same column
    for ($i = 0; $i < 9; $i++) {
        if ($board[$i][$col] == $num) {
            return false;
        }
    }

    // Check if the number exists in the same 3x3 subgrid
    $rowStart = floor($row / 3) * 3;
    $colStart = floor($col / 3) * 3;

    for ($i = $rowStart; $i < $rowStart + 3; $i++) {
        for ($j = $colStart; $j < $colStart + 3; $j++) {
            if ($board[$i][$j] == $num) {
                return false;
            }
        }
    }

    return true; // If the number is valid, return true
}

// Function to solve Sudoku using backtracking
function solveSudoku(&$board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            if ($board[$row][$col] == 0) { // If the cell is empty
                for ($num = 1; $num <= 9; $num++) {
                    if (isValidNumber($board, $row, $col, $num)) {
                        $board[$row][$col] = $num; // Place the number
                        if (solveSudoku($board)) {
                            return true; // If a solution is found, return true
                        }
                        $board[$row][$col] = 0; // If no solution, backtrack
                    }
                }
                return false; // If no number fits, return false
            }
        }
    }
    return true; // If the board is completely filled and valid, return true
}

// Main function to initiate solving
function solveAndPrintSudoku($board) {
    if (solveSudoku($board)) {
        printSudoku($board); // Print the solved Sudoku
    } else {
        echo "No solution found.\n"; // If no solution exists
    }
}

// Example Sudoku board (0 represents empty cells)
$board = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0],
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9]
];

solveAndPrintSudoku($board);
?>
