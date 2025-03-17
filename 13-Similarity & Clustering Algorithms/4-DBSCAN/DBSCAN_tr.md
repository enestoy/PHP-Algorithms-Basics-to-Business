# DBSCAN Algoritması

## DBSCAN Nedir?

DBSCAN (Density-Based Spatial Clustering of Applications with Noise), yoğunluk tabanlı bir kümeleme algoritmasıdır. Kümeleri yoğunluk bölgelerine göre belirler ve gürültülü (aykırı) verileri ayırt edebilir.

## DBSCAN Algoritmasının Çalışma Mantığı

1. **Başlangıç:** Rastgele bir veri noktası seçilir.
2. **Yoğunluk Kontrolü:** Seçilen noktanın belirlenen mesafe (epsilon, ε) içindeki komşu sayısı incelenir.
3. **Kümeleme:**
   - Eğer yeterli sayıda komşuya sahipse, bu nokta bir kümenin çekirdeği olarak belirlenir ve komşuları kümeye dahil edilir.
   - Eğer yeterli komşuya sahip değilse, bu nokta gürültü olarak işaretlenir.
4. **Genleşme:** Yeni eklenen noktalar da aynı şekilde kontrol edilir ve kümeler genişletilir.
5. **Tekrar:** Tüm noktalar ziyaret edilene kadar işlem devam eder.

## DBSCAN Algoritmasının Avantajları

- Küme sayısını önceden belirlemeye gerek yoktur.
- Aykırı (gürültü) verileri tespit edebilir.
- Farklı şekillerdeki kümeleri başarılı bir şekilde yakalayabilir.

## DBSCAN Algoritmasının Dezavantajları

- Küme yoğunlukları çok farklı olduğunda iyi çalışmaz.
- Büyük veri setlerinde hesaplama maliyeti yüksektir.
- Parametrelerin (ε ve minimum komşu sayısı) doğru seçilmesi gerekir.

## DBSCAN Kullanım Alanları

- Anomali tespiti
- Coğrafi veri analizi
- Görüntü işleme
- Müşteri segmentasyonu

DBSCAN algoritması, özellikle yoğunluk bazlı kümeleme gerektiren veri setlerinde etkili bir yöntemdir ve klasik kümeleme algoritmalarına göre daha esnektir.
