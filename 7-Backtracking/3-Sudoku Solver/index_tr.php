<?php

// Sudoku tahtasını yazdıran fonksiyon
function sudokuYazdir($tahta) {
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            echo $tahta[$i][$j] . " ";
        }
        echo "\n";
    }
}

// Bu fonksiyon, verilen pozisyonda rakamın geçerli olup olmadığını kontrol eder
function rakamGeçerliMi($tahta, $satir, $sutun, $rakam) {
    // Aynı satırda aynı rakam var mı?
    for ($i = 0; $i < 9; $i++) {
        if ($tahta[$satir][$i] == $rakam) {
            return false;
        }
    }

    // Aynı sütunda aynı rakam var mı?
    for ($i = 0; $i < 9; $i++) {
        if ($tahta[$i][$sutun] == $rakam) {
            return false;
        }
    }

    // 3x3 alt karede aynı rakam var mı?
    $satirBaslangıc = floor($satir / 3) * 3;
    $sutunBaslangıc = floor($sutun / 3) * 3;

    for ($i = $satirBaslangıc; $i < $satirBaslangıc + 3; $i++) {
        for ($j = $sutunBaslangıc; $j < $sutunBaslangıc + 3; $j++) {
            if ($tahta[$i][$j] == $rakam) {
                return false;
            }
        }
    }

    return true; // Eğer rakam geçerliyse, true döndür
}

// Bu fonksiyon, Sudoku'nun çözülüp çözülmediğini kontrol eder
function sudokuÇöz($tahta) {
    for ($satir = 0; $satir < 9; $satir++) {
        for ($sutun = 0; $sutun < 9; $sutun++) {
            if ($tahta[$satir][$sutun] == 0) { // Eğer boş bir hücre varsa
                for ($rakam = 1; $rakam <= 9; $rakam++) {
                    if (rakamGeçerliMi($tahta, $satir, $sutun, $rakam)) {
                        $tahta[$satir][$sutun] = $rakam; // Rakamı yerleştir
                        if (sudokuÇöz($tahta)) {
                            return true; // Eğer çözüm bulunduysa, true döndür
                        }
                        $tahta[$satir][$sutun] = 0; // Eğer çözüm bulunamazsa, geri al
                    }
                }
                return false; // Eğer tüm rakamlar denenip çözüm bulunamadıysa, false döndür
            }
        }
    }
    return true; // Eğer tahta tamamen doluysa ve geçerli bir çözümse, true döndür
}

// Ana fonksiyon
function sudokuÇözüm($tahta) {
    if (sudokuÇöz($tahta)) {
        sudokuYazdir($tahta); // Çözümü yazdır
    } else {
        echo "Çözüm bulunamadı.\n"; // Eğer çözüm bulunamazsa
    }
}

// Örnek kullanım (0 boş hücreyi temsil eder)
$tahta = [
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

sudokuÇözüm($tahta);
?>
