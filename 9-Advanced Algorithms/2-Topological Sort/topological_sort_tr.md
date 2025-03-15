# Topological Sort

Topological Sort, yalnızca yönlü asiklik grafiklerde (DAG - Directed Acyclic Graph) uygulanabilen bir algoritmadır. Bu algoritma, bir grafik üzerinde düğümleri sıralamak amacıyla kullanılır ve sıralama, her kenarın başlangıcından bitişine doğru bir düzen içinde yapılır.

## Algoritmanın Temel Özellikleri

1. **Yönlü Asiklik Grafik (DAG)**:
   - Topological Sort, yalnızca yönlü asiklik grafikleri (DAG) sıralayabilir. Yönlü asiklik grafiklerde hiçbir zaman bir döngü bulunmaz.
   - Eğer grafikte döngü varsa, topolojik sıralama yapılması mümkün değildir.

2. **Sıralama Özelliği**:
   - Her düğüm, sadece bağlı olduğu diğer düğümlerden önce yer alır.
   - Topological Sort sıralaması, grafikteki her kenarın doğrusal bir sırada yer almasını sağlar.

## Algoritmanın Çalışma Prensibi

1. **Başlangıç**:
   - İlk olarak, grafikte hiç girdi (in-degree) olmayan düğümleri tespit ederiz. Girdi, bir düğüme gelen kenar sayısını ifade eder.
   - Girdi sıfır olan düğümler, sıralamaya dahil edilebilir çünkü bu düğümlerin öncesinde sıralanması gereken başka düğüm yoktur.

2. **Adım 1**: Girdi sıfır olan düğümleri bir kuyruğa ekleriz.
3. **Adım 2**: Kuyruğun başındaki düğümü çıkarırız ve sıralama listesine ekleriz. Ardından, bu düğüme bağlı tüm kenarları sileriz ve bağlı düğümlerin girdilerini birer birer azaltırız.
4. **Adım 3**: Çıkarılan düğüme bağlı tüm kenarları sileriz ve bu kenarlara bağlı düğümlerin girdilerini birer birer azaltırız.
5. **Adım 4**: Eğer girdisi sıfır olan yeni düğümler varsa, onları kuyruğa ekleriz.
6. **Adım 5**: Kuyruk boşalana kadar Adım 2 ve 3 tekrar edilir.
7. **Bitiş**:
   - Kuyruk boşaldığında, sıralama tamamlanmış olur. Eğer hala grafikte girdi sıfır olmayan düğümler kaldıysa, grafikte bir döngü vardır ve topolojik sıralama yapılamaz.

## Algoritmanın Adımları

- **Adım 1**: Girdi sıfır olan düğümleri bul ve bunları kuyruğa ekle.
- **Adım 2**: Kuyruğun başındaki düğümü çıkar ve sıralama listesine ekle.
- **Adım 3**: Düğümün bağlı olduğu kenarları sil ve bağlı düğümlerin girdisini birer birer azalt.
- **Adım 4**: Girdi sıfır olan yeni düğümleri kuyruğa ekle.
- **Adım 5**: Kuyruk boşalana kadar işlemi tekrarla.
- **Adım 6**: Eğer hala girdi sıfır olmayan düğümler varsa, döngü vardır ve sıralama yapılamaz.

## Zaman Karmaşıklığı

- **Zaman Karmaşıklığı**: O(V + E), burada V, düğüm sayısı ve E, kenar sayısını temsil eder.
- **Alan Karmaşıklığı**: O(V), çünkü grafiğin tüm düğümleri ve kenarları hafızada tutulur.

## Örnek

Bir DAG grafiği düşünün:

A → B → D ↓ ↑ C → E

- Başlangıçta girdi sıfır olan düğümler: A ve C.
- A'yı sıralama listesine ekleriz ve B'ye bağlı kenarı sileriz. B'nin girdi sıfır oldu, B'yi kuyruğa ekleriz.
- C'yi sıralama listesine ekleriz ve E'ye bağlı kenarı sileriz. E'nin girdi sıfır oldu, E'yi kuyruğa ekleriz.
- Kuyruğun başındaki B'yi sıralama listesine ekleriz ve D'ye bağlı kenarı sileriz. D'nin girdi sıfır oldu, D'yi kuyruğa ekleriz.
- Kuyruğun başındaki E'yi sıralama listesine ekleriz.
- Kuyruğun başındaki D'yi sıralama listesine ekleriz.
- Sonuçta sıralama: A → C → B → E → D

## Sonuç

Topological Sort, özellikle bağımlılıkları çözmek için kullanışlıdır. Örneğin, görevlerin sıralanması, proje planlaması ve derleyici optimizasyonları gibi alanlarda kullanılır.
