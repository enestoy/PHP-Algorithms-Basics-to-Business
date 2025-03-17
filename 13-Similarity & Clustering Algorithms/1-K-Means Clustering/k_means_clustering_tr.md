# K-Means Clustering Algoritması

## K-Means Clustering Nedir?

K-Means Clustering, verileri belirli sayıda kümeye ayırmak için kullanılan bir kümeleme algoritmasıdır. Veriler, önceden belirlenen k sayıda küme merkezine (centroid) en yakın olacak şekilde gruplandırılır.

## K-Means Algoritmasının Çalışma Mantığı

1. **Başlangıç Noktaları Belirleme:** Kullanıcı tarafından belirlenen k sayısı kadar rastgele küme merkezi seçilir.
2. **Veri Noktalarının Küme Merkezlerine Atanması:** Her veri noktası, en yakın küme merkezine atanır.
3. **Yeni Küme Merkezlerini Hesaplama:** Her kümenin ortalaması alınarak yeni küme merkezleri belirlenir.
4. **Tekrar Etme:** Veri noktalarının yeni küme merkezlerine atanması ve merkezlerin güncellenmesi işlemi, küme merkezleri sabit kalana veya belirli bir iterasyon tamamlanana kadar devam eder.

## K-Means Algoritmasının Avantajları

- Basit ve hızlıdır.
- Büyük veri setlerinde etkili çalışır.
- Küme sayısı önceden belirlendiğinde iyi sonuçlar verebilir.

## K-Means Algoritmasının Dezavantajları

- Küme sayısının (k) önceden belirlenmesi gerekir.
- Başlangıç noktaları farklı sonuçlara yol açabilir.
- Küresel olmayan kümeler için iyi çalışmaz.

## K-Means Kullanım Alanları

- Müşteri segmentasyonu
- Görüntü sıkıştırma
- Anomali tespiti
- Öneri sistemleri

K-Means algoritması, özellikle büyük ve anlamlı veri kümelerini ayrıştırmak için sıkça kullanılan etkili bir yöntemdir.
