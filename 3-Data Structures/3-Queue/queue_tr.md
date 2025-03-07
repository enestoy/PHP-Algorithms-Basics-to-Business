# Queue (Kuyruk) Veri Yapısı

Queue (Kuyruk), **ilk giren ilk çıkar (FIFO - First In, First Out)** prensibine göre çalışan bir veri yapısıdır. Yani, ilk eklenen öğe, ilk olarak çıkarılır. Kuyruk, tıpkı bir kuyrukta sıraya giren insanların en önce sırada olan kişinin işlem görmesi gibi çalışır.

## Queue'in Temel Elemanları

1. **Enqueue (Eklemek):**
    - Kuyruğa bir öğe eklemek.

2. **Dequeue (Çıkarmak):**
    - Kuyruktan bir öğe çıkarmak (ilk eklenen öğe çıkarılır).

3. **Peek (Görünüm):**
    - Kuyruğun en önündeki öğeyi görmek, ancak çıkarmadan.

4. **isEmpty (Boş Mu?):**
    - Kuyruğun boş olup olmadığını kontrol etmek.

5. **Size (Boyut):**
    - Kuyruğun içindeki eleman sayısını döndürür.

## Queue Kullanım Alanları

- **Yazıcı sıralamaları:** Yazıcıda belge basımı kuyruğa alınarak, ilk gelen belge ilk basılır.
- **İşlem sıralamaları:** Bilgisayar sistemlerinde işlemlerin sıralanması ve yönetilmesi.
- **Veri iletim sıraları:** Ağa bağlı sistemlerde veri iletim sıralamaları da kuyruğu kullanabilir.

## Queue'in Temel İşlemleri

1. **Enqueue:** Kuyruğa yeni bir öğe ekler. Bu işlem öğeyi kuyruğun sonuna ekler.
2. **Dequeue:** Kuyruktan en öndeki öğeyi çıkarır ve bu öğe geri döndürülür.
3. **Peek:** Kuyruğun en önündeki öğeyi döndürür ancak kuyruktan çıkarmaz.
4. **isEmpty:** Kuyruğun boş olup olmadığını kontrol eder.
5. **Size:** Kuyruktaki eleman sayısını döndürür.

## Sonuç

Queue, ilk giren ilk çıkar (FIFO) prensibine dayalı olarak çalışan önemli bir veri yapısıdır. Kuyruk, verilerin sıralı bir şekilde işlendiği durumlarda ve çeşitli işlemler arasında düzen sağlamak için kullanılır. Kuyruk işlemleri (enqueue, dequeue, peek) genellikle hızlı ve etkilidir, bu nedenle birçok farklı uygulama ve sistemde yaygın olarak kullanılır.
