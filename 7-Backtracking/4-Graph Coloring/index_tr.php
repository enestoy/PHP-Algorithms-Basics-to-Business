<?php

// Grafın geçerli olup olmadığını kontrol eden fonksiyon
function komsuDüğümeRenkAtamaGeçerliMi($graf, $düğümler, $düğüm, $renk) {
    // Tüm komşuları kontrol et
    foreach ($graf[$düğüm] as $komsu) {
        // Eğer komşunun rengi aynı ise, geçerli değildir
        if ($düğümler[$komsu] == $renk) {
            return false;
        }
    }
    return true; // Geçerli ise true döndür
}

// Geri izleme (backtracking) ile grafı renklendirme fonksiyonu
function grafRenklendir($graf, $toplamRenk, $düğümler, $düğüm) {
    // Eğer tüm düğümler renklendirildiyse, çözüm bulundu
    if ($düğüm == count($graf)) {
        return true;
    }

    // Her renk için kontrol yap
    for ($renk = 1; $renk <= $toplamRenk; $renk++) {
        if (komsuDüğümeRenkAtamaGeçerliMi($graf, $düğümler, $düğüm, $renk)) {
            // Eğer renk geçerliyse, bu renkten düğüme ata
            $düğümler[$düğüm] = $renk;

            // Sonraki düğümü çözmeye çalış
            if (grafRenklendir($graf, $toplamRenk, $düğümler, $düğüm + 1)) {
                return true;
            }

            // Eğer çözüm bulunamazsa, bu rengi geri al
            $düğümler[$düğüm] = 0;
        }
    }

    // Eğer tüm renkler denenip çözüm bulunamadıysa, false döndür
    return false;
}

// Ana fonksiyon: Grafı renklendirme işlemini başlatan fonksiyon
function grafRenklendirici($graf, $toplamRenk) {
    $düğümler = array_fill(0, count($graf), 0); // Düğümler için renkler, başlangıçta hepsi 0 (renk atanmamış)

    if (grafRenklendir($graf, $toplamRenk, $düğümler, 0)) {
        // Çözüm bulunduysa, renkleri yazdır
        echo "Graf renklendirilmiş çözüm:\n";
        foreach ($düğümler as $düğüm => $renk) {
            echo "Düğüm " . $düğüm . " => Renk " . $renk . "\n";
        }
    } else {
        echo "Geçerli bir çözüm bulunamadı.\n"; // Eğer çözüm bulunamazsa
    }
}

// Örnek kullanım (graf adjacency list olarak temsil edilir)
// Burada, her bir düğümün komşu düğümleri belirtilmiştir.
$graf = [
    [1, 2],       // Düğüm 0: Komşuları 1 ve 2
    [0, 2, 3],    // Düğüm 1: Komşuları 0, 2 ve 3
    [0, 1, 3],    // Düğüm 2: Komşuları 0, 1 ve 3
    [1, 2]        // Düğüm 3: Komşuları 1 ve 2
];

$toplamRenk = 3; // Kullanılacak toplam renk sayısı
grafRenklendirici($graf, $toplamRenk);

?>
