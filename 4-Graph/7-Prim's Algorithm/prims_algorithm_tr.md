# Prim's Algorithm

Prim's Algorithm, bir **bağlantılı graf**ın **minimum yayılma ağacını** (MST - Minimum Spanning Tree) bulmak için kullanılan bir algoritmadır. Bu algoritma, başlangıç noktasından başlayarak en kısa kenarları ekleyerek ağacın tamamını oluşturur.

## Temel Adımlar

1. **Başlangıç Düğümünü Seçme**: Algoritma, herhangi bir düğümü başlangıç olarak seçer.
2. **Kenarı Seçme**: Başlangıç noktasından, en küçük ağırlıklı kenarı seçer ve bu kenar ile bir düğümü daha ağaca dahil eder.
3. **Yeni Düğümleri Ağaca Dahil Etme**: Her seferinde ağaca en kısa kenarı ekleyerek tüm düğümler ağaçta yer alana kadar devam eder.
4. **Sonuç**: Algoritma, minimum yayılma ağacını oluşturduğunda sona erer.

### Örnek

Düşünün ki bir grafınız var ve ağırlıklı kenarlara sahip. Prim's algorithm ile en küçük toplam ağırlığı olan bağlantıları seçerek tüm grafiği bir ağaç şeklinde birbirine bağlarsınız.

### Önemli Özellikler

- **Ağırlıklı Bağlantılar**: Kenarların her biri bir ağırlığa sahiptir ve bu ağırlıklar, ağacın toplam maliyetini etkiler.
- **Tek Seçim**: Her adımda, ağaca ekleyeceğiniz kenar yalnızca bir tane olacaktır ve bu kenar, şu anki ağacın dışında olup en düşük ağırlığa sahip olan kenar olacaktır.
- **Zaman Karmaşıklığı**: Verimli bir şekilde uygulanması durumunda, Prim's algoritması genellikle O(E log V) zaman karmaşıklığına sahiptir (V düğüm sayısı, E kenar sayısı).

### Kullanım Alanları

- **Karmaşık Ağaç Yapıları**: Örneğin, ağ iletişimi, elektrik hatları ya da şehirlerarası yolların inşası gibi.
- **Optimizasyon Problemleri**: Minimum maliyetli bağlantılar kurma problemlerinde kullanılır.

### Algoritmanın Pseudocode'u

1. Başlangıçta bir düğüm seç.
2. Kenarları sırayla kontrol et ve en küçük ağırlığa sahip olanı seç.
3. Seçilen kenarı ağaca ekle ve yeni düğüme geç.
4. Adım 2 ve 3'ü, tüm düğümler ağaca eklenene kadar tekrar et.

### Avantajları

- Basit ve etkili bir çözüm sunar.
- Güçlü bir ağ yapılandırma aracıdır.

### Dezavantajları

- Çok büyük graf yapılarında verimsiz olabilir.
- Her kenarın ağırlıklarını dikkatlice incelemek gerekir.

Bu algoritma, çok sayıda uygulamada kullanılabilir ve özellikle ağ mühendisliği, yol ağları ve veri yapıları gibi alanlarda yaygın bir şekilde tercih edilir.
