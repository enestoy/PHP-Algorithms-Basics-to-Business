<?php

/**
 * Eratosthenes Kalburu (Sieve of Eratosthenes) Algoritması
 * 
 * Bu algoritma, belirli bir sayıya kadar olan tüm asal sayıları verimli bir şekilde bulur.
 * Temel prensibi, asal olmayan sayıları eleme (kalburlama) işlemine dayanır.
 */
class EratosthenesKalburu {
    
    /**
     * Belirli bir üst limite kadar olan tüm asal sayıları bulur
     * 
     * @param int $üstLimit Aranacak asal sayıların üst limiti
     * @return array Bulunan asal sayıların dizisi
     */
    public function asalSayılarıBul(int $üstLimit): array {
        // 2'den küçük değerler için boş dizi döndür
        if ($üstLimit < 2) {
            return [];
        }
        
        // Başlangıçta tüm sayıların asal olduğunu varsay
        $asalMı = array_fill(0, $üstLimit + 1, true);
        
        // 0 ve 1 asal değildir, false olarak işaretle
        $asalMı[0] = $asalMı[1] = false;
        
        // Kalbur işlemi: limit değerinin kareköküne kadar kontrol et
        $sınır = (int)sqrt($üstLimit);
        
        for ($sayı = 2; $sayı <= $sınır; $sayı++) {
            // Eğer sayı elenmemişse (asalsa)
            if ($asalMı[$sayı]) {
                // Sayının tüm katlarını ele (asal değil olarak işaretle)
                for ($katı = $sayı * $sayı; $katı <= $üstLimit; $katı += $sayı) {
                    $asalMı[$katı] = false;
                }
            }
        }
        
        // Asal sayıları topla ve döndür
        $asalSayılar = [];
        for ($sayı = 2; $sayı <= $üstLimit; $sayı++) {
            if ($asalMı[$sayı]) {
                $asalSayılar[] = $sayı;
            }
        }
        
        return $asalSayılar;
    }
    
    /**
     * Belirli bir aralıktaki asal sayıları bulur
     * 
     * @param int $altLimit Aralığın alt limiti
     * @param int $üstLimit Aralığın üst limiti
     * @return array Belirtilen aralıktaki asal sayıların dizisi
     */
    public function aralıktakiAsallarıBul(int $altLimit, int $üstLimit): array {
        // Limit kontrolü
        if ($altLimit < 0 || $üstLimit < $altLimit) {
            return [];
        }
        
        // Önce üst limite kadar tüm asalları bul
        $tümAsallar = $this->asalSayılarıBul($üstLimit);
        
        // Alt limitten büyük veya eşit olanları filtrele
        $aralıktakiAsallar = array_filter($tümAsallar, function($sayı) use ($altLimit) {
            return $sayı >= $altLimit;
        });
        
        // Dizinin indekslerini yeniden düzenle
        return array_values($aralıktakiAsallar);
    }
    
    /**
     * Belirli bir üst limite kadar asalların sayısını hesaplar (Asal Sayma Fonksiyonu)
     * 
     * @param int $üstLimit Üst limit
     * @return int Bulunan asal sayıların adedi
     */
    public function asalSayısınıHesapla(int $üstLimit): int {
        $asallar = $this->asalSayılarıBul($üstLimit);
        return count($asallar);
    }
    
    /**
     * Daha az bellek kullanımı için optimize edilmiş Eratosthenes Kalburu
     * 
     * @param int $üstLimit Aranacak asal sayıların üst limiti
     * @return array Bulunan asal sayıların dizisi
     */
    public function belleğiVerimliAsalSayılarıBul(int $üstLimit): array {
        // 2'den küçük değerler için boş dizi döndür
        if ($üstLimit < 2) {
            return [];
        }
        
        // Çift sayıları eleme yöntemiyle bellek kullanımını yarıya indir
        // Sadece tek sayıları sakla (2 hariç tüm çift sayılar asal değildir)
        $sınır = (int)(($üstLimit - 1) / 2);
        $asalMı = array_fill(0, $sınır + 1, true);
        
        // Kalbur işlemi
        $çaprazSınır = (int)((sqrt($üstLimit) - 1) / 2);
        
        for ($i = 1; $i <= $çaprazSınır; $i++) {
            if ($asalMı[$i]) {
                // 2*i+1 bir asal sayıdır, katlarını ele
                $sayı = 2 * $i + 1;
                // j = 2*i*(i+1) formülü, sayı*sayı'nın indeksini verir
                for ($j = 2 * $i * ($i + 1); $j <= $sınır; $j += $sayı) {
                    $asalMı[$j] = false;
                }
            }
        }
        
        // Sonuçları topla
        $asalSayılar = [2]; // 2'yi manuel olarak ekle
        for ($i = 1; $i <= $sınır; $i++) {
            if ($asalMı[$i]) {
                $asalSayılar[] = 2 * $i + 1;
            }
        }
        
        return $asalSayılar;
    }
    
    /**
     * Segmentli Eratosthenes Kalburu - Çok büyük sayı aralıkları için uygundur
     * 
     * @param int $üstLimit Aranacak asal sayıların üst limiti
     * @param int $segmentBoyutu Segment boyutu
     * @return array Bulunan asal sayıların dizisi
     */
    public function segmentliAsalSayılarıBul(int $üstLimit, int $segmentBoyutu = 1000000): array {
        // 2'den küçük değerler için boş dizi döndür
        if ($üstLimit < 2) {
            return [];
        }
        
        // Kök asalları bulma (segmentler için kullanılacak)
        $kökSınır = (int)sqrt($üstLimit);
        $kökAsallar = $this->asalSayılarıBul($kökSınır);
        $asalSayılar = $kökAsallar; // Kök asalları sonuç dizisine ekle
        
        // Segmentleri işle
        $düşükLimit = $kökSınır + 1;
        $yüksekLimit = min($düşükLimit + $segmentBoyutu - 1, $üstLimit);
        
        while ($düşükLimit <= $üstLimit) {
            // Segment için bir işaret dizisi oluştur
            $segmentBoyu = $yüksekLimit - $düşükLimit + 1;
            $işaret = array_fill(0, $segmentBoyu, true);
            
            // Kök asallar kullanılarak segment üzerinde kalburlama işlemi
            foreach ($kökAsallar as $asal) {
                // Segment içindeki ilk katı bul
                $başlangıç = (int)ceil($düşükLimit / $asal) * $asal;
                if ($başlangıç < $düşükLimit) {
                    $başlangıç += $asal;
                }
                
                // Segment içindeki tüm katları işaretle
                for ($j = $başlangıç; $j <= $yüksekLimit; $j += $asal) {
                    $işaret[$j - $düşükLimit] = false;
                }
            }
            
            // Segmentteki işaretlenmemiş (asal) sayıları ekle
            for ($i = 0; $i < $segmentBoyu; $i++) {
                if ($işaret[$i] && ($düşükLimit + $i) > $kökSınır) {
                    $asalSayılar[] = $düşükLimit + $i;
                }
            }
            
            // Sonraki segmente geç
            $düşükLimit = $yüksekLimit + 1;
            $yüksekLimit = min($düşükLimit + $segmentBoyutu - 1, $üstLimit);
        }
        
        // Sayıları sırala ve döndür
        sort($asalSayılar);
        return $asalSayılar;
    }
}

/**
 * Eratosthenes Kalburu algoritmasının örnek kullanımı
 */
function örnekKullanım() {
    $kalbur = new EratosthenesKalburu();
    
    echo "1. Temel Eratosthenes Kalburu:\n";
    echo "-----------------------------\n";
    
    $limit = 100;
    $başlangıçZamanı = microtime(true);
    $asalSayılar = $kalbur->asalSayılarıBul($limit);
    $bitişZamanı = microtime(true);
    $süre = round(($bitişZamanı - $başlangıçZamanı) * 1000, 4);
    
    echo "$limit'e kadar olan asal sayılar: " . implode(", ", $asalSayılar) . "\n";
    echo "Asal sayı adedi: " . count($asalSayılar) . "\n";
    echo "İşlem süresi: $süre ms\n\n";
    
    echo "2. Belirli Aralıktaki Asal Sayılar:\n";
    echo "--------------------------------\n";
    
    $altLimit = 50;
    $üstLimit = 100;
    $aralıktakiAsallar = $kalbur->aralıktakiAsallarıBul($altLimit, $üstLimit);
    
    echo "$altLimit ile $üstLimit arasındaki asal sayılar: " . implode(", ", $aralıktakiAsallar) . "\n";
    echo "Asal sayı adedi: " . count($aralıktakiAsallar) . "\n\n";
    
    echo "3. Bellek Verimli Eratosthenes Kalburu:\n";
    echo "-----------------------------------\n";
    
    $limit = 100;
    $başlangıçZamanı = microtime(true);
    $verimliAsallar = $kalbur->belleğiVerimliAsalSayılarıBul($limit);
    $bitişZamanı = microtime(true);
    $süre = round(($bitişZamanı - $başlangıçZamanı) * 1000, 4);
    
    echo "$limit'e kadar olan asal sayılar (bellek verimli): " . implode(", ", $verimliAsallar) . "\n";
    echo "Asal sayı adedi: " . count($verimliAsallar) . "\n";
    echo "İşlem süresi: $süre ms\n\n";
    
    echo "4. Daha Büyük Sayılar için Performans Testi:\n";
    echo "---------------------------------------\n";
    
    $limit = 1000000; // 1 milyon
    $başlangıçZamanı = microtime(true);
    $asalSayısı = $kalbur->asalSayısınıHesapla($limit);
    $bitişZamanı = microtime(true);
    $süre = round(($bitişZamanı - $başlangıçZamanı) * 1000, 2);
    
    echo "$limit'e kadar toplam $asalSayısı adet asal sayı bulundu.\n";
    echo "İşlem süresi: $süre ms\n";
}

// Örnek kullanımı çalıştır
örnekKullanım();
?>