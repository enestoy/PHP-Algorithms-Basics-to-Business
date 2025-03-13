# Strassen's Matrix Multiplication Algoritması

Strassen algoritması, **Divide and Conquer** (Böl ve Fethet) yaklaşımını kullanan bir matris çarpma algoritmasıdır. Geleneksel matris çarpma algoritmasına göre daha hızlıdır ve özellikle büyük matrisler için etkilidir.

## Strassen Algoritmasının Çalışma Mantığı

1. **Matrisleri Bölme:**
   - İki **n × n** boyutundaki matrisi, **n/2 × n/2** boyutunda 8 alt matrise ayırır.

2. **Yedi Özel Çarpma Yapma:**
   - Geleneksel yöntem 8 çarpma işlemi yaparken, Strassen 7 özel çarpma kullanır.
   - Bu özel çarpma işlemleri şu şekildedir:
     - **M1 = (A11 + A22) * (B11 + B22)**
     - **M2 = (A21 + A22) * B11**
     - **M3 = A11 * (B12 - B22)**
     - **M4 = A22 * (B21 - B11)**
     - **M5 = (A11 + A12) * B22**
     - **M6 = (A21 - A11) * (B11 + B12)**
     - **M7 = (A12 - A22) * (B21 + B22)**

3. **Sonuç Matrisi Hesaplama:**
   - Alt matrisleri toplayarak son matrisi oluşturur:
     - **C11 = M1 + M4 - M5 + M7**
     - **C12 = M3 + M5**
     - **C21 = M2 + M4**
     - **C22 = M1 - M2 + M3 + M6**

4. **Rekursif Uygulama:**
   - Eğer matris boyutu küçükse (örneğin 2×2), doğrudan çarpma yapılır.
   - Büyük matrisler için aynı işlem alt matrislere uygulanarak devam edilir.

## Strassen Algoritmasının Zaman Karmaşıklığı

- **Geleneksel matris çarpma:** O(n³)
- **Strassen matris çarpma:** O(n^2.81)

## Strassen Algoritmasının Avantajları

- **Geleneksel çarpma yöntemine göre daha hızlıdır.**
- **Büyük matrislerde performans avantajı sağlar.**
- **Rekürsif olarak çalıştığı için paralel işlemeye uygundur.**

## Strassen Algoritmasının Dezavantajları

- **Ek bellek kullanımı fazladır.**
- **Matrislerin boyutları 2'nin katı olmalıdır.**
- **Küçük matrisler için geleneksel yöntem daha verimli olabilir.**

Strassen algoritması, büyük boyutlu matris çarpmalarında zaman kazandıran önemli bir algoritmadır.
