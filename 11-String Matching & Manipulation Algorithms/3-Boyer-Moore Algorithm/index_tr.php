<?php

/**
 * Boyer-Moore string eşleştirme algoritması uygulaması
 * 
 * Bu algoritma, bir metin içinde bir desenin eşleşmelerini bulur.
 * Boyer-Moore, desenin sonundan başa doğru karşılaştırma yaparak ve 
 * kötü karakter ve iyi son eki kurallarını kullanarak verimliliği artırır.
 */
class BoyerMooreArama {
    
    /**
     * Kötü karakter tablosu oluşturur
     * 
     * @param string $desen Aranacak desen
     * @return array Kötü karakter tablosu
     */
    private function kötüKarakterTablosuOluştur(string $desen): array {
        $karakterSetiBoyu = 256; // ASCII
        $desenUzunluk = strlen($desen);
        
        // Tüm karakterler için varsayılan değeri desen uzunluğu olarak ayarla
        $kötüKarakter = array_fill(0, $karakterSetiBoyu, $desenUzunluk);
        
        // Desen içindeki her karakter için son konumunu kaydet
        for ($i = 0; $i < $desenUzunluk - 1; $i++) {
            $kötüKarakter[ord($desen[$i])] = $desenUzunluk - 1 - $i;
        }
        
        return $kötüKarakter;
    }
    
    /**
     * İyi son eki tablosu oluşturur
     * 
     * @param string $desen Aranacak desen
     * @return array İyi son eki tablosu
     */
    private function iyiSonEkiTablosuOluştur(string $desen): array {
        $desenUzunluk = strlen($desen);
        $iyiSonEki = array_fill(0, $desenUzunluk, 0);
        $sonEk = array_fill(0, $desenUzunluk, 0);
        
        // Case 1: Son eşleşen son ekin uzunluğunu hesapla
        $sonEk[$desenUzunluk - 1] = $desenUzunluk;
        
        for ($i = $desenUzunluk - 2; $i >= 0; $i--) {
            $j = $i;
            
            // Sağdan sola doğru eşleşen karakterleri bul
            while ($j >= 0 && $desen[$j] === $desen[$desenUzunluk - 1 - $i + $j]) {
                $j--;
            }
            
            $sonEk[$i] = $i - $j;
        }
        
        // Case 2: İyi son eki tablosunu hesapla
        for ($i = 0; $i < $desenUzunluk; $i++) {
            $iyiSonEki[$i] = $desenUzunluk;
        }
        
        $j = 0;
        for ($i = $desenUzunluk - 1; $i >= 0; $i--) {
            if ($sonEk[$i] === $i + 1) {
                while ($j < $desenUzunluk - 1 - $i) {
                    if ($iyiSonEki[$j] === $desenUzunluk) {
                        $iyiSonEki[$j] = $desenUzunluk - 1 - $i;
                    }
                    $j++;
                }
            }
        }
        
        for ($i = 0; $i < $desenUzunluk - 1; $i++) {
            $iyiSonEki[$desenUzunluk - 1 - $sonEk[$i]] = $desenUzunluk - 1 - $i;
        }
        
        return $iyiSonEki;
    }
    
    /**
     * Boyer-Moore algoritması ile bir metin içinde desen arar
     * 
     * @param string $metin Arama yapılacak metin
     * @param string $desen Aranacak desen
     * @return array Eşleşmelerin başlangıç indeksleri
     */
    public function ara(string $metin, string $desen): array {
        $eşleşmeler = [];
        $metinUzunluk = strlen($metin);
        $desenUzunluk = strlen($desen);
        
        // Boş desen veya metin kontrolü
        if ($desenUzunluk === 0 || $metinUzunluk === 0 || $desenUzunluk > $metinUzunluk) {
            return $eşleşmeler;
        }
        
        // Kötü karakter ve iyi son eki tablolarını oluştur
        $kötüKarakter = $this->kötüKarakterTablosuOluştur($desen);
        $iyiSonEki = $this->iyiSonEkiTablosuOluştur($desen);
        
        $indeks = 0;
        
        // Metin üzerinde desenin kaydırılarak aranması
        while ($indeks <= $metinUzunluk - $desenUzunluk) {
            $j = $desenUzunluk - 1;
            
            // Desen karakterlerini sağdan sola doğru karşılaştır
            while ($j >= 0 && $desen[$j] === $metin[$indeks + $j]) {
                $j--;
            }
            
            // Eğer desen bulunduysa
            if ($j < 0) {
                $eşleşmeler[] = $indeks;
                // İyi son eki kuralına göre kaydır
                $indeks += $iyiSonEki[0];
            } else {
                // Maksimum kaydırma miktarını hesapla
                $kötüKarakterKaydırma = $kötüKarakter[ord($metin[$indeks + $j])] ?? $desenUzunluk;
                $iyiSonEkiKaydırma = $iyiSonEki[$j];
                
                // İki değerden büyük olanı kadar kaydır
                $indeks += max($kötüKarakterKaydırma, $iyiSonEkiKaydırma);
            }
        }
        
        return $eşleşmeler;
    }
}

/**
 * Boyer-Moore algoritmasının kullanımı örneği
 */
function örnekKullanım() {
    $boyerMooreArama = new BoyerMooreArama();
    
    // Test metni ve deseni
    $metin = "Boyer-Moore algoritması, metin içinde desen aramak için geliştirilmiş verimli bir algoritmadır. Boyer-Moore'un özelliği, desenin sonundan başlayarak karşılaştırma yapmasıdır.";
    $desen = "Boyer-Moore";
    
    // Desenin metin içinde aranması
    $eşleşmeler = $boyerMooreArama->ara($metin, $desen);
    
    // Sonuçların gösterilmesi
    if (count($eşleşmeler) > 0) {
        echo "'" . $desen . "' deseni metin içinde şu pozisyonlarda bulundu:\n";
        foreach ($eşleşmeler as $pozisyon) {
            echo "- İndeks " . $pozisyon . "\n";
        }
    } else {
        echo "'" . $desen . "' deseni metin içinde bulunamadı.\n";
    }
}

// Örnek kullanımı çalıştır
örnekKullanım();
?>