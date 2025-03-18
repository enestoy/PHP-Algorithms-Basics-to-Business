<?php
/* 
Interview Question:

Problem:
Given an N x N chessboard, place N queens on the board such that no two queens threaten each other. 
Queens must not be placed in the same row, column, or diagonal.
*/

function solveNQueens($n) {
    $solutions = []; // To store all the solutions
    $board = array_fill(0, $n, -1); // Array representing the board
    backtrack(0, $n, $board, $solutions); // Start the backtracking algorithm
    return $solutions;
}

function backtrack($row, $n, &$board, &$solutions) {
    // If all rows have queens placed, save the solution
    if ($row == $n) {
        $solutions[] = $board;
        return;
    }

    // Try each column in the current row
    for ($col = 0; $col < $n; $col++) {
        if (isSafe($row, $col, $board)) {
            $board[$row] = $col; // Place the queen
            backtrack($row + 1, $n, $board, $solutions); // Move to the next row
            $board[$row] = -1; // Backtrack
        }
    }
}

function isSafe($row, $col, $board) {
    // Check if there is another queen in the same column or diagonal
    for ($i = 0; $i < $row; $i++) {
        if ($board[$i] == $col || // Same column
            abs($board[$i] - $col) == abs($i - $row)) { // Same diagonal
            return false;
        }
    }
    return true;
}

// Example usage
$n = 4;
$solutions = solveNQueens($n);

echo "N-Queens Solutions for N = $n:\n";
foreach ($solutions as $solution) {
    echo "[" . implode(", ", $solution) . "]\n";
}

?>
