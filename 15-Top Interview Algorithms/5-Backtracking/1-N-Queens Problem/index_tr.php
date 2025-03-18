<?php
/* 
Mülakat Sorusu:

Problem:
Bir N x N satranç tahtası verildiğinde, bu tahtaya N tane veziri birbirini tehdit etmeyecek şekilde yerleştirin. 
Vezirler, aynı satır, sütun veya çaprazda olmamalıdır.

*/

function solveNQueens($n) {
    $solutions = []; // Tüm çözümleri saklamak için
    $board = array_fill(0, $n, -1); // Tahtayı temsil eden dizi
    backtrack(0, $n, $board, $solutions); // Geri izleme algoritmasını başlat
    return $solutions;
}

function backtrack($row, $n, &$board, &$solutions) {
    // Tüm satırlara vezir yerleştirildiyse, çözümü kaydet
    if ($row == $n) {
        $solutions[] = $board;
        return;
    }

    // Mevcut satırda her sütunu dene
    for ($col = 0; $col < $n; $col++) {
        if (isSafe($row, $col, $board)) {
            $board[$row] = $col; // Veziri yerleştir
            backtrack($row + 1, $n, $board, $solutions); // Bir sonraki satıra geç
            $board[$row] = -1; // Geri izleme (backtrack)
        }
    }
}

function isSafe($row, $col, $board) {
    // Aynı sütunda veya çaprazda başka bir vezir var mı kontrol et
    for ($i = 0; $i < $row; $i++) {
        if ($board[$i] == $col || // Aynı sütun
            abs($board[$i] - $col) == abs($i - $row)) { // Aynı çapraz
            return false;
        }
    }
    return true;
}

// Örnek kullanım
$n = 4;
$solutions = solveNQueens($n);

echo "N-Queens Solutions for N = $n:\n";
foreach ($solutions as $solution) {
    echo "[" . implode(", ", $solution) . "]\n";
}

?>