# Heap Algoritması

Heap (yığın), özel bir ağaç tabanlı veri yapısıdır ve genellikle dinamik olarak değişen veri kümelerinde maksimum veya minimum değerleri hızlı bir şekilde bulmak için kullanılır. Heap, özellikle öncelik kuyrukları (priority queue) ve sıralama algoritmalarında (örneğin, Heap Sort) yaygın olarak kullanılır.

## Temel Özellikler

1. **Heap Türleri**:
   - **Max Heap**: Her düğümün değeri, çocuklarının değerlerinden büyük veya eşittir. Kök düğüm, ağaçtaki en büyük değeri içerir.
   - **Min Heap**: Her düğümün değeri, çocuklarının değerlerinden küçük veya eşittir. Kök düğüm, ağaçtaki en küçük değeri içerir.

2. **Ağaç Yapısı**: Heap, tam bir ikili ağaç (complete binary tree) olarak organize edilir. Bu, ağacın tüm seviyelerinin dolu olduğu ve son seviyenin soldan sağa doldurulduğu anlamına gelir.

3. **Dizi Tabanlı Temsil**: Heap, genellikle bir dizi (array) kullanılarak temsil edilir. Bu, bellek kullanımını optimize eder ve ağaç yapısını kolayca yönetmeyi sağlar.

4. **Ekleme ve Çıkarma İşlemleri**:
   - **Ekleme**: Yeni bir eleman eklendiğinde, ağacın sonuna yerleştirilir ve ardından heap özelliğini korumak için yukarı doğru düzeltme (heapify up) işlemi yapılır.
   - **Çıkarma**: Kök düğümden bir eleman çıkarıldığında, ağacın son elemanı kök düğüme taşınır ve ardından heap özelliğini korumak için aşağı doğru düzeltme (heapify down) işlemi yapılır.

## Avantajlar

- **Hızlı Erişim**: Heap, en büyük veya en küçük elemana O(1) zaman karmaşıklığında erişim sağlar.
- **Verimli Ekleme ve Çıkarma**: Ekleme ve çıkarma işlemleri O(log n) zaman karmaşıklığında gerçekleşir.
- **Dinamik Yapı**: Heap, dinamik olarak büyüyebilir ve küçülebilir.

## Dezavantajlar

- **Sınırlı Kullanım**: Heap, sadece maksimum veya minimum değerleri bulmak için optimize edilmiştir. Diğer işlemler (örneğin, belirli bir elemanı arama) verimli değildir.
- **Bellek Yönetimi**: Heap, dizi tabanlı olduğu için bellek kullanımı dikkatli bir şekilde yönetilmelidir.

## Kullanım Alanları

- **Öncelik Kuyrukları**: Heap, öncelik kuyruklarını uygulamak için idealdir.
- **Sıralama Algoritmaları**: Heap Sort, Heap veri yapısını kullanarak verimli bir sıralama algoritmasıdır.
- **Graf Algoritmaları**: Dijkstra ve Prim gibi algoritmalarda, en kısa yol veya minimum kapsayan ağaç bulmak için kullanılır.

## Örnek Senaryo

Örneğin, bir Max Heap yapısı düşünelim:

1. **Ekleme İşlemi**:
   - Yeni bir eleman (örneğin, 15) eklendiğinde, ağacın sonuna yerleştirilir.
   - Eleman, ebeveyninden büyükse, ebeveyniyle yer değiştirir. Bu işlem, heap özelliği korunana kadar devam eder.

2. **Çıkarma İşlemi**:
   - Kök düğüm (en büyük eleman) çıkarılır.
   - Ağacın son elemanı kök düğüme taşınır.
   - Eleman, çocuklarından küçükse, çocuklarıyla yer değiştirir. Bu işlem, heap özelliği korunana kadar devam eder.

## Sonuç

Heap, özellikle dinamik veri kümelerinde maksimum veya minimum değerleri hızlı bir şekilde bulmak için güçlü bir veri yapısıdır. Öncelik kuyrukları ve sıralama algoritmaları gibi birçok uygulamada yaygın olarak kullanılır. Ancak, sınırlı kullanım alanları ve bellek yönetimi gibi dezavantajları da göz önünde bulundurulmalıdır.
