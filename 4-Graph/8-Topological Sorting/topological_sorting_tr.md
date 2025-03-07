# Topological Sorting

Topolojik sıralama (Topological Sorting), yalnızca **yönlendirilmiş asiklik graf** (DAG - Directed Acyclic Graph) üzerinde uygulanabilen bir sıralama algoritmasıdır. Bu algoritma, bir grafın düğümlerini, her bir kenarın yönüne saygı göstererek sıralamak için kullanılır.

## Temel Kavramlar

- **Yönlendirilmiş Asiklik Grafik (DAG)**: Kenarları olan bir grafik, kendi kendine bir döngü oluşturmazsa, bu graf bir DAG olarak adlandırılır.
- **Topolojik Sıralama**: Bir DAG'daki düğümler, her kenarın başından sonuna doğru sıralanır. Yani, bir düğüm yalnızca ona bağlı olan tüm düğümler sıralandıktan sonra sıralanabilir.

### Temel Adımlar

1. **Başlangıç Düğümünü Seçme**: Kenarı olmayan düğümler (yani bağımsız düğümler) başlangıçta sıralanır.
2. **Düğüm Sıralama**: Bağımsız düğüm sıralandıktan sonra, bağlı düğümlere geçilir ve bu düğümlerin bağlı olduğu tüm kenarlar silinir.
3. **Tekrar Etme**: Her seferinde yeni bağımsız düğümler sıralandıktan sonra, bu işlemi devam ettirirsiniz.

### Örnek

Bir okulda, belirli derslerin sırasına göre alınması gerekiyor. Matematik dersini almak için önce Fizik dersinin alınması gerekir. Bu tür sıralama problemlerinde **topolojik sıralama** kullanılır.

### Önemli Özellikler

- **Döngü Olmaması Gerekiyor**: Topolojik sıralama yalnızca döngüsüz graf yapılarında uygulanabilir. Eğer graf bir döngü içeriyorsa, topolojik sıralama yapılamaz.
- **Birden Fazla Sonuç Olabilir**: Eğer grafda birbirinden bağımsız alt grafikler varsa, birden fazla geçerli topolojik sıralama sonucu olabilir.
- **Zaman Karmaşıklığı**: Topolojik sıralamanın zaman karmaşıklığı genellikle **O(V + E)**'dir, burada V düğüm sayısını ve E kenar sayısını temsil eder.

### Kullanım Alanları

- **Bağımlılık Çözümleri**: Yazılım derlemeleri, görev sıralamaları veya bağımlı işlemlerin sıralanmasında kullanılır.
- **Veritabanı Güncellemeleri**: Veritabanlarındaki verilerin sıralanarak güncellenmesi gerektiği durumlar.
- **Yönlendirilmiş Ağaçlar ve Ağlar**: İşlem sıralama ve görev yönetimi için kullanılır.

### Algoritmanın Pseudocode'u

1. Başlangıçta, bağımsız düğümleri seç.
2. Bağımsız düğümleri sıralayarak, bu düğümlerin bağlı olduğu kenarları kaldır.
3. Kalan düğümleri kontrol et ve yeni bağımsız düğümleri ekle.
4. Adım 2 ve 3'ü tüm düğümler sıralanana kadar tekrarla.

### Avantajları

- Basit ve anlaşılır bir sıralama algoritmasıdır.
- Bağımlı görevlerin sırasını doğru şekilde belirler.

### Dezavantajları

- Yalnızca **asiklik** graf yapılarında çalışır, döngülü graf yapılarını işleyemez.
- Verimli algoritmalar olsa da büyük graf yapılarında işlem süresi uzayabilir.

Topolojik sıralama, özellikle görevlerin belirli bir sırayla yapılması gereken durumlarda, önemli bir algoritmadır.
