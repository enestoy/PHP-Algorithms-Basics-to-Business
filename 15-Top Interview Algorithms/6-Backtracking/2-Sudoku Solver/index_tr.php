<?php

/* 
Mülakat Sorusu:

Problem:
Bir 9x9 Sudoku bulmacası verildiğinde, bu bulmacayı kurallara uygun şekilde çözün. 

Sudoku kuralları:

Her satırda 1 ile 9 arasındaki tüm sayılar bir kez bulunmalıdır.

Her sütunda 1 ile 9 arasındaki tüm sayılar bir kez bulunmalıdır.

Her 3x3 alt karede 1 ile 9 arasındaki tüm sayılar bir kez bulunmalıdır.

*/

function solveSudoku(&$board) {
    solve($board);
}

function solve(&$board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            // Boş hücreyi bul
            if ($board[$row][$col] == 0) {
                // 1'den 9'a kadar tüm sayıları dene
                for ($num = 1; $num <= 9; $num++) {
                    if (isValid($board, $row, $col, $num)) {
                        $board[$row][$col] = $num; // Sayıyı yerleştir

                        // Bir sonraki hücreye geç
                        if (solve($board)) {
                            return true;
                        }

                        $board[$row][$col] = 0; // Geri izleme (backtrack)
                    }
                }
                return false; // Hiçbir sayı uymuyorsa
            }
        }
    }
    return true; // Tüm hücreler doluysa
}

function isValid($board, $row, $col, $num) {
    // Aynı satırda ve sütunda kontrol
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num || $board[$i][$col] == $num) {
            return false;
        }
    }

    // 3x3 alt karede kontrol
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

// Örnek kullanım
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