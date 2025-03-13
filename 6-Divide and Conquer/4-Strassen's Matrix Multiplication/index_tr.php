<?php

// Matrisi bölen fonksiyon
function matrisBöl($matris) {
    $n = count($matris); // Matrisin boyutunu alıyoruz
    $ortak = $n / 2; // Matrisin ortasını buluyoruz (yarı boyut)

    // İlk yarıyı almak
    $A11 = array_slice(array_map(function($row) {
        return array_slice($row, 0, count($row) / 2); // Satırları yarıya bölüyoruz
    }, array_slice($matris, 0, $ortak)), 0, $ortak); // İlk yarıyı alıyoruz

    $A12 = array_slice(array_map(function($row) {
        return array_slice($row, count($row) / 2); // Satırları diğer yarıya bölüyoruz
    }, array_slice($matris, 0, $ortak)), 0, $ortak); // İkinci yarıyı alıyoruz

    // İkinci yarıyı almak
    $A21 = array_slice(array_map(function($row) {
        return array_slice($row, 0, count($row) / 2); // Satırları yine yarıya bölüyoruz
    }, array_slice($matris, $ortak)), 0, $ortak); // Alt yarıyı alıyoruz

    $A22 = array_slice(array_map(function($row) {
        return array_slice($row, count($row) / 2); // Diğer alt yarıyı alıyoruz
    }, array_slice($matris, $ortak)), 0, $ortak); // Alt yarının diğer kısmını alıyoruz

    return [$A11, $A12, $A21, $A22]; // Alt matrisleri döndürüyoruz
}

// Matris toplama fonksiyonu
function matrisTopla($matris1, $matris2) {
    $sonuc = [];
    for ($i = 0; $i < count($matris1); $i++) {
        $sonuc[] = array_map(function($x, $y) {
            return $x + $y; // Elemanları topluyoruz
        }, $matris1[$i], $matris2[$i]);
    }
    return $sonuc; // Toplanan matrisi döndürüyoruz
}

// Matris çıkarma fonksiyonu
function matrisÇıkar($matris1, $matris2) {
    $sonuc = [];
    for ($i = 0; $i < count($matris1); $i++) {
        $sonuc[] = array_map(function($x, $y) {
            return $x - $y; // Elemanları çıkarıyoruz
        }, $matris1[$i], $matris2[$i]);
    }
    return $sonuc; // Çıkarılan matrisi döndürüyoruz
}

// Matris çarpma (Strassen algoritması)
function strassenMatrisÇarpma($A, $B) {
    $n = count($A); // Matrisin boyutunu alıyoruz
    
    if ($n == 1) {
        return [[ $A[0][0] * $B[0][0] ]]; // Eğer matris 1x1 ise, doğrudan çarpıyoruz
    }

    // Matrisi 4 alt matrise bölüyoruz
    list($A11, $A12, $A21, $A22) = matrisBöl($A); // A matrisini dört parçaya bölüyoruz
    list($B11, $B12, $B21, $B22) = matrisBöl($B); // B matrisini dört parçaya bölüyoruz

    // 7 adet yardımcı matris hesaplıyoruz (Strassen'a özel hesaplamalar)
    $M1 = strassenMatrisÇarpma(matrisTopla($A11, $A22), matrisTopla($B11, $B22)); // (A11 + A22) * (B11 + B22)
    $M2 = strassenMatrisÇarpma(matrisTopla($A21, $A22), $B11); // (A21 + A22) * B11
    $M3 = strassenMatrisÇarpma($A11, matrisÇıkar($B12, $B22)); // A11 * (B12 - B22)
    $M4 = strassenMatrisÇarpma($A22, matrisÇıkar($B21, $B11)); // A22 * (B21 - B11)
    $M5 = strassenMatrisÇarpma(matrisTopla($A11, $A12), $B22); // (A11 + A12) * B22
    $M6 = strassenMatrisÇarpma(matrisÇıkar($A21, $A11), matrisTopla($B11, $B12)); // (A21 - A11) * (B11 + B12)
    $M7 = strassenMatrisÇarpma(matrisÇıkar($A12, $A22), matrisTopla($B21, $B22)); // (A12 - A22) * (B21 + B22)

    // C1, C2, C3, C4 matrislerini hesaplıyoruz
    $C11 = matrisTopla(matrisÇıkar(matrisTopla($M1, $M4), $M5), $M7); // C11 hesaplama
    $C12 = matrisTopla($M3, $M5); // C12 hesaplama
    $C21 = matrisTopla($M2, $M4); // C21 hesaplama
    $C22 = matrisTopla(matrisÇıkar(matrisTopla($M1, $M3), $M2), $M6); // C22 hesaplama

    // Sonuç matrisini birleştiriyoruz
    $üstMatris = array_merge($C11, $C12); // Üst kısımdaki matrisi birleştiriyoruz
    $altMatris = array_merge($C21, $C22); // Alt kısımdaki matrisi birleştiriyoruz

    return array_merge($üstMatris, $altMatris); // Üst ve alt matrisleri birleştirip son matris olarak döndürüyoruz
}

// Örnek kullanım
$A = [
    [1, 2],
    [3, 4]
];

$B = [
    [5, 6],
    [7, 8]
];

// Strassen algoritması ile çarpma işlemi
$sonuc = strassenMatrisÇarpma($A, $B);

echo "Sonuç Matrisi:\n";
foreach ($sonuc as $satir) {
    echo implode(" ", $satir) . "\n"; // Sonuç matrisini yazdırıyoruz
}
?>
