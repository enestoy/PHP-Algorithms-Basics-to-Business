<?php

/* 
Interview Question:

Problem:
Given a 9x9 Sudoku puzzle, solve it according to the rules.

Sudoku rules:

Each row must contain the numbers 1 to 9 exactly once.

Each column must contain the numbers 1 to 9 exactly once.

Each 3x3 subgrid must contain the numbers 1 to 9 exactly once.
*/

function solveSudoku(&$board) {
    solve($board);
}

function solve(&$board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            // Find an empty cell
            if ($board[$row][$col] == 0) {
                // Try placing numbers from 1 to 9
                for ($num = 1; $num <= 9; $num++) {
                    if (isValid($board, $row, $col, $num)) {
                        $board[$row][$col] = $num; // Place the number

                        // Move to the next cell
                        if (solve($board)) {
                            return true;
                        }

                        $board[$row][$col] = 0; // Backtrack
                    }
                }
                return false; // If no number fits
            }
        }
    }
    return true; // If all cells are filled
}

function isValid($board, $row, $col, $num) {
    // Check the row and column
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num || $board[$i][$col] == $num) {
            return false;
        }
    }

    // Check the 3x3 subgrid
    $startRow = intval($row / 3) * 3;
    $startCol = intval($col / 3) * 3;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$startRow + $i][$startCol + $j] == $num) {
                return false;
            }
        }
    }

    return true;
}

function printBoard($board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            echo $board[$row][$col] . " ";
        }
        echo "\n";
    }
}

// Example usage
$board = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0],
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9],
];

solveSudoku($board);
echo "Solved Sudoku:\n";
printBoard($board);

?>
