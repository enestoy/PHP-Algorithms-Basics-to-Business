# Merge Sort Algoritması

Merge Sort, "Divide and Conquer" (Böl ve Fethet) stratejisini kullanan etkili bir sıralama algoritmasıdır. Algoritma, bir diziyi küçük parçalara ayırarak sıralar ve ardından bu parçaları birleştirerek sıralı hale getirir.

## Merge Sort'un Çalışma Mantığı

1. **Bölme (Divide):**
   - Dizi, ortadan ikiye bölünerek alt dizilere ayrılır.
   - Bu işlem, her alt dizi tek bir elemana sahip olana kadar devam eder.

2. **Fethetme (Conquer):**
   - Tek elemanlı diziler zaten sıralıdır.
   - İkili gruplar halinde birleştirilerek sıralı diziler oluşturulur.
   - Küçük diziler birleşerek daha büyük sıralı diziler haline getirilir.

3. **Birleştirme (Combine):**
   - Alt diziler, karşılaştırmalar yapılarak birleştirilir ve tam sıralı dizi elde edilir.

## Merge Sort'un Zaman Karmaşıklığı

- **En iyi durum:** O(n log n)
- **Ortalama durum:** O(n log n)
- **En kötü durum:** O(n log n)

Bu nedenle Merge Sort, büyük veri kümeleri için oldukça verimli bir sıralama algoritmasıdır.

## Merge Sort'un Avantajları

- **Stabil bir algoritmadır:** Aynı değerlere sahip elemanların sıralanma sırası korunur.
- **Büyük veri kümeleri için etkilidir.**
- **Kötü durum senaryolarında bile O(n log n) karmaşıklığını korur.**

## Merge Sort'un Dezavantajları

- **Ekstra bellek gerektirir:** Yeni diziler oluşturulduğu için O(n) ek bellek kullanımına ihtiyaç duyar.
- **Küçük veri kümeleri için daha yavaş olabilir.**

Merge Sort, özellikle büyük ve sıralama düzeninin önemli olduğu veri kümelerinde tercih edilen bir algoritmadır.
