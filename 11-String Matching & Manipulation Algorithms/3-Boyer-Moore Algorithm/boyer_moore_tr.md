# Boyer-Moore String Matching Algorithm

## Giriş

Boyer-Moore algoritması, metin içinde bir alt diziyi aramak için kullanılan en verimli string matching algoritmalarından biridir. Özellikle büyük metinlerde arama yaparken çok etkilidir. Boyer-Moore algoritması, "from right to left" (sağdan sola) yaklaşımını kullanarak çalışır ve eşleşme sağlamadığında metni ileri doğru kaydırır. Bu sayede birçok karşılaştırmayı atlayabilir.

## Temel Fikir

Boyer-Moore algoritması, metni ve aranan alt diziyi karşılaştırırken yalnızca önemli karşılaştırmaları yapar. Algoritma, karşılaşılan her hatayı (eşleşmeme durumunu) kullanarak alt diziyi verimli bir şekilde kaydırır. Bu kaydırma işlemi, önceden belirlenen iki tablonun yardımıyla yapılır: **bad character rule** ve **good suffix rule**.

## Boyer-Moore Algoritması Adımları

1. **Bad Character Rule**:
   Bu kural, metin üzerinde karşılaşılan hatalı karakterlerin (eşleşmeyen karakterlerin) nasıl kullanılacağını belirler. Eğer metnin bir karakteri aranan alt diziyle eşleşmezse, o zaman o karakterin bulunduğu konumdan sağa kaydırma yapılır. Kaydırma miktarı, aranan alt dizisindeki karakterin metinde bulunup bulunmadığına göre belirlenir. Eğer karakter bulunuyorsa, alt diziyi o karakterin bulunduğu yere kaydırmak mantıklıdır.

2. **Good Suffix Rule**:
   Bu kural, metin üzerinde eşleşme sağlanmış bir kısım varsa ve geri kalan kısmı eşleşmemişse, ne kadar kaydırma yapılacağını belirler. Eğer alt dizinin bir kısmı metinde eşleştiyse, bu kısmın sonrasındaki kısımların da kontrol edilmesine gerek yoktur. Bu sayede daha hızlı bir kaydırma yapılır. Eğer eşleşmeyen kısım varsa, alt dizi bu eşleşmeyen kısmın öncesine kaydırılır.

3. **Arama Adımları**:
   - Arama yapılacak metin ile aranan alt dizi, sağdan sola karşılaştırılır.
   - Eğer bir eşleşme sağlanmazsa, bad character ve good suffix kuralları kullanılarak kaydırma yapılır.
   - Kaydırma işlemi her eşleşmesiz durumda tekrarlanır.

## Boyer-Moore'nin Avantajları

- Boyer-Moore algoritması, büyük metinlerde arama yaparken verimlidir çünkü birçok karşılaştırma atlanır.
- Algoritma, sağdan sola yaklaşım sayesinde daha az karşılaştırma yaparak daha hızlı çalışır.

## Zaman Karmaşıklığı

Boyer-Moore algoritmasının zaman karmaşıklığı **O(n/m)**'dir.

- **n**: Metnin uzunluğu
- **m**: Aranan alt dizinin uzunluğu

En kötü durumda, zaman karmaşıklığı **O(n * m)** olabilir, ancak genellikle çok daha hızlıdır.

## Özet

Boyer-Moore algoritması, sağdan sola karşılaştırma yaparak metin içinde alt diziyi hızlı bir şekilde arar. Bad character ve good suffix kuralları sayesinde verimli bir şekilde kaydırma yapılır, bu da algoritmanın büyük metinlerde hızlı çalışmasını sağlar.
