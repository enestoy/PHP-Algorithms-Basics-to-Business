# Dijkstra Algoritması Nedir?

Dijkstra Algoritması, bir kaynaktan diğer tüm düğümlere en kısa yolları bulmak için kullanılan bir grafik algoritmasıdır. Ağırlıklı ve yönlendirilmiş grafiklerde çalışır. En düşük maliyetli yolları hesaplamak için kullanılır.

## Algoritmanın Çalışma Mantığı

1. **Başlangıç Noktası Seçimi**: Algoritma, başlangıç düğümünü seçerek başlar.
2. **Mesafe Değerlerinin Atanması**: Seçilen başlangıç düğümünün mesafesi 0 olarak atanır, diğer tüm düğümlerin mesafesi sonsuz olarak kabul edilir.
3. **Ziyaret Edilecek Düğümün Seçilmesi**: En düşük mesafeye sahip düğüm seçilir ve ziyaret edilir.
4. **Komşu Düğümler İçin Güncelleme**: Ziyaret edilen düğümün komşuları üzerinden mesafe hesaplamaları yapılır.
5. **Tüm Düğümler Ziyaret Edilene Kadar Devam Etme**: Tüm düğümler ziyaret edilene kadar bu işlem tekrarlanır.

## Algoritmanın Adımları

1. Başlangıç düğümünü belirle ve mesafesini 0 yap.
2. Tüm diğer düğümleri sonsuz mesafe ile başlat.
3. Ziyaret edilmemiş düğümler arasından en düşük mesafeli düğümü seç.
4. Seçilen düğümün komşularının mesafelerini güncelle.
5. Ziyaret edilen düğümleri işaretle.
6. Tüm düğümler ziyaret edilene kadar işlemi devam ettir.

## Kullanım Alanları

- **Harita ve Navigasyon Sistemleri**: İki nokta arasındaki en kısa yolu bulmada kullanılır.
- **Ağ Yönlendirme Protokolleri**: Ağ trafiğini optimize etmek için kullanılır.
- **Oyun Geliştirme**: Karakter veya nesnelerin hedefe ulaşması için en kısa yolu belirler.

Dijkstra Algoritması, negatif ağırlıklı kenarlara sahip grafiklerde çalışmaz. Bu durumda Bellman-Ford gibi başka algoritmalar tercih edilmelidir.
