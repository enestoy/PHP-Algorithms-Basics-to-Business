# Longest Common Subsequence (LCS) Algorithm (Dynamic Programming Yaklaşımı)

## 1. LCS (En Uzun Ortak Alt Dizi) Nedir?

LCS (Longest Common Subsequence), iki dizgi (string) içinde sıraları korunarak ortak olan en uzun alt dizinin bulunması problemidir. Bu problem, biyoinformatik, metin karşılaştırma ve dosya farklılık analizlerinde yaygın olarak kullanılır.

### 2. Problem Tanımı

- **Verilenler:**

  - İki dizgi `X` ve `Y`
  - `X` ve `Y` içinde sıraları korunarak bulunabilecek en uzun ortak alt dizi bulunmalıdır.
- **Amaç:** En uzun ortak alt dizinin uzunluğunu ve içeriğini belirlemek.

### 3. Dynamic Programming ile Çözüm

LCS problemi, rekürsif ve brute-force yöntemlerle çözülebilir, ancak zaman karmaşıklığı çok yüksek olur. Dynamic Programming (DP) ile daha verimli bir çözüm elde edilir.

#### a) Durum Tanımı

- `DP[i][j]` ifadesi, `X` dizisinin ilk `i` karakteri ile `Y` dizisinin ilk `j` karakteri arasındaki en uzun ortak alt dizinin uzunluğunu temsil eder.

#### b) Geçiş Formülü

- Eğer `X[i] == Y[j]` ise:
  ```DP[i][j] = DP[i-1][j-1] + 1```
- Eğer `X[i] != Y[j]` ise:
  ```DP[i][j] = max(DP[i-1][j], DP[i][j-1])```

#### c) Tablo Doldurma

- `DP` tablosu iki diziye bağlı olarak doldurulur.
- İlk satır ve ilk sütun genellikle `0` ile başlar.
- Tablo doldurulduktan sonra, `DP[m][n]` en uzun ortak alt dizinin uzunluğunu verir.

### 4. Neden Dynamic Programming Kullanılır?

- **Brute-force yöntem** `O(2^N)` zaman karmaşıklığına sahipken, **DP yöntemi `O(m*n)`** zaman karmaşıklığıyla çok daha hızlı çalışır.
- **Önceki hesaplamaları saklayarak** gereksiz tekrarları önler.
- **Gerçek dünya problemlerinde** (DNA dizilimi, metin karşılaştırma vb.) çok daha verimli bir yaklaşım sunar.

### 5. Sonuç

LCS problemi, Dynamic Programming kullanılarak verimli bir şekilde çözülebilir. En uzun ortak alt dizi, oluşturulan DP tablosu kullanılarak geri izleme (backtracking) yöntemiyle elde edilebilir.
