# Sieve of Eratosthenes (Eratosthenes Eleği) ile Asal Sayıların Bulunması

## Asal Sayılar Nedir?

Asal sayılar, yalnızca 1 ve kendisiyle tam bölünebilen, 1'den büyük olan sayılardır. Örneğin, 2, 3, 5, 7, 11 gibi sayılar asal sayılardır. Asal sayılar, matematiksel ve sayısal analizlerde önemli bir yer tutar.

## Eratosthenes Eleği (Sieve of Eratosthenes) Nedir?

**Eratosthenes Eleği**, asal sayıları bulmak için kullanılan en eski ve etkili algoritmalardan biridir. Bu algoritma, belirli bir sayıya kadar olan asal sayıları hızlı ve verimli bir şekilde bulmayı amaçlar. Algoritma, bir dizi sayıyı işaretleyerek, asal olmayan sayıları (yani, asal olmayan sayıları işaretleyerek) eler.

## Eratosthenes Eleği Nasıl Çalışır?

1. **Başlangıç:** Bir sayı dizisi oluşturulur. Bu dizide 2'den başlayarak, belirli bir sayıya kadar olan bütün sayılar bulunur.
2. **2'yi İşaretle:** 2'nin katları asal olmayan sayılardır, bu yüzden 2'nin katlarını diziden çıkarın.
3. **Bir Sonraki Sayıyı İşaretle:** Bir sonraki asal sayıyı (yani işaretlenmemiş sayıyı) bulun, bu sayının katlarını diziden çıkarın.
4. **Adımları Tekrarlayın:** 2'den sonraki her asal sayıyı bulana kadar işlemi tekrarlayın. Bu işlem, belirtilen sınırdaki tüm asal sayılar bulunduğunda sona erer.
5. **Sonuç:** Sonuç olarak, işaretlenmemiş sayılar asal sayılardır.

### Adım Adım Örnek

Diyelim ki 30'a kadar asal sayıları bulmak istiyoruz:

1. Başlangıçta, 1'den 30'a kadar olan tüm sayılar yazılır:
1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30

2. İlk asal sayı olan 2'yi alır ve 2'nin katlarını (4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30) çıkarırız.
1, 2, 3, X, 5, X, 7, X, 9, X, 11, X, 13, X, 15, X, 17, X, 19, X, 21, X, 23, X, 25, X, 27, X, 29, X

3. Sonra 3'ü alırız ve 3'ün katlarını (9, 15, 21, 27) çıkarırız:
1, 2, 3, X, 5, X, 7, X, X, X, 11, X, 13, X, X, X, 17, X, 19, X, X, 23, X, 25, X, X, 29, X

4. 5'e gelene kadar devam ederiz, 5'in katlarını (25) çıkarırız.
1, 2, 3, X, 5, X, 7, X, X, X, 11, X, 13, X, X, X, 17, X, 19, X, X, 23, X, X, X, 29, X

5. Son olarak, kalan sayılar asal sayılardır: **2, 3, 5, 7, 11, 13, 17, 19, 23, 29**

## Eratosthenes Eleği'nin Avantajları

- **Verimlilik:** Bu yöntem, özellikle küçük sayılar için çok hızlıdır. Daha büyük sayılar için de hâlâ oldukça etkili bir yöntemdir.
- **Basitlik:** Algoritmanın temel mantığı oldukça basittir, ve sadece bir dizi işaretleme işlemine dayanır.
- **Zaman Karmaşıklığı:** Bu algoritmanın zaman karmaşıklığı **O(n log log n)**'dir, yani oldukça hızlıdır.

## Uygulama Alanları

- **Matematiksel Hesaplamalar:** Asal sayılar üzerinde yapılan analizlerde kullanılır.
- **Kriptografi:** Şifreleme algoritmalarında asal sayılar önemli bir rol oynar, özellikle RSA şifrelemesinde.
- **Sayısal Analiz ve Veri Analizi:** Asal sayılar çeşitli algoritmalarda anahtar bir rol oynar.
