<?php

class RaftDugumu {
    private int $dugumId;
    private array $tumDugumler;
    private int $liderId;

    public function __construct(int $dugumId, array $tumDugumler) {
        $this->dugumId = $dugumId;
        $this->tumDugumler = $tumDugumler;
        $this->liderId = -1; // Başlangıçta lider yok
    }

    // Lider seçme sürecini başlatan fonksiyon
    public function liderSec(): void {
        $adayId = $this->dugumId;
        
        foreach ($this->tumDugumler as $dugum) {
            if ($dugum > $adayId) {
                $adayId = $dugum;
            }
        }
        
        $this->liderId = $adayId;
        echo "Düğüm {$this->dugumId}: Lider olarak {$this->liderId} seçildi.\n";
    }

    // Mevcut lideri döndüren fonksiyon
    public function lideriGetir(): int {
        return $this->liderId;
    }
}

// Ağı simüle etmek için düğümler oluşturalım
$dugumler = [1, 2, 3, 4, 5];
$raftDugumleri = [];

foreach ($dugumler as $id) {
    $raftDugumleri[$id] = new RaftDugumu($id, $dugumler);
}

// Her düğüm lider seçimini başlatıyor
foreach ($raftDugumleri as $dugum) {
    $dugum->liderSec();
}

?>