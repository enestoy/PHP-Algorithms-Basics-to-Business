<?php

// Simulated Annealing algoritması için temel sınıf
class SimulatedAnnealing
{
    // Başlangıç parametreleri
    private $sıcaklık;
    private $sıcaklıkSon;
    private $soğumaHızı;
    
    // Hedef fonksiyon (optimize edilmek istenen fonksiyon)
    private $hedefFonksiyon;

    // Constructor ile başlangıç değerleri ayarlanır
    public function __construct($başlangıçSıcaklık, $sıcaklıkSon, $soğumaHızı, $hedefFonksiyon)
    {
        $this->sıcaklık = $başlangıçSıcaklık;
        $this->sıcaklıkSon = $sıcaklıkSon;
        $this->soğumaHızı = $soğumaHızı;
        $this->hedefFonksiyon = $hedefFonksiyon;
    }

    // Hedef fonksiyonu kullanarak yeni bir çözüm (x) üretir
    private function çözümÜret($x)
    {
        return $x + rand(-1, 1); // Basit bir x değişikliği
    }

    // Algoritmanın çalışmasını başlatır
    public function optimize()
    {
        // Başlangıç çözümü
        $x = rand(-10, 10); // Başlangıç noktası rastgele belirlenir
        $bestX = $x;
        $bestDeğer = call_user_func($this->hedefFonksiyon, $x); // Başlangıç değeri

        while ($this->sıcaklık > $this->sıcaklıkSon) {
            // Yeni çözüm üret
            $y = $this->çözümÜret($x);
            $değer = call_user_func($this->hedefFonksiyon, $y);

            // Değişiklik kabul edilir veya reddedilir
            if ($değer < $bestDeğer || rand(0, 100) < $this->acceptanceProbability($bestDeğer, $değer)) {
                $x = $y;
                $bestDeğer = $değer;
                $bestX = $x;
            }

            // Sıcaklık düşürülür
            $this->sıcaklık *= $this->soğumaHızı;
        }

        // En iyi bulunan çözümü döndür
        return $bestX;
    }

    // Yeni çözümün kabul edilme olasılığı
    private function acceptanceProbability($currentDeğer, $newDeğer)
    {
        if ($newDeğer < $currentDeğer) {
            return 1.0; // Daha iyi çözüm her zaman kabul edilir
        }

        // Daha kötü çözüm, sıcaklığa bağlı olarak kabul edilebilir
        return exp(($currentDeğer - $newDeğer) / $this->sıcaklık);
    }
}

// Hedef fonksiyon (örneğin, y = x^2) 
$hedefFonksiyon = function($x) {
    return $x * $x; // Basit bir fonksiyon
};

// Algoritma için parametreler
$başlangıçSıcaklık = 100;
$sıcaklıkSon = 0.01;
$soğumaHızı = 0.99;

// Algoritmayı çalıştır
$simulatedAnnealing = new SimulatedAnnealing($başlangıçSıcaklık, $sıcaklıkSon, $soğumaHızı, $hedefFonksiyon);
$sonuç = $simulatedAnnealing->optimize();

// Sonuçları yazdır
echo "En iyi çözüm: " . $sonuç . "\n";
echo "Hedef fonksiyon değeri: " . $hedefFonksiyon($sonuç) . "\n";

?>
