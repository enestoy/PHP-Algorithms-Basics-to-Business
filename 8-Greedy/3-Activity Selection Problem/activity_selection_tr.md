# Activity Selection Problemi

## Problem Tanımı

Activity Selection (Etkinlik Seçimi) problemi, belirli başlangıç ve bitiş zamanlarına sahip etkinlikler arasından, çakışmayan en fazla sayıda etkinliği seçmeyi amaçlayan bir optimizasyon problemidir.

## Greedy Yaklaşımı

Bu problem, **Greedy (Açgözlü) Algoritma** kullanılarak verimli bir şekilde çözülebilir. Her adımda en erken biten etkinliği seçerek en fazla etkinliği programa dahil etmeye çalışırız.

### Adımlar

1. **Etkinlikleri Bitiş Zamanına Göre Sırala**: Tüm etkinlikleri, bitiş zamanlarına göre artan sırayla düzenle.
2. **İlk Etkinliği Seç**: İlk biten etkinliği seç ve programına ekle.
3. **Çakışmayan Etkinlikleri Seçmeye Devam Et**:
   - Bir önceki seçilen etkinliğin bitiş zamanından sonra başlayan ilk etkinliği seç.
   - Bu işlemi tüm etkinlikler için tekrarla.
4. **Sonuç**: Seçilen etkinliklerin listesi döndürülür.

## Örnek Senaryo

### Girdi

| Etkinlik | Başlangıç | Bitiş |
|----------|-----------|-------|
| A        | 1         | 3     |
| B        | 2         | 5     |
| C        | 3         | 9     |
| D        | 6         | 8     |
| E        | 5         | 7     |
| F        | 8         | 9     |

### Sıralı Hali

| Etkinlik | Başlangıç | Bitiş |
|----------|-----------|-------|
| A        | 1         | 3     |
| B        | 2         | 5     |
| E        | 5         | 7     |
| D        | 6         | 8     |
| C        | 3         | 9     |
| F        | 8         | 9     |

### Seçim Süreci

1. **A** seçilir (1-3)
2. **E** seçilir (5-7) (A ile çakışmıyor)
3. **F** seçilir (8-9) (E ile çakışmıyor)

### Seçim Süreci Sonucu

- Seçilen etkinlikler: **A, E, F**

## Sonuç

Greedy algoritma, her adımda optimal seçimi yaparak **maksimum sayıda etkinliği** programa eklemeyi sağlar. Bu yöntem, planlama ve zaman yönetimi gibi problemlerde etkin şekilde kullanılır.
