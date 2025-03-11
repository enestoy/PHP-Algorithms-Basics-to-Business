# Coin Change Problem (Dynamic Programming Yaklaşımı)

## 1. Coin Change Problemi Nedir?

Coin Change Problemi, verilen farklı para birimleriyle belirli bir miktarı oluşturmak için en az kaç tane para gerektiğini bulma problemidir. Bu problem, finansal sistemler ve optimizasyon alanlarında önemli bir rol oynar.

### 2. Problem Tanımı

- **Verilenler:**
  - Farklı para birimlerini içeren bir dizi (`paralar`)
  - Hedef toplam (`hedef`)
- **Amaç:** Hedef toplamı oluşturmak için kullanılabilecek minimum sayıda para miktarını bulmak.

### 3. Dynamic Programming ile Çözüm

Coin Change problemi, brute-force yöntemiyle `O(2^N)` zaman karmaşıklığında çözülebilir, ancak Dynamic Programming ile `O(N * M)` gibi daha verimli bir çözüme ulaşılabilir.

#### a) Durum Tanımı

- `DP[i]` ifadesi, `i` değerini elde etmek için gereken minimum para sayısını temsil eder.

#### b) Geçiş Formülü

- `DP[0] = 0` başlangıç değeri olarak atanır.
- `DP[i]` hesaplanırken, her `para` birimi için şu formül kullanılır:
  ```DP[i] = min(DP[i], DP[i - para] + 1)```
- Eğer `i - para >= 0` koşulu sağlanıyorsa bu hesaplama yapılır.

#### c) Tablo Doldurma

- İlk olarak, DP dizisi `∞` (sonsuz) ile doldurulur.
- `DP[0] = 0` olarak atanır.
- Daha sonra, tüm `paralar` üzerinden geçilerek `DP` dizisi güncellenir.
- Sonuç olarak, `DP[hedef]` minimum para sayısını verir.

### 4. Neden Dynamic Programming Kullanılır?

- **Brute-force yöntem** aşırı sayıda tekrar eden hesaplama yaparken, **DP yöntemi önceki hesaplamaları saklayarak** daha verimli bir yaklaşım sunar.
- **O(N*M) zaman karmaşıklığı**, çok büyük değerler için bile hesaplamayı hızlandırır.
- **Gerçek dünya problemlerinde**, ödeme sistemleri ve optimizasyon süreçlerinde uygulanabilir.

### 5. Sonuç

Coin Change problemi, Dynamic Programming kullanılarak verimli bir şekilde çözülebilir. DP tablosu kullanılarak minimum kaç para gerektiği bulunabilir ve gerektiğinde kullanılan paraların kombinasyonu geri izleme (backtracking) ile elde edilebilir.
