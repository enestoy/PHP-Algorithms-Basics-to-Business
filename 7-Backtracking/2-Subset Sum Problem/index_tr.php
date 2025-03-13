<?php

// Alt küme toplamını bulan geri izleme fonksiyonu
function altKumeToplamiBul($dizi, $hedef, $index = 0, $toplam = 0, $altKume = []) {
    // Eğer hedef değere ulaşıldıysa, alt küme bulundu
    if ($toplam === $hedef) {
        echo "Alt Küme Bulundu: " . implode(", ", $altKume) . "\n";
        return true;
    }

    // Eğer dizinin sonuna gelindi ve toplam hedefe ulaşmadıysa, geri dönüyoruz
    if ($index === count($dizi)) {
        return false;
    }

    // Alt kümeye mevcut öğeyi ekleyip, bir sonraki öğeye geçiyoruz
    $altKume[] = $dizi[$index];
    if (altKumeToplamiBul($dizi, $hedef, $index + 1, $toplam + $dizi[$index], $altKume)) {
        return true; // Çözüm bulunduysa doğruyu döndürüyoruz
    }

    // Alt kümeye mevcut öğeyi eklemeden bir sonraki öğeye geçiyoruz
    array_pop($altKume);
    return altKumeToplamiBul($dizi, $hedef, $index + 1, $toplam, $altKume); // Öğeyi eklemeden diğer yolu deniyoruz
}

// Ana fonksiyon
function subsetSum($dizi, $hedef) {
    if (!altKumeToplamiBul($dizi, $hedef)) {
        echo "Alt küme bulunamadı.\n";
    }
}

// Örnek kullanım
$dizi = [3, 34, 4, 12, 5, 2]; // Örnek dizi
$hedef = 9; // Hedef toplam
subsetSum($dizi, $hedef);
?>
