<?php

// Karınca Kolonisi Optimizasyonu sınıfı
class KarincaKolonisiOptimizasyonu
{
    // Parametreler
    private $karincaSayisi;
    private $jenerasyonSayisi;
    private $feromonMiktari;
    private $evrimHizi;
    private $hedefFonksiyon;
    private $feromonTablosu;
    
    // Constructor ile parametreler ayarlanır
    public function __construct($karincaSayisi, $jenerasyonSayisi, $feromonMiktari, $evrimHizi, $hedefFonksiyon)
    {
        $this->karincaSayisi = $karincaSayisi;
        $this->jenerasyonSayisi = $jenerasyonSayisi;
        $this->feromonMiktari = $feromonMiktari;
        $this->evrimHizi = $evrimHizi;
        $this->hedefFonksiyon = $hedefFonksiyon;

        // Başlangıçta feromon tablosu oluşturuluyor
        $this->feromonTablosu = [];
    }

    // Başlangıç feromonlarını oluşturur (her yol için eşit miktarda)
    private function feromonlarıBaşlat($yolSayisi)
    {
        for ($i = 0; $i < $yolSayisi; $i++) {
            $this->feromonTablosu[$i] = 1.0;  // Tüm yollar başlangıçta eşit feromon miktarına sahip
        }
    }

    // Karınca, mevcut yolları gezerek bir çözüm oluşturur
    private function karincaYolu($yolSayisi)
    {
        $yol = [];
        for ($i = 0; $i < $yolSayisi; $i++) {
            $yol[] = rand(0, 1);  // Basit bir çözüm üretme (örneğin 0 ve 1 arasında kararlar)
        }
        return $yol;
    }

    // Hedef fonksiyon (optimize edilmek istenen fonksiyon)
    private function hedefFonksiyonu($yol)
    {
        return call_user_func($this->hedefFonksiyon, $yol);  // Hedef fonksiyonu çalıştırarak yolun uygunluğunu ölçeriz
    }

    // Feromon tablosunu günceller
    private function feromonlarıGüncelle($yol, $değer)
    {
        for ($i = 0; $i < count($yol); $i++) {
            $this->feromonTablosu[$i] = (1 - $this->evrimHizi) * $this->feromonTablosu[$i] + $this->evrimHizi * $değer;
        }
    }

    // Karınca Kolonisi Optimizasyonunu çalıştırır
    public function optimize()
    {
        // Başlangıçta feromonları başlatıyoruz
        $yolSayisi = 10;  // Örnek olarak 10 yol olduğunu varsayıyoruz
        $this->feromonlarıBaşlat($yolSayisi);

        // Jenerasyon başına karınca kolonisi döngüsünü başlatıyoruz
        for ($jenerasyon = 0; $jenerasyon < $this->jenerasyonSayisi; $jenerasyon++) {
            $enİyiDeğer = INF;
            $enİyiYol = [];

            // Her bir karınca için yol seçimi
            for ($karinca = 0; $karinca < $this->karincaSayisi; $karinca++) {
                $yol = $this->karincaYolu($yolSayisi);  // Karınca yolu oluşturur
                $değer = $this->hedefFonksiyonu($yol);  // Yolu hedef fonksiyonu ile değerlendirir

                // En iyi yolu bulur
                if ($değer < $enİyiDeğer) {
                    $enİyiDeğer = $değer;
                    $enİyiYol = $yol;
                }
            }

            // En iyi yol için feromonları günceller
            $this->feromonlarıGüncelle($enİyiYol, $enİyiDeğer);

            // Her jenerasyon sonunda en iyi sonucu yazdırıyoruz
            echo "Jenerasyon: " . ($jenerasyon + 1) . " - En iyi çözüm değeri: " . $enİyiDeğer . "\n";
        }

        // Sonuç: en iyi çözümü döndür
        return $enİyiYol;
    }
}

// Hedef fonksiyon (örn: x^2 - 5x + 6 şeklinde basit bir fonksiyon)
$hedefFonksiyonu = function($yol) {
    // Burada basitçe yolu binary (0 ve 1) olarak ele alıyoruz ve integer'a çeviriyoruz
    $değer = bindec(implode('', $yol));  // Binari değeri integer'a çevir
    return ($değer - 3) * ($değer - 3);  // Hedef fonksiyon örneği: (x-3)^2
};

// Parametreler
$karincaSayisi = 20;
$jenerasyonSayisi = 50;
$feromonMiktari = 1.0;
$evrimHizi = 0.5;  // Feromonların ne kadar hızlı evrileceğini belirler
$maxJenerasyonSayisi = 100;

// Karınca Kolonisi Optimizasyonunu başlat
$karincaOptimizasyonu = new KarincaKolonisiOptimizasyonu($karincaSayisi, $jenerasyonSayisi, $feromonMiktari, $evrimHizi, $hedefFonksiyonu);
$sonuç = $karincaOptimizasyonu->optimize();

// En iyi çözümü yazdır
echo "En iyi çözüm: " . bindec(implode('', $sonuç)) . "\n"; // Çözümü binary'den tekrar decimal'e çeviriyoruz
?>
