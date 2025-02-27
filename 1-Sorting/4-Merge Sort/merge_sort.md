# Merge Sort

**Merge Sort**, böl ve fethet (divide and conquer) yaklaşımına dayalı bir sıralama algoritmasıdır. Bu algoritma, büyük bir problemi daha küçük parçalara ayırarak çözmeyi hedefler. Önce diziyi daha küçük alt dizilere böler, ardından bu alt dizileri sıralar ve nihayetinde sıralı alt dizileri birleştirir (merge eder).

## Algoritmanın Çalışma Prensibi

1. **Bölme (Divide)**: 
   - Dizi ortadan ikiye bölünür.
   - Bu işlem, dizi tek elemanlı parçalara ayrılana kadar devam eder.
   
2. **Sıralama (Conquer)**: 
   - Bölünen her bir parça tek elemanlı hale gelene kadar devam edilir.
   - Tek elemanlı diziler zaten sıralıdır, bu yüzden sıradaki adım, bu dizileri birleştirerek sıralı hale getirmektir.
   
3. **Birleştirme (Merge)**:
   - İki sıralı dizi, her iki dizinin en küçük elemanlarını karşılaştırarak sıralı bir şekilde birleştirilir.
   - Bu işlem, tüm alt diziler birleşene kadar devam eder.

## Adım Adım Örnek

Dizi: `[38, 27, 43, 3, 9, 82, 10]`

1. **Bölme**: 
   - İlk olarak diziyi iki parçaya ayırırız: `[38, 27, 43]` ve `[3, 9, 82, 10]`.
   - Bu parçalar daha da bölünür: `[38]`, `[27, 43]` ve `[3, 9]`, `[82, 10]` gibi.

2. **Sıralama ve Birleştirme**:
   - Ardından her iki küçük dizi sıralanır ve birleştirilir:
     - `[27, 43]` sıralanır ve birleşir: `[27, 43]`
     - `[3, 9]` sıralanır ve birleşir: `[3, 9]`
     - `[82, 10]` sıralanır ve birleşir: `[10, 82]`
     
   - Son olarak, bu sıralı diziler birleştirilir: `[3, 9, 10, 27, 38, 43, 82]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(n log n)
- **Ortalama Durum**: O(n log n)
- **En Kötü Durum**: O(n log n)

**Merge Sort** her durumda O(n log n) zaman karmaşıklığına sahiptir. Bu nedenle, **Merge Sort** büyük veri kümeleri için oldukça verimlidir.

## Avantajlar

- Kararlı bir sıralama algoritmasıdır (eşit elemanlar sıralandıktan sonra aynı sıradadır).
- Büyük dizilerde hızlıdır ve O(n log n) karmaşıklığı ile etkili çalışır.

## Dezavantajlar

- **Ekstra bellek kullanır**: Diziyi bölerken ve birleştirirken ekstra bellek gereksinimi vardır.
