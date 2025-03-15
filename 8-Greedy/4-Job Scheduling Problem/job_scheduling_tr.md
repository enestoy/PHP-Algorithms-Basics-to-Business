# Job Scheduling Problemi

## Problem Tanımı

Job Scheduling (İş Zamanlama) problemi, her bir işin belirli bir kazanç ve tamamlanması gereken son teslim süresi olduğu senaryolarda, maksimum kazanç elde edecek şekilde işlerin zamanlanmasını hedefleyen bir optimizasyon problemidir.

## Greedy Yaklaşımı

Bu problem, **Greedy (Açgözlü) Algoritma** kullanılarak çözülebilir. Amaç, işleri tamamlanma sürelerine uygun şekilde planlayarak en yüksek toplam kazancı elde etmektir.

### Adımlar

1. **İşleri Kazanca Göre Azalan Şekilde Sırala**: İşleri, kazançlarına göre büyükten küçüğe sıralayın.
2. **Maksimum Süreyi Belirle**: İşlerin tamamlanabileceği en büyük teslim süresini belirleyin.
3. **Zamanlama Tablosu Oluştur**:
   - Tüm işlerin tamamlanma sürelerini içeren boş bir zaman çizelgesi oluştur.
   - En yüksek kazançlı işten başlayarak, onu en geç uygun sürede yerleştirin.
   - Eğer uygun bir zaman dilimi yoksa, o iş atlanır.
4. **Sonuç**: Planlanan işler ve elde edilen maksimum kazanç döndürülür.

## Örnek Senaryo

### Girdi

| İş  | Kazanç | Son Teslim Süresi |
|-----|--------|------------------|
| A   | 100    | 2                |
| B   | 50     | 1                |
| C   | 200    | 2                |
| D   | 20     | 1                |
| E   | 150    | 3                |

### Sıralı Hali (Kazanca Göre)

| İş  | Kazanç | Son Teslim Süresi |
|-----|--------|------------------|
| C   | 200    | 2                |
| E   | 150    | 3                |
| A   | 100    | 2                |
| B   | 50     | 1                |
| D   | 20     | 1                |

### Zamanlama

1. **C** seçilir (2. süreye yerleştirilir)
2. **E** seçilir (3. süreye yerleştirilir)
3. **A** seçilir (1. süreye yerleştirilir)
4. **B ve D** uygun yer bulunamadığı için atlanır.

### Zamanlama Sonucu

- Seçilen işler: **A, C, E**
- Toplam kazanç: **450**

## Sonuç

Greedy algoritma, her adımda optimal seçimi yaparak **maksimum kazancı elde edecek şekilde iş zamanlamasını** oluşturur. Bu yöntem, üretim planlama, proje yönetimi ve CPU zamanlama gibi alanlarda yaygın olarak kullanılır.
