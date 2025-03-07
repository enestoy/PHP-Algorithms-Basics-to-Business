# Ford-Fulkerson Algoritması

Ford-Fulkerson algoritması, **maksimum akış** (Maximum Flow) problemini çözmek için kullanılan bir algoritmadır. Bu algoritma, yönlendirilmiş bir akış ağındaki **kaynak** (source) düğümünden **hedef** (sink) düğümüne giden en yüksek akışı bulmayı amaçlar.

## Temel Kavramlar

- **Akış Ağı**: Düğümler ve kenarlardan oluşan, her kenarın bir kapasiteye sahip olduğu yönlendirilmiş bir graf.
- **Maksimum Akış**: Kaynaktan hedefe doğru olan yol boyunca akabilecek maksimum veri miktarı.
- **Artık Akış Yolu**: Başlangıç noktasından hedefe doğru gidilebilecek ve halen kapasitesi bulunan bir yol.

### Temel Adımlar

1. **Başlangıç Durumu**: Akış başlangıçta sıfırdır.
2. **Artık Akış Yolu Bulma**: Kaynak ve hedef arasında kapasitesi kalan bir yol bulunur (genellikle **DFS** veya **BFS** kullanılır).
3. **Akış Güncelleme**: Bulunan yol üzerindeki akış artırılır. Bu, yol üzerindeki kenarların kapasitesine bağlı olarak yapılır.
4. **Adım 2 ve 3'ü Tekrar Etme**: Yeni bir yol bulunana kadar işlemi tekrarlayın.
5. **Sonuç**: Artık akış yolu bulunamadığında, toplam akış değeri elde edilir ve algoritma sonlanır.

### Örnek

Bir su boru hattı ağında, suyun kaynaktan hedefe ulaşma kapasitesini belirlemek için Ford-Fulkerson algoritması kullanılabilir. Boruların her biri bir kapasiteye sahip olduğu için, bu algoritma suyun ne kadar verimli taşınabileceğini bulur.

### Önemli Özellikler

- **BFS veya DFS Kullanımı**: Artık akış yolu bulma işlemi, genellikle derinlik veya genişlik öncelikli arama ile yapılır.
- **Akış Değeri**: Her bir geçişte, yolun kapasitesi kadar akış yapılır.
- **Zaman Karmaşıklığı**: Eğer DFS kullanılıyorsa, Ford-Fulkerson algoritmasının zaman karmaşıklığı genellikle O(E * F) olur. Burada E kenar sayısını ve F maksimum akışı ifade eder.

### Kullanım Alanları

- **Ağ Akışı Problemleri**: Su, elektrik, veri ve diğer kaynakların ağlarda taşınması gereken durumlar.
- **İletişim Ağı Planlaması**: Verilerin ağlar üzerinden en verimli şekilde aktarılmasını sağlamak.
- **Birikimli Akış Analizi**: Birçok mühendislik ve bilimsel alanda, maksimum akış hesaplamaları için kullanılır.

### Algoritmanın Pseudocode'u

1. Başlangıçta, her kenarın akışını sıfır olarak ayarla.
2. Artık akış yolunu bul (DFS veya BFS ile).
3. Artık akış yolunun kapasitesini bul ve bu kapasiteyi artır.
4. Yolu güncelle ve adım 2'yi tekrar et.
5. Adım 4'ten sonra artık akış yolu bulunamıyorsa, toplam akışı döndür.

### Avantajları

- Verimli bir şekilde maksimum akışı hesaplar.
- Geniş ağlar ve karmaşık yapılar için uygulanabilir.

### Dezavantajları

- Algoritma, bazı özel durumlarda verimsiz olabilir ve akış yolu bulma süresi artabilir.
- Çok büyük ağlarda hesaplama süresi uzun olabilir.

Ford-Fulkerson algoritması, özellikle ağlarda veri iletimi ve taşıma kapasitelerinin optimize edilmesi gereken durumlar için çok önemlidir.
