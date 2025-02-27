# Quick Sort

**Quick Sort**, hızlı bir sıralama algoritmasıdır ve **böl ve fethet (divide and conquer)** yaklaşımını kullanır. Hedefi, diziyi hızlı bir şekilde sıralamaktır. Algoritma, büyük bir diziyi daha küçük parçalara ayırarak çözüm üretir. Bu, genellikle **ortalama O(n log n)** zaman karmaşıklığına sahiptir.

## Algoritmanın Çalışma Prensibi

1. **Pivot Seçimi (Partitioning)**:
   - Öncelikle, diziden bir "pivot" seçilir. Pivot, sıralamayı yapmak için dizinin bir elemanıdır.
   - Bu pivot etrafında tüm diziyi iki alt diziye böleriz: 
     - Pivot'tan küçük olanlar bir diziye, büyük olanlar diğer diziye yerleştirilir.
     - Pivot, sıralandıktan sonra doğru yerinde olur.
     
2. **Alt Dizilerin Sıralanması**:
   - Daha sonra, pivot'un her iki tarafındaki alt diziler için aynı işlemler (pivot seçme ve bölme) tekrarlanır.
   - Bu işlem, her bir alt dizi tek elemanlı hale gelene kadar devam eder.

3. **Birleştirme**:
   - Alt diziler sıralandıktan sonra, tek tek birleştirilir ve nihai sıralı dizi elde edilir.

## Adım Adım Örnek

Dizi: `[10, 80, 30, 90, 40, 50, 70]`

1. **Pivot Seçimi ve Bölme**:
   - İlk adımda, pivot olarak 70 seçilir.
   - 70'ten küçük olan elemanlar: `[10, 30, 40, 50]`
   - 70'ten büyük olan elemanlar: `[80, 90]`
   - Pivot yerinde: `[10, 30, 40, 50, 70, 80, 90]`
   
2. **Alt Dizilerin Sıralanması**:
   - Sol taraf: `[10, 30, 40, 50]` → Pivot 50 seçilir, sıralama yapılır.
   - Sağ taraf: `[80, 90]` → Pivot 90 seçilir, sıralama yapılır.

3. **Sonuç**:
   - Nihai sıralı dizi: `[10, 30, 40, 50, 70, 80, 90]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(n log n) (pivot her zaman ortalama değeri seçerse)
- **Ortalama Durum**: O(n log n)
- **En Kötü Durum**: O(n²) (pivot her zaman en küçük ya da en büyük eleman seçilirse)

## Avantajlar

- **Hızlı**: Ortalama durumda **O(n log n)** zaman karmaşıklığıyla oldukça hızlıdır.
- **Yerinde sıralama**: Veriyi sıralarken ekstra bir bellek kullanmaz.

## Dezavantajlar

- **Kötü durum performansı**: Eğer pivot seçimi kötü yapılırsa, **O(n²)** zaman karmaşıklığına düşebilir.
- **İstikrarsız sıralama**: Quick Sort, kararlı bir sıralama algoritması değildir. Yani, aynı değere sahip elemanların sırası değişebilir.
