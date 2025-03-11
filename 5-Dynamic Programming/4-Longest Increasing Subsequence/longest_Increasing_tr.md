# Longest Increasing Subsequence (LIS) Algorithm (Dynamic Programming Yaklaşımı)

## 1. LIS (En Uzun Artan Alt Dizi) Nedir?

LIS (Longest Increasing Subsequence), verilen bir dizide sıralı ve artan şekilde bulunan en uzun alt diziyi bulma problemidir. Bu problem, sıralama, analiz ve veri işleme alanlarında önemli bir yer tutar.

### 2. Problem Tanımı

- **Verilenler:**
  - `n` elemanlı bir dizi
  - Dizi içinde sıralı ve artan şekilde bulunan en uzun alt diziyi bulmamız gerekiyor.
- **Amaç:** Bu alt dizinin uzunluğunu ve içeriğini belirlemek.

### 3. Dynamic Programming ile Çözüm

LIS problemi, brute-force yöntemiyle `O(2^N)` zaman karmaşıklığında çözülebilir, ancak Dynamic Programming ile `O(N^2)` gibi daha verimli bir çözüme ulaşılabilir.

#### a) Durum Tanımı

- `DP[i]` ifadesi, `i`'inci elemana kadar olan en uzun artan alt dizinin uzunluğunu temsil eder.

#### b) Geçiş Formülü

- Her eleman için, kendisinden önceki tüm elemanlar kontrol edilir ve şu şekilde güncellenir:
  ```DP[i] = max(DP[j] + 1) (Eğer dizi[i] > dizi[j] ve j < i ise)```
- Başlangıçta tüm elemanlar için `DP[i] = 1` olarak başlatılır.

#### c) Tablo Doldurma

- Her eleman için önceki elemanlara bakılarak `DP` dizisi doldurulur.
- `max(DP[i])` işlemi ile en uzun alt dizinin uzunluğu bulunur.

### 4. Neden Dynamic Programming Kullanılır?

- **Brute-force yöntem** çok fazla tekrar eden hesaplama yaparken, **DP yöntemi önceki hesaplamaları saklayarak** daha verimli bir yaklaşım sunar.
- **O(N^2) zaman karmaşıklığı**, **O(N log N) çözümüne** göre daha yavaş olsa da, DP yöntemi açıklık ve kullanım açısından daha yaygındır.
- **Gerçek dünya problemlerinde**, veri analizi ve optimizasyon süreçlerinde kullanılabilir.

### 5. Sonuç

LIS problemi, Dynamic Programming kullanılarak verimli bir şekilde çözülebilir. DP tablosu kullanılarak en uzun artan alt dizi elde edilebilir ve gerektiğinde dizi elemanları geri izleme (backtracking) ile bulunabilir.
