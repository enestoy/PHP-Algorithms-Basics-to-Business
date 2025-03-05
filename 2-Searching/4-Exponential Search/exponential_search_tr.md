# Exponential Search Algoritması

**Exponential Search** (Üssel Arama), sıralı bir dizide hızlı bir şekilde arama yapmak için kullanılan bir algoritmadır. Bu algoritma, klasik binary search (ikili arama) algoritmasına benzer, ancak bir farkı vardır. İlk olarak diziyi daha büyük aralıklarla tarar ve ardından ikili arama kullanarak arama işlemini tamamlar.

## Algoritmanın Mantığı

1. **Başlangıç Adımı**:
   - Dizinin ilk elemanını kontrol ederiz. Eğer aradığımız değer ilk elemanla eşleşiyorsa, direkt olarak bulmuş oluruz.

2. **Aralık Büyütme**:
   - Eğer ilk eleman aradığımız değeri karşılamıyorsa, dizinin arama alanını iki katına çıkararak aramaya devam ederiz. İlk olarak 1. elemandan başlarız, sonra 2. elemana, sonra 4. elemana ve bu şekilde devam ederiz. Aradığımız değeri içerebilecek bir aralık bulunana kadar bu şekilde ilerleriz.

3. **Binary Search (İkili Arama)**:
   - Arama alanını büyüttükten sonra, bulduğumuz aralıkta klasik binary search (ikili arama) uygulanır. Binary search ile arama, arama alanını ikiye böler ve daha hızlı bir şekilde değeri bulmamızı sağlar.

## Örnek Akış

Diyelim ki elimizde şu sıralı dizi var:

`[1, 3, 5, 7, 9, 11, 15, 19, 25, 30]`

- İlk olarak, dizinin ilk elemanına bakarız: `1`. Aradığımız değer 15 olduğunda, `1` ile eşleşmediği için arama devam eder.
- Daha sonra, 1'in iki katı kadar (2. eleman, 4. eleman...) gideriz. Bu şekilde arama alanı genişler.
- Arama alanı genişledikten sonra, aradığımız değeri bulduğumuz bir aralık belirlendiğinde, bu aralık içinde klasik binary search kullanarak daha hızlı bir şekilde arama yapılır.

## Avantajları

- **Daha Hızlı**: Özellikle çok büyük dizilerde daha hızlı sonuçlar verebilir çünkü ilk başta arama alanını hızla büyütür.
- **Binary Search Kullanımı**: Binary search uygulandığı için, arama sonunda verimli bir şekilde sonuç alınır.

## Zaman Karmaşıklığı

- **Best Case**: O(log n)
- **Worst Case**: O(log n)

Bu, Exponential Search algoritmasının temel mantığıdır. Kullanıldığında büyük dizilerde verimli sonuçlar verir.
