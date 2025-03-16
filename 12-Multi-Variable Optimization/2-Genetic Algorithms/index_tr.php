<?php

// Genetik Algoritma sınıfı
class GenetikAlgoritma
{
    // Popülasyon büyüklüğü, genetik algoritmanın parametreleri
    private $popülasyonBüyüklüğü;
    private $genomUzunluğu;
    private $soğumaHızı;
    private $mutasyonOranı;
    private $maxJenerasyonSayısı;
    
    // Hedef fonksiyon (optimize edilmek istenen fonksiyon)
    private $hedefFonksiyon;

    // Constructor ile parametreler ayarlanır
    public function __construct($popülasyonBüyüklüğü, $genomUzunluğu, $soğumaHızı, $mutasyonOranı, $maxJenerasyonSayısı, $hedefFonksiyon)
    {
        $this->popülasyonBüyüklüğü = $popülasyonBüyüklüğü;
        $this->genomUzunluğu = $genomUzunluğu;
        $this->soğumaHızı = $soğumaHızı;
        $this->mutasyonOranı = $mutasyonOranı;
        $this->maxJenerasyonSayısı = $maxJenerasyonSayısı;
        $this->hedefFonksiyon = $hedefFonksiyon;
    }

    // Rastgele bir genom üretir
    private function genomÜret()
    {
        $genom = "";
        for ($i = 0; $i < $this->genomUzunluğu; $i++) {
            $genom .= rand(0, 1);  // 0 veya 1
        }
        return $genom;
    }

    // Popülasyon oluşturur (başlangıçtaki bireyler)
    private function popülasyonOluştur()
    {
        $popülasyon = [];
        for ($i = 0; $i < $this->popülasyonBüyüklüğü; $i++) {
            $popülasyon[] = $this->genomÜret(); // Başlangıçta rastgele genomlar
        }
        return $popülasyon;
    }

    // Genetik çaprazlama (iki birey arasındaki çaprazlama işlemi)
    private function çaprazla($birey1, $birey2)
    {
        $kesimNoktası = rand(1, $this->genomUzunluğu - 1); // Kesim noktası rastgele seçilir
        $çaprazlanmışBirey1 = substr($birey1, 0, $kesimNoktası) . substr($birey2, $kesimNoktası);
        $çaprazlanmışBirey2 = substr($birey2, 0, $kesimNoktası) . substr($birey1, $kesimNoktası);
        return [$çaprazlanmışBirey1, $çaprazlanmışBirey2];
    }

    // Mutasyon işlemi (genetik değişiklik)
    private function mutasyon($genom)
    {
        $mutasyonluGenom = "";
        for ($i = 0; $i < $this->genomUzunluğu; $i++) {
            if (rand(0, 100) < $this->mutasyonOranı * 100) {
                // Rastgele bir bit değiştir
                $mutasyonluGenom .= $genom[$i] == "0" ? "1" : "0";
            } else {
                $mutasyonluGenom .= $genom[$i];
            }
        }
        return $mutasyonluGenom;
    }

    // Bireylerin fitness değerini hesaplar
    private function fitness($genom)
    {
        return call_user_func($this->hedefFonksiyon, $genom); // Hedef fonksiyonu kullanarak fitness hesaplanır
    }

    // Popülasyonu sıralar (fitness değerlerine göre)
    private function popülasyonuSırala($popülasyon)
    {
        usort($popülasyon, function($birey1, $birey2) {
            return $this->fitness($birey2) - $this->fitness($birey1); // Fitness değerine göre büyükten küçüğe sırala
        });
        return $popülasyon;
    }

    // Genetik algoritma çalıştırılır
    public function çalıştır()
    {
        // Başlangıç popülasyonunu oluştur
        $popülasyon = $this->popülasyonOluştur();

        // Jenerasyon sayısını takip et
        for ($jenerasyon = 0; $jenerasyon < $this->maxJenerasyonSayısı; $jenerasyon++) {
            // Popülasyonu fitness değerlerine göre sırala
            $popülasyon = $this->popülasyonuSırala($popülasyon);

            // En iyi bireyi ekrana yazdır
            echo "Jenerasyon: " . ($jenerasyon + 1) . " - En iyi fitness: " . $this->fitness($popülasyon[0]) . "\n";

            // Eğer en iyi birey istenilen değerlere ulaştıysa sonlandır
            if ($this->fitness($popülasyon[0]) == 0) {
                break;
            }

            // Yeni popülasyon oluştur
            $yeniPopülasyon = [];
            for ($i = 0; $i < $this->popülasyonBüyüklüğü / 2; $i++) {
                $birey1 = $popülasyon[$i];
                $birey2 = $popülasyon[$i + 1];

                // Çaprazlama
                list($çaprazlanmışBirey1, $çaprazlanmışBirey2) = $this->çaprazla($birey1, $birey2);

                // Mutasyon
                $yeniPopülasyon[] = $this->mutasyon($çaprazlanmışBirey1);
                $yeniPopülasyon[] = $this->mutasyon($çaprazlanmışBirey2);
            }

            // Yeni popülasyonu mevcut popülasyon ile değiştir
            $popülasyon = $yeniPopülasyon;

            // Sıcaklık düşürülür (soğuma)
            $this->soğumaHızı *= 0.99;
        }

        // Sonuç: en iyi bireyi döndür
        return $popülasyon[0];
    }
}

// Hedef fonksiyon (örn: x^2 - 5x + 6 şeklinde basit bir fonksiyon)
$hedefFonksiyon = function($genom) {
    // Genomu binary (0 ve 1) değeri olarak yorumlayıp, onu integer'a çeviriyoruz
    $değer = bindec($genom); // Binari değeri integer'a çevirir
    return ($değer - 3) * ($değer - 3); // Hedef fonksiyon örneği: (x-3)^2
};

// Algoritma parametreleri
$popülasyonBüyüklüğü = 100;
$genomUzunluğu = 10;
$soğumaHızı = 1;
$mutasyonOranı = 0.01;
$maxJenerasyonSayısı = 100;

// Genetik algoritmayı başlat
$genetikAlgoritma = new GenetikAlgoritma($popülasyonBüyüklüğü, $genomUzunluğu, $soğumaHızı, $mutasyonOranı, $maxJenerasyonSayısı, $hedefFonksiyon);
$sonuç = $genetikAlgoritma->çalıştır();

// En iyi çözümü yazdır
echo "En iyi çözüm: " . bindec($sonuç[0]) . "\n"; // Çözümü binary'den tekrar decimal'e çeviriyoruz
?>
