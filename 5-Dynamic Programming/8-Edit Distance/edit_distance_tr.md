# Edit Distance (Levenshtein Distance) - Dynamic Programming

## Problem Overview

Edit Distance veya Levenshtein Distance problemi, iki kelime arasındaki farkı ölçmek amacıyla kullanılır. Bu fark, bir kelimeyi diğerine dönüştürmek için gereken minimum edit işlemleri sayısıdır. Edit işlemleri şunlardır:

1. **Ekleme**: Bir karakteri eklemek.
2. **Silme**: Bir karakteri silmek.
3. **Değiştirme**: Bir karakteri başka bir karakterle değiştirmek.

Amaç, iki kelimeyi birbirine dönüştürmek için yapılan bu işlemlerin minimum sayısını bulmaktır.

## Problem Definition

Verilen iki kelime \( A \) ve \( B \), bu kelimeleri birbirine dönüştürmek için yapılacak minimum işlemler sayısını bulmak hedeflenir.

Örnek olarak:

- \( A = "kitten" \)
- \( B = "sitting" \)

Bu durumda minimum edit mesafesi hesaplanarak, kelimeler arasındaki fark bulunur.

## Approach: Dynamic Programming

Levenshtein Distance problemi, dinamik programlama ile çözülebilecek bir problemdir. Bu problemde, her iki kelimenin her karakteri için alt problemlerin çözümlerini kullanarak toplam sonucu elde ederiz.

### Adımlar

1. **İlk Durum:**
   İki kelimenin boş olması durumunda mesafe sıfırdır. Eğer bir kelime boşsa, diğer kelimenin tüm karakterlerini eklemek gerekecektir.

2. **Maliyet Matrisi:**
   İki kelimenin her karakteri için bir tablo (matris) oluşturulur. Bu matrisin her hücresi, o noktaya kadar yapılan edit işlemlerinin toplam sayısını saklar.

3. **Dinamik Programlama İterasyonu:**
   Matris her adımda hesaplanır. Eğer kelimenin karakterleri eşleşiyorsa, o hücredeki değer bir önceki hücreye kopyalanır. Eğer eşleşmiyorsa, o hücredeki değer, ekleme, silme veya değiştirme işleminin minimum maliyeti ile güncellenir.

4. **Sonuç:**
   Sonuç, matrisin sağ alt köşesinde bulunur. Bu, iki kelime arasındaki minimum edit mesafesini temsil eder.

### Temel Durum

Başlangıçta, bir kelimenin boşken diğer kelimeyi elde etmek için gereken işlem sayısı hesaplanır.

### Örnek

- \( A = "kitten" \)
- \( B = "sitting" \)

Bu durumda, minimum edit mesafesi şu adımlarla hesaplanır:

1. "k" ve "s" farklı, değiştirilir.
2. "i" ve "i" aynı, değiştirilmez.
3. "t" ve "t" aynı, değiştirilmez.
4. "t" ve "t" aynı, değiştirilmez.
5. "e" ve "i" farklı, değiştirilir.
6. "n" ve "n" aynı, değiştirilmez.
7. "s" ve "g" farklı, değiştirilir.

Toplamda 3 işlem gereklidir.

## Conclusion

Levenshtein Distance problemi, iki kelime arasındaki farkı hesaplamak için dinamik programlamayı kullanan klasik bir problemdir. Bu problem, kelimeleri birbirine dönüştürmek için gereken minimum sayıda edit işlemini bulmak için alt problemlerin çözümlerini birleştirir.
