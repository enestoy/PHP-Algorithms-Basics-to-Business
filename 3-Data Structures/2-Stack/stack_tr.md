# Stack (Yığın) Veri Yapısı

Stack (Yığın), son giren ilk çıkar (LIFO - Last In, First Out) prensibiyle çalışan bir veri yapısıdır. Yani, en son eklenen öğe, ilk olarak çıkarılır. Stack, tıpkı bir yığının üst kısmına eklenen veya çıkarılan öğeler gibi, yalnızca bir uçtan işlem yapılabilir.

## Stack'in Temel Elemanları

1. **Push (Eklemek):**
    - Stack'e bir öğe eklemek.

2. **Pop (Çıkarmak):**
    - Stack'ten bir öğe çıkarmak (en son eklenen öğeyi).

3. **Peek (Görünüm):**
    - Stack'in en üstündeki öğeyi görmek, ancak çıkarmadan.

4. **isEmpty (Boş Mu?):**
    - Stack'in boş olup olmadığını kontrol etmek.

## Stack Kullanım Alanları

- **Fonksiyonların geri dönüşü:** Programlama dillerinde fonksiyon çağrıları ve geri dönüşleri stack veri yapısı ile yönetilir.
- **Undo/Redo işlemleri:** Uygulamalarda yapılan işlemlerin geri alınıp yeniden yapılması işlemleri stack kullanılarak gerçekleştirilir.
- **İfadelerin çözülmesi:** Matematiksel ifadelerin çözümünde (örneğin parantez denetimi) stack kullanılır.
- **Web tarayıcı geçmişi:** Bir tarayıcıda gezinme geçmişi de stack veri yapısını kullanır.

## Stack'in Temel İşlemleri

1. **Push:** Stack'e yeni bir öğe ekler. Bu işlem, öğe en üstte olacak şekilde yapılır.
2. **Pop:** Stack'ten en üstteki öğeyi çıkarır ve bu öğe geri döndürülür.
3. **Peek:** Stack'in en üstündeki öğeyi döndürür ancak stack'ten çıkarmaz.
4. **isEmpty:** Stack'in boş olup olmadığını kontrol eder.

## Sonuç

Stack, son giren ilk çıkar (LIFO) prensibine göre çalışan, çok kullanışlı bir veri yapısıdır. Fonksiyon çağrıları, undo/redo işlemleri gibi birçok alanda kullanılır. Stack işlemleri (push, pop, peek) oldukça hızlıdır ve bu veri yapısının dinamikliği sayesinde çeşitli problemleri çözmek kolaylaşır.
