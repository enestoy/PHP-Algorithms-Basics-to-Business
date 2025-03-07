# Red-Black Tree Algoritması

Red-Black Tree, ikili arama ağaçları (Binary Search Tree) üzerine kurulu bir veri yapısıdır. Bu ağaç yapısı, temel ikili arama ağacının dezavantajlarını gidermek ve daha dengeli bir yapı sunmak için tasarlanmıştır. Red-Black Tree, ekleme, silme ve arama işlemlerini O(log n) zaman karmaşıklığında gerçekleştirir.

## Temel Özellikler

1. **Düğüm Renkleri**: Her düğüm ya kırmızı ya da siyah renktedir. Bu renkler, ağacın dengeli kalmasını sağlamak için kullanılır.

2. **Kök Düğüm**: Kök düğüm her zaman siyahtır.

3. **Yaprak Düğümler (NIL)**: Yaprak düğümler (NIL düğümleri) siyah olarak kabul edilir. Bu düğümler, ağacın sonunu temsil eder ve veri içermez.

4. **Kırmızı Düğüm Kuralı**: Bir kırmızı düğümün çocukları mutlaka siyah olmalıdır. Yani, iki kırmızı düğüm üst üste gelemez.

5. **Siyah Yükseklik**: Herhangi bir düğümden yaprak düğümlere (NIL) giden tüm yollarda aynı sayıda siyah düğüm bulunmalıdır. Bu, ağacın dengeli olmasını sağlar.

## Ekleme İşlemi

Red-Black Tree'ye yeni bir düğüm eklendiğinde, düğüm başlangıçta kırmızı olarak eklenir. Ancak bu ekleme işlemi, ağacın Red-Black Tree kurallarını ihlal etmesine neden olabilir. Bu durumda, ağacı yeniden dengelemek için **rotasyon** ve **renk değiştirme** işlemleri yapılır.

1. **Standart İkili Arama Ağacı Ekleme**: Yeni düğüm, standart ikili arama ağacı kurallarına göre eklenir.

2. **Renk Ayarlaması**: Eğer eklenen düğümün ebeveyni kırmızı ise, Red-Black Tree kurallarını ihlal edebilir. Bu durumda, ağacı dengelemek için rotasyon ve renk değiştirme işlemleri yapılır.

## Silme İşlemi

Red-Black Tree'den bir düğüm silindiğinde, ağacın dengeli kalmasını sağlamak için yine rotasyon ve renk değiştirme işlemleri yapılır. Silme işlemi, standart ikili arama ağacı silme işlemine benzer, ancak ek olarak renk ve denge ayarlamaları yapılır.

1. **Standart İkili Arama Ağacı Silme**: Düğüm, standart ikili arama ağacı kurallarına göre silinir.

2. **Renk ve Denge Ayarlaması**: Eğer silinen düğüm siyah ise, ağacın dengeli kalmasını sağlamak için rotasyon ve renk değiştirme işlemleri yapılır.

## Avantajlar

- **Dengeli Yapı**: Red-Black Tree, ekleme ve silme işlemlerinden sonra kendini dengeler, bu da arama, ekleme ve silme işlemlerinin O(log n) zaman karmaşıklığında gerçekleşmesini sağlar.
- **Esneklik**: AVL ağaçlarına kıyasla daha az sıkı dengelenme kurallarına sahip olduğu için, ekleme ve silme işlemlerinde daha az rotasyon gerektirir.

## Kullanım Alanları

Red-Black Tree, özellikle hızlı arama, ekleme ve silme işlemlerinin gerektiği durumlarda kullanılır. Örneğin, Java'daki `TreeMap` ve `TreeSet` gibi veri yapıları, içlerinde Red-Black Tree kullanır.

## Sonuç

Red-Black Tree, ikili arama ağaçlarının dengeli bir versiyonudur ve özellikle dinamik veri yapılarında sıkça kullanılır. Renkler ve kurallar sayesinde, ağaç dengeli kalır ve işlemler verimli bir şekilde gerçekleştirilir.
