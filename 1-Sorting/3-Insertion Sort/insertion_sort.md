# Insertion Sort

**Insertion Sort**, diziyi sıralamak için kullanılan basit bir sıralama algoritmasıdır. Bu algoritma, her bir öğeyi doğru yerine yerleştirerek diziyi sıralar.

## Algoritmanın Çalışma Prensibi

1. **Başlangıç Durumu:** Algoritma, dizinin ikinci elemanından başlar (ilk eleman zaten sıralı kabul edilir).
2. **İç İçe Döngü:** Seçilen öğeyi (şu anki öğe) sıralı kısmın içine doğru karşılaştırarak yerleştirir. Bunu, öğeyi doğru pozisyona yerleştirmek için yapar.
3. **Yerleştirme:** Eğer şu anki öğe, sıralı kısımdaki öğeden küçükse, sıralı kısımdaki öğe bir adım sağa kaydırılır ve şu anki öğe doğru pozisyona yerleştirilir.
4. **Tekrar:** Algoritma, dizinin sonuna kadar devam eder ve her öğeyi doğru pozisyona yerleştirir.

## Adım Adım Örnek

Örnek dizi: `[5, 2, 9, 1, 5, 6]`

1. İlk iki eleman: `[5, 2]`  
   2, 5'ten küçük olduğu için 5 sağa kaydırılır ve 2 sağındaki pozisyona yerleşir.  
   Yeni dizi: `[2, 5, 9, 1, 5, 6]`

2. Üçüncü eleman: `[2, 5, 9]`  
   9, zaten doğru pozisyonda olduğu için hiçbir değişiklik yapılmaz.  
   Yeni dizi: `[2, 5, 9, 1, 5, 6]`

3. Dördüncü eleman: `[2, 5, 9, 1]`  
   1, sıralı kısımdan küçük olduğu için sıralı kısımdaki tüm öğeler sağa kaydırılır ve 1 en başa yerleşir.  
   Yeni dizi: `[1, 2, 5, 9, 5, 6]`

4. Beşinci eleman: `[1, 2, 5, 9, 5]`  
   5, sıralı kısımdaki öğelerle karşılaştırılır ve doğru pozisyona yerleşir.  
   Yeni dizi: `[1, 2, 5, 5, 9, 6]`

5. Son eleman: `[1, 2, 5, 5, 9, 6]`  
   6, sıralı kısımdaki öğelerle karşılaştırılır ve doğru pozisyona yerleşir.  
   Yeni dizi: `[1, 2, 5, 5, 6, 9]`

## Zaman Karmaşıklığı

- **En İyi Durum (Dizi zaten sıralı):** O(n)
- **Ortalama ve En Kötü Durum (Dizi ters sıralı):** O(n²)

## Avantajlar

- Basit ve anlaşılır bir algoritmadır.
- Küçük diziler için oldukça verimlidir.

## Dezavantajlar

- Büyük dizilerde verimsizdir (O(n²)).
