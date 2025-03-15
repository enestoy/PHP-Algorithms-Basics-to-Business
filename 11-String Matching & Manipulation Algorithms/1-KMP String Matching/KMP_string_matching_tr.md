# KMP (Knuth-Morris-Pratt) String Matching Algorithm

## Giriş

KMP algoritması, bir dizinin içinde belirli bir alt diziyi aramak için kullanılan verimli bir arama algoritmasıdır. Bu algoritma, arama işlemi sırasında karşılaşılan karakter eşleşmelerini geri almaz, yani karakterleri yeniden kontrol etmez. Bu sayede daha hızlı çalışır. KMP algoritması, özellikle büyük metinlerde ve veri tabanlarında etkilidir.

## Temel Fikir

KMP algoritmasının temel fikri, metnin ve aranan alt dizinin karşılaştırılmasını hızlandırmaktır. Eğer eşleşme sağlanmazsa, algoritma bu noktada tekrar başa dönmeden, aranan alt dizinin uygun kısmına kayarak devam eder. Bunu, arama yapılan dizinin "prefix" (ön ek) ve "suffix" (son ek) ilişkisini kullanarak yapar.

## KMP Algoritması Adımları

1. **Preprocessing (Önişleme) - Prefix Suffix Tablosu (LPS)**:
   KMP algoritması, öncelikle bir "LPS" (Longest Prefix Suffix) tablosu oluşturur. Bu tablo, aranan alt dizinin her karakteri için, o karakterden önceki karakterlerle olan uzun "prefix" ve "suffix" eşleşmelerini tutar. Bu tablo, algoritmanın çalışma süresini iyileştirir. LPS tablosu, her karakter için şu bilgiyi sağlar:

   - O karaktere kadar olan en uzun prefix, aynı zamanda bir suffix (son ek) de oluyorsa, o kadar karakteri atlayabiliriz.
   - Bu sayede karşılaştırmaların tekrarı engellenir.

2. **Arama Adımları**:
   - Aranan alt dizinin ilk karakteri, metnin ilk karakteri ile karşılaştırılır.
   - Eşleşme sağlanmazsa, LPS tablosu kullanılarak, hangi karakterden başlanacağı belirlenir.
   - LPS tablosu, hangi karakterin atlanabileceğini belirler ve bu sayede karşılaştırmaların çoğu atlanır.

## KMP'nin Avantajları

- KMP algoritması, her karakterin yalnızca bir kez kontrol edilmesini sağlar. Yani, en kötü durumda bile zaman karmaşıklığı O(n) olur (n, metnin uzunluğu).
- Bu, geleneksel doğrusal arama algoritmalarına göre önemli bir hız avantajı sağlar.

## Zaman Karmaşıklığı

KMP algoritmasının zaman karmaşıklığı **O(n + m)**'dir.

- **n**: Metnin uzunluğu
- **m**: Aranan alt dizinin uzunluğu

Bu karmaşıklık, LPS tablosunun oluşturulması ve arama işleminin birlikte hesaplanmasından gelir.

## Özet

KMP algoritması, metin içinde alt diziyi ararken, geri gitmek yerine ileri doğru adımlar atarak karşılaştırmaları verimli bir şekilde gerçekleştirir. Bu yöntem sayesinde büyük metinlerde arama işlemi çok daha hızlı hale gelir.
