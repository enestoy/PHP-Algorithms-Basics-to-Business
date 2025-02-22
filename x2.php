<?php
$matris1 = [
    [1, 2, 3],
    [4, 5, 6]
];

$matris2 = [
    [7, 8, 9],
    [10, 11, 12]
];

$sonuc = [];

for ($i = 0; $i < count($matris1); $i++) {
    for ($j = 0; $j < count($matris1[0]); $j++) {
        $sonuc[$i][$j] = $matris1[$i][$j] + $matris2[$i][$j];
    }
}

// Sonucu yazdıralım
foreach ($sonuc as $satir) {
    echo implode(" ", $satir) . "<br>";
}


?>