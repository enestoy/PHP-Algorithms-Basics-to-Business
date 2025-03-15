<?php

// Bant, üzerinde işlem yapılacak veri saklamak için kullanılır.
// Başlangıçta, işlem yapacağımız sayıyı bu bantta saklayacağız.
$bant = ['1', '0', '1']; // 101 sayısı (5)

$gecerliDurum = 'başlangıç'; // Turing makinesinin geçerli durumu
$baslikKonumu = 0; // Başlık başlangıçta banttaki ilk hücrede
$toplamDurumlar = ['başlangıç', 'çarpma', 'sonuç']; // Makinenin durumu

// Geçiş fonksiyonu: Hangi duruma geçileceğini belirler
$gecisFonksiyonu = [
    'başlangıç' => function($simge) {
        if ($simge == '1') {
            return ['çarpma', '1', 'sağa'];
        } elseif ($simge == '0') {
            return ['sonuç', '0', 'sağa'];
        }
        return ['başlangıç', $simge, 'sağa'];
    },
    'çarpma' => function($simge) {
        return ['çarpma', $simge, 'sağa'];
    },
    'sonuç' => function($simge) {
        return ['sonuç', $simge, 'dur'];
    }
];

// Fonksiyon: Turing makinesinin çalışmasını başlatmak
function turingMakinesiCalistir($bant, $gecerliDurum, $baslikKonumu, $gecisFonksiyonu) {
    // Sonsuz bir döngüden kaçınmak için limit koyuyoruz
    $adimSayisi = 0;
    $maxAdim = 100;

    while ($adimSayisi < $maxAdim) {
        $simge = isset($bant[$baslikKonumu]) ? $bant[$baslikKonumu] : 'boş'; // Başlıkta okunan sembol
        // Geçiş fonksiyonunu kullanarak yeni durumu, sembolü ve hareketi belirle
        list($yeniDurum, $yeniSimge, $hareket) = $gecisFonksiyonu[$gecerliDurum]($simge);

        // Yeni sembolü bantta güncelle
        if ($yeniSimge != 'boş') {
            $bant[$baslikKonumu] = $yeniSimge;
        }

        // Durum değişikliği yap
        $gecerliDurum = $yeniDurum;

        // Başlık hareketi yap (sağa veya sola)
        if ($hareket == 'sağa') {
            $baslikKonumu++;
        } elseif ($hareket == 'sola') {
            $baslikKonumu--;
        }

        // Eğer işlem sonlandıysa, döngüyü kır
        if ($gecerliDurum == 'sonuç') {
            break;
        }

        $adimSayisi++;
    }

    return $bant;
}

// Turing makinesini çalıştır
$bantSonucu = turingMakinesiCalistir($bant, $gecerliDurum, $baslikKonumu, $gecisFonksiyonu);

// Sonuçları yazdır
echo "Sonuç bant: ";
echo implode('', $bantSonucu); // Final sonucu ekrana yazdır

?>
