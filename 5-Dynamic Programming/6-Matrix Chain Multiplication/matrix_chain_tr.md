# Matrix Chain Multiplication - Dynamic Programming

## Problem Overview

Matrix Chain Multiplication, klasik bir dinamik programlama problemidir. Amaç, verilen bir matris dizisini çarpmak için en verimli yolu bulmaktır. Matris çarpması birleşimlidir, yani matrislerin hangi sırayla çarpıldığının sonucu değiştirmediği halde, hesaplama maliyetini etkiler.

Verilen bir matris dizisi ile amaç, matrisleri parantezlemeyi ve çarpmayı en düşük skalar çarpan sayısı ile yapmaktır.

## Problem Definition

Bir dizi matris \( A_1, A_2, A_3, \dots, A_n \) verildiğinde, her bir matris \( A_i \) \( p_{i-1} \times p_i \) boyutlarına sahiptir. Amaç, bu matrislerin çarpılma sırasını belirlemek ve skalar çarpan sayısını en aza indirmektir.

Örneğin, aşağıdaki boyutlara sahip 3 matrisi ele alalım:

- \( A_1 \): \( 10 \times 20 \)
- \( A_2 \): \( 20 \times 30 \)
- \( A_3 \): \( 30 \times 40 \)

Bu matrisi önce \( A_1 \) ve \( A_2 \) ile çarparak ardından \( A_3 \) ile çarpabiliriz ya da önce \( A_2 \) ve \( A_3 \) ile çarparak, sonra \( A_1 \) ile çarpabiliriz. Çarpma sırası farklı olduğunda skalar çarpan sayısı değişecektir.

## Approach: Dynamic Programming

Matrix Chain Multiplication problemini çözmek için dinamik programlama kullanılır. Amaç, problemi daha küçük alt problemlere ayırmak ve çözümü kademeli olarak inşa etmektir.

### Adımlar

1. **Matris Boyutları:**
   Matrislerin boyutlarını bir dizi olarak tanımlayın. Örneğin, 3 matris varsa, boyutlar \( p_0, p_1, p_2, p_3 \) şeklinde olur, burada \( A_1 \) matrisinin boyutları \( p_0 \times p_1 \), \( A_2 \) matrisinin boyutları \( p_1 \times p_2 \) vb. olacaktır.

2. **Maliyet Matrisi:**
   `dp` adında 2 boyutlu bir tablo oluşturun. Bu tablodaki `dp[i][j]`, \( A_i \) ile \( A_j \) arasındaki matrislerin çarpılmasını gerçekleştirmek için gereken minimum skalar çarpan sayısını gösterir. Bu tablo şu formülle doldurulur:
   $$
   dp[i][j] = \min(dp[i][k] + dp[k+1][j] + p_i \times p_k \times p_j)
   $$
   Burada \( i \leq k < j \) olup, bu formül, diziyi bölecek ve en düşük maliyetli çözümü seçecektir.

3. **Temel Durum:**
   Temel durumda, tek bir matrisin çarpılması için maliyet yoktur, bu yüzden $$ \( dp[i][i] = 0 \) $$ olarak belirlenir.

4. **İteratif Hesaplama:**
   Zincir uzunlukları arttıkça, her alt problemi çözmek için tüm olası bölme noktalarını kontrol edin ve minimum maliyeti bulun.

5. **Sonuç:**
   Sonuç, `dp[1][n-1]`'de bulunacaktır ve bu, tüm matrislerin çarpılması için gereken minimum skalar çarpan sayısını verir.

## Örnek

Aşağıdaki boyutlara sahip matrisleri ele alalım:

- \( A_1 \): \( 10 \times 20 \)
- \( A_2 \): \( 20 \times 30 \)
- \( A_3 \): \( 30 \times 40 \)

Boyutlar dizisi \( [10, 20, 30, 40] \) olacaktır. Dinamik programlama kullanılarak, optimal parantezleme bulunur ve skalar çarpan sayısı en aza indirilir.

## Conclusion

Matrix Chain Multiplication, dinamik programlamanın gücünü gösteren klasik bir problemdir. Karmaşık bir problemi daha küçük alt problemlere ayırarak her birini verimli bir şekilde çözüp, sonrasında optimal çözümü bulabiliriz. Bu, gerçek dünya matris çarpma problemleri için de uygulanabilir.
