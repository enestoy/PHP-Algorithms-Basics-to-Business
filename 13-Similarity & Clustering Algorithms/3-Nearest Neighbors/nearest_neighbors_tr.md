# Nearest Neighbors Algoritması

## Nearest Neighbors Nedir?

Nearest Neighbors (En Yakın Komşular), veri noktaları arasındaki benzerliği ölçerek sınıflandırma ve kümeleme yapan bir algoritmadır. En çok bilinen versiyonu **K-Nearest Neighbors (KNN)** olarak adlandırılır ve **bir veri noktasının sınıfını, en yakın komşularının sınıfına göre belirler.**

## Nearest Neighbors Algoritmasının Çalışma Mantığı

1. **Mesafe Ölçümü:** Yeni bir veri noktası ile veri kümesindeki diğer noktalar arasındaki mesafe hesaplanır. Genellikle Öklid mesafesi kullanılır.
2. **En Yakın Komşuların Seçilmesi:** Belirlenen **k** değeri kadar en yakın komşu seçilir.
3. **Sonuç Belirleme:**
   - **Sınıflandırma (Classification):** Komşuların çoğunluk sınıfı, yeni veri noktasının sınıfı olarak atanır.
   - **Regresyon (Regression):** Komşuların ortalaması alınarak tahmin yapılır.

## Nearest Neighbors Algoritmasının Avantajları

- Kolay anlaşılır ve uygulanabilir.
- Önceden bir eğitim aşaması gerektirmez, anlık kararlar alabilir.
- Küçük ve orta ölçekli veri setlerinde etkili çalışır.

## Nearest Neighbors Algoritmasının Dezavantajları

- Büyük veri setlerinde hesaplama maliyeti yüksektir.
- Gürültülü verilerden etkilenebilir.
- K değeri yanlış seçildiğinde doğruluk düşebilir.

## Nearest Neighbors Kullanım Alanları

- Öneri sistemleri
- Sahtecilik tespiti
- Tıbbi teşhis
- Görüntü tanıma

Nearest Neighbors algoritması, özellikle benzer veri noktalarını gruplamak ve yeni gelen verileri doğru şekilde sınıflandırmak için yaygın olarak kullanılan bir yöntemdir.
