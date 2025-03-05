# Selection Sort

Selection Sort (Seçmeli Sıralama), sıralama algoritmalarından biridir ve temel olarak dizinin her turda en küçük (veya en büyük) elemanını seçerek sıralama işlemini gerçekleştirir.

## Çalışma Prensibi

1. Dizinin en küçük elemanını bul.
2. Bulduğun en küçük elemanı, dizinin başındaki ile yer değiştir.
3. Sıralanmış kısmı genişletip kalan kısmı tekrar işle.
4. Tüm elemanlar sıralanana kadar bu işlemi devam ettir.

## Örnek

Varsayalım ki sıralamak istediğimiz liste şu şekilde: `[5, 3, 8, 4, 2]`

### 1. Adım

- En küçük eleman `2`.
- `2` ile `5` yer değiştirir → `[2, 3, 8, 4, 5]`

### 2. Adım

- `3` zaten doğru yerde → `[2, 3, 8, 4, 5]`

### 3. Adım

- `4` en küçük eleman → `4` ile `8` yer değiştirir → `[2, 3, 4, 8, 5]`

### 4. Adım

- `5` en küçük eleman → `5` ile `8` yer değiştirir → `[2, 3, 4, 5, 8]`

Bu işlem tamamlandığında liste sıralanmış olur.

## Zaman Karmaşıklığı

- **En kötü, en iyi ve ortalama durum:** O(n²)
- **Avantajı:** Yer değiştirme sayısı azdır.
- **Dezavantajı:** Büyük listelerde verimli değildir.
