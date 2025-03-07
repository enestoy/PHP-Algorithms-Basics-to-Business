# Breadth-First Search (BFS) Algoritması

Breadth-First Search (BFS), bir graf veya ağaç yapısı üzerinde dolaşmak için kullanılan bir algoritmadır. Bu algoritma, başlangıç düğümünden başlayarak, önce başlangıç düğümünün komşularını, ardından bu komşuların komşularını ve bu şekilde tüm düğümleri ziyaret eder. BFS, genişleme önceliğine sahip olduğu için "genişlik öncelikli arama" olarak da adlandırılır.

## Algoritmanın Adımları

1. **Başlangıç Düğümü Seçimi**: Algoritma, başlangıç düğümü olarak belirlenen bir düğümden başlar. Bu düğüm, genellikle grafın kök düğümü veya belirli bir hedef düğüm olabilir.

2. **Kuyruk Yapısı Kullanımı**: BFS, bir kuyruk (queue) veri yapısı kullanır. Kuyruk, ziyaret edilecek düğümleri sırayla tutar. Başlangıç düğümü kuyruğa eklenir.

3. **Düğüm Ziyareti**: Kuyruktan bir düğüm çıkarılır ve bu düğüm ziyaret edilir. Ziyaret edilen düğüm, hedef düğüm olabilir veya belirli bir işlem gerçekleştirilebilir.

4. **Komşu Düğümlerin Eklenmesi**: Ziyaret edilen düğümün henüz ziyaret edilmemiş komşu düğümleri kuyruğa eklenir. Bu işlem, tüm komşu düğümler için tekrarlanır.

5. **Tekrarlama**: Kuyruk boşalana kadar adımlar 3 ve 4 tekrarlanır. Kuyruk boşaldığında, tüm erişilebilir düğümler ziyaret edilmiş demektir.

## BFS'in Özellikleri

- **Kısa Yolu Bulma**: BFS, başlangıç düğümünden diğer düğümlere olan en kısa yolu bulmak için kullanılabilir. Bu özellik, özellikle ağırlıksız graflarda etkilidir.

- **Döngü Tespiti**: BFS, graf içinde döngü olup olmadığını tespit etmek için kullanılabilir.

- **Seviye Bazlı Gezinme**: BFS, düğümleri seviye seviye gezdiği için, grafın katmanlar halinde incelenmesini sağlar.

## Örnek Senaryo

Bir graf üzerinde BFS uygulandığını düşünelim:

1. Başlangıç düğümü A olsun.
2. A kuyruğa eklenir.
3. A ziyaret edilir ve komşuları B ve C kuyruğa eklenir.
4. B ziyaret edilir ve komşusu D kuyruğa eklenir.
5. C ziyaret edilir ve komşusu E kuyruğa eklenir.
6. D ziyaret edilir ve komşusu F kuyruğa eklenir.
7. E ziyaret edilir ve komşusu G kuyruğa eklenir.
8. F ve G ziyaret edilir.

Bu şekilde, tüm düğümler ziyaret edilmiş olur ve en kısa yollar bulunur.

## Sonuç

BFS, graf teorisinde sıkça kullanılan temel bir algoritmadır. Özellikle kısa yol bulma ve seviye bazlı gezinme ihtiyaçlarında etkili bir çözüm sunar. Kuyruk yapısı kullanımı sayesinde, düğümlerin sırayla işlenmesini sağlar ve bu da algoritmanın basit ve anlaşılır olmasını sağlar.
