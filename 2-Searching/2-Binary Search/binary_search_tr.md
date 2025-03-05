# İkili Arama (Binary Search) Algoritması

## Binary Search Nedir?

İkili Arama (Binary Search), sıralı bir listede bir elemanı hızlı bir şekilde bulmak için kullanılan verimli bir arama algoritmasıdır. Doğrusal Arama (Linear Search) gibi tüm elemanları tek tek kontrol etmek yerine, böl ve fethet yaklaşımını kullanır.

## Çalışma Mantığı

1. Liste, küçükten büyüğe sıralı olmalıdır.
2. Listenin ortasındaki eleman bulunur.
3. Aranan eleman ile orta eleman karşılaştırılır:
   - Eğer eşitse, indeks döndürülür.
   - Eğer aranan eleman küçükse, sol yarıda arama yapılır.
   - Eğer aranan eleman büyükse, sağ yarıda arama yapılır.
4. Eleman bulunana veya arama aralığı boşalana kadar bu işlem tekrarlanır.

## Zaman Karmaşıklığı

- **En kötü durumda:** O(log n) → Arama alanı her adımda yarıya iner.
- **En iyi durumda:** O(1) → Orta eleman doğrudan aranan eleman olabilir.
- **Ortalama durumda:** O(log n) → Büyük veri kümeleri için oldukça verimlidir.

## Avantajları

✅ Büyük listelerde Doğrusal Arama'ya göre çok daha hızlıdır.  
✅ Sıralı verilerle verimli çalışır.  
✅ Karşılaştırma sayısını önemli ölçüde azaltır.  

## Dezavantajları

❌ Arama yapmadan önce listenin sıralı olması gerekir.  
❌ Küçük veri kümeleri için Doğrusal Arama'ya kıyasla daha az avantajlıdır.  

---
Binary Search, veritabanları ve indeksleme sistemleri gibi hızlı arama gerektiren uygulamalarda yaygın olarak kullanılır.
