<?php

/**
 * Topolojik Sıralama Algoritması Uygulaması
 * 
 * Bu algoritma, yönlü çizgelerde döngü olmadığı varsayımıyla (DAG - Directed Acyclic Graph)
 * düğümleri bağımlılık ilişkilerine göre sıralar. Düğüm A, düğüm B'ye bağımlıysa,
 * topolojik sıralamada B, A'dan önce gelmelidir.
 */
class TopolojikSıralama {
    
    /**
     * Düğüm sayısı
     * @var int
     */
    private $düğümSayısı;
    
    /**
     * Çizgenin komşuluk listesi temsili
     * @var array
     */
    private $komşulukListesi;
    
    /**
     * Sınıf yapıcısı
     * 
     * @param int $düğümSayısı Çizgedeki düğüm sayısı
     */
    public function __construct(int $düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        $this->komşulukListesi = array_fill(0, $düğümSayısı, []);
    }
    
    /**
     * Çizgeye yönlü kenar ekler
     * 
     * @param int $başlangıç Kenarın başlangıç düğümü
     * @param int $bitiş Kenarın bitiş düğümü
     */
    public function kenarEkle(int $başlangıç, int $bitiş): void {
        // Çizgeye $başlangıç'tan $bitiş'e bir kenar ekle
        $this->komşulukListesi[$başlangıç][] = $bitiş;
    }
    
    /**
     * Derinlik Öncelikli Arama (DFS) kullanarak topolojik sıralama alt işlevi
     * 
     * @param int $düğüm Şu anki düğüm
     * @param array $ziyaretEdildi Ziyaret edilmiş düğümleri izleyen dizi
     * @param array $yığın Topolojik sıralamayı tutacak yığın
     */
    private function topolojikSıralamaYardımcı(int $düğüm, array &$ziyaretEdildi, array &$yığın): void {
        // Düğümü ziyaret edildi olarak işaretle
        $ziyaretEdildi[$düğüm] = true;
        
        // Komşu düğümleri işle
        foreach ($this->komşulukListesi[$düğüm] as $komşu) {
            if (!$ziyaretEdildi[$komşu]) {
                $this->topolojikSıralamaYardımcı($komşu, $ziyaretEdildi, $yığın);
            }
        }
        
        // Tüm bağımlı düğümler işlendikten sonra şu anki düğümü yığına ekle
        array_unshift($yığın, $düğüm);
    }
    
    /**
     * Çizgede topolojik sıralama gerçekleştirir
     * 
     * @return array Topolojik sıralanmış düğüm dizisi
     */
    public function topolojikSırala(): array {
        // Ziyaret edilen düğümleri izlemek için dizi
        $ziyaretEdildi = array_fill(0, $this->düğümSayısı, false);
        
        // Sonuç dizisi
        $sıralama = [];
        
        // Tüm düğümler için DFS çağır
        for ($düğüm = 0; $düğüm < $this->düğümSayısı; $düğüm++) {
            if (!$ziyaretEdildi[$düğüm]) {
                $this->topolojikSıralamaYardımcı($düğüm, $ziyaretEdildi, $sıralama);
            }
        }
        
        return $sıralama;
    }
    
    /**
     * Kahn Algoritması ile topolojik sıralama gerçekleştirir
     * 
     * @return array|null Topolojik sıralanmış düğüm dizisi veya döngü varsa null
     */
    public function kahnTopolojikSırala(): ?array {
        // Düğümlerin giriş derecelerini (bağımlılık sayısı) hesapla
        $girişDereceleri = array_fill(0, $this->düğümSayısı, 0);
        
        foreach ($this->komşulukListesi as $düğüm => $komşular) {
            foreach ($komşular as $komşu) {
                $girişDereceleri[$komşu]++;
            }
        }
        
        // Giriş derecesi 0 olan düğümleri kuyruğa ekle (bağımlılığı olmayan düğümler)
        $kuyruk = [];
        for ($düğüm = 0; $düğüm < $this->düğümSayısı; $düğüm++) {
            if ($girişDereceleri[$düğüm] === 0) {
                $kuyruk[] = $düğüm;
            }
        }
        
        // Ziyaret edilen düğüm sayacı
        $ziyaretSayısı = 0;
        
        // Topolojik sıralama sonucu
        $sıralama = [];
        
        // Kuyruk boşalana kadar işleme devam et
        while (!empty($kuyruk)) {
            // Kuyruğun başından bir düğüm çıkar
            $şimdikiDüğüm = array_shift($kuyruk);
            
            // Sonuç dizisine ekle
            $sıralama[] = $şimdikiDüğüm;
            $ziyaretSayısı++;
            
            // Komşu düğümlerin giriş derecelerini azalt
            foreach ($this->komşulukListesi[$şimdikiDüğüm] as $komşu) {
                $girişDereceleri[$komşu]--;
                
                // Giriş derecesi 0 olduğunda kuyruğa ekle
                if ($girişDereceleri[$komşu] === 0) {
                    $kuyruk[] = $komşu;
                }
            }
        }
        
        // Eğer tüm düğümler ziyaret edilmediyse, çizgede döngü var demektir
        if ($ziyaretSayısı !== $this->düğümSayısı) {
            return null; // Döngü var, topolojik sıralama mümkün değil
        }
        
        return $sıralama;
    }
    
    /**
     * Çizgede döngü olup olmadığını kontrol eder
     * 
     * @return bool Döngü varsa true, yoksa false
     */
    public function döngüVarMı(): bool {
        // Ziyaret edilen düğümleri izlemek için diziler
        $ziyaretEdildi = array_fill(0, $this->düğümSayısı, false);
        $yolÜzerinde = array_fill(0, $this->düğümSayısı, false);
        
        // Tüm düğümler için döngü kontrolü
        for ($düğüm = 0; $düğüm < $this->düğümSayısı; $düğüm++) {
            if (!$ziyaretEdildi[$düğüm]) {
                if ($this->döngüVarMıYardımcı($düğüm, $ziyaretEdildi, $yolÜzerinde)) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Döngü kontrolü için yardımcı DFS fonksiyonu
     * 
     * @param int $düğüm Şu anki düğüm
     * @param array $ziyaretEdildi Ziyaret edilmiş düğümleri izleyen dizi
     * @param array $yolÜzerinde Mevcut DFS yolunda olan düğümleri izleyen dizi
     * @return bool Döngü varsa true, yoksa false
     */
    private function döngüVarMıYardımcı(int $düğüm, array &$ziyaretEdildi, array &$yolÜzerinde): bool {
        // Düğümü ziyaret edildi ve yol üzerinde olarak işaretle
        $ziyaretEdildi[$düğüm] = true;
        $yolÜzerinde[$düğüm] = true;
        
        // Komşu düğümleri kontrol et
        foreach ($this->komşulukListesi[$düğüm] as $komşu) {
            // Komşu daha önce ziyaret edilmediyse, oradan devam et
            if (!$ziyaretEdildi[$komşu]) {
                if ($this->döngüVarMıYardımcı($komşu, $ziyaretEdildi, $yolÜzerinde)) {
                    return true;
                }
            } 
            // Komşu mevcut yol üzerindeyse, bir döngü var
            elseif ($yolÜzerinde[$komşu]) {
                return true;
            }
        }
        
        // Mevcut yoldan çık
        $yolÜzerinde[$düğüm] = false;
        
        return false;
    }
}

/**
 * Topolojik Sıralama algoritmasının örnek kullanımı
 */
function örnekKullanım() {
    echo "Örnek 1: Ders Ön Koşul İlişkileri\n";
    echo "-----------------------------\n";
    
    // Ders kodları
    $dersler = [
        0 => "Matematik 101",
        1 => "İngilizce 101",
        2 => "Programlama 101",
        3 => "Fizik 101",
        4 => "Matematik 102",
        5 => "Veri Yapıları"
    ];
    
    // Çizge oluştur
    $çizge = new TopolojikSıralama(count($dersler));
    
    // Kenarları ekle (ön koşul ilişkileri)
    $çizge->kenarEkle(0, 4); // Matematik 101 -> Matematik 102
    $çizge->kenarEkle(0, 5); // Matematik 101 -> Veri Yapıları 
    $çizge->kenarEkle(2, 5); // Programlama 101 -> Veri Yapıları
    $çizge->kenarEkle(3, 4); // Fizik 101 -> Matematik 102
    
    // Çizgede döngü kontrolü
    if ($çizge->döngüVarMı()) {
        echo "Çizgede döngü var! Topolojik sıralama mümkün değil.\n";
    } else {
        echo "Çizgede döngü yok. Topolojik sıralama yapılabilir.\n";
        
        // DFS ile topolojik sıralama
        $sıralama = $çizge->topolojikSırala();
        
        echo "DFS ile Topolojik Sıralama:\n";
        foreach ($sıralama as $dersIndeks) {
            echo "- " . $dersler[$dersIndeks] . "\n";
        }
        
        // Kahn algoritması ile topolojik sıralama
        $kahnSıralama = $çizge->kahnTopolojikSırala();
        
        echo "\nKahn Algoritması ile Topolojik Sıralama:\n";
        foreach ($kahnSıralama as $dersIndeks) {
            echo "- " . $dersler[$dersIndeks] . "\n";
        }
    }
    
    echo "\nÖrnek 2: Döngü İçeren Çizge\n";
    echo "------------------------\n";
    
    // Döngü içeren çizge
    $döngülüÇizge = new TopolojikSıralama(3);
    $döngülüÇizge->kenarEkle(0, 1);
    $döngülüÇizge->kenarEkle(1, 2);
    $döngülüÇizge->kenarEkle(2, 0); // Döngü oluşturan kenar
    
    if ($döngülüÇizge->döngüVarMı()) {
        echo "Çizgede döngü var! Topolojik sıralama mümkün değil.\n";
        
        $kahnSıralama = $döngülüÇizge->kahnTopolojikSırala();
        if ($kahnSıralama === null) {
            echo "Kahn algoritması da döngü tespit etti.\n";
        }
    } else {
        echo "Çizgede döngü yok. Topolojik sıralama yapılabilir.\n";
    }
}

// Örnek kullanımı çalıştır
örnekKullanım();
?>