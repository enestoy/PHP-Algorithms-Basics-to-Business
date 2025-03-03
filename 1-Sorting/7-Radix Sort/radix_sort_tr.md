# Radix Sort

**Radix Sort**, **sıralama algoritmaları** arasında yer alan, sayıları rakamlarına göre sıralayarak çalışan bir algoritmadır. Bu algoritma, her bir sayının basamağını dikkate alarak sıralama işlemi yapar. Genellikle **tamsayı** dizilerini sıralamak için kullanılır ve özellikle sayılar büyükse veya belirli bir sayıya odaklanılmışsa oldukça etkilidir.

## Algoritmanın Çalışma Prensibi

Radix Sort, sıralama işlemini **basamaksal** (digit-by-digit) yapar ve bu işlem şu adımlarla gerçekleşir:

1. **En Düşük Basamaktan Başlamak**:
   - İlk olarak, dizinin her bir elemanını en düşük basamaktan (genellikle birler basamağından) başlayarak sıralarız.
   - Örneğin, 123 ve 456 sayılarının birler basamağına bakılır (yani, 3 ve 6).

2. **Sonraki Basamaklara Geçiş**:
   - İlk basamaktan sıralama işlemi yapıldıktan sonra, sıradaki basamağa (onlar basamağı, yüzler basamağı vb.) geçilir ve her basamağa göre sıralama yapılır.

3. **Sıralama İşlemi**:
   - Bu işlem, sayının en yüksek basamağına kadar tekrarlanır.

4. **Diziyi Tamamlama**:
   - Sonuçta, tüm basamaklarda sıralama yapılmış ve dizinin tamamı sıralanmış olur.

## Adım Adım Örnek

Dizi: `[170, 45, 75, 90, 802, 24, 2, 66]`

1. **Birler Basamağına Göre Sıralama**:
   - `[170, 90, 802, 2, 24, 45, 75, 66]` (Birler basamağı: 0, 0, 2, 2, 4, 5, 5, 6)

2. **Onlar Basamağına Göre Sıralama**:
   - `[170, 802, 2, 24, 45, 66, 75, 90]` (Onlar basamağı: 7, 0, 0, 2, 4, 6, 7, 9)

3. **Yüzler Basamağına Göre Sıralama**:
   - `[2, 24, 45, 66, 75, 90, 170, 802]` (Yüzler basamağı: 0, 0, 0, 0, 0, 0, 1, 8)

4. **Sonuç**:
   - Sonuç olarak sıralı dizi: `[2, 24, 45, 66, 75, 90, 170, 802]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(nk)
- **Ortalama Durum**: O(nk)
- **En Kötü Durum**: O(nk)

Burada:
- **n**: Dizinin eleman sayısı
- **k**: Sayıların basamak sayısıdır.

### Avantajlar

- **Hızlıdır**: Özellikle belirli bir basamağa göre sıralama yapılacağı için çok büyük sayıların sıralanmasında verimli olabilir.
- **Kararlı**: Aynı değere sahip elemanların sırası korunur.
- **Doğrudan Sıralama**: Sayıların basamaklarına göre sıralama yapıldığı için ekstra bir karşılaştırma gerekmez.

### Dezavantajlar

- **Sadece Sayılar İçin Uygundur**: Radix Sort genellikle sayılarla çalışır, bu yüzden diğer veri türleri için kullanılamaz.
- **Bellek Kullanımı**: Sıralama için ekstra bir bellek alanı gerekir, bu da çok büyük verilerle çalışırken problem yaratabilir.

## Kullanım Alanları

- **Dijital verilerin sıralanması**: Özellikle sayılar, tarihsel veriler gibi sıralanabilir büyük veri kümeleriyle çalışırken kullanılır.
- **Sayısal verilerin hızlı sıralanması**: Rakamlar üzerinde işlem yapan algoritmalar için uygundur.

