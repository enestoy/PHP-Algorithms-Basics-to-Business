<?php
/* 

Mülakat Sorusu:

Bir sosyal ağ uygulamasında, kullanıcılar arasındaki bağlantıları temsil eden bir graf (graph) verildi. 
Bu graf, bir kullanıcının diğer kullanıcılarla olan arkadaşlıklarını göstermektedir. 
Graf, komşuluk listesi (adjacency list) şeklinde temsil edilmiştir.
Göreviniz, belirli bir kullanıcıdan başlayarak, bu kullanıcının tüm doğrudan ve dolaylı arkadaşlarını (yani graf üzerinde ulaşılabilir tüm düğümleri) bulmak ve bu kullanıcıların listesini döndürmektir. 
Bu işlemi DFS algoritmasını kullanarak gerçekleştirmelisiniz.

*/

/**
 * DFS algoritması kullanarak bir kullanıcının tüm ulaşılabilir arkadaşlarını bulur.
 *
 * @param array $graf Kullanıcıların arkadaşlık ilişkilerini temsil eden graf.
 * @param string $baslangicKullanici Başlangıç kullanıcısı.
 * @return array Ulaşılabilir tüm kullanıcıların listesi.
*/

function dfsArkadaslariBul(array $graf, string $baslangicKullanici): array
{
    // Ziyaret edilen kullanıcıları tutmak için bir dizi oluşturuyoruz.
    $ziyaretEdilenler = [];

    // DFS algoritmasını başlatmak için yardımcı fonksiyonu çağırıyoruz.
    dfs($graf, $baslangicKullanici, $ziyaretEdilenler);

    // Ziyaret edilen kullanıcıların listesini döndürüyoruz.
    return array_keys($ziyaretEdilenler);
}

/**
 * DFS algoritmasının yardımcı fonksiyonu.
 *
 * @param array $graf Kullanıcıların arkadaşlık ilişkilerini temsil eden graf.
 * @param string $kullanici Mevcut kullanıcı.
 * @param array &$ziyaretEdilenler Ziyaret edilen kullanıcıların referansı.
 */
function dfs(array $graf, string $kullanici, array &$ziyaretEdilenler): void
{
    // Eğer kullanıcı daha önce ziyaret edilmediyse işleme devam ediyoruz.
    if (!isset($ziyaretEdilenler[$kullanici])) {
        // Kullanıcıyı ziyaret edildi olarak işaretliyoruz.
        $ziyaretEdilenler[$kullanici] = true;

        // Kullanıcının arkadaşlarını gezmeye devam ediyoruz.
        foreach ($graf[$kullanici] as $arkadas) {
            dfs($graf, $arkadas, $ziyaretEdilenler);
        }
    }
}

// Örnek kullanım:
$graf = [
    'Ahmet' => ['Mehmet', 'Ayşe'],
    'Mehmet' => ['Ahmet', 'Fatma'],
    'Ayşe' => ['Ahmet', 'Fatma'],
    'Fatma' => ['Mehmet', 'Ayşe', 'Zeynep'],
    'Zeynep' => ['Fatma'],
    'Ali' => [] // Ali'nin hiç arkadaşı yok
];

$baslangicKullanici = 'Ahmet';
$sonuc = dfsArkadaslariBul($graf, $baslangicKullanici);

echo "Başlangıç kullanıcısı: $baslangicKullanici<br>";
echo "Ulaşılabilir arkadaşlar: " . implode(', ', $sonuc) . "<br>";

?>