# Bloom Filter Algoritması

## Bloom Filter Nedir?

Bloom Filter, bir öğenin bir kümede olup olmadığını belirlemek için kullanılan, az yer kaplayan ve hızlı sorgulama yapabilen olasılıksal bir veri yapısıdır. Kesin sonuç vermemekle birlikte, **yanlış pozitif sonuçlara izin verir ancak yanlış negatif sonuç vermez**.

## Bloom Filter Algoritmasının Çalışma Mantığı

1. **Başlangıç:** Boş bir bit dizisi oluşturulur.
2. **Öğe Ekleme:**
   - Öğe, birden fazla hash fonksiyonundan geçirilerek belirli bit dizisi konumları belirlenir.
   - Bu konumlardaki bitler `1` olarak işaretlenir.
3. **Öğe Sorgulama:**
   - Öğe tekrar hash fonksiyonlarından geçirilir ve ilgili bit konumları kontrol edilir.
   - Eğer tüm konumlar `1` ise, öğe büyük ihtimalle kümededir (ama kesin değildir).
   - Eğer en az bir bit `0` ise, öğe kesinlikle kümede değildir.

## Bloom Filter Algoritmasının Avantajları

- Bellek verimli bir veri yapısıdır.
- Sabit süre içinde arama yapabilir.
- Hash tablolarına göre daha az yer kaplar.

## Bloom Filter Algoritmasının Dezavantajları

- Yanlış pozitif sonuçlar verebilir (olmayan bir öğeyi varmış gibi gösterebilir).
- Eklenen öğeler silinemez (gelişmiş varyantlar hariç).
- Veri yapısı doldukça yanlış pozitif oranı artar.

## Bloom Filter Kullanım Alanları

- Web tarayıcılarında kötü amaçlı URL filtreleme
- Veritabanı sorgularında önbellekleme
- Büyük veri setlerinde hızlı üyelik sorgulama
- Ağ güvenliği ve izleme sistemleri

Bloom Filter algoritması, özellikle büyük ölçekli veri kümelerinde hızlı ve hafif bir üyelik testi yapmak için kullanışlı bir yöntemdir.
