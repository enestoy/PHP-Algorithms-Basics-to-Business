<?php

// Grafın geçerli bir Hamiltonian Path'a sahip olup olmadığını kontrol eden fonksiyon
function hamiltanyolGeçerliMi($graf, $yol, $düğüm, $adım) {
    // Aynı düğüm daha önce ziyaret edilmişse, geçerli değildir
    for ($i = 0; $i < $adım; $i++) {
        if ($yol[$i] == $düğüm) {
            return false;
        }
    }

    // Eğer düğüm, bir önceki düğümle komşu değilse, geçerli değildir
    if ($graf[$yol[$adım - 1]][$düğüm] == 0) {
        return false;
    }

    return true; // Geçerli ise true döndür
}

// Hamiltonian Path'ı bulmak için geri izleme fonksiyonu
function hamiltonianPath($graf, $yol, $adım) {
    // Eğer tüm düğümler gezildiyse, geçerli bir yol bulunmuş demektir
    if ($adım == count($graf)) {
        return true;
    }

    // Her düğümü dene
    for ($düğüm = 0; $düğüm < count($graf); $düğüm++) {
        if (hamiltanyolGeçerliMi($graf, $yol, $düğüm, $adım)) {
            // Eğer geçerli bir düğümse, bu düğümü yola ekle
            $yol[$adım] = $düğüm;

            // Sonraki adım için tekrar dene
            if (hamiltonianPath($graf, $yol, $adım + 1)) {
                return true;
            }

            // Eğer çözüm bulunamazsa, geri al (backtrack)
            $yol[$adım] = -1;
        }
    }

    // Eğer hiçbir çözüm bulunamazsa, false döndür
    return false;
}

// Ana fonksiyon: Hamiltonian Path'ı bulmak için başlatan fonksiyon
function hamiltonianPathBulucu($graf) {
    $yol = array_fill(0, count($graf), -1); // Yola başlangıçta hiçbir düğüm eklenmemiştir
    $yol[0] = 0; // Başlangıç noktası olarak ilk düğüm seçilir

    if (hamiltonianPath($graf, $yol, 1)) {
        echo "Hamiltonian Path bulundu:\n";
        foreach ($yol as $düğüm) {
            echo $düğüm . " ";
        }
        echo "\n";
    } else {
        echo "Geçerli bir Hamiltonian Path bulunamadı.\n";
    }
}

// Örnek kullanım (graf adjacency matrix olarak temsil edilir)
$graf = [
    [0, 1, 0, 1, 0], // Düğüm 0: Komşuları 1 ve 3
    [1, 0, 1, 1, 0], // Düğüm 1: Komşuları 0, 2 ve 3
    [0, 1, 0, 0, 1], // Düğüm 2: Komşuları 1 ve 4
    [1, 1, 0, 0, 0], // Düğüm 3: Komşuları 0 ve 1
    [0, 0, 1, 0, 0]  // Düğüm 4: Komşuları 2
];

hamiltonianPathBulucu($graf);

?>
