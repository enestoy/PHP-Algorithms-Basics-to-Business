# Sieve of Eratosthenes

Sieve of Eratosthenes (Eratosthenes Eleği), verilen bir sayıya kadar olan asal sayıları hızlı bir şekilde bulmak için kullanılan eski ve verimli bir algoritmadır. Bu algoritma, sayılar arasındaki asal sayıları bulmak için belirli bir yöntemi takip eder.

## Algoritmanın Temel Prensibi

1. **Başlangıç Durumu**:
   - Başlangıçta, 2'den başlayarak verilen sayı kadar olan tüm sayıları asal kabul ederiz.
   - Bu sayılar, başlangıçta bir dizi içerisinde işaretlenir.

2. **İşaretleme**:
   - İlk asal sayı olan 2'yi aldığımızda, 2'nin katları (4, 6, 8, ...) asal olamaz, çünkü bu sayılar 2'ye bölünebilir.
   - 2'nin katları hariç, 2'yi asal olarak işaretleriz.
   - Ardından 3'e geçeriz. 3'ün katları (6, 9, 12, ...) asal olamaz, çünkü bu sayılar 3'e bölünebilir.
   - Bu işlem, n sayısına kadar devam eder.

3. **İşlem Bittiğinde**:
   - Algoritma, asal sayılarla işaretlenmiş tüm sayıları bırakır. Geriye kalan sayılar asal olmayanlardır (yani 2'ye, 3'e veya diğer asal sayılara bölünebilenler).
   - Sonuç olarak, başlangıçta işaretlenen asal sayılar, verilen sayıya kadar olan asal sayıları verir.

## Algoritmanın Adımları

1. **Adım 1**: 2'den başlayarak verilen sayıya kadar olan tüm sayıları bir listeye ekleyin ve başlangıçta tümünü asal olarak işaretleyin.
2. **Adım 2**: İlk asal sayıyı (2) seçin.
3. **Adım 3**: Bu asal sayının katlarını (bu sayı hariç) işaretleyin.
4. **Adım 4**: Sonraki asal sayıyı seçin ve tekrar katlarını işaretleyin.
5. **Adım 5**: Adım 4'ü, verilen sayı kadar devam edin.
6. **Adım 6**: Algoritma tamamlandığında, asal sayılar listelenir.

## Zaman Karmaşıklığı

- **Zaman Karmaşıklığı**: O(n log log n), burada n, verilen sayıyı temsil eder. Bu, algoritmanın çok hızlı çalışmasını sağlar.
- **Alan Karmaşıklığı**: O(n), çünkü asal sayıları işaretlemek için n kadar alan kullanılır.

## Örnek

Verilen sayı 20 olduğunda, Sieve of Eratosthenes algoritması şu şekilde çalışır:

Başlangıçta, tüm sayılar asal kabul edilir:  
`[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]`

1. 2'yi asal olarak kabul ettikten sonra, 2'nin katları (4, 6, 8, 10, 12, 14, 16, 18, 20) işaretlenir.
2. 3'ü asal olarak kabul ettikten sonra, 3'ün katları (6, 9, 12, 15, 18) işaretlenir.
3. 5'i asal olarak kabul ettikten sonra, 5'in katları (10, 15, 20) işaretlenir.
4. 7'yi asal olarak kabul ettikten sonra, 7'nin katları (14) işaretlenir.

Sonuçta, geriye kalan asal sayılar:  
`[2, 3, 5, 7, 11, 13, 17, 19]`

## Sonuç

Sieve of Eratosthenes, verilen bir sayıya kadar olan asal sayıları bulmak için en etkili algoritmalardan biridir. Büyük sayılar için bile hızlı bir şekilde asal sayılar listesi oluşturulabilir.
