# Binary Search Tree (BST) Veri Yapısı

## Binary Search Tree (İkili Arama Ağacı) Nedir?

Binary Search Tree (BST), her bir düğümde en fazla iki çocuk bulunan bir ikili ağaç yapısıdır. BST'nin en önemli özelliği, her düğümün sol alt ağacındaki tüm değerlerin o düğümden küçük, sağ alt ağacındaki tüm değerlerin ise o düğümden büyük olmasıdır. Bu özellik sayesinde BST, veriye hızlı bir şekilde erişim sağlayabilir.

## BST'nin Temel Özellikleri

1. **Her düğümün en fazla iki çocuğu vardır.**
   - Bir düğümde en fazla iki çocuk (sol ve sağ) bulunabilir.

2. **Sol alt ağaçtaki tüm elemanlar, kök düğümden daha küçük olmalıdır.**
   - Sol alt ağaçta bulunan her düğüm, kök düğümden küçük bir değere sahip olmalıdır.

3. **Sağ alt ağaçtaki tüm elemanlar, kök düğümden daha büyük olmalıdır.**
   - Sağ alt ağaçta bulunan her düğüm, kök düğümden büyük bir değere sahip olmalıdır.

4. **BST'de her düğümde yalnızca bir anahtar değeri bulunur.**

5. **Ağaç yapısı dengeli olabilir veya dengesiz olabilir.**
   - Eğer ağacın her seviyesinde yeterli denge varsa, arama, ekleme ve silme işlemleri oldukça hızlıdır. Ancak dengesiz bir ağaç, verimliliği düşürebilir.

## Binary Search Tree Temel İşlemleri

1. **Ekleme (Insert):**
   - Yeni bir düğüm eklerken, BST'nin özelliklerine göre doğru yeri bulmak için ağaç üzerinde gezinilir ve yeni düğüm uygun yere yerleştirilir.

2. **Arama (Search):**
   - Bir anahtar ararken, kök düğümden başlanarak, aranan değerin küçük mü büyük mü olduğuna bakılır. Sol veya sağ alt ağaçlara ilerleyerek arama işlemi yapılır.

3. **Silme (Delete):**
   - Bir düğüm silinirken, üç durumla karşılaşılır:
     - **Düğümün hiç çocuğu yoksa:** Düğüm doğrudan silinir.
     - **Düğümün bir çocuğu varsa:** Düğüm, tek çocuğuyla değiştirilir.
     - **Düğümün iki çocuğu varsa:** Düğümün yerine, sağ alt ağacındaki en küçük değer (veya sol alt ağacındaki en büyük değer) getirilir.

4. **İnorder Traversal (Gezinme):**
   - BST'de sıralı bir gezinti yapmak için **inorder traversal** kullanılır. Bu gezinme yöntemi, önce sol alt ağaç, sonra kök düğüm, sonra sağ alt ağaç şeklinde yapılır ve bu şekilde BST'nin elemanları sıralı bir şekilde elde edilir.

## BST'nin Avantajları

- **Hızlı Arama:** BST, sıralı bir yapıya sahip olduğu için, veriye erişim çok hızlıdır. Ortalama durumda O(log n) zaman kompleksitesine sahiptir.
- **Hızlı Ekleme ve Silme:** Verinin yerini bulduktan sonra ekleme ve silme işlemleri de hızlı bir şekilde yapılabilir.

## BST'nin Dezavantajları

- **Dengesiz Ağaçlar:** Eğer ekleme işlemleri rastgele yapılırsa, BST dengesiz hale gelebilir ve bu durumda ağaç bir bağlı listeye dönüşebilir, böylece arama, ekleme ve silme işlemleri O(n) zaman kompleksitesine sahip olabilir.

## BST Uygulama Alanları

- **Veritabanı İndeksleme:** Veritabanları, verilerin hızlı bir şekilde aranması ve sıralanması için BST kullanabilir.
- **Dosya Sistemi Yönetimi:** Dosya sistemlerinde dizinleme ve arama işlemleri için BST yaygın olarak kullanılır.
- **Yapay Zeka ve Oyun Programlaması:** Bazı algoritmalar ve oyun programlarında karar ağaçları (decision trees) gibi yapılar kullanılır ve BST bu tür uygulamalarda da kullanılabilir.

## Sonuç

Binary Search Tree (BST), verilerin sıralı bir yapıda tutulmasını sağlayan ve hızlı arama, ekleme ve silme işlemleri yapabilen güçlü bir veri yapısıdır. Ancak, ağacın dengeli olması önemlidir; aksi takdirde performans düşebilir. BST, birçok farklı alanda veri erişimi ve sıralama işlemleri için kullanışlıdır.
