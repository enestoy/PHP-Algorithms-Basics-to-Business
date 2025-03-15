<?php

/**
 * Rabin-Karp string eşleştirme algoritması uygulaması
 * 
 * Bu algoritma, bir metin içinde bir desenin eşleşmelerini hash değerlerini kullanarak bulur.
 * Hash değerleri sayesinde, karakterlerin tek tek karşılaştırılmasını minimuma indirir.
 */
class RabinKarpArama {
    
    /**
     * Hash hesaplaması için kullanılacak asal sayı
     * @var int
     */
    private $asalSayı = 101;
    
    /**
     * Karakter kümesi boyutu (ASCII için 256)
     * @var int
     */
    private $karakterKümesiBoyutu = 256;
    
    /**
     * Bir string için hash değeri hesaplar
     * 
     * @param string $metin Hash değeri hesaplanacak metin
     * @param int $uzunluk Metnin uzunluğu
     * @return int Hash değeri
     */
    private function hashHesapla(string $metin, int $uzunluk): int {
        $hash = 0;
        
        // İlk 'uzunluk' karakteri için hash değeri hesapla
        for ($i = 0; $i < $uzunluk; $i++) {
            $hash = ($this->karakterKümesiBoyutu * $hash + ord($metin[$i])) % $this->asalSayı;
        }
        
        return $hash;
    }
    
    /**
     * Kayan pencere için hash değerini günceller
     * 
     * @param int $eskiHash Önceki hash değeri
     * @param string $metin Metin
     * @param int $eskiIndeks Çıkarılacak karakterin indeksi
     * @param int $yeniIndeks Eklenecek karakterin indeksi
     * @param int $desenUzunluk Desen uzunluğu
     * @return int Yeni hash değeri
     */
    private function hashGüncelle(int $eskiHash, string $metin, int $eskiIndeks, int $yeniIndeks, int $desenUzunluk): int {
        $yeniHash = $eskiHash;
        
        // Çıkarılacak karakteri hash'ten çıkar
        $yeniHash = ($yeniHash - ord($metin[$eskiIndeks]) * $this->üsAl($this->karakterKümesiBoyutu, $desenUzunluk - 1)) % $this->asalSayı;
        if ($yeniHash < 0) {
            $yeniHash += $this->asalSayı;
        }
        
        // Yeni karakteri hash'e ekle
        $yeniHash = ($yeniHash * $this->karakterKümesiBoyutu + ord($metin[$yeniIndeks])) % $this->asalSayı;
        
        return $yeniHash;
    }
    
    /**
     * Modüler üs alma işlemi
     * 
     * @param int $taban Taban değeri
     * @param int $üs Üs değeri
     * @return int Sonuç
     */
    private function üsAl(int $taban, int $üs): int {
        $sonuç = 1;
        $taban = $taban % $this->asalSayı;
        
        while ($üs > 0) {
            // Eğer üs tek sayı ise, sonuca tabanı ekle
            if ($üs % 2 == 1) {
                $sonuç = ($sonuç * $taban) % $this->asalSayı;
            }
            
            // Üs yarıya indirilir
            $üs = $üs >> 1;
            // Taban karesini alır
            $taban = ($taban * $taban) % $this->asalSayı;
        }
        
        return $sonuç;
    }
    
    /**
     * Rabin-Karp algoritması ile bir metin içinde desen arar
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
        
        // Desen hash değeri hesapla
        $desenHash = $this->hashHesapla($desen, $desenUzunluk);
        
        // Metnin ilk 'desenUzunluk' karakteri için hash değeri hesapla
        $metinHash = $this->hashHesapla($metin, $desenUzunluk);
        
        // Metin içinde kayan pencere ile arama
        for ($i = 0; $i <= $metinUzunluk - $desenUzunluk; $i++) {
            // Hash değerleri eşleşiyorsa karakter karakter kontrol et
            if ($metinHash === $desenHash) {
                $eşleşiyor = true;
                
                // Karakterleri karşılaştır
                for ($j = 0; $j < $desenUzunluk; $j++) {
                    if ($metin[$i + $j] !== $desen[$j]) {
                        $eşleşiyor = false;
                        break;
                    }
                }
                
                // Tam eşleşme bulunduğunda
                if ($eşleşiyor) {
                    $eşleşmeler[] = $i;
                }
            }
            
            // Sonraki pencere için hash değerini güncelle
            if ($i < $metinUzunluk - $desenUzunluk) {
                $metinHash = $this->hashGüncelle(
                    $metinHash,
                    $metin,
                    $i,
                    $i + $desenUzunluk,
                    $desenUzunluk
                );
            }
        }
        
        return $eşleşmeler;
    }
}

/**
 * Rabin-Karp algoritmasının kullanımı örneği
 */
function örnekKullanım() {
    $rabinKarpArama = new RabinKarpArama();
    
    // Test metni ve deseni
    $metin = "Algoritma analizi dersi için Rabin-Karp algoritmasının örnek uygulaması. Rabin-Karp çok verimli bir algoritmadır.";
    $desen = "Rabin-Karp";
    
    // Desenin metin içinde aranması
    $eşleşmeler = $rabinKarpArama->ara($metin, $desen);
    
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