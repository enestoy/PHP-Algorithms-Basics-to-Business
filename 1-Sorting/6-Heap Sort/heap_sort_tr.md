# Heap Sort

**Heap Sort**, sıralama yapmak için **heap** veri yapısını kullanan bir sıralama algoritmasıdır. **Heap**, özel bir tür ikili ağaçtır ve her bir düğümün değeri, çocuk düğümlerinin değerlerinden büyüktür (maksimum heap) ya da küçük olmalıdır (minimum heap). Heap Sort, büyük bir diziyi sıralamak için bu yapıyı kullanarak verimli bir sıralama sağlar.

## Algoritmanın Çalışma Prensibi

1. **Heap Yapısını Kurma**:
   - İlk adımda, verilen dizi bir **heap** yapısına dönüştürülür. Bu adımda, diziyi bir **maksimum heap** veya **minimum heap** yapısına dönüştürürüz.
   - **Maksimum heap**: Her düğümün değeri, çocuklarının değerlerinden büyük ya da eşit olmalıdır.
   - **Minimum heap**: Her düğümün değeri, çocuklarının değerlerinden küçük ya da eşit olmalıdır.

2. **Heap'ten Eleman Çıkarma**:
   - Heap yapısına dönüştürülmüş diziden en büyük (veya en küçük) eleman çıkarılır.
   - En büyük eleman heap'in kökünde bulunur, bu eleman dizinin sonuna yerleştirilir.

3. **Heap Yeniden Düzenleme**:
   - Heap yapısındaki bozulmayı gidermek için, kalan elemanlar yeniden heap düzenine sokulur.

4. **Tekrarlama**:
   - Bu işlem, tüm elemanlar sıralanana kadar devam eder.

## Adım Adım Örnek

Dizi: `[4, 10, 3, 5, 1]`

1. **Heap Yapısına Dönüştürme (Maksimum Heap)**:
   - İlk olarak, dizi bir maksimum heap yapısına dönüştürülür. Dizi şu şekilde olur: `[10, 5, 3, 4, 1]`
   
2. **En Büyük Elemanı Çıkarma**:
   - En büyük eleman (10) kökten çıkarılır ve dizinin sonuna yerleştirilir: `[1, 5, 3, 4]`
   - Heap düzeni yeniden sağlanır: `[5, 4, 3, 1]`

3. **Tekrarlama**:
   - Yeniden en büyük eleman çıkarılır, dizinin sonuna yerleştirilir ve heap yapısı tekrar sağlanır: `[4, 1, 3]`
   - Son adımda, sıralı dizi elde edilir: `[1, 3, 4, 5, 10]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(n log n)
- **Ortalama Durum**: O(n log n)
- **En Kötü Durum**: O(n log n)

**Heap Sort**, her durumda **O(n log n)** zaman karmaşıklığına sahiptir. Bu nedenle, özellikle **yavaş bellek alanlarında** ve **sıralama sırasında ek bellek kullanımının düşük olmasının önemli olduğu durumlarda** oldukça verimlidir.

## Avantajlar

- **Zaman karmaşıklığı**: Heap Sort her durumda **O(n log n)** performans gösterir.
- **Yerinde sıralama**: Ekstra bellek kullanmaz. Bellek karmaşıklığı O(1)'dir.
- **Stabil sıralama değildir**: Aynı elemanlar sıralandıktan sonra sırası değişebilir.

## Dezavantajlar

- **İstikrarsız sıralama**: Heap Sort, kararlı (stable) bir sıralama algoritması değildir, yani aynı değere sahip elemanların sırası değişebilir.
- **Hızlı değil**: Diğer sıralama algoritmaları (örneğin Quick Sort) genellikle daha hızlıdır, çünkü heap yapılarını kurma ve yeniden düzenleme işlemleri zaman alabilir.
