# Fermat’s Little Theorem (Fermat'ın Küçük Teoremi)

## Fermat'ın Küçük Teoremi Nedir?

**Fermat'ın Küçük Teoremi**, asal sayılarla ilgili önemli bir teoremdir. Bu teorem, bir asal sayının modüler aritmetik üzerindeki özelliklerini açıklar. Teorem şöyle der:

Eğer **p** bir asal sayı ve **a** p'ye bölünmeyen bir tamsayı ise, o zaman:

\[
a^{p-1} \equiv 1 \ (\text{mod} \ p)
\]

Yani, **a** sayısının **p-1**. kuvveti **p** sayısına bölündüğünde, kalan 1'e eşit olacaktır. Bu teorem, özellikle sayı teorisi, şifreleme algoritmaları (özellikle RSA) ve modüler aritmetik işlemlerinde oldukça kullanılır.

## Teorem Açıklaması

- **p** asal sayıdır.
- **a** sayısı **p** sayısına bölünmeyen bir tamsayıdır. Yani **a % p != 0** olmalıdır.
- Fermat'ın Küçük Teoremi diyor ki, **a** sayısının **p-1**. kuvvetinin **p** sayısına bölümünden kalan **1** olacaktır.

### Örnek

Diyelim ki **p = 5** ve **a = 2**. Fermat'ın Küçük Teoremi'ne göre:

\[
2^{5-1} = 2^4 = 16
\]

Şimdi, 16'nın 5'e bölümünden kalanı bulalım:

\[
16 \div 5 = 3 \ (\text{kalan} \ 1)
\]

Bu, Fermat'ın Küçük Teoremi'nin geçerli olduğunu gösterir çünkü **2^4 mod 5 = 1**.

## Fermat’ın Küçük Teoreminin Kullanım Alanları

1. **Şifreleme Sistemleri (RSA):**
   Fermat’ın Küçük Teoremi, özellikle RSA algoritmasında kullanılan modüler aritmetik işlemlerinde önemli bir rol oynar. RSA şifreleme algoritmasında asal sayılar ve modüler üs hesaplamaları kullanılır.

2. **Hızlı Üs Hesaplamaları:**
   Fermat'ın Küçük Teoremi, büyük üslerin hesaplanmasında, özellikle modüler hesaplamalarla birlikte kullanıldığında işlemleri hızlandırır.

3. **Sayısal Analiz ve Kriptografi:**
   Sayılar teorisinde çeşitli hesaplamalar yaparken ve kriptografik uygulamalarda Fermat’ın Küçük Teoremi kullanılabilir.

## Fermat’ın Küçük Teoremi ile İlgili Önemli Notlar

- **Asal Sayı Olmayan p:** Eğer **p** asal bir sayı değilse, Fermat’ın Küçük Teoremi geçerli olmayabilir. Bu nedenle, teorem sadece asal sayılar için geçerlidir.
- **a’nın p’ye Bölünebilir Olması Durumu:** Eğer **a** sayısı **p** sayısına bölünebiliyorsa, teorem geçerli olmaz. Ancak, teoremdeki **a** sayısının **p**'ye bölünmediği koşulunun sağlanması önemlidir.

## Sonuç

Fermat’ın Küçük Teoremi, özellikle asal sayılarla yapılan işlemler ve modüler aritmetik hesaplamaları için temel bir araçtır. Bu teorem, sayı teorisi ve kriptografi gibi alanlarda geniş bir uygulama alanına sahiptir.
