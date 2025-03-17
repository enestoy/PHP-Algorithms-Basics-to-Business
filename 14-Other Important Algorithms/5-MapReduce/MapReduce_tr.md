# MapReduce Algoritması

MapReduce, büyük veri kümelerinin paralel olarak işlenmesi için kullanılan bir programlama modelidir. Bu algoritma, özellikle dağıtık sistemlerde veri işleme görevlerini daha verimli bir şekilde gerçekleştirmek için kullanılır.

## Temel Kavram

MapReduce, verileri işlemeyi iki ana aşamaya ayırır:

1. **Map (Haritalama)**: Girdi verileri, küçük parçalara bölünür ve her parça paralel olarak işlenir.
2. **Reduce (Azaltma)**: Map aşamasında işlenen veriler birleştirilir ve tek bir sonuca indirgenir.

Bu iki aşama, verilerin büyük veri kümelerinde hızlı bir şekilde işlenmesine olanak tanır.

## Adımlar

### 1. **Map (Haritalama) Aşaması**

- Girdi verisi, anahtar-değer (key-value) çiftlerine dönüştürülür.
- Her veri parçası, map fonksiyonu ile işlenir. Map fonksiyonu, her bir giriş verisi parçasına bir anahtar-değer çifti üretir.

#### Örnek

- Girdi verisi: `["a", "b", "a", "c", "b"]`
- Map fonksiyonu, her öğeyi anahtar-değer çiftlerine dönüştürür:
  - `"a" -> 1`
  - `"b" -> 1`
  - `"a" -> 1`
  - `"c" -> 1`
  - `"b" -> 1`

### 2. **Shuffle and Sort (Karıştırma ve Sıralama)**

- Map aşamasında üretilen anahtar-değer çiftleri, aynı anahtara sahip olanlar gruplanır.
- Aynı anahtarlar bir araya getirilir ve sıralanır. Bu aşama, anahtarları birleştirerek aynı anahtarların tek bir grup haline gelmesini sağlar.

#### Örnek

- Anahtarlar: `{"a": [1, 1], "b": [1, 1], "c": [1]}`
  
### 3. **Reduce (Azaltma) Aşaması**

- Reduce fonksiyonu, aynı anahtara sahip tüm değerleri birleştirir ve tek bir sonuca indirger.
- Örneğin, bir kelime sayma problemi için, aynı anahtara sahip tüm değerler toplanarak toplam sayısı bulunur.

#### Örnek

- `"a" -> [1, 1]` → `a: 2`
- `"b" -> [1, 1]` → `b: 2`
- `"c" -> [1]` → `c: 1`

### 4. **Sonuç**

- Reduce aşamasının sonunda elde edilen anahtar-değer çiftleri, nihai sonucu oluşturur.
  
#### Örnek

- Sonuç: `{"a": 2, "b": 2, "c": 1}`

## Avantajları

- **Paralel İşleme**: MapReduce, büyük veri kümesi üzerinde paralel işleme yaparak verimliliği artırır.
- **Dağıtık İşlem**: Veriler farklı düğümlere dağıtılır ve her bir düğümde yerel olarak işlenir.
- **Esneklik**: Farklı veri türleri ve işleme gereksinimleri için uyarlanabilir.
- **Hata Toleransı**: Veri parçaları kopyalanarak işlenir, bu da sistemdeki arızalara karşı dayanıklılık sağlar.

## Kullanım Alanları

- **Büyük Veri İşleme**: Yüksek hacimli verilerin hızlı bir şekilde işlenmesi gereken durumlar.
- **Veri Madenciliği**: Veri kümeleri üzerinde analiz yapmak ve sonuçlar çıkarmak.
- **Arama Motorları**: Web sayfalarını indekslemek ve sıralamak.
- **Log Analizi**: Sistem loglarını analiz ederek anlamlı bilgiler çıkarmak.

## Örnek Kullanım Senaryoları

- **Kelime Sayma**: Verilen bir metin koleksiyonunda, her kelimenin kaç defa geçtiğini saymak.
- **Veri Sıralama**: Büyük veri kümelerini sıralamak.
- **Dizinleme**: Web sayfalarını indekslemek ve arama motoru sonuçları oluşturmak.
