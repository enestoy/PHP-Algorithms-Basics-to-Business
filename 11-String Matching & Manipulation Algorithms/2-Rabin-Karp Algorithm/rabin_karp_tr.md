# Rabin-Karp String Matching Algorithm

## Giriş

Rabin-Karp algoritması, metin içinde bir alt diziyi aramak için kullanılan bir başka verimli algoritmadır. Bu algoritma, özellikle birden fazla arama yapıldığında veya büyük metinlerde birden fazla alt dizi aranırken avantaj sağlar. Rabin-Karp algoritması, "hashing" (karma fonksiyonu) kullanarak, alt dizilerin eşleşmesini hızlandırır.

## Temel Fikir

Rabin-Karp algoritmasının temel fikri, her bir alt diziyi bir sayı ile temsil etmektir. Bu sayılar, "hashing" kullanılarak hesaplanır. Bir metnin her alt dizisi için bir hash değeri hesaplanır ve bu hash değerleri karşılaştırılır. Eğer iki hash değeri eşleşirse, o zaman o alt dizilerin gerçekten eşleşip eşleşmediği kontrol edilir.

## Rabin-Karp Algoritması Adımları

1. **Hash Fonksiyonu**:
   Algoritma, her bir alt dizi için bir hash değeri hesaplar. Hash fonksiyonu, karakterlerin her birini bir sayı ile temsil eder ve bu sayıları birleştirerek bir hash değeri oluşturur. Bu sayede, iki alt diziyi karşılaştırmak yerine, onların hash değerleri karşılaştırılır.

2. **Arama Adımları**:
   - Aranan alt dizinin hash değeri hesaplanır.
   - Metin üzerinde, her olası alt dizinin hash değeri hesaplanır.
   - Eğer bir alt dizinin hash değeri aranan alt dizinin hash değerine eşitse, o zaman bu iki alt dizi karşılaştırılır.
   - Eğer eşleşme sağlanmazsa, diğer alt diziler için hash değerleri hesaplanır.

3. **Çakışmalar (Collisions)**:
   Hash fonksiyonları, farklı dizilerin aynı hash değerini üretmesi durumunu "çakışma" (collision) olarak adlandırır. Rabin-Karp algoritmasında, hash değeri eşleşse bile dizilerin gerçekten eşleşip eşleşmediğini kontrol etmek gerekir. Bu, çakışmaları çözmek için yapılan bir ek adımdır.

## Rabin-Karp'nin Avantajları

- Rabin-Karp algoritması, çoklu aramalar yapıldığında çok hızlıdır. Bir metin içinde birden fazla alt diziyi aramak için verimli bir çözümdür.
- Hash fonksiyonu kullanarak, tek bir karşılaştırma ile alt dizilerin eşleşmesi kontrol edilir.

## Zaman Karmaşıklığı

Rabin-Karp algoritmasının zaman karmaşıklığı **O(n + m)**'dir, ancak bu karmaşıklık hash fonksiyonunun performansına ve çakışma olasılığına bağlı olarak değişebilir.

- **n**: Metnin uzunluğu
- **m**: Aranan alt dizinin uzunluğu

En kötü durumda, algoritmanın zaman karmaşıklığı **O(n * m)**'dir, çünkü çakışmalar olduğunda her alt dizi karşılaştırılmalıdır.

## Özet

Rabin-Karp algoritması, hashing kullanarak alt dizileri arayan bir algoritmadır. Özellikle çoklu aramalar yapıldığında ve çakışmaların yönetilmesi gerektiğinde etkilidir. Hashing sayesinde algoritma hızlı çalışır, ancak çakışmalar durumunda ek işlemler yapılması gerekir.
