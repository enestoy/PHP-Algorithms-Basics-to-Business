# Hashing ve Hash Table Veri Yapıları

## Hashing Nedir?

Hashing, verileri bir anahtara (key) dönüştürmek için kullanılan bir tekniktir. Bu dönüşüm, genellikle bir hash fonksiyonu aracılığıyla yapılır. Hash fonksiyonu, bir veri öğesini (örneğin bir dize veya sayı) sabit boyutlu bir değere dönüştüren bir matematiksel işlemdir. Bu dönüşüm sonucu elde edilen değere "hash kodu" denir.

Hashing, verilerin hızlı bir şekilde depolanmasını ve erişilmesini sağlamak için kullanılır. Özellikle büyük veri setlerinde, belirli bir anahtara hızlıca erişim sağlamak amacıyla oldukça faydalıdır.

## Hashing Temel Kavramları

1. **Hash Fonksiyonu (Hash Function):**
   - Hash fonksiyonu, verileri bir anahtara dönüştüren matematiksel bir fonksiyondur. Bu fonksiyon, belirli bir veri girişi için her zaman aynı çıktıyı üretir.

2. **Hash Kodu (Hash Code):**
   - Hash fonksiyonundan elde edilen çıktıdır. Hash kodu, verinin tek bir temsilidir ve veri üzerinde yapılan işlemler sonucu her zaman aynı olmalıdır.

3. **Çakışma (Collision):**
   - Farklı veriler aynı hash kodunu üretirse, bu bir çakışma olarak kabul edilir. Çakışmalar hash tablosu tasarımında önemli bir problem oluşturur.

## Hash Table (Hash Tablosu) Nedir?

Hash Table (Hash Tablosu), verilerin anahtar-değer çiftleri olarak saklandığı bir veri yapısıdır. Hash table, hashing tekniği kullanarak verileri hızlı bir şekilde depolar ve erişir. Anahtarlar, veriye erişim sağlamak için kullanılır. Bu anahtarlar, hash fonksiyonu aracılığıyla hash kodlarına dönüştürülür.

### Hash Table'in Temel Elemanları

1. **Anahtar (Key):**
   - Veriyi tanımlayan benzersiz bir değerdir. Anahtarlar hash fonksiyonu ile hash koduna dönüştürülür.

2. **Değer (Value):**
   - Anahtar ile ilişkilendirilmiş veridir. Anahtarın hash kodu kullanılarak değere hızlıca erişilebilir.

3. **Slot (Depolama Alanı):**
   - Hash tablosunda her anahtar-değer çiftinin depolandığı alandır. Hash fonksiyonu, anahtarı bir slot'a yerleştirir.

### Hash Table Temel İşlemleri

1. **Ekleme (Insert):**
   - Anahtar ve değeri hash tablosuna ekler. Anahtar hash fonksiyonundan geçirilerek uygun slot'a yerleştirilir.

2. **Erişim (Search):**
   - Belirli bir anahtar ile ilişkili değeri hızlı bir şekilde arar ve bulur. Anahtar hash fonksiyonundan geçirilerek uygun slot'tan değere erişilir.

3. **Silme (Delete):**
   - Belirli bir anahtar ile ilişkili değeri siler. Anahtarın hash kodu kullanılarak uygun slot'tan değer çıkarılır.

4. **Çakışma Çözümü (Collision Resolution):**
   - Çakışma durumunda, birden fazla çözüm yaklaşımı vardır:
     - **Zincirleme (Chaining):** Çakışan anahtarlar için bir liste (veya başka bir veri yapısı) kullanılır.
     - **Açık Adresleme (Open Addressing):** Çakışma durumunda boş bir slot aranır ve veri o slot'a yerleştirilir.

## Hashing ve Hash Table Kullanım Alanları

- **Veritabanı Yönetim Sistemleri:** Veritabanlarında hızlı veri erişimi sağlamak için hash table kullanılır.
- **Dizinleme:** Arama motorlarında, web sayfalarını hızlıca indekslemek için hash table'lar kullanılabilir.
- **Şifreleme ve Kimlik Doğrulama:** Şifreler ve kullanıcı doğrulama işlemleri için hash fonksiyonları kullanılır.
- **Hızlı Veri Erişimi:** Uygulamalarda veri yapılarını hızlıca aramak ve güncellemek için yaygın olarak kullanılır.

## Sonuç

Hashing ve hash table veri yapıları, verileri hızlı ve verimli bir şekilde depolamak ve erişmek için oldukça güçlü araçlardır. Hashing, verilerin anahtarlar üzerinden hızlıca erişilmesini sağlar. Hash table, bu anahtar-değer çiftlerini depolayan yapıdır. Ancak, çakışmalar gibi problemlerle karşılaşıldığında doğru çakışma çözümü tekniklerini uygulamak önemlidir.
