# Floyd's Cycle-Finding Algorithm (Tortoise and Hare)

Floyd's Cycle-Finding Algorithm, bir bağlantılı liste veya benzeri veri yapılarında döngü (cycle) olup olmadığını bulmak için kullanılan bir algoritmadır. Bu algoritma, iki işaretçi kullanarak çalışır: "tavşan" (hare) ve "kaplumbağa" (tortoise). Algoritma, döngü varsa, döngünün başlangıcını ve uzunluğunu bulabilir.

## Algoritmanın Çalışma Prensibi

1. **Başlangıç Durumu**:
   - "Kaplumbağa" ve "Tavşan" işaretçileri, listenin ilk elemanına yerleştirilir.
   - "Kaplumbağa" işaretçisi, her adımda bir adım ilerler.
   - "Tavşan" işaretçisi, her adımda iki adım ilerler.

2. **Döngü Bulma**:
   - Her iki işaretçi de listede ilerlerken, "Tavşan" işaretçisi "Kaplumbağa"yı yakalarsa, bu, listede bir döngü olduğu anlamına gelir.
   - Eğer "Tavşan" ile "Kaplumbağa" işaretçileri hiçbir zaman kesişmezse, listede döngü yoktur.

3. **Döngünün Başlangıcı**:
   - Eğer döngü bulunursa, "Kaplumbağa"yı başa, yani ilk düğüme geri getiririz.
   - Ardından, hem "Kaplumbağa" hem de "Tavşan" birer adım ilerleyerek, döngünün başlangıç noktasını bulurlar.

## Algoritmanın Adımları

- **Adım 1**: Başlangıçta, "Kaplumbağa" ve "Tavşan" işaretçilerini listenin ilk elemanına yerleştirin.
- **Adım 2**: "Kaplumbağa"yı her seferinde bir adım, "Tavşan"ı ise her seferinde iki adım ilerletin.
- **Adım 3**: Eğer "Kaplumbağa" ve "Tavşan" işaretçileri birbirini bulursa, döngü olduğunu kabul edin ve döngünün başlangıcını bulmak için yukarıdaki adımlara devam edin.
- **Adım 4**: Eğer "Kaplumbağa" ve "Tavşan" birbirini bulamazsa, listenin sonuna gelmiş olursunuz ve döngü yoktur.

## Algoritmanın Avantajları

- **Zaman Karmaşıklığı**: Algoritma, O(n) zaman karmaşıklığına sahiptir.
- **Hafıza Verimliliği**: Bu algoritma yalnızca sabit bir miktarda ek hafıza kullanır (O(1) alan karmaşıklığı).

## Örnek

Bir liste düşünün: `1 → 2 → 3 → 4 → 5 → 6 → 3 (döngü başı)`

- İlk başta "Kaplumbağa" 1'e, "Tavşan" 1'e yerleştirilir.
- Her iki işaretçi ilerlemeye başladığında, "Tavşan" her adımda iki düğüm ilerlerken, "Kaplumbağa" sadece bir düğüm ilerler.
- "Tavşan" ve "Kaplumbağa" sonunda 3'te buluşur, bu da döngünün başladığını gösterir.
- Döngünün başlangıcını bulmak için "Kaplumbağa"yı başa yerleştiririz ve her iki işaretçiyi birer adım ilerleterek 3'te buluşuruz.

## Sonuç

Floyd’s Cycle-Finding Algorithm, döngüleri hızlı ve hafızada verimli bir şekilde tespit etmek için ideal bir yöntemdir. Herhangi bir liste veya bağlı veri yapısındaki döngüleri tespit etmenin temel yollarından biridir.
