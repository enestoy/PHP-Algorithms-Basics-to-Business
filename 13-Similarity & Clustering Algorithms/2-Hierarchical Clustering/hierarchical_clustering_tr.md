# Hierarchical Clustering Algoritması

## Hierarchical Clustering Nedir?

Hierarchical Clustering (Hiyerarşik Kümeleme), veri noktalarını hiyerarşik bir yapı içinde kümeleştiren bir kümeleme algoritmasıdır. Bu yöntem, verileri iç içe geçmiş bir ağaç yapısında (dendrogram) gruplandırarak kümeler oluşturur.

## Hierarchical Clustering Algoritmasının Çalışma Mantığı

Hiyerarşik kümeleme, iki temel yaklaşıma sahiptir:

### 1. **Aşağıdan Yukarıya (Agglomerative) Yaklaşım**

- Her veri noktası başlangıçta kendi başına bir küme olarak kabul edilir.
- En yakın iki küme birleştirilerek yeni bir küme oluşturulur.
- Bu işlem, tek bir küme kalana kadar devam eder.

### 2. **Yukarıdan Aşağıya (Divisive) Yaklaşım**

- Tüm veri noktaları tek bir küme olarak başlar.
- Küme, en farklı veri noktalarına göre alt kümelere ayrılır.
- Bu işlem, her veri noktası kendi başına bir küme olana kadar devam eder.

## Hierarchical Clustering Algoritmasının Avantajları

- Küme sayısını önceden belirlemek gerekmez.
- Kümeleme sonuçları dendrogram ile görselleştirilebilir.
- Kümeleme yapısı, farklı seviyelerde analiz edilebilir.

## Hierarchical Clustering Algoritmasının Dezavantajları

- Büyük veri setlerinde hesaplama maliyeti yüksektir.
- Hatalı kümeleme yapıldığında geri dönüşü zordur.
- Veri noktaları arasındaki mesafe ölçümüne çok duyarlıdır.

## Hierarchical Clustering Kullanım Alanları

- Genetik analizler
- Müşteri segmentasyonu
- Belge kümeleme
- Görüntü işleme

Hierarchical Clustering algoritması, özellikle kümeleme yapısını görselleştirmek ve veri gruplarını farklı seviyelerde analiz etmek için etkili bir yöntemdir.
