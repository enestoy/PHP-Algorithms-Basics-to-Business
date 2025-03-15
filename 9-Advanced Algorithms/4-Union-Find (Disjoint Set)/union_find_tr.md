# Union-Find (Disjoint Set)

Union-Find (veya Disjoint Set), bir küme veya öğeler arasındaki ilişkiyi yönetmek için kullanılan bir veri yapısıdır. Bu veri yapısı, genellikle "kümeler" halinde gruplanmış öğeler arasında birleşim (union) ve bulma (find) işlemleri yapmayı sağlar. Genellikle ağlarda, birleşik bileşenlerin bulunması gibi problemlerde kullanılır.

## Algoritmanın Temel Özellikleri

- **Find**: Bir öğenin hangi kümeye ait olduğunu bulma işlemi.
- **Union**: İki kümeyi birleştirme işlemi.
- **Disjoint**: Kümeler birbirine bağlı değildir, yani her öğe sadece bir küme ile ilişkilidir.

## Algoritmanın Adımları

1. **Başlangıç**:
   - Başlangıçta, her öğe kendi kümesinde yer alır. Yani, her öğe tek başına bir küme oluşturur.

2. **Find İşlemi**:
   - Bir öğenin hangi kümede olduğunu bulmak için, öğenin köküne gideriz. Eğer öğe bir kümenin başı ise, o kümenin köküdür.
   - Find işlemi, "path compression" denilen bir teknikle hızlandırılabilir. Bu, bir öğenin kökünü bulduğunda, o öğenin bağlı olduğu tüm öğelerin kökünü doğrudan kök ile ilişkilendirir.

3. **Union İşlemi**:
   - İki küme birleştirileceğinde, iki kümenin köklerini birleştiririz.
   - Birleştirirken, her iki kümeyi de dengede tutmak için "rank" (derece) veya "size" (boyut) kullanabiliriz. Bu, daha küçük kümenin kökünü büyük kümenin altına koymak anlamına gelir.
   - Union işlemi, "union by rank" veya "union by size" teknikleriyle hızlandırılabilir.

4. **Bitiş**:
   - Union-Find veri yapısı, işlemler tamamlandıktan sonra her öğenin hangi kümede olduğu hakkında bilgi verir. Birleştirilen kümelerle birlikte, ilişkiler yönetilebilir.

## Zaman Karmaşıklığı

- **Find**: O(α(n)) — Burada α(n), inverse Ackermann fonksiyonudur ve pratikte çok küçük bir değer alır. Bu, işlemin çok hızlı olduğu anlamına gelir.
- **Union**: O(α(n)) — Union işlemi de aynı şekilde çok hızlıdır, çünkü her iki kümeyi birleştirmek yalnızca köklerini değiştirmekle sınırlıdır.

Toplamda, Union-Find veri yapısının her iki işlem için zaman karmaşıklığı genellikle **yaklaşık O(1)** olarak kabul edilebilir.

## Örnek

Bir grup öğrenciyi düşünün. Her öğrenci başlangıçta kendi grubunda, yani kendi kümesindedir. Bu öğrencilerin bazılarının grup değiştirmesi gerekiyor. Union-Find algoritması şu şekilde çalışır:

Başlangıçta her öğrenci kendi grubunda:

[1], [2], [3], [4], [5]

1. Öğrenciler 1 ve 2 aynı grupta olmalı. Union işlemi ile bu iki grup birleşir:
[1, 2], [3], [4], [5]
2. Öğrenciler 3 ve 4 aynı grupta olmalı. Union işlemi ile bu iki grup birleşir:
[1, 2], [3, 4], [5]
3. Öğrenciler 2 ve 4 aynı grupta olmalı. Union işlemi ile bu iki grup birleşir:
[1, 2, 3, 4], [5]
4. Öğrenciler 1 ve 5 aynı grupta olmalı. Union işlemi ile bu iki grup birleşir:
[1, 2, 3, 4, 5]

Sonuçta, tüm öğrenciler tek bir grupta birleştirilmiştir.

## Sonuç

Union-Find (Disjoint Set) algoritması, kümelerle yapılan birleşim ve bulma işlemlerini hızla gerçekleştiren bir veri yapısıdır. Genellikle ağ teorisi, küme işlemleri ve bazı grafik algoritmalarında (örneğin, minimum spanning tree algoritmalarında) kullanılır.
