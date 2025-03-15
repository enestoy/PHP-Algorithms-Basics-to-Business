<?php

/**
 * Floyd'un Döngü Bulma Algoritması (Kaplumbağa ve Tavşan)
 * 
 * Bu algoritma, bağlı listelerde döngü tespiti için kullanılır.
 * İki işaretçi (kaplumbağa ve tavşan) farklı hızlarda ilerleyerek 
 * döngü varsa kesişir, yoksa tavşan sona ulaşır.
 */
class FloydDöngüBulma {
    
    /**
     * Bağlı liste düğümü sınıfı
     */
    private $Düğüm;
    
    /**
     * Constructor - Düğüm sınıfını tanımlar
     */
    public function __construct() {
        // PHP'de iç içe sınıf kullanımı için anonim sınıf tanımlama
        $this->Düğüm = new class {
            public $değer;
            public $sonraki;
            
            public function __construct($değer = null) {
                $this->değer = $değer;
                $this->sonraki = null;
            }
        };
    }
    
    /**
     * Yeni bir Düğüm oluşturur
     * 
     * @param mixed $değer Düğüm değeri
     * @return object Oluşturulan düğüm
     */
    public function düğümOluştur($değer) {
        return new $this->Düğüm($değer);
    }
    
    /**
     * Bağlı listede döngü olup olmadığını tespit eder
     * 
     * @param object $baş Bağlı listenin baş düğümü
     * @return bool Döngü varsa true, yoksa false döner
     */
    public function döngüTespit($baş) {
        // Boş liste kontrolü
        if ($baş === null || $baş->sonraki === null) {
            return false;
        }
        
        // Kaplumbağa ve tavşan işaretçileri başlangıçta baş düğümünü gösterir
        $kaplumbağa = $baş;
        $tavşan = $baş;
        
        // Tavşan sona ulaşana kadar veya kaplumbağa ile tavşan karşılaşana kadar devam et
        while ($tavşan !== null && $tavşan->sonraki !== null) {
            // Kaplumbağa 1 adım, tavşan 2 adım ilerler
            $kaplumbağa = $kaplumbağa->sonraki;         // 1 adım
            $tavşan = $tavşan->sonraki->sonraki;        // 2 adım
            
            // Kaplumbağa ve tavşan aynı düğümde buluşursa döngü vardır
            if ($kaplumbağa === $tavşan) {
                return true;
            }
        }
        
        // Tavşan sona ulaştı, döngü yoktur
        return false;
    }
    
    /**
     * Döngünün başlangıç noktasını bulur
     * 
     * @param object $baş Bağlı listenin baş düğümü
     * @return object|null Döngü başlangıç düğümü veya döngü yoksa null
     */
    public function döngüBaşlangıcıBul($baş) {
        // Boş liste kontrolü
        if ($baş === null || $baş->sonraki === null) {
            return null;
        }
        
        // 1. Aşama: Döngü tespiti
        $kaplumbağa = $baş;
        $tavşan = $baş;
        $döngüVar = false;
        
        while ($tavşan !== null && $tavşan->sonraki !== null) {
            $kaplumbağa = $kaplumbağa->sonraki;
            $tavşan = $tavşan->sonraki->sonraki;
            
            if ($kaplumbağa === $tavşan) {
                $döngüVar = true;
                break;
            }
        }
        
        // Döngü yoksa null döndür
        if (!$döngüVar) {
            return null;
        }
        
        // 2. Aşama: Döngü başlangıcını bul
        // Kaplumbağayı başa al, tavşan kesişme noktasında kalır
        $kaplumbağa = $baş;
        
        // İki işaretçi aynı hızda ilerler ve buluştukları nokta döngü başlangıcıdır
        while ($kaplumbağa !== $tavşan) {
            $kaplumbağa = $kaplumbağa->sonraki;
            $tavşan = $tavşan->sonraki;
        }
        
        return $kaplumbağa;
    }
    
    /**
     * Bağlı listedeki döngü uzunluğunu hesaplar
     * 
     * @param object $baş Bağlı listenin baş düğümü
     * @return int Döngü uzunluğu, döngü yoksa 0
     */
    public function döngüUzunluğu($baş) {
        // Döngü başlangıcını bul
        $döngüBaşlangıcı = $this->döngüBaşlangıcıBul($baş);
        
        // Döngü yoksa 0 döndür
        if ($döngüBaşlangıcı === null) {
            return 0;
        }
        
        // Döngü uzunluğunu hesapla
        $uzunluk = 1;
        $gezgin = $döngüBaşlangıcı->sonraki;
        
        while ($gezgin !== $döngüBaşlangıcı) {
            $uzunluk++;
            $gezgin = $gezgin->sonraki;
        }
        
        return $uzunluk;
    }
}

/**
 * Floyd Döngü Bulma algoritması örnek kullanımı
 */
function örnekKullanım() {
    $floyd = new FloydDöngüBulma();
    
    // Örnek bir bağlı liste oluşturalım: 1->2->3->4->5->3 (3'e geri dönen bir döngü)
    $baş = $floyd->düğümOluştur(1);
    $düğüm2 = $floyd->düğümOluştur(2);
    $düğüm3 = $floyd->düğümOluştur(3);
    $düğüm4 = $floyd->düğümOluştur(4);
    $düğüm5 = $floyd->düğümOluştur(5);
    
    $baş->sonraki = $düğüm2;
    $düğüm2->sonraki = $düğüm3;
    $düğüm3->sonraki = $düğüm4;
    $düğüm4->sonraki = $düğüm5;
    $düğüm5->sonraki = $düğüm3; // Döngü oluştur: 5'ten sonra 3'e geri dön
    
    // Döngü tespiti
    $döngüVar = $floyd->döngüTespit($baş);
    echo "Döngü var mı: " . ($döngüVar ? "Evet" : "Hayır") . "\n";
    
    // Döngü başlangıcını bul
    $döngüBaşlangıcı = $floyd->döngüBaşlangıcıBul($baş);
    if ($döngüBaşlangıcı !== null) {
        echo "Döngü başlangıç değeri: " . $döngüBaşlangıcı->değer . "\n";
    }
    
    // Döngü uzunluğunu hesapla
    $uzunluk = $floyd->döngüUzunluğu($baş);
    echo "Döngü uzunluğu: " . $uzunluk . "\n";
    
    // Döngüsüz bir bağlı liste örneği
    $döngüsüzBaş = $floyd->düğümOluştur(10);
    $döngüsüzBaş->sonraki = $floyd->düğümOluştur(20);
    $döngüsüzBaş->sonraki->sonraki = $floyd->düğümOluştur(30);
    
    $döngüsüzVarMı = $floyd->döngüTespit($döngüsüzBaş);
    echo "Döngüsüz listede döngü var mı: " . ($döngüsüzVarMı ? "Evet" : "Hayır") . "\n";
}

// Örnek kullanımı çalıştır
örnekKullanım();
?>