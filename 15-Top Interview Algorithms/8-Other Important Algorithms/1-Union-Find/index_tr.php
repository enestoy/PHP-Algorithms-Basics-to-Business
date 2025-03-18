<?php
/* 
Mülakat Sorusu: 

Bir sosyal ağ uygulaması düşünelim. Kullanıcılar arasında arkadaşlık bağlantıları var. 
Her bir kullanıcı bir düğüm (node) olarak temsil ediliyor ve arkadaşlık bağlantıları da bu düğümleri birleştiren kenarlar (edges) olarak düşünülebilir. 
Amacımız, iki kullanıcının aynı arkadaşlık grubunda olup olmadığını hızlı bir şekilde kontrol etmek ve yeni arkadaşlık bağlantıları ekledikçe bu grupları güncellemek.

Problem:
- n adet kullanıcı var.

- m adet arkadaşlık bağlantısı var.

- Her bir arkadaşlık bağlantısı, iki kullanıcıyı birleştirir.

- İki kullanıcının aynı arkadaşlık grubunda olup olmadığını kontrol etmemiz gerekiyor.

- Yeni arkadaşlık bağlantıları ekledikçe grupları güncellememiz gerekiyor.
*/


class UnionFind {
    private $parent = [];
    private $rank = [];

    // Constructor: Her bir kullanıcıyı kendi ebeveyni olarak başlatır ve rank'ini 1 yapar.
    public function __construct($n) {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 1;
        }
    }

    // Find: Bir kullanıcının kök düğümünü bulur ve path compression uygular.
    public function find($x) {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$x]); // Path compression
        }
        return $this->parent[$x];
    }

    // Union: İki kullanıcının kök düğümlerini birleştirir ve rank'e göre birleştirme yapar.
    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX != $rootY) {
            // Rank'e göre birleştirme
            if ($this->rank[$rootX] > $this->rank[$rootY]) {
                $this->parent[$rootY] = $rootX;
            } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
                $this->parent[$rootX] = $rootY;
            } else {
                $this->parent[$rootY] = $rootX;
                $this->rank[$rootX]++;
            }
            return true; // Başarılı bir şekilde birleştirildi
        }
        return false; // Zaten aynı gruptalar
    }

    // İki kullanıcının aynı grupta olup olmadığını kontrol eder.
    public function connected($x, $y) {
        return $this->find($x) == $this->find($y);
    }
}

// Örnek Kullanım:
$n = 5; // 5 kullanıcı
$uf = new UnionFind($n);

$uf->union(0, 1); // Kullanıcı 0 ve 1 arkadaş
$uf->union(2, 3); // Kullanıcı 2 ve 3 arkadaş
$uf->union(1, 4); // Kullanıcı 1 ve 4 arkadaş

echo $uf->connected(0, 4) ? "Aynı grupta\n" : "Farklı gruplarda\n"; // Aynı grupta
echo $uf->connected(2, 4) ? "Aynı grupta\n" : "Farklı gruplarda\n"; // Farklı gruplarda

?>