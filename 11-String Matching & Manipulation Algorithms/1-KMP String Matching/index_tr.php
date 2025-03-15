<?php

/**
 * KMP (Knuth-Morris-Pratt) string eşleştirme algoritması uygulaması
 * 
 * Bu algoritma, bir metin içinde bir desenin eşleşmelerini bulur.
 * Normal string arama algoritmalarına göre daha verimlidir çünkü 
 * desen içindeki bilgiyi kullanarak gereksiz karşılaştırmaları önler.
 */
class KMPArama {
    
    /**
     * Desen için önek tablosu oluşturur
     * 
     * @param string $desen Aranacak desen
     * @return array Önek tablosu
     */
    private function önekTablosuOluştur(string $desen): array {
        $desenUzunluk = strlen($desen);
        $önekTablo = array_fill(0, $desenUzunluk, 0);
        
        $j = 0;
        
        // Desenin her karakteri için önek tablosu doldurulur
        for ($i = 1; $i < $desenUzunluk; $i++) {
            // Eşleşmeme durumunda geriye dön
            while ($j > 0 && $desen[$i] !== $desen[$j]) {
                $j = $önekTablo[$j - 1];
            }
            
            // Eşleşme durumunda önek uzunluğunu artır
            if ($desen[$i] === $desen[$j]) {
                $j++;
            }
            
            $önekTablo[$i] = $j;
        }
        
        return $önekTablo;
    }
    
    /**
     * KMP algoritması ile bir metin içinde desen arar
     * 
     * @param string $metin Arama yapılacak metin
     * @param string $desen Aranacak desen
     * @return array Eşleşmelerin başlangıç indeksleri
     */
    public function ara(string $metin, string $desen): array {
        $metinUzunluk = strlen($metin);
        $desenUzunluk = strlen($desen);
        $eşleşmeler = [];
        
        // Boş desen veya metin kontrolü
        if ($desenUzunluk === 0 || $metinUzunluk === 0 || $desenUzunluk > $metinUzunluk) {
            return $eşleşmeler;
        }
        
        // Önek tablosu oluştur
        $önekTablo = $this->önekTablosuOluştur($desen);
        
        $j = 0; // Desen indeksi
        
        // Metin üzerinde gezinme
        for ($i = 0; $i < $metinUzunluk; $i++) {
            // Eşleşmeme durumunda geriye dön
            while ($j > 0 && $metin[$i] !== $desen[$j]) {
                $j = $önekTablo[$j - 1];
            }
            
            // Eşleşme durumunda desen indeksini artır
            if ($metin[$i] === $desen[$j]) {
                $j++;
            }
            
            // Tam eşleşme bulunduğunda
            if ($j === $desenUzunluk) {
                // Eşleşmenin başlangıç indeksini ekle
                $eşleşmeler[] = $i - $desenUzunluk + 1;
                // Örtüşen eşleşmeler için devam et
                $j = $önekTablo[$j - 1];
            }
        }
        
        return $eşleşmeler;
    }
}

/**
 * KMP algoritmasının kullanımı örneği
 */
function örnekKullanım() {
    $kmpArama = new KMPArama();
    
    // Test metni ve deseni
    $metin = "Merhaba KMP, bu bir örnek metindir. Merhaba herkese!";
    $desen = "Merhaba";
    
    // Desenin metin içinde aranması
    $eşleşmeler = $kmpArama->ara($metin, $desen);
    
    // Sonuçların gösterilmesi
    if (count($eşleşmeler) > 0) {
        echo "'" . $desen . "' deseni metin içinde şu pozisyonlarda bulundu:<br>";
        foreach ($eşleşmeler as $pozisyon) {
            echo "- İndeks " . $pozisyon . "<br>";
        }
    } else {
        echo "'" . $desen . "' deseni metin içinde bulunamadı.<br>";
    }
}

// Örnek kullanımı çalıştır
örnekKullanım();
?>