# Graph Algoritması

Graph (çizge), düğümler (node) ve bu düğümleri birbirine bağlayan kenarlardan (edge) oluşan bir veri yapısıdır. Graphlar, gerçek dünyadaki birçok problemi modellemek için kullanılır. Örneğin, sosyal ağlar, ulaşım ağları, bilgisayar ağları ve daha birçok alanda graphlar yaygın olarak kullanılır.

## Temel Kavramlar

1. **Düğüm (Node)**: Graph'taki bir nesneyi temsil eder. Örneğin, bir sosyal ağda bir kişi veya bir ulaşım ağında bir şehir.

2. **Kenar (Edge)**: İki düğüm arasındaki bağlantıyı temsil eder. Kenarlar, yönlü (directed) veya yönsüz (undirected) olabilir.
   - **Yönlü Graph**: Kenarların bir yönü vardır. Örneğin, A'dan B'ye bir kenar, B'den A'ya bir kenar anlamına gelmez.
   - **Yönsüz Graph**: Kenarların yönü yoktur. Örneğin, A'dan B'ye bir kenar, B'den A'ya da bir kenar anlamına gelir.

3. **Ağırlıklı Graph**: Kenarların bir ağırlığı (weight) vardır. Bu, iki düğüm arasındaki mesafe, maliyet veya başka bir metriği temsil edebilir.

4. **Komşuluk (Adjacency)**: Bir düğümün komşuları, ona doğrudan bağlı olan düğümlerdir.

5. **Yol (Path)**: Bir düğümden diğerine giden bir dizi kenardır.

6. **Döngü (Cycle)**: Bir düğümden başlayıp aynı düğüme dönen bir yol.

## Graph Temsil Yöntemleri

1. **Komşuluk Matrisi (Adjacency Matrix)**:
   - Bir 2D dizi kullanılarak graph temsil edilir.
   - Dizi boyutu `n x n` olur, burada `n` düğüm sayısıdır.
   - `matrix[i][j]`, `i` ve `j` düğümleri arasında bir kenar olup olmadığını gösterir.
   - Ağırlıklı graphlarda, `matrix[i][j]` kenarın ağırlığını temsil eder.

2. **Komşuluk Listesi (Adjacency List)**:
   - Her düğüm için bir liste kullanılarak graph temsil edilir.
   - Liste, bir düğümün komşularını içerir.
   - Ağırlıklı graphlarda, her komşu için ağırlık da saklanır.

## Graph Algoritmaları

1. **Gezgin Algoritmaları (Traversal Algorithms)**:
   - **BFS (Breadth-First Search)**: Graph'ı genişlik öncelikli olarak dolaşır. Kısa yol bulma ve bağlantılı bileşenleri bulma gibi problemlerde kullanılır.
   - **DFS (Depth-First Search)**: Graph'ı derinlik öncelikli olarak dolaşır. Döngü tespiti ve topolojik sıralama gibi problemlerde kullanılır.

2. **En Kısa Yol Algoritmaları**:
   - **Dijkstra Algoritması**: Bir düğümden diğer tüm düğümlere olan en kısa yolları bulur. Ağırlıklı graphlarda kullanılır.
   - **Bellman-Ford Algoritması**: Negatif ağırlıklı kenarların olduğu graphlarda en kısa yolu bulur.
   - **Floyd-Warshall Algoritması**: Tüm düğüm çiftleri arasındaki en kısa yolları bulur.

3. **Minimum Kapsayan Ağaç (Minimum Spanning Tree)**:
   - **Kruskal Algoritması**: Kenarları ağırlıklarına göre sıralar ve en küçük ağırlıklı kenarları seçer.
   - **Prim Algoritması**: Bir düğümden başlayarak en küçük ağırlıklı kenarları ekler.

4. **Topolojik Sıralama**: Yönlü graphlarda, düğümleri bir sıraya dizme işlemidir. Özellikle bağımlılık grafiklerinde kullanılır.

## Kullanım Alanları

- **Sosyal Ağlar**: İnsanlar arasındaki ilişkileri modellemek için.
- **Ulaşım Ağları**: Şehirler veya duraklar arasındaki bağlantıları modellemek için.
- **Bilgisayar Ağları**: Bilgisayarlar veya router'lar arasındaki bağlantıları modellemek için.
- **Yapay Zeka**: Durum uzayı aramaları ve planlama problemlerinde.

## Örnek Senaryo

Örneğin, bir ulaşım ağı düşünelim:

1. **Düğümler**: Şehirler (A, B, C, D).
2. **Kenarlar**: Şehirler arasındaki yollar (A-B, B-C, C-D, D-A).
3. **Ağırlıklar**: Yolların uzunlukları (A-B: 10, B-C: 20, C-D: 15, D-A: 25).

Bu graph üzerinde Dijkstra algoritması kullanılarak, bir şehirden diğerine en kısa yol bulunabilir.

## Sonuç

Graph, gerçek dünyadaki birçok problemi modellemek için güçlü bir veri yapısıdır. Gezgin algoritmaları, en kısa yol algoritmaları ve minimum kapsayan ağaç algoritmaları gibi birçok algoritma, graphlar üzerinde çalışır. Bu algoritmalar, sosyal ağlar, ulaşım ağları ve bilgisayar ağları gibi birçok alanda yaygın olarak kullanılır.
