<?php

// Vezirlerin yerleştirileceği tahtayı yazdıran fonksiyon
function tahtaYazdir($tahta) {
    foreach ($tahta as $satir) {
        foreach ($satir as $kutucuk) {
            echo $kutucuk === 1 ? "Q " : ". "; // Q: vezir, . : boş alan
        }
        echo "<br>";
    }
}

// Vezir yerleştirme fonksiyonu
function vezirYerlestir($tahta, $satir) {
    $boyut = count($tahta);

    // Satır sayısı tahta boyutuna ulaştığında çözüm bulundu
    if ($satir === $boyut) {
        tahtaYazdir($tahta);
        echo "\n\n";
        return true;
    }

    // Bu satırda her sütun için vezir yerleştirme denemesi yapıyoruz
    for ($sutun = 0; $sutun < $boyut; $sutun++) {

        // Eğer bu pozisyon güvenli ise veziri yerleştiriyoruz
        if (pozisyonGüvenli($tahta, $satir, $sutun)) {
            $tahta[$satir][$sutun] = 1; // Vezir yerleştirildi
            // Bir sonraki satırda vezir yerleştirme işlemini yapıyoruz
            if (vezirYerlestir($tahta, $satir + 1)) {
                return true; // Eğer çözüm bulunduysa doğruyu döndürüyoruz
            }
            // Çözüm bulunamazsa veziri geri alıyoruz (geri izleme)
            $tahta[$satir][$sutun] = 0;
        }
    }
    
    // Bu satırda hiçbir sütuna vezir yerleştirilemezse false döndürüyoruz
    return false;
}

// Bu pozisyonda vezir yerleştirmenin güvenli olup olmadığını kontrol eden fonksiyon
function pozisyonGüvenli($tahta, $satir, $sutun) {
    // Aynı sütunda başka bir vezir var mı?
    for ($i = 0; $i < $satir; $i++) {
        if ($tahta[$i][$sutun] === 1) {
            return false;
        }
    }

    // Diagonal kontrolü: sol üstten sağ alta
    for ($i = $satir - 1, $j = $sutun - 1; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($tahta[$i][$j] === 1) {
            return false;
        }
    }

    // Diagonal kontrolü: sağ üstten sol alta
    for ($i = $satir - 1, $j = $sutun + 1; $i >= 0 && $j < count($tahta); $i--, $j++) {
        if ($tahta[$i][$j] === 1) {
            return false;
        }
    }

    return true; // Eğer hiçbir tehdit yoksa, pozisyon güvenlidir
}

// Ana fonksiyon
function nQueens($n) {
    // N x N boyutunda boş bir tahta oluşturuyoruz
    $tahta = array_fill(0, $n, array_fill(0, $n, 0));

    // Vezirleri yerleştirmeye başlıyoruz
    if (!vezirYerlestir($tahta, 0)) {
        echo "Çözüm bulunamadı.<br>";
    }
}

// Örnek kullanım
$n = 8; // 8x8 tahtada 8 vezir yerleştirme problemi
nQueens($n);
?>
