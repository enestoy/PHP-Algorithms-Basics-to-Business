# Euclidean Algorithm (Öklid Algoritması) ile En Büyük Ortak Bölen (GCD) Hesaplama

## GCD Nedir?

GCD, iki sayının **En Büyük Ortak Böleni** anlamına gelir. Yani, iki sayının ortak bölenleri arasında en büyük olan sayıdır. Örneğin, 36 ve 60 sayıları için GCD 12'dir, çünkü 36 ve 60'ı bölen en büyük sayı 12'dir.

## Euclidean Algorithm (Öklid Algoritması) Nedir?

Öklid Algoritması, GCD'yi hızlı bir şekilde hesaplamak için kullanılan matematiksel bir yöntemdir. Bu algoritma, iki sayı arasındaki GCD'yi hesaplamak için bölme işlemine dayanır. Algoritma, iki sayıyı birbirine bölerek, kalanı bulur ve bu kalan üzerinden işlem yaparak GCD'yi bulur.

## Öklid Algoritması Adımları

1. **İki Sayıyı Alın:** İki pozitif tam sayı \( a \) ve \( b \) verilir (örneğin, 36 ve 60).
2. **Bölme İşlemi Yapın:** İlk adımda \( a \) sayısını \( b \) sayısına bölün.
3. **Kalanı Hesaplayın:** Bu bölme işleminin kalanını bulun.
4. **Kalanı Kullanarak Devam Edin:** Yeni adımda, \( b \)'yi kalanı ile değiştirin ve kalan 0 olana kadar adım 2'yi tekrarlayın.
5. **Sonuç:** Kalan sıfır olduğunda, son bölüme karşılık gelen bölen, GCD'yi verir.

### Örnek

Örnek olarak 36 ve 60 sayılarının GCD'sini hesaplayalım:

1. İlk olarak, 60'ı 36'ya bölüyoruz:
   \[
   60 \div 36 = 1 \quad \text{(Bölüm: 1, Kalan: 24)}
   \]
   Kalan 24.

2. Şimdi, 36'yı 24'e bölüyoruz:
   \[
   36 \div 24 = 1 \quad \text{(Bölüm: 1, Kalan: 12)}
   \]
   Kalan 12.

3. Sonra, 24'ü 12'ye bölüyoruz:
   \[
   24 \div 12 = 2 \quad \text{(Bölüm: 2, Kalan: 0)}
   \]
   Kalan 0.

4. Kalan 0 olduğunda, son bölen 12, GCD'yi verir.

**Sonuç:** 36 ve 60 sayılarının GCD'si **12**'dir.

## Öklid Algoritmasının Avantajları

- **Verimlilik:** Bu algoritma oldukça hızlıdır ve genellikle çok büyük sayılar için bile etkili bir şekilde çalışır.
- **Basitlik:** Uygulaması kolaydır ve sadece temel bölme işlemlerine dayanır.

## Uygulama Alanları

- **Matematik:** En büyük ortak bölen hesaplamaları gerektiren çeşitli problemlerde kullanılır.
- **Kriptografi:** Anahtar üretimi gibi işlemlerde GCD önemli bir rol oynar.
- **Dijital Sistemler:** Veri analizinde ve hata düzeltme algoritmalarında kullanılabilir.
