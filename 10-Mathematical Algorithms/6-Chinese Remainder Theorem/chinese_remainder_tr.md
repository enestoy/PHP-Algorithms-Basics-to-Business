# Çin Kalan Teoremi (Chinese Remainder Theorem)

## Çin Kalan Teoremi Nedir?

**Çin Kalan Teoremi** (CRT), modüler aritmetikle ilgili önemli bir teoremdir. Bu teorem, farklı modüllerle çözülebilen sistemlerin birleştirilmesini sağlar. Yani, birden fazla modüler denklem kümesinin tek bir çözümünü bulmak için kullanılır.

Matematiksel olarak, **Çin Kalan Teoremi** şu şekilde ifade edilir:

Bir dizi modüler denklem şu şekilde verildiğinde:

\[
\begin{cases}
x \equiv a_1 \ (\text{mod} \ m_1) \\
x \equiv a_2 \ (\text{mod} \ m_2) \\
\vdots \\
x \equiv a_n \ (\text{mod} \ m_n)
\end{cases}
\]

Bu denklemlerin her biri farklı modüllerle ilgili olduğu için, bu denklemler tek bir modül altında çözülebilir. Yani, bu denklemlerin çözümü, belirli bir **x** değeri ile birleştirilebilir.

## Temel Koşullar

Çin Kalan Teoremi'nin uygulanabilmesi için modüllerin birbirleriyle **asal** (coprime) olması gerekir. Yani, her bir modül **m1, m2, ..., mn** için:

\[
\text{gcd}(m_i, m_j) = 1 \quad \text{(i ≠ j)}
\]

Burada, **gcd**, **Greatest Common Divisor** (En Büyük Ortak Bölgenin) kısaltmasıdır. Eğer modüller birbirleriyle asal değilse, teorem uygulanamaz.

## Teorem Nasıl Çalışır?

Çin Kalan Teoremi'nin temel mantığı, verilen modüler denklemlerle çözümü adım adım birleştirmektir. İlk olarak, modüller arasındaki ilişkileri kullanarak her bir denklem için bir çözüm bulunur, sonra bu çözümler birleştirilir.

### Adımlar

1. **Modüllerin Çarpımını Hesaplayın:**
   \[
   M = m_1 \times m_2 \times \cdots \times m_n
   \]
   Burada **M**, tüm modüllerin çarpımıdır.

2. **Her Modül İçin Yardımcı Değişkenler Hesaplayın:**
   Her modül için, **M_i** hesaplanır:
   \[
   M_i = \frac{M}{m_i}
   \]
   Bu, her modül için toplam modül çarpımından, o modülün çıkarılmasıyla elde edilen sayıdır.

3. **Her M_i İçin Modüler Ters Hesaplayın:**
   Her bir **M_i** değeri için, **M_i**'nin modüler tersini (**N_i**) hesaplayın:
   \[
   M_i \times N_i \equiv 1 \ (\text{mod} \ m_i)
   \]

4. **Çözümleri Birleştirin:**
   Çözümleri şu şekilde birleştirin:
   \[
   x = \sum_{i=1}^{n} a_i \times M_i \times N_i \ (\text{mod} \ M)
   \]
   Burada **a_i**, her modüler denklemin çözümüdür.

## Örnek

Diyelim ki aşağıdaki modüler denklemleri çözeceğiz:

\[
\begin{cases}
x \equiv 2 \ (\text{mod} \ 3) \\
x \equiv 3 \ (\text{mod} \ 5) \\
x \equiv 1 \ (\text{mod} \ 7)
\end{cases}
\]

### Adım 1: Modüllerin Çarpımını Hesapla

\[
M = 3 \times 5 \times 7 = 105
\]

### Adım 2: Yardımcı Değişkenleri Hesapla

\[
M_1 = \frac{105}{3} = 35, \quad M_2 = \frac{105}{5} = 21, \quad M_3 = \frac{105}{7} = 15
\]

### Adım 3: Modüler Tersleri Hesapla

- **35 mod 3**'ün modüler tersi: 35'i 3'e bölüp kalanı 1 yapan sayıyı bulmamız lazım. **35 mod 3 = 2**. Bu durumda, 35'in modüler tersi 2'dir.
- **21 mod 5**'in modüler tersi: 21'i 5'e bölüp kalanı 1 yapan sayıyı bulmamız lazım. **21 mod 5 = 1**. Bu durumda, 21'in modüler tersi 1'dir.
- **15 mod 7**'in modüler tersi: 15'i 7'ye bölüp kalanı 1 yapan sayıyı bulmamız lazım. **15 mod 7 = 1**. Bu durumda, 15'in modüler tersi 1'dir.

### Adım 4: Çözümleri Birleştir

\[
x = 2 \times 35 \times 2 + 3 \times 21 \times 1 + 1 \times 15 \times 1
\]
\[
x = 140 + 63 + 15 = 218
\]
Şimdi, bu sonucu **105** ile modüler olarak alıyoruz:
\[
x \equiv 218 \ (\text{mod} \ 105) = 218 - 2 \times 105 = 218 - 210 = 8
\]

Sonuç olarak, **x = 8**.

## Çin Kalan Teoremi'nin Kullanım Alanları

- **Kriptografi:** Çin Kalan Teoremi, RSA gibi şifreleme algoritmalarında büyük sayılarla işlem yaparken hız kazandırır.
- **Sayısal Hesaplamalar:** Büyük sayıların modüler hesaplamalarını daha verimli hale getirmek için kullanılır.
- **Çeşitli Algoritmalar:** Diğer matematiksel problemlerin çözümünde de etkili bir yöntemdir.

## Sonuç

Çin Kalan Teoremi, modüler aritmetik ve sayı teorisindeki güçlü araçlardan biridir. Farklı modüllerle verilen denklemleri tek bir denklemde birleştirerek çözüm sağlamak, özellikle büyük sayılarla işlem yaparken önemli avantajlar sunar.
