# Rod Cutting Problem - Dynamic Programming

## Problem Overview

Rod Cutting problemi, bir çubuğu (veya çubuğun belirli bir uzunluktaki parçalarını) keserek en yüksek karı elde etmeye çalıştığınız bir optimizasyon problemidir. Bu problem genellikle bir çubuğun fiyatları verilerek, bu çubuğun uzunluklarına göre maksimum karı elde etmek için hangi parçalarla kesileceğinin belirlenmesini içerir.

Bir çubuğun belirli uzunluktaki kesitlerinin fiyatları verilir ve amacı, bu çubuğu en verimli şekilde kesmek, yani toplam gelir (kar) miktarını en üst düzeye çıkarmaktır.

## Problem Definition

- Bir çubuğun uzunluğu \( n \) verilmiştir.
- Çubuğun her bir uzunluğu için bir fiyat listesi verilmiştir.
- Amaç, çubuğu farklı parçalara keserek toplam karı en yüksek şekilde elde etmektir.

Örnek olarak:

- Çubuğun fiyatları: \( p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8 \),
- Çubuğun toplam uzunluğu \( n = 4 \).
  
Bu durumda, 4 birim uzunluğunda bir çubuğu kesmek için farklı stratejiler olabilir.

## Approach: Dynamic Programming

Rod Cutting problemi, dinamik programlama ile çözülebilecek klasik bir optimizasyon problemidir. Bu problem, büyük bir problemi daha küçük parçalara ayırarak çözme prensibine dayanır.

### Adımlar

1. **Fiyat Listesini Tanımlama:**
   Çubuğun farklı uzunluktaki parçalarının fiyatlarını bir dizi olarak tanımlayalım: \( p[1], p[2], \dots, p[n] \).

2. **Maliyet Matrisi:**
   `dp[i]`, uzunluğu \( i \) olan çubuğun kesilmesiyle elde edilecek maksimum karı saklar.

3. **Dinamik Programlama İterasyonu:**
   Her uzunluk için, çubuğu farklı parçalara kesmenin en yüksek karını hesaplamak için önceki alt problemlerin sonuçlarını kullanırız.

4. **Kar Hesaplama:**
   Her alt problemin çözümünü kullanarak, uzunluğu \( n \) olan çubuğun kesilmesiyle elde edilecek maksimum karı hesaplarız.

5. **Sonuç:**
   Sonuç, `dp[n]`'de saklanır ve bu değer çubuğun tamamının kesilmesiyle elde edilecek en yüksek karı gösterir.

### Temel Durum

Başlangıçta, hiçbir uzunluk için kar olmadığı kabul edilir. Yani \( dp[0] = 0 \).

### Örnek

Fiyat listesi ve çubuğun uzunluğu şu şekilde verilmiş olsun:

- \( p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8 \)
- Çubuğun uzunluğu: \( n = 4 \)

Bu durumda, en yüksek karı elde etmek için 2 birimlik 2 parça almak en karlı çözüm olacaktır.

## Conclusion

Rod Cutting problemi, dinamik programlamayı kullanarak çözülebilecek klasik bir optimizasyon problemidir. Çubuğun her uzunluğu için en iyi karı elde etmek için alt problemlerin çözümleri birleştirilir. Bu yöntem, birçok benzer optimizasyon probleminin çözümünde de kullanılabilir.
