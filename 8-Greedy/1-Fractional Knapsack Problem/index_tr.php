<?php

/**
 * Eşya sınıfı, her bir eşyanın ağırlık ve değer bilgilerini tutar.
 */
class Esya {
    public float $agirlik;
    public float $deger;
    
    public function __construct(float $agirlik, float $deger) {
        $this->agirlik = $agirlik;
        $this->deger = $deger;
    }
    
    /**
     * Eşyanın değer/ağırlık oranını döndürür.
     */
    public function getOran(): float {
        return $this->deger / $this->agirlik;
    }
}

/**
 * Fractional Knapsack (Parçalanabilir Sırt Çantası) problemini çözen fonksiyon.
 * @param Esya[] $esyaListesi - Eşyaların bulunduğu dizi.
 * @param float $maksKapasite - Çantanın maksimum taşıma kapasitesi.
 * @return float - Çantaya konulabilecek maksimum toplam değer.
 */
function fractionalSirtCantasi(array $esyaListesi, float $maksKapasite): float {
    // Eşyaları değer/ağırlık oranına göre azalan şekilde sırala
    usort($esyaListesi, fn($a, $b) => $b->getOran() <=> $a->getOran());
    
    $toplamDeger = 0.0;
    $kalanKapasite = $maksKapasite;
    
    foreach ($esyaListesi as $esya) {
        // Çantada yer kalmadıysa işlemi sonlandır
        if ($kalanKapasite <= 0) {
            break;
        }
        
        // Eğer eşyanın tamamı çantaya sığıyorsa, tamamını ekle
        if ($esya->agirlik <= $kalanKapasite) {
            $toplamDeger += $esya->deger;
            $kalanKapasite -= $esya->agirlik;
        } else {
            // Eğer eşyanın tamamı sığmıyorsa, sadece sığacak kısmını ekle
            $toplamDeger += $esya->getOran() * $kalanKapasite;
            break;
        }
    }
    
    return $toplamDeger;
}

// Örnek Kullanım
$esyaListesi = [
    new Esya(10, 60), // 10 kg ağırlığında ve 60 birim değerinde eşya
    new Esya(20, 100), // 20 kg ağırlığında ve 100 birim değerinde eşya
    new Esya(30, 120) // 30 kg ağırlığında ve 120 birim değerinde eşya
];

$maksKapasite = 50; // Çantanın maksimum kapasitesi
$maksDeger = fractionalSirtCantasi($esyaListesi, $maksKapasite);

echo "Maksimum Toplam Değer: $maksDeger"; // Sonucu ekrana yazdır

?>
