
# Kruskal's Algoritması

Kruskal's algoritması, bir grafın **minimum spanning tree** (MST) yani **minumum gerilim ağacını** bulmak için kullanılan bir algoritmadır. Bu algoritma, grafın kenarlarını sıralayarak ve en küçük ağırlıklı kenarları seçerek ağacın inşa edilmesini sağlar.

## Temel Özellikler

- **Minimum Spanning Tree (MST):** Bir grafın minimum spanning tree'si, grafın tüm düğümlerini birbirine bağlayan kenarların toplam ağırlığının en düşük olduğu ağacıdır.
- **Ağırlıklı Kenarlar:** Kruskal's algoritması, ağırlıklı kenarlarla çalışan bir algoritmadır.
- **Zaman Karmaşıklığı:** O(E log E) — burada E, kenar sayısını temsil eder. Bu karmaşıklık, kenarların sıralanmasının ve küme birleştirme işlemlerinin zaman alması nedeniyle bu kadar yüksektir.

## Algoritmanın Çalışma Prensibi

1. **Kenarları Sıralama:** İlk olarak, grafın kenarları ağırlıklarına göre sıralanır.
2. **Küme Birleştirme:** Ardından, her kenar için, o kenarın başlangıç ve bitiş düğümleri aynı kümeye ait değilse, o kenar ağaca eklenir. Kenar ekledikçe, bu iki kümeyi birleştiririz.
3. **Ağaç Tamamlanması:** Tüm düğümler birbirine bağlanana kadar bu işlem devam eder.

## Adım Adım Algoritma

1. **Başlangıç:**
   - Kenarları ağırlıklarına göre küçükten büyüğe sıralayın.

2. **Kenarlara Bakmak:**
   - En küçük ağırlıklı kenarı alarak, başlangıç ve bitiş düğümlerinin aynı kümede olmadığından emin olun. Eğer değilse, bu kenarı seçin ve her iki kümeyi birleştirin.

3. **Sonuç:**
   - Sonuç olarak, minimum spanning tree'yi (MST) elde edersiniz.

## Örnek

Aşağıdaki gibi bir grafı ele alalım:

```A --(1)--> B --(4)--> C --(2)--> D --(3)--> A```

İlk adımda kenarları sıralayalım:

- A-B: 1
- C-D: 2
- D-A: 3
- B-C: 4

Daha sonra, sıralanan kenarları birleştirerek minimum spanning tree'yi oluştururuz.

## Sonuç

Kruskal's algoritması, her zaman minimum spanning tree'yi bulur ve her kenarı yalnızca bir kez inceler. Bu algoritma, özellikle **ağaç yapıları** ve **ağlar** ile ilgili problemlerde çok kullanışlıdır. Ancak, algoritmanın verimli çalışabilmesi için grafın kenarlarının sıralanması gerektiğinden, kenar sayısının fazla olduğu durumlarda zaman karmaşıklığı artabilir.
