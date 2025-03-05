# Bucket Sort

**Bucket Sort**, sıralama algoritmalarından biridir ve genellikle sayılar belirli bir aralıkta ve birbirine yakın olduğunda oldukça verimlidir. Bu algoritma, diziyi belirli aralıklara (veya "kovalara") ayırır, ardından her kova içindeki elemanları sıralar ve tüm kova elemanları birleştirilerek sıralı bir dizi elde edilir.

## Algoritmanın Çalışma Prensibi

1. **Kovaları (Buckets) Oluşturma**:
   - İlk olarak, sıralanacak elemanların değerlerine göre bir dizi kova oluşturulur.
   - Bu kovalar, genellikle elemanların değeri belirli bir aralığa yayılacak şekilde tasarlanır. Kovaların sayısı, genellikle dizinin eleman sayısına eşit ya da biraz daha fazla olabilir.

2. **Elemanları Kovalarına Dağıtma**:
   - Her bir eleman, değeri doğrultusunda uygun kovanın içine yerleştirilir.

3. **Her Kovada Sıralama Yapma**:
   - Kovaların içine yerleştirilen elemanlar, genellikle hızlı sıralama algoritmaları (örneğin, **Insertion Sort**) ile sıralanır.

4. **Tüm Kovaları Birleştirme**:
   - Son olarak, sıralanan kovalar birleştirilir ve sıralı bir dizi elde edilir.

## Adım Adım Örnek

Dizi: `[0.42, 0.32, 0.23, 0.51, 0.12, 0.33]`

1. **Kovaları Oluşturma**:
   - Verilen aralık (0 ile 1 arasında) dikkate alınarak 5 tane kova oluşturulabilir.

2. **Elemanları Kovalarına Dağıtma**:
   - Elemanlar şu şekilde dağıtılabilir:
     - Kova 1: `[0.12]`
     - Kova 2: `[0.23]`
     - Kova 3: `[0.32, 0.33]`
     - Kova 4: `[0.42]`
     - Kova 5: `[0.51]`

3. **Her Kovada Sıralama**:
   - Her kova, kendi içinde sıralanır:
     - Kova 1: `[0.12]`
     - Kova 2: `[0.23]`
     - Kova 3: `[0.32, 0.33]`
     - Kova 4: `[0.42]`
     - Kova 5: `[0.51]`

4. **Kovaları Birleştirme**:
   - Son olarak, sıralı kovalar birleştirilir:
     - `[0.12, 0.23, 0.32, 0.33, 0.42, 0.51]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(n + k)
- **Ortalama Durum**: O(n + k)
- **En Kötü Durum**: O(n^2), eğer her kova tek bir eleman içerirse ve kovalar arasında sıralama yapılıyorsa.

Burada:

- **n**: Dizinin eleman sayısı
- **k**: Kovaların sayısı (veya dizinin aralığı)

### Avantajlar

- **Verimli Aralıklar İçin**: Eğer dizinin elemanları belirli bir aralıkta yoğunlaşıyorsa, Bucket Sort çok verimli olabilir.
- **Sıralama Süresi**: Kovalar arasında sıralama yapılmadığı takdirde, algoritmanın çalışma süresi çok hızlı olabilir.

### Dezavantajlar

- **Düşük Performans**: Eğer dizinin elemanları çok dağılmışsa, Bucket Sort çok verimli olmayabilir.
- **Bellek Kullanımı**: Kovaların saklanması için ek bellek kullanımı gerektirir.

### Kullanım Alanları

- **Sayılara Dayalı Sıralamalar**: Özellikle belirli bir aralıktaki sayılar için uygundur.
- **Karmaşık Sayılarla Çalışma**: Eğer sayıların yoğunlukları belirli bir aralıktaysa, Bucket Sort algoritması kullanılabilir.
