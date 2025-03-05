# Jump Search Algoritması

## Jump Search Nedir?

Jump Search, sıralı bir listede bir elemanı aramak için kullanılan bir algoritmadır. Bu algoritma, belirli bir adım büyüklüğü ile ilerleyerek, her adımda elemanın bulunup bulunmadığını kontrol eder. Eğer eleman adım içinde bulunmazsa, bir sonraki adıma geçilir ve işlem bu şekilde devam eder.

## Çalışma Mantığı

1. Liste sıralı olmalıdır.
2. Bir adım büyüklüğü `k` (genellikle listenin karekökü kadar) belirlenir.
3. Listenin başından başlayarak, `k` adım ilerlenir.
4. Hedef elemanın şu anki blokta olup olmadığı kontrol edilir.
5. Eğer eleman blok içinde bulunmazsa, bir sonraki bloğa geçmek için `k` adım daha ilerlenir.
6. Eğer eleman bulunduysa, o blokta doğrusal arama yapılır ve kesin pozisyon bulunur.

## Zaman Karmaşıklığı

- **En kötü durumda:** O(√n) → Algoritma adım adım ilerler, Linear Search'ten daha az karşılaştırma yapar.
- **En iyi durumda:** O(1) → Hedef eleman ilk adımdan hemen bulunabilir.
- **Ortalama durumda:** O(√n) → Genellikle büyük veri kümelerinde Linear Search'ten daha hızlıdır.

## Avantajları

✅ Linear Search'e göre büyük veri kümelerinde daha hızlıdır.  
✅ Sıralı veriyle verimli çalışır.  
✅ Bloklar halinde ilerleyerek karşılaştırma sayısını azaltır.  

## Dezavantajları

❌ Liste sıralı olmalıdır.  
❌ Veri kümesindeki blok sayısı az ise Binary Search kadar verimli olmayabilir.  

---
Jump Search, sıralı verilerle hızlı arama yapılması gereken durumlarda kullanılır.
