<?php

/**
 * Huffman Düğüm Sınıfı
 * Her karakteri ve onun frekansını içeren bir düğüm yapısı oluşturur.
 */
class Dugum {
    public string $karakter;
    public int $frekans;
    public ?Dugum $sol;
    public ?Dugum $sag;
    
    public function __construct(string $karakter, int $frekans, ?Dugum $sol = null, ?Dugum $sag = null) {
        $this->karakter = $karakter;
        $this->frekans = $frekans;
        $this->sol = $sol;
        $this->sag = $sag;
    }
}

/**
 * Huffman Ağaç Yapısını Oluşturan Fonksiyon
 * @param array $frekanslar - Karakter ve frekanslarını içeren dizi
 * @return Dugum - Huffman ağacının kök düğümü
 */
function huffmanAgaciOlustur(array $frekanslar): Dugum {
    // Düğümleri frekansa göre sıralı hale getiren öncelik kuyruğu
    $dugumler = [];
    foreach ($frekanslar as $karakter => $frekans) {
        $dugumler[] = new Dugum($karakter, $frekans);
    }
    
    // Düğümleri küçükten büyüğe sırala
    usort($dugumler, fn($a, $b) => $a->frekans <=> $b->frekans);
    
    while (count($dugumler) > 1) {
        // En düşük frekanslı iki düğümü al
        $sol = array_shift($dugumler);
        $sag = array_shift($dugumler);
        
        // Yeni bir iç düğüm oluştur (karakteri yoktur)
        $yeniDugum = new Dugum("", $sol->frekans + $sag->frekans, $sol, $sag);
        
        // Yeni düğümü kuyruğa ekle
        $dugumler[] = $yeniDugum;
        
        // Tekrar sıralama yap
        usort($dugumler, fn($a, $b) => $a->frekans <=> $b->frekans);
    }
    
    return $dugumler[0]; // Kök düğüm
}

/**
 * Huffman Kodlarını Oluşturma
 * @param Dugum $kok - Huffman ağacının kök düğümü
 * @param string $kod - Oluşturulan kod
 * @param array $kodlar - Karakter ve kod eşleşmelerini içeren dizi
 */
function huffmanKodlariniOlustur(Dugum $kok, string $kod = "", array &$kodlar = []) {
    if ($kok->karakter !== "") {
        $kodlar[$kok->karakter] = $kod;
        return;
    }
    
    huffmanKodlariniOlustur($kok->sol, $kod . "0", $kodlar);
    huffmanKodlariniOlustur($kok->sag, $kod . "1", $kodlar);
}

// Örnek Kullanım
$metin = "BABAABB";

// Karakter frekanslarını hesapla
$frekanslar = array_count_values(str_split($metin));

// Huffman ağacını oluştur
$kok = huffmanAgaciOlustur($frekanslar);

// Huffman kodlarını belirle
$kodlar = [];
huffmanKodlariniOlustur($kok, "", $kodlar);

// Sonuçları ekrana yazdır
echo "Huffman Kodları:\n";
foreach ($kodlar as $karakter => $kod) {
    echo "$karakter: $kod\n";
}

?>
