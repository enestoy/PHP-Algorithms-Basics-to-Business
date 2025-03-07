# Depth-First Search (DFS) Algoritması

Depth-First Search (DFS), bir graph veya ağaç yapısını dolaşmak için kullanılan bir algoritmadır. DFS, bir düğümden başlayarak mümkün olduğunca derine iner ve geri dönüş (backtracking) yaparak tüm düğümleri ziyaret eder. Bu algoritma, özellikle graph'ta döngü tespiti, bağlantılı bileşenleri bulma ve topolojik sıralama gibi problemlerde kullanılır.

## Temel Kavramlar

1. **Düğüm (Node)**: Graph'taki bir nesneyi temsil eder.
2. **Kenar (Edge)**: İki düğüm arasındaki bağlantıyı temsil eder.
3. **Ziyaret Edilenler (Visited)**: Ziyaret edilen düğümleri takip etmek için kullanılır.
4. **Stack veya Rekürsif Yaklaşım**: DFS, stack veri yapısı veya rekürsif fonksiyonlar kullanılarak gerçekleştirilebilir.

## DFS Algoritmasının Adımları

1. **Başlangıç**: Belirli bir düğümden başla.
2. **Ziyaret Et**: Düğümü ziyaret et ve ziyaret edildi olarak işaretle.
3. **Komşuları Keşfet**: Ziyaret edilen düğümün komşularını gez. Eğer bir komşu ziyaret edilmemişse, o komşuya git ve aynı işlemi tekrarla.
4. **Geri Dönüş (Backtracking)**: Tüm komşular ziyaret edildiğinde, bir önceki düğüme geri dön ve işlemi tekrarla.

## DFS Türleri

1. **Pre-order DFS**: Düğüm ziyaret edildikten sonra komşuları keşfedilir.
2. **Post-order DFS**: Komşular keşfedildikten sonra düğüm ziyaret edilir.

## DFS'nin Kullanım Alanları

- **Döngü Tespiti**: Graph'ta döngü olup olmadığını kontrol etmek için.
- **Bağlantılı Bileşenler**: Graph'taki bağlantılı bileşenleri bulmak için.
- **Topolojik Sıralama**: Yönlü graph'larda düğümleri sıralamak için.
- **Yol Bulma**: İki düğüm arasında bir yol olup olmadığını kontrol etmek için.

## DFS'nin Avantajları ve Dezavantajları

### Avantajları

- **Bellek Verimliliği**: Rekürsif yaklaşım veya stack kullanıldığında, BFS'ye göre daha az bellek kullanır.
- **Derinlik Öncelikli**: Özellikle derin graph'larda hızlı sonuçlar verebilir.

### Dezavantajları

- **Yerel Minimum**: Bazı problemlerde yerel minimumda takılıp kalabilir.
- **Stack Taşması**: Rekürsif yaklaşımda derin graph'larda stack taşmasına neden olabilir.

## Örnek Senaryo

Örneğin, aşağıdaki graph'ı düşünelim:

`A -- B -- C`
`| |`
`D -- E`

DFS algoritması, A'dan başlayarak şu sırayla düğümleri ziyaret edebilir:

1. A -> B -> C (C'nin komşusu yok, geri dön)
2. B -> E (E'nin komşusu D, ziyaret edilmemiş)
3. E -> D (D'nin komşusu A, ziyaret edilmiş, geri dön)
4. Tüm düğümler ziyaret edildi.

Sonuç: A, B, C, E, D.

## Sonuç

DFS, graph veya ağaç yapılarını dolaşmak için güçlü bir algoritmadır. Özellikle derinlik öncelikli aramalarda ve döngü tespiti gibi problemlerde yaygın olarak kullanılır. Ancak, stack taşması ve yerel minimum gibi dezavantajları da göz önünde bulundurulmalıdır.
