# Binary Search Algoritması

Binary Search (İkili Arama), "Divide and Conquer" (Böl ve Fethet) stratejisini kullanan etkili bir arama algoritmasıdır. Algoritma, sıralı bir dizide belirli bir elemanı bulmak için diziyi sürekli ikiye böler.

## Binary Search'un Çalışma Mantığı

1. **Orta Elemanı Bulma:**
   - Dizinin ortasındaki eleman seçilir.

2. **Karşılaştırma:**
   - Eğer orta eleman aranan değere eşitse, arama tamamlanır.
   - Eğer aranan değer ortadaki elemandan küçükse, arama sol yarıda devam eder.
   - Eğer aranan değer ortadaki elemandan büyükse, arama sağ yarıda devam eder.

3. **Tekrar:**
   - Arama işlemi, alt diziler üzerinde tekrar edilerek devam eder.
   - Dizinin boyutu 0 olduğunda aranan eleman bulunamaz ve işlem sona erer.

## Binary Search'un Zaman Karmaşıklığı

- **En iyi durum:** O(1) *(Aranan eleman ilk tahminde bulunursa)*
- **Ortalama durum:** O(log n)
- **En kötü durum:** O(log n)

## Binary Search'un Avantajları

- **Çok hızlıdır:** Büyük veri kümelerinde bile O(log n) performansı sunar.
- **Daha az işlem yapar:** Doğrusal arama (O(n)) ile karşılaştırıldığında çok daha az karşılaştırma yapar.
- **Verimli çalışır:** Bellek açısından ek yer kaplamaz.

## Binary Search'un Dezavantajları

- **Sadece sıralı dizilerde çalışır.**
- **Dizinin sıralanması gerekiyorsa ek maliyet doğurur.**

Binary Search, büyük ve sıralı veri kümelerinde oldukça etkili bir arama algoritmasıdır.
