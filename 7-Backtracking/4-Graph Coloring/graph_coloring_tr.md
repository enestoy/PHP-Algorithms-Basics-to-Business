# Graph Coloring (Graf Boyama) Algoritması

Graph Coloring, bir grafın (graph) düğümlerini (nodes) belirli kurallara göre boyama işlemidir. Temel amaç, komşu düğümlerin aynı renge sahip olmamasını sağlamaktır. Bu problem, özellikle zamanlama, frekans atama, harita boyama gibi birçok alanda uygulama bulur.

## Temel Kavramlar

- **Graf (Graph):** Düğümler (nodes) ve bu düğümleri birbirine bağlayan kenarlardan (edges) oluşan yapı.
- **Renk Atama:** Her düğüme bir renk atanır. Komşu düğümler farklı renklerde olmalıdır.
- **Kromatik Sayı (Chromatic Number):** Bir grafı boyamak için gereken minimum renk sayısı.

## Geri İzleme (Backtracking) Algoritması

Geri izleme algoritması, graph coloring problemine çözüm bulmak için kullanılan bir yöntemdir. Bu yöntem, tüm olası çözümleri sistematik bir şekilde deneyerek, uygun olmayan çözümleri eleyerek ilerler.

### Algoritmanın Adımları

1. **Başlangıç:** Grafın düğümlerini sırayla dolaşmaya başla.
2. **Renk Atama:** Her düğüm için, kullanılabilir renklerden birini dene.
3. **Kontrol Et:** Seçilen renk, düğümün komşularında kullanılmamış olmalıdır.
4. **Uygunluk:** Eğer renk uygunsa, bir sonraki düğüme geç.
5. **Uygun Değilse:** Eğer renk uygun değilse, başka bir renk dene.
6. **Geri İzleme:** Eğer hiçbir renk uygun değilse, bir önceki düğüme geri dön ve farklı bir renk dene.
7. **Çözüm Bulma:** Tüm düğümler başarıyla renklendirildiğinde, çözüm bulunmuş olur.

### Örnek

Bir grafın düğümlerini renklendirmek için 3 renk (örneğin, kırmızı, mavi, yeşil) kullanıldığını varsayalım. Algoritma şu şekilde çalışır:

1. İlk düğüme kırmızı renk atanır.
2. İkinci düğüm, birinci düğümle komşu ise kırmızı olamaz, bu yüzden mavi atanır.
3. Üçüncü düğüm, hem birinci hem de ikinci düğümle komşu ise, kırmızı ve mavi kullanılamaz, bu yüzden yeşil atanır.
4. Bu şekilde tüm düğümler renklendirilene kadar devam edilir.

### Avantajlar ve Dezavantajlar

- **Avantajlar:**
  - Tüm olası çözümleri denediği için doğru çözümü bulma garantisi vardır.
  - Küçük ve orta boyutlu graflar için etkilidir.

- **Dezavantajlar:**
  - Büyük graflar için zaman alıcı olabilir.
  - Karmaşıklığı yüksektir, özellikle renk sayısı ve düğüm sayısı arttıkça performans düşer.

## Sonuç

Graph Coloring problemi, geri izleme algoritması kullanılarak etkili bir şekilde çözülebilir. Bu yöntem, özellikle küçük ve orta ölçekli problemler için uygundur. Ancak, büyük ölçekli problemlerde daha verimli algoritmaların kullanılması gerekebilir.
