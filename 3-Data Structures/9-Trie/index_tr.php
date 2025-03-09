<?php

// Trie düğümünü temsil eden sınıf
class TrieDugumu
{
    public $cocuklar = []; // Çocuk düğümleri tutan dizi
    public $kelimeSonu = false; // Bu düğüm bir kelimenin sonunu temsil ediyor mu?

    public function __construct()
    {
        // Başlangıçta çocuk düğümler boş olarak ayarlanır
        $this->cocuklar = [];
        $this->kelimeSonu = false;
    }
}

// Trie veri yapısını temsil eden sınıf
class Trie
{
    private $kok; // Trie'nin kök düğümü

    public function __construct()
    {
        // Trie oluşturulduğunda kök düğümü başlat
        $this->kok = new TrieDugumu();
    }

    // Trie'ye yeni bir kelime ekler
    public function kelimeEkle($kelime)
    {
        $mevcutDugum = $this->kok; // Kök düğümden başla

        // Kelimenin her karakteri için düğüm oluştur veya var olanı kullan
        for ($i = 0; $i < strlen($kelime); $i++) {
            $karakter = $kelime[$i];

            // Eğer karakter için bir düğüm yoksa, yeni bir düğüm oluştur
            if (!isset($mevcutDugum->cocuklar[$karakter])) {
                $mevcutDugum->cocuklar[$karakter] = new TrieDugumu();
            }

            // Mevcut düğümü güncelle
            $mevcutDugum = $mevcutDugum->cocuklar[$karakter];
        }

        // Kelimenin sonunu işaretle
        $mevcutDugum->kelimeSonu = true;
    }

    // Trie'de bir kelimenin olup olmadığını kontrol eder
    public function kelimeAra($kelime)
    {
        $mevcutDugum = $this->kok; // Kök düğümden başla

        // Kelimenin her karakteri için düğümleri kontrol et
        for ($i = 0; $i < strlen($kelime); $i++) {
            $karakter = $kelime[$i];

            // Eğer karakter için bir düğüm yoksa, kelime Trie'de yoktur
            if (!isset($mevcutDugum->cocuklar[$karakter])) {
                return false;
            }

            // Mevcut düğümü güncelle
            $mevcutDugum = $mevcutDugum->cocuklar[$karakter];
        }

        // Kelimenin sonu işaretliyse, kelime Trie'de vardır
        return $mevcutDugum->kelimeSonu;
    }

    // Belirli bir önekle başlayan tüm kelimeleri bulur
    public function onekleBaslayanKelimeler($onek)
    {
        $mevcutDugum = $this->kok; // Kök düğümden başla
        $sonuc = []; // Bulunan kelimeleri tutacak dizi

        // Önekin her karakteri için düğümleri kontrol et
        for ($i = 0; $i < strlen($onek); $i++) {
            $karakter = $onek[$i];

            // Eğer karakter için bir düğüm yoksa, önekle başlayan kelime yoktur
            if (!isset($mevcutDugum->cocuklar[$karakter])) {
                return $sonuc;
            }

            // Mevcut düğümü güncelle
            $mevcutDugum = $mevcutDugum->cocuklar[$karakter];
        }

        // Önekten sonraki tüm kelimeleri bul
        $this->tumKelimeleriBul($mevcutDugum, $onek, $sonuc);

        return $sonuc;
    }

    // Belirli bir düğümden başlayarak tüm kelimeleri bulur (yardımcı fonksiyon)
    private function tumKelimeleriBul($dugum, $onek, &$sonuc)
    {
        // Eğer düğüm bir kelimenin sonunu temsil ediyorsa, sonuca ekle
        if ($dugum->kelimeSonu) {
            $sonuc[] = $onek;
        }

        // Düğümün tüm çocuklarını gez
        foreach ($dugum->cocuklar as $karakter => $cocukDugum) {
            $this->tumKelimeleriBul($cocukDugum, $onek . $karakter, $sonuc);
        }
    }
}

// Örnek Kullanım
$trie = new Trie();

// Trie'ye kelimeler ekle
$trie->kelimeEkle("elma");
$trie->kelimeEkle("elmas");
$trie->kelimeEkle("armut");
$trie->kelimeEkle("araba");

// Kelime arama örnekleri
echo "'elma' kelimesi Trie'de var mı? " . ($trie->kelimeAra("elma") ? "Evet" : "Hayır") . "<br>"; // Evet
echo "'elm' kelimesi Trie'de var mı? " . ($trie->kelimeAra("elm") ? "Evet" : "Hayır") . "<br>"; // Hayır

// Önek arama örnekleri
echo "'el' önekiyle başlayan kelimeler: " . implode(", ", $trie->onekleBaslayanKelimeler("el")) . "<br>"; // elma, elmas
echo "'ar' önekiyle başlayan kelimeler: " . implode(", ", $trie->onekleBaslayanKelimeler("ar")) . "<br>"; // armut, araba