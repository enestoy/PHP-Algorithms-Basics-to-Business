# Quick Sort Algoritması

Quick Sort, "Divide and Conquer" (Böl ve Fethet) stratejisini kullanan hızlı ve verimli bir sıralama algoritmasıdır. Algoritma, bir pivot (dönel nokta) seçerek diziyi küçük ve büyük olmak üzere iki alt gruba ayırır ve ardından bu alt grupları ayrı ayrı sıralar.

## Quick Sort'un Çalışma Mantığı

1. **Pivot Seçimi:**
   - Diziden rastgele veya belirli bir kurala göre bir pivot eleman seçilir.

2. **Bölme (Partitioning):**
   - Seçilen pivot eleman etrafında dizinin elemanları yeniden düzenlenir.
   - Pivot'tan küçük olanlar sol tarafa, büyük olanlar sağ tarafa yerleştirilir.

3. **Rekursif Sıralama:**
   - Sol ve sağ alt diziler için aynı işlem tekrar edilir.
   - Alt diziler tek eleman kalana kadar bölünmeye devam eder.

## Quick Sort'un Zaman Karmaşıklığı

- **En iyi durum:** O(n log n)
- **Ortalama durum:** O(n log n)
- **En kötü durum:** O(n²) *(Eğer pivot seçimi kötü yapılırsa)*

## Quick Sort'un Avantajları

- **Hızlıdır:** Ortalama durumda Merge Sort ile benzer performansa sahiptir.
- **Ekstra bellek gerektirmez:** Çoğu durumda ek hafıza gerektirmeden çalışır.
- **Pratikte çok verimli bir algoritmadır.**

## Quick Sort'un Dezavantajları

- **Kötü pivot seçimi performansı düşürebilir.**
- **Merge Sort kadar stabil değildir:** Aynı değerlere sahip elemanların sıralanma sırası değişebilir.

Quick Sort, büyük veri kümelerinde ve belleğin sınırlı olduğu durumlarda tercih edilen etkili bir sıralama algoritmasıdır.
