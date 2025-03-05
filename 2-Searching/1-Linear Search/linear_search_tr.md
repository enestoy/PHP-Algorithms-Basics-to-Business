# Linear Search Algoritması

## Linear Search Nedir?

Linear Search (Doğrusal Arama), en basit arama algoritmalarından biridir. Bir dizide (veya listede) bir elemanı bulmak için dizinin başından sonuna kadar tek tek elemanlar kontrol edilir. Eğer aranan eleman bulunursa, ilgili indeksi döndürür. Bulunamazsa genellikle `-1` değeri veya "Bulunamadı" mesajı döndürülür.

## Çalışma Mantığı

1. Dizinin ilk elemanından başlanır.
2. Aranan eleman, her bir elemanla karşılaştırılır.
3. Eğer eşleşme bulunursa, indeks döndürülür.
4. Tüm elemanlar kontrol edilmesine rağmen bulunamazsa, `-1` döndürülür.

## Zaman Karmaşıklığı

- **En kötü durumda:** O(n) → Eleman listenin sonunda ya da yoksa tüm liste taranır.
- **En iyi durumda:** O(1) → Eleman ilk sıradaysa hemen bulunur.
- **Ortalama durumda:** O(n) → Eleman rastgele bir yerdeyse genellikle yarıya kadar tarama yapılır.

## Avantajları

✅ Basit ve anlaşılırdır.  
✅ Küçük listeler için idealdir.  
✅ Sıralı olma zorunluluğu yoktur.  

## Dezavantajları

❌ Büyük veri kümelerinde yavaştır.  
❌ Daha verimli algoritmalar (Binary Search gibi) varken genellikle tercih edilmez.  

---
Bu yöntem küçük ölçekli aramalar için iyi olsa da, daha büyük listeler ve diziler için daha verimli algoritmalara yönelmek gerekir.
