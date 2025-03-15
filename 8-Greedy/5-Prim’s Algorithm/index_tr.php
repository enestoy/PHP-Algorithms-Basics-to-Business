<?php
/**
 * Prim's Algorithm (Minimum Spanning Tree) Uygulaması
 * 
 * Bu uygulama, ağırlıklı bağlantılı bir grafın minimum kapsayan ağacını
 * (Minimum Spanning Tree - MST) bulmak için Prim algoritmasını kullanır.
 */

/**
 * Graf sınıfı - Düğümleri ve kenarları tutacak.
 */
class Graf {
    private $düğümSayısı;
    private $komşulukMatrisi;
    
    /**
     * Graf oluşturucu
     * 
     * @param int $düğümSayısı Graftaki düğüm sayısı
     */
    public function __construct($düğümSayısı) {
        $this->düğümSayısı = $düğümSayısı;
        
        // Komşuluk matrisini başlat (tüm değerler INF ile)
        $this->komşulukMatrisi = array_fill(0, $düğümSayısı, array_fill(0, $düğümSayısı, PHP_INT_MAX));
        
        // Kendisiyle olan kenarları 0 yap
        for ($i = 0; $i < $düğümSayısı; $i++) {
            $this->komşulukMatrisi[$i][$i] = 0;
        }
    }
    
    /**
     * Grafa kenar ekle
     * 
     * @param int $kaynak Kenarın başlangıç düğümü
     * @param int $hedef Kenarın bitiş düğümü
     * @param int $ağırlık Kenarın ağırlığı
     */
    public function kenarEkle($kaynak, $hedef, $ağırlık) {
        // Yönsüz graf için her iki yönde de aynı ağırlığı ayarla
        $this->komşulukMatrisi[$kaynak][$hedef] = $ağırlık;
        $this->komşulukMatrisi[$hedef][$kaynak] = $ağırlık;
    }
    
    /**
     * MST'de olmayan düğümler arasından minimum anahtar değerine sahip düğümü bul
     * 
     * @param array $anahtarlar Düğümlerin anahtar değerleri
     * @param array $mstKümesi MST kümesine dahil edilen düğümler
     * @return int Minimum anahtar değerli düğümün indeksi
     */
    private function minimumAnahtarDüğümü($anahtarlar, $mstKümesi) {
        $min = PHP_INT_MAX;
        $minİndeks = -1;
        
        for ($v = 0; $v < $this->düğümSayısı; $v++) {
            if ($mstKümesi[$v] == false && $anahtarlar[$v] < $min) {
                $min = $anahtarlar[$v];
                $minİndeks = $v;
            }
        }
        
        return $minİndeks;
    }
    
    /**
     * Prim algoritmasını kullanarak MST'yi oluştur ve görüntüle
     * 
     * @param int $başlangıçDüğümü MST oluşturmaya başlanacak düğüm
     */
    public function primMST($başlangıçDüğümü = 0) {
        // MST'yi saklamak için dizi
        $ebeveyn = array_fill(0, $this->düğümSayısı, -1);
        
        // MST'deki düğümlere atanan anahtar değerleri
        $anahtarlar = array_fill(0, $this->düğümSayısı, PHP_INT_MAX);
        
        // MST'de olan düğümleri takip etmek için
        $mstKümesi = array_fill(0, $this->düğümSayısı, false);
        
        // İlk düğümü başlangıç noktası olarak ayarla
        $anahtarlar[$başlangıçDüğümü] = 0;
        
        // MST |V| düğüm içerecek
        for ($sayaç = 0; $sayaç < $this->düğümSayısı; $sayaç++) {
            // MST'ye eklenecek minimum anahtar değerine sahip düğümü seç
            $u = $this->minimumAnahtarDüğümü($anahtarlar, $mstKümesi);
            
            // Seçilen düğümü MST kümesine ekle
            $mstKümesi[$u] = true;
            
            // Komşu düğümlerin anahtar değerlerini güncelle
            for ($v = 0; $v < $this->düğümSayısı; $v++) {
                // Eğer u-v arası bir kenar varsa, v henüz MST'de değilse ve kenar ağırlığı mevcut anahtardan küçükse
                if (
                    $this->komşulukMatrisi[$u][$v] != PHP_INT_MAX &&
                    $mstKümesi[$v] == false &&
                    $this->komşulukMatrisi[$u][$v] < $anahtarlar[$v]
                ) {
                    // Anahtar değerini ve ebeveyn indeksini güncelle
                    $ebeveyn[$v] = $u;
                    $anahtarlar[$v] = $this->komşulukMatrisi[$u][$v];
                }
            }
        }
        
        // MST'yi görüntüle
        $this->mstGörüntüle($ebeveyn);
    }
    
    /**
     * Oluşturulan MST'yi görüntüle
     * 
     * @param array $ebeveyn Her düğümün ebeveyn düğümü
     */
    private function mstGörüntüle($ebeveyn) {
        $toplamMaliyet = 0;
        
        echo "Kenar Ağırlık<br>";
        for ($i = 1; $i < $this->düğümSayısı; $i++) {
            echo $ebeveyn[$i] . " - " . $i . " - " . $this->komşulukMatrisi[$i][$ebeveyn[$i]] . "<br>";
            $toplamMaliyet += $this->komşulukMatrisi[$i][$ebeveyn[$i]];
        }
        
        echo "Minimum Spanning Tree Toplam Maliyeti: " . $toplamMaliyet . "<br>";
    }
}

// Örnek kullanım
echo "Prim's Algorithm ile Minimum Spanning Tree (MST) örneği:<br>";

// 5 düğümlü bir graf oluştur
$graf = new Graf(5);

// Kenarları ekle (kaynak, hedef, ağırlık)
$graf->kenarEkle(0, 1, 2);
$graf->kenarEkle(0, 3, 6);
$graf->kenarEkle(1, 2, 3);
$graf->kenarEkle(1, 3, 8);
$graf->kenarEkle(1, 4, 5);
$graf->kenarEkle(2, 4, 7);
$graf->kenarEkle(3, 4, 9);

// MST'yi hesapla ve görüntüle
$graf->primMST();
?>
