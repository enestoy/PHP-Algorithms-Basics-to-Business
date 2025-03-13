<?php

// Function to print the chessboard with queens
function printBoard($board) {
    foreach ($board as $row) {
        foreach ($row as $cell) {
            echo $cell === 1 ? "Q " : ". "; // Q: queen, . : empty space
        }
        echo "<br>";
    }
}

// Function to place queens on the board
function placeQueens($board, $row) {
    $size = count($board);

    // If row index reaches board size, a solution is found
    if ($row === $size) {
        printBoard($board);
        echo "\n\n";
        return true;
    }

    // Try placing a queen in each column of the current row
    for ($col = 0; $col < $size; $col++) {

        // If this position is safe, place the queen
        if (isSafePosition($board, $row, $col)) {
            $board[$row][$col] = 1; // Place the queen

            // Move to the next row and place the next queen
            if (placeQueens($board, $row + 1)) {
                return true; // If a solution is found, return true
            }

            // If no solution is found, backtrack (remove the queen)
            $board[$row][$col] = 0;
        }
    }
    
    // If no column is safe in this row, return false
    return false;
}

// Function to check if placing a queen at (row, col) is safe
function isSafePosition($board, $row, $col) {
    // Check for another queen in the same column
    for ($i = 0; $i < $row; $i++) {
        if ($board[$i][$col] === 1) {
            return false;
        }
    }

    // Check diagonals: top-left to bottom-right
    for ($i = $row - 1, $j = $col - 1; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($board[$i][$j] === 1) {
            return false;
        }
    }

    // Check diagonals: top-right to bottom-left
    for ($i = $row - 1, $j = $col + 1; $i >= 0 && $j < count($board); $i--, $j++) {
        if ($board[$i][$j] === 1) {
            return false;
        }
    }

    return true; // If no threats exist, the position is safe
}

// Main function
function nQueens($n) {
    // Create an empty NxN chessboard
    $board = array_fill(0, $n, array_fill(0, $n, 0));

    // Start placing queens
    if (!placeQueens($board, 0)) {
        echo "No solution found.<br>";
    }
}

// Example usage
$n = 8; // Solve the 8-queens problem on an 8x8 board
nQueens($n);
?>
