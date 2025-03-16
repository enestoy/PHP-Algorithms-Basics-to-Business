# Fractional Knapsack Problemi

## Problem Tanımı

Fractional Knapsack problemi, sınırlı kapasiteye sahip bir çantaya, verilen ağırlık ve değer bilgilerinin doğrultusunda en yüksek toplam değeri elde edecek şekilde eşya yerleştirme problemidir. Ancak bu problemde eşyalar bölünebilir, yani bir eşyanın tamamını almak yerine, belirli bir kısmını da çantaya koyabiliriz.

## Greedy Yaklaşımı

Fractional Knapsack problemi, açgözlü (greedy) algoritmalarla çözülebilen bir problemdir. Açgözlü yaklaşım, her adımda en iyi görünen seçimi yaparak en yüksek toplam değeri elde etmeye çalışır.

### Adımlar

1. **Eşyaları Sıralama:** Eşyalar, değer/ağırlık oranına göre azalan şekilde sıralanır.
2. **Eşyaları Seçme:** Sıralanan eşyalardan en yüksek değer/ağırlık oranına sahip olanlar öncelikli olarak çantaya eklenir.
3. **Kapasite Kontrolü:** Çantanın kapasitesine göre eşyaların tamamı veya bir kısmı eklenir.
4. **Sonuç:** Çantanın kapasitesi dolana kadar bu adımlar tekrarlanır ve maksimum değer elde edilir.

## Örnek Senaryo

- **Eşyalar:**
  - Eşya 1: Ağırlık = 10 kg, Değer = 60
  - Eşya 2: Ağırlık = 20 kg, Değer = 100
  - Eşya 3: Ağırlık = 30 kg, Değer = 120
- **Çanta Kapasitesi:** 50 kg

### Çözüm Adımları

1. Değer/ağırlık oranlarını hesaplayalım:
   - Eşya 1: 60/10 = 6
   - Eşya 2: 100/20 = 5
   - Eşya 3: 120/30 = 4
2. En yüksek oranlı eşyadan başlayarak çantaya ekleyelim:
   - Eşya 1 tamamen eklenir (10 kg, 60 değer)
   - Eşya 2 tamamen eklenir (20 kg, 100 değer)
   - Eşya 3’ten 20 kg eklenir (20 kg, 80 değer)
3. Toplam değer = 60 + 100 + 80 = **240**

## Sonuç

Fractional Knapsack problemi, açgözlü algoritmalar kullanılarak optimal çözümle sonuçlanan bir problemdir. Eşyaların bölünebilir olması, greedy yaklaşımın her adımda en iyi seçimi yaparak en yüksek değeri elde etmesini sağlar.
