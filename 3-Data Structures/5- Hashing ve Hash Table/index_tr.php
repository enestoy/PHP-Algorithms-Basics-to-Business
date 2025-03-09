<?php

class HashTable
{
    private $tablo; // Hash tablosu

    // HashTable constructor
    public function __construct($boyut)
    {
        $this->tablo = array_fill(0, $boyut, null); // Hash tablosunu başlat
    }

    // Hash fonksiyonu (Anahtarı alıp index'e dönüştürür)
    private function hashFonksiyonu($anahtar)
    {
        return crc32($anahtar) % count($this->tablo); // CRC32 fonksiyonu ile hash kodu üretir
    }

    // Anahtar-değer çiftini ekler
    public function ekle($anahtar, $deger)
    {
        $index = $this->hashFonksiyonu($anahtar); // Anahtarın hash kodunu al
        if ($this->tablo[$index] !== null) {
            // Çakışma varsa, zincirleme ile çözüm
            $this->tablo[$index][] = [$anahtar, $deger];
        } else {
            // Çakışma yoksa, doğrudan ekleme
            $this->tablo[$index] = [$anahtar, $deger];
        }
    }

    // Anahtara karşılık gelen değeri getirir
    public function getir($anahtar)
    {
        $index = $this->hashFonksiyonu($anahtar); // Anahtarın hash kodunu al
        if ($this->tablo[$index] !== null) {
            // Eğer slot doluysa, zincirleme yapılmışsa arama
            foreach ($this->tablo[$index] as $eleman) {
                if ($eleman[0] === $anahtar) {
                    return $eleman[1]; // Anahtara karşılık gelen değeri döndür
                }
            }
        }
        return null; // Eğer değer bulunamazsa null döndür
    }

    // Anahtarı ve değerini siler
    public function sil($anahtar)
    {
        $index = $this->hashFonksiyonu($anahtar); // Anahtarın hash kodunu al
        if ($this->tablo[$index] !== null) {
            // Eğer slot doluysa, zincirleme yapılmışsa arama
            foreach ($this->tablo[$index] as $i => $eleman) {
                if ($eleman[0] === $anahtar) {
                    unset($this->tablo[$index][$i]); // Anahtarı ve değerini sil
                    return true;
                }
            }
        }
        return false; // Eğer değer bulunamazsa false döndür
    }

    // Hash tablosunun içeriğini yazdırır
    public function yazdir()
    {
        foreach ($this->tablo as $index => $degerler) {
            if ($degerler !== null) {
                echo "Index $index: ";
                if (is_array($degerler)) {
                    foreach ($degerler as $eleman) {
                        echo "[Anahtar: " . $eleman[0] . ", Değer: " . $eleman[1] . "] ";
                    }
                } else {
                    echo "[Anahtar: " . $degerler[0] . ", Değer: " . $degerler[1] . "]";
                }
                echo "<br>";
            }
        }
    }
}

// Kullanım örneği
$hashTablosu = new HashTable(10); // 10 elemanlık bir hash tablosu oluşturuluyor

// Veriler ekleniyor
$hashTablosu->ekle("Anahtar1", "Değer1");
$hashTablosu->ekle("Anahtar2", "Değer2");
$hashTablosu->ekle("Anahtar3", "Değer3");
$hashTablosu->ekle("Anahtar4", "Değer4");

// Tabloyu yazdır
$hashTablosu->yazdir();

// Anahtar ile değer getirme
echo "Anahtar2'ye karşılık gelen değer: " . $hashTablosu->getir("Anahtar2") . "<br>"; // Değer2 döndürülür

// Anahtar silme
$hashTablosu->sil("Anahtar2");

// Tabloyu yeniden yazdır
$hashTablosu->yazdir();

?>
