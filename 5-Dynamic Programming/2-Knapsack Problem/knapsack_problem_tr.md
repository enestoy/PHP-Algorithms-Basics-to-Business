# Knapsack Problem Algorithm (Dynamic Programming Yaklaşımı)

## 1. Knapsack Problemi Nedir?

Knapsack (Sırt Çantası) Problemi, sınırlı kapasiteli bir çantaya, maksimum değeri elde etmek amacıyla belirli ağırlık ve değerlere sahip nesneleri yerleştirme problemidir. Bu problem, özellikle kaynak tahsisi ve optimizasyon alanlarında kullanılır.

### 2. Problem Tanımı

- **Verilenler:**
  - N adet nesne
  - Her nesnenin bir ağırlığı ve değeri var
  - Knapsack'in (çanta) maksimum taşıyabileceği ağırlık W
- **Amaç:** Seçilen nesnelerin toplam ağırlığı W'yi geçmeyecek şekilde, toplam değeri en büyük olacak kombinasyonu bulmak.

### 3. Dynamic Programming ile Çözüm

Knapsack problemi için kullanılan Dynamic Programming çözümü, **Tabulation (Alttan Yukarı Yaklaşım)** ile gerçekleştirilir.

#### a) Durum Tanımı

- `DP[i][w]` ifadesi, `i`'inci nesneye kadar bakıldığında ve toplam çanta kapasitesi `w` olduğunda elde edilebilecek maksimum değeri ifade eder.

#### b) Geçiş Formülü

- Eğer nesnenin ağırlığı `w` kapasitesinden küçükse:
  ```DP[i][w] = max(DP[i-1][w], Değer[i] + DP[i-1][w - Ağırlık[i]])```
- Aksi halde nesne eklenemez:
  ```DP[i][w] = DP[i-1][w]```

#### c) Tablo Doldurma

- İlk satır ve ilk sütun genellikle sıfır olarak başlar.
- Tablodaki her hücre, önceki hesaplamalara dayanarak doldurulur.

### 4. Neden Dynamic Programming Kullanılır?

- **Klasik rekürsif çözüm**, tekrar eden hesaplamalar nedeniyle zaman açısından verimsizdir.
- **Dynamic Programming**, hesaplamaları kaydederek tekrar eden işlemleri önler ve verimliliği artırır.
- **Zaman Kompleksitesi:** `O(N * W)` olup, rekürsif yönteme göre çok daha hızlıdır.

### 5. Sonuç

Knapsack Problemi, optimizasyon problemlerinde sıkça karşılaşılan bir durumdur. Dynamic Programming sayesinde, problem daha verimli ve optimal şekilde çözülebilir.
