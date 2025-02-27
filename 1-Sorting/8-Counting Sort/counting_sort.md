# Counting Sort

**Counting Sort**, sayılar arasındaki frekanslara dayalı çalışan bir sıralama algoritmasıdır. Bu algoritma, dizideki her bir elemanın **frekansını** (kaç kere tekrar ettiğini) sayar ve bu bilgiyi kullanarak elemanları sıralar. **Counting Sort**, genellikle pozitif tam sayılar için verimli bir sıralama algoritmasıdır.

## Algoritmanın Çalışma Prensibi

Counting Sort, genellikle şu adımlarla çalışır:

1. **Frekans Dizisini Oluşturma**:
   - İlk olarak, sıralanacak dizinin en küçük ve en büyük elemanlarını buluruz.
   - Bu aralık içinde her bir sayının kaç kez tekrar ettiğini tutacak bir "frekans dizisi" oluştururuz.

2. **Frekansları Sayma**:
   - Dizideki her bir elemanın frekansını sayarız. Yani, her bir elemanın ne kadar tekrar ettiğini buluruz.

3. **Toplamları Hesaplama**:
   - Frekans dizisini, her bir sayının sıralanmış dizide hangi pozisyonda olması gerektiğini belirleyecek şekilde güncelleriz.

4. **Sonuç Dizisini Oluşturma**:
   - Son olarak, bu güncellenmiş frekans dizisini kullanarak sıralı diziyi oluştururuz.

## Adım Adım Örnek

Dizi: `[4, 2, 2, 8, 3, 3, 1]`

1. **Frekans Dizisini Oluşturma**:
   - Frekans dizisini oluşturmak için dizinin her elemanını sayıyoruz:
     - 1: 1 kez
     - 2: 2 kez
     - 3: 2 kez
     - 4: 1 kez
     - 8: 1 kez

2. **Frekansları Sayma**:
   - Frekans dizisini oluşturuyoruz:
     - `[0, 1, 2, 2, 1, 0, 0, 0, 1]` (0'dan 8'e kadar)

3. **Toplamları Hesaplama**:
   - Bu diziyi güncelliyoruz. Her bir eleman, bu elemanın ve önceki elemanların toplamını tutacak şekilde güncellenir:
     - `[0, 1, 3, 5, 6, 6, 6, 6, 7]`

4. **Sonuç Dizisini Oluşturma**:
   - Bu güncellenmiş diziyi kullanarak sıralı dizi oluşturulacak:
     - Sonuç: `[1, 2, 2, 3, 3, 4, 8]`

## Zaman Karmaşıklığı

- **En İyi Durum**: O(n + k)
- **Ortalama Durum**: O(n + k)
- **En Kötü Durum**: O(n + k)

Burada:
- **n**: Dizinin eleman sayısı
- **k**: Dizideki en büyük elemanın değeri (yani sıralanacak sayılar arasındaki aralık)

### Avantajlar

- **Hızlıdır**: Özellikle belirli bir aralıktaki sayılarla çalışırken çok hızlıdır. Eğer aralıktaki sayıların sayısı **n**'den küçükse, çok verimlidir.
- **Kararlı**: Aynı değere sahip elemanların sırası korunur.
- **Karşılaştırmasız**: Sayılar doğrudan karşılaştırılmadan sıralanır.

### Dezavantajlar

- **Sadece Pozitif Sayılar İçin Uygundur**: Counting Sort, negatif sayılar ve genel olarak karmaşık veri türleriyle çalışmaz.
- **Büyük Aralıklar**: Eğer dizideki elemanlar çok büyükse, frekans dizisinin boyutu çok büyük olabilir, bu da bellek kullanımını arttırır.

### Kullanım Alanları

- **Sayılar Arasında Sıralama**: Pozitif tamsayılar arasında hızlı sıralama yapmayı gerektiren durumlarda kullanılır.
- **Dijital Veriler**: Belirli bir aralıktaki sayıları hızlıca sıralamak için kullanılır.

