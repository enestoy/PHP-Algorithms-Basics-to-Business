# Deque (Çift Yönlü Kuyruk) Veri Yapısı

Deque (Double Ended Queue - Çift Yönlü Kuyruk), her iki uçtan da eleman ekleyip çıkarabileceğiniz bir veri yapısıdır. Yani, elemanlar hem kuyruğun önünden (front) hem de kuyruğun sonundan (back) eklenip çıkarılabilir.

Deque, Queue ve Stack veri yapılarının birleşimi gibi düşünülebilir. Queue'da yalnızca kuyruğun sonundan ekleme yapılırken, Deque'de hem baştan hem de sondan ekleme yapılabilir. Aynı şekilde, Stack gibi, Deque'de de elemanlar her iki uçtan da çıkarılabilir.

## Deque'in Temel Elemanları

1. **Enqueue Front (Başından Eklemek):**
    - Deque'e kuyruğun önünden bir öğe eklemek.

2. **Enqueue Back (Sonundan Eklemek):**
    - Deque'e kuyruğun sonundan bir öğe eklemek.

3. **Dequeue Front (Başından Çıkarmak):**
    - Deque'den kuyruğun önündeki öğeyi çıkarmak.

4. **Dequeue Back (Sonundan Çıkarmak):**
    - Deque'den kuyruğun sonundaki öğeyi çıkarmak.

5. **Peek Front (Başındaki Öğeyi Görmek):**
    - Kuyruğun en önündeki öğeyi görmek.

6. **Peek Back (Sonundaki Öğeyi Görmek):**
    - Kuyruğun en sonundaki öğeyi görmek.

7. **isEmpty (Boş Mu?):**
    - Deque'in boş olup olmadığını kontrol etmek.

## Deque Kullanım Alanları

- **Veri akış kontrolü:** Çift yönlü kuyruklar, veri akışının her iki yönde kontrol edilmesi gereken durumlarda kullanılır.
- **LIFO ve FIFO kombinasyonu:** Hem FIFO (ilk giren ilk çıkar) hem de LIFO (son giren ilk çıkar) özelliklerini bir arada bulundurması nedeniyle, bir çok karmaşık veri işlemi için uygundur.
- **İç içe geçmiş menüler:** Çift yönlü kuyruklar, menülerde ileri ve geri navigasyon işlemlerinde de kullanılabilir.

## Deque'in Temel İşlemleri

1. **Enqueue Front:** Deque'e kuyruğun önünden yeni bir öğe ekler.
2. **Enqueue Back:** Deque'e kuyruğun sonundan yeni bir öğe ekler.
3. **Dequeue Front:** Kuyruğun önündeki öğeyi çıkarır.
4. **Dequeue Back:** Kuyruğun sonundaki öğeyi çıkarır.
5. **Peek Front:** Kuyruğun en önündeki öğeyi görmenizi sağlar.
6. **Peek Back:** Kuyruğun en sonundaki öğeyi görmenizi sağlar.
7. **isEmpty:** Deque'in boş olup olmadığını kontrol eder.

## Sonuç

Deque, çift yönlü kuyruk olarak her iki uçtan da işlem yapabilmenizi sağlar. Bu özellik, çeşitli algoritmalarda daha esnek ve verimli çözümler üretmenizi mümkün kılar. FIFO ve LIFO özelliklerini aynı anda taşıması, Deque'in birçok farklı kullanım alanında etkili olmasını sağlar.
