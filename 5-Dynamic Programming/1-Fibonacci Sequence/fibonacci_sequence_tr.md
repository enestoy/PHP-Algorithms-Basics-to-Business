# Fibonacci Sequence Algorithm (Dynamic Programming Yaklaşımı)

## 1. Fibonacci Serisi Nedir?

Fibonacci serisi, her sayının kendisinden önce gelen iki sayının toplamı olduğu bir sayı dizisidir. Serinin ilk iki elemanı genellikle 0 ve 1 olarak kabul edilir.

Örnek Fibonacci serisi:
```0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...```

### 2. Dynamic Programming ile Fibonacci Hesaplama

Dynamic Programming (DP), önceki hesaplamaları saklayarak tekrar eden hesaplamaları önleyen bir tekniktir. Fibonacci serisini hesaplarken DP kullanmanın iki temel yolu vardır:

#### a) Memoization (Üstten Aşağı Yöntem)

- **Açıklama:** Hesaplanan Fibonacci değerlerini bir dizi veya sözlükte saklayarak, tekrar hesaplanmasını engeller.
- **Avantaj:** Gereksiz hesaplamaları önler ve performansı artırır.
- **Dezavantaj:** Ekstra bellek kullanımı gerektirir.

#### b) Tabulation (Alttan Yukarı Yöntem)

- **Açıklama:** Küçük alt problemlerin çözülmesiyle büyük probleme ulaşılır.
- **Avantaj:** Bellek kullanımını optimize eder.
- **Dezavantaj:** Önce tüm küçük alt problemlerin hesaplanması gerekir.

### 3. Neden Dynamic Programming Kullanılır?

- Klasik rekürsif yöntem, aynı değeri birçok kez hesapladığı için verimsizdir.
- DP kullanımı, hesaplamaları saklayarak gereksiz işlemleri ortadan kaldırır.
- Büyük giriş değerlerinde zaman karmaşıklığını azaltarak performansı artırır.

### 4. Sonuç

Dynamic Programming kullanarak Fibonacci serisini hesaplamak, hesaplama süresini önemli ölçüde azaltır ve daha büyük sayılar için verimli bir yaklaşım sunar. Özellikle büyük girişlerde, DP'nin sağladığı optimizasyon sayesinde hesaplamalar çok daha hızlı tamamlanır.
