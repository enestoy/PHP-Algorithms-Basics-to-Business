# Karnaugh Haritası (Boolean Minimization) Algoritması

Karnaugh Haritası, Boolean ifadelerini minimize etmek için kullanılan görsel bir yöntemdir. Bu yöntem, dijital devre tasarımı ve optimizasyonunda yaygın olarak kullanılır. Karnaugh Haritası, Boolean ifadelerinin daha basit ve daha verimli bir hale getirilmesini sağlar.

## Temel Kavram

- Boolean fonksiyonları, genellikle 1'ler ve 0'lar arasında bir ilişkiyi ifade eder.
- Karnaugh Haritası, bu fonksiyonları görsel bir şekilde düzenler ve grup yaparak minimize eder.
- Amaç, aynı çıktıya sahip olan ve birbirini etkileyen terimleri gruplandırarak fonksiyonu daha basit bir hale getirmektir.

## Adımlar

1. **Karnaugh Haritası Oluşturma**:
   - Harita, fonksiyonun değişken sayısına göre belirli bir boyutta olur.
     - 2 değişken için 2x2’lik bir harita.
     - 3 değişken için 2x4’lük bir harita.
     - 4 değişken için 4x4’lük bir harita.

2. **Tabloları Yerleştirme**:
   - Boolean fonksiyonunun doğru olduğu yerleri belirleriz ve bu yerlerde 1 yerleştiririz.
   - Diğer hücrelere ise 0 yerleştirilir.

3. **Gruplama**:
   - 1'leri içeren hücreler gruplandırılır. Bu gruplar, 1, 2, 4, 8 vb. kadar büyüyebilir (2’nin katları).
   - Gruplar, yatay veya dikey olarak yapılabilir. En büyük gruplar seçilmelidir.

4. **Minimize Etme**:
   - Her grup için, sadece o gruptaki 1'leri kapsayacak şekilde minimum sayıda terim bulunur.
   - Grupların her biri, bir Boolean terimi olarak temsil edilir.
   - Gruplama sayesinde, daha az terim ile fonksiyon sadeleştirilir.

5. **Sonuç**:
   - Tüm gruplar için bulunan terimler birleştirilir ve minimize edilmiş Boolean fonksiyonu elde edilir.

## Örnek

- 2 değişkenli bir fonksiyonun Karnaugh Haritası şu şekilde olabilir:

| A \ B | 0  | 1  |
|------|----|----|
| 0    | 0  | 1  |
| 1    | 1  | 1  |

- Burada, 1'lerin bulunduğu yerler gruplandırılır ve sonuç olarak minimize edilmiş ifade elde edilir.

## Avantajları

- **Hızlı ve Görsel**: Boolean fonksiyonlarını görsel olarak minimize etmek çok hızlıdır.
- **Basitleştirme**: Çeşitli kombinasyonları bir araya getirerek daha basit ve anlaşılır Boolean ifadeleri elde edilir.
- **Dijital Devre Tasarımı**: Karmaşık dijital devrelerin tasarımında kullanılır.

## Kullanım Alanları

- Dijital mantık devrelerinin optimizasyonu.
- Kompakt ve verimli devre tasarımı.
- Akış kontrol ve durum makineleri.
