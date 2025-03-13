# Hamiltonian Path (Hamilton Yolu) Algoritması

Hamiltonian Path, bir grafta (graph) tüm düğümleri (nodes) tam olarak bir kez ziyaret eden bir yol bulma problemidir. Bu yol, başlangıç ve bitiş düğümleri arasında olmalı ve her düğüm yalnızca bir kez kullanılmalıdır. Hamiltonian Path, özellikle rotalama, devre tasarımı ve optimizasyon problemlerinde kullanılır.

## Temel Kavramlar

- **Graf (Graph):** Düğümler (nodes) ve bu düğümleri birbirine bağlayan kenarlardan (edges) oluşan yapı.
- **Hamilton Yolu (Hamiltonian Path):** Bir grafta, tüm düğümleri tam olarak bir kez ziyaret eden yol.
- **Hamilton Devresi (Hamiltonian Cycle):** Eğer yolun başlangıç ve bitiş düğümleri birbirine bağlıysa, bu bir devre (cycle) oluşturur.

## Geri İzleme (Backtracking) Algoritması

Geri izleme algoritması, Hamiltonian Path problemine çözüm bulmak için kullanılan bir yöntemdir. Bu yöntem, tüm olası yolları sistematik bir şekilde deneyerek, uygun olmayan yolları eleyerek ilerler.

### Algoritmanın Adımları

1. **Başlangıç:** Grafın bir düğümünden başla ve bu düğümü yolun ilk adımı olarak işaretle.
2. **Komşu Düğümleri Keşfet:** Mevcut düğümün komşularını incele ve henüz ziyaret edilmemiş bir düğüm seç.
3. **Yola Ekle:** Seçilen düğümü yola ekle ve ziyaret edildi olarak işaretle.
4. **Kontrol Et:** Eğer tüm düğümler ziyaret edildiyse, bir Hamiltonian Path bulunmuş demektir.
5. **Geri İzleme:** Eğer mevcut düğümden çıkış yolu kalmadıysa, bir önceki düğüme geri dön ve farklı bir komşu düğüm dene.
6. **Çözüm Bulma:** Tüm düğümler başarıyla ziyaret edildiğinde, Hamiltonian Path bulunmuş olur.

### Örnek

Bir grafın düğümlerini A, B, C, D olarak adlandıralım. Algoritma şu şekilde çalışır:

1. A düğümünden başla ve A'yı yola ekle.
2. A'nın komşusu B'yi seç ve B'yi yola ekle.
3. B'nin komşusu C'yi seç ve C'yi yola ekle.
4. C'nin komşusu D'yi seç ve D'yi yola ekle.
5. Tüm düğümler ziyaret edildiği için, yol A -> B -> C -> D şeklinde bir Hamiltonian Path'tir.

### Avantajlar ve Dezavantajlar

- **Avantajlar:**
  - Tüm olası yolları denediği için doğru çözümü bulma garantisi vardır.
  - Küçük ve orta boyutlu graflar için etkilidir.

- **Dezavantajlar:**
  - Büyük graflar için zaman alıcı olabilir.
  - Karmaşıklığı yüksektir, özellikle düğüm sayısı arttıkça performans düşer.

## Sonuç

Hamiltonian Path problemi, geri izleme algoritması kullanılarak etkili bir şekilde çözülebilir. Bu yöntem, özellikle küçük ve orta ölçekli problemler için uygundur. Ancak, büyük ölçekli problemlerde daha verimli algoritmaların kullanılması gerekebilir.
