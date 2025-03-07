# AVL Tree (Adelson-Velsky ve Landis Ağacı)

## AVL Tree Nedir?

AVL Tree (Adelson-Velsky ve Landis Ağacı), **self-balancing binary search tree** (kendiliğinden dengelenen ikili arama ağacı) türlerinden biridir. AVL ağacında, her düğümün sol ve sağ alt ağaçlarının yükseklik farkı (denge faktörü) en fazla 1 olmalıdır. Bu, ağacın her zaman dengeli olmasını sağlar ve böylece arama, ekleme ve silme işlemlerinin zaman karmaşıklığı O(log n) seviyesinde kalır.

## AVL Ağacının Temel Özellikleri

1. **İkili Arama Ağacı Özellikleri:**
   - Her düğümün sol alt ağacındaki tüm elemanlar o düğümden küçük, sağ alt ağacındaki tüm elemanlar ise o düğümden büyüktür.

2. **Denge Durumu:**
   - Her düğümdeki denge faktörü, sol alt ağacın yüksekliğinden sağ alt ağacın yüksekliğini çıkararak hesaplanır.
   - Denge faktörü şu şekilde hesaplanır:
     - **Denge Faktörü = Yükseklik(Sol Alt Ağaç) - Yükseklik(Sağ Alt Ağaç)**
   - Denge faktörü 1, 0 veya -1 olmalıdır. Eğer denge faktörü bu aralık dışında bir değere sahipse, ağaç dengesizdir ve yeniden denge sağlanması gerekir.

3. **Denge Sağlama (Balanslama):**
   - AVL ağacında denge sağlamak için **dönme (rotation)** işlemi yapılır. Bu işlemler dört şekilde yapılabilir:
     - **Sağ Dönme (Right Rotation)**: Denge faktörü -2 ve sol alt ağaçta derinlik fazla ise yapılır.
     - **Sol Dönme (Left Rotation)**: Denge faktörü 2 ve sağ alt ağaçta derinlik fazla ise yapılır.
     - **Sol-Sağ Dönme (Left-Right Rotation)**: Sol alt ağacın sağ alt ağacı daha derinse yapılır.
     - **Sağ-Sol Dönme (Right-Left Rotation)**: Sağ alt ağacın sol alt ağacı daha derinse yapılır.

## AVL Ağacının Temel İşlemleri

1. **Ekleme (Insert):**
   - Yeni bir düğüm eklerken, tıpkı Binary Search Tree (BST) gibi, doğru yeri bulmak için ağacın altına gidilir.
   - Ancak, her ekleme işleminden sonra ağacın dengesinin kontrol edilmesi ve gerekirse dönme işlemi yapılması gerekir.

2. **Arama (Search):**
   - AVL ağacında arama işlemi de ikili arama ağacına benzer şekilde yapılır. Ancak, AVL ağacının dengesiz olma durumu ortadan kaldırıldığı için arama işlemi daha hızlıdır.

3. **Silme (Delete):**
   - Bir düğüm silindikten sonra, tıpkı ekleme işlemi gibi, ağaç yeniden dengelenmelidir.
   - Silme işleminden sonra ağacın her düğümü tekrar kontrol edilir ve denge bozulmuşsa uygun dönme işlemi yapılır.

4. **Dönme İşlemleri (Rotations):**
   - **Sağ Dönme (Right Rotation):** Ağaçta sağa dönüş yapılır, kök düğümün sol alt ağacı sağa kaydırılır.
   - **Sol Dönme (Left Rotation):** Ağaçta sola dönüş yapılır, kök düğümün sağ alt ağacı sola kaydırılır.
   - **Sol-Sağ Dönme (Left-Right Rotation):** Sol alt ağacın sağ alt ağacı daha derinse, önce sol dönüş yapılır, ardından sağ dönüş yapılır.
   - **Sağ-Sol Dönme (Right-Left Rotation):** Sağ alt ağacın sol alt ağacı daha derinse, önce sağ dönüş yapılır, ardından sol dönüş yapılır.

## AVL Ağacının Avantajları

- **Denge:** AVL ağacı, her zaman dengede kalır, böylece arama, ekleme ve silme işlemleri hızlı bir şekilde yapılabilir (O(log n)).
- **Hızlı Erişim:** AVL ağacındaki veriler sıralı bir şekilde saklanır ve her işlemde daha hızlı erişim sağlanır.

## AVL Ağacının Dezavantajları

- **Dönme İşlemleri:** Her ekleme ve silme işleminden sonra dönme işlemleri yapılması gerektiği için bu işlemler ek maliyet getirir.
- **Daha Karmaşık Yapı:** AVL ağacı, standart ikili arama ağacından daha karmaşıktır. Kod ve mantık açısından daha fazla dikkat gerektirir.

## Uygulama Alanları

- **Veritabanı İndeksleme:** Veritabanlarında hızlı veri arama ve sıralama için AVL ağacı kullanılabilir.
- **Dosya Sistemleri:** Dosya sistemlerinde dosyaların sıralı olarak tutulması için AVL ağacı kullanılabilir.
- **Ağaç Yapıları:** Bilgisayar bilimlerinde birçok farklı ağaç yapısı AVL ağacını temel alarak geliştirilmiştir.

## Sonuç

AVL Tree, dengesini sürekli olarak koruyan ve her işlemde yüksek performans sunan bir ikili arama ağacıdır. Arama, ekleme ve silme işlemleri, diğer ağaç yapıları ile karşılaştırıldığında daha hızlıdır ve ağacın her zaman dengeli olmasını sağlar.
