# Bubble Sort

Bubble Sort, sıralama algoritmalarından biridir ve oldukça basit bir mantığa dayanır. Bu algoritma, listedeki her öğeyi birbiriyle karşılaştırır ve sırasıyla yer değiştirir. Bir dizi içinde sıralama yaparken, her geçişte en büyük (veya en küçük) öğe sona "baloncuk" gibi yükselir. Bu işlem, tüm öğeler sıralanana kadar devam eder.

## Çalışma Prensibi

1. Listedeki öğeleri birbiriyle karşılaştırır.
2. Eğer bir öğe, bir sonraki öğeden daha büyükse, bu iki öğe yer değiştirir.
3. Bu işlem tüm liste sıralanana kadar devam eder.

## Örnek

Varsayalım ki sıralamak istediğimiz liste şu şekilde: `[5, 3, 8, 4, 2]`

## Bubble Sort Algoritması Adımları

## 1. Adım (İlk Geçiş)

- **5 ve 3 karşılaştırılır**, 5 > 3 olduğu için yer değiştirir: `[3, 5, 8, 4, 2]`
- **5 ve 8 karşılaştırılır**, 5 < 8 olduğu için değişiklik yapılmaz: `[3, 5, 8, 4, 2]`
- **8 ve 4 karşılaştırılır**, 8 > 4 olduğu için yer değiştirir: `[3, 5, 4, 8, 2]`
- **8 ve 2 karşılaştırılır**, 8 > 2 olduğu için yer değiştirir: `[3, 5, 4, 2, 8]`

## 2. Adım (İkinci Geçiş)

- **3 ve 5 karşılaştırılır**, 3 < 5 olduğu için değişiklik yapılmaz: `[3, 5, 4, 2, 8]`
- **5 ve 4 karşılaştırılır**, 5 > 4 olduğu için yer değiştirir: `[3, 4, 5, 2, 8]`
- **5 ve 2 karşılaştırılır**, 5 > 2 olduğu için yer değiştirir: `[3, 4, 2, 5, 8]`

## 3. Adım (Üçüncü Geçiş)

- **3 ve 4 karşılaştırılır**, 3 < 4 olduğu için değişiklik yapılmaz: `[3, 4, 2, 5, 8]`
- **4 ve 2 karşılaştırılır**, 4 > 2 olduğu için yer değiştirir: `[3, 2, 4, 5, 8]`

## 4. Adım (Dördüncü Geçiş)

- **3 ve 2 karşılaştırılır**, 3 > 2 olduğu için yer değiştirir: `[2, 3, 4, 5, 8]`

Bu işlem tamamlandığında liste sıralanmış olur.

## Zaman Karmaşıklığı

- En kötü ve ortalama durum: **O(n²)**
- En iyi durum: **O(n)** (Eğer liste zaten sıralıysa)
- Küçük veri setleri için uygundur, ancak büyük veri setlerinde verimli değildir.
