# Z-Algorithm Nedir?

Z-Algorithm, bir dizi (string) üzerinde yapılan bir algoritmadır ve genellikle **string matching** ve **string manipülasyonu** problemlerinde kullanılır. Bu algoritma, bir dizinin her bir indeksine kadar olan **kendi kendine benzerlik** uzunluğunu hesaplar.

## Z-Array

Z-Algorithm'ı anlamak için **Z-array** kavramını bilmemiz gerekir. Z-array, bir stringin her pozisyonu için, o pozisyondan başlayarak stringin en uzun eşleşmesini (prefix ile) bulur.

Örneğin:

Bir string verelim: `s = "abac"`

Z-array'i şöyle hesaplarız:

1. İlk karakterden başla: "abac" ile "abac" tam eşleşir, Z[0] = 4.
2. İkinci karakterden başla: "b" ile "abac" en başta 0 eşleşir, Z[1] = 0.
3. Üçüncü karakterden başla: "a" ile "abac" en başta "a" eşleşir, Z[2] = 1.
4. Dördüncü karakterden başla: "c" ile "abac" en başta 0 eşleşir, Z[3] = 0.

Sonuç olarak, Z-array şu olur: `[4, 0, 1, 0]`

## Z-Algorithm Nasıl Çalışır?

Z-Algorithm, Z-array'in verimli bir şekilde hesaplanmasını sağlar. Bu işlemde, her bir indeksi sırasıyla kontrol ederiz, ancak her seferinde diziyi yeniden taramak yerine, daha önce hesapladığımız sonuçları kullanarak işlemi hızlandırırız.

Adımlar:

1. İlk pozisyonda Z[0] her zaman stringin uzunluğudur.
2. Diğer indekslerde, önceki hesaplamalardan faydalanarak benzerlikleri buluruz.
3. Eğer bir eşleşme bulunursa, bunu Z-array'e yazarız.
4. Bu işlem bir döngü ile gerçekleştirilir ve genellikle O(n) zaman karmaşıklığına sahiptir.

## Z-Algorithm Kullanım Alanları

Z-Algorithm, **string matching** (örneğin, bir desenin ana dizide aranması) gibi problemlerde çok kullanışlıdır. Özellikle, bir dizi içindeki belirli alt dizileri hızlıca bulmak için kullanılır.

## Özet

Z-Algorithm, bir stringin her pozisyonundaki **kendi kendine benzerlik** uzunluklarını hesaplayarak, string manipülasyonları ve arama işlemleri için verimli bir çözüm sunar. Bu algoritma, genellikle daha karmaşık işlemleri optimize etmek için kullanılır.
