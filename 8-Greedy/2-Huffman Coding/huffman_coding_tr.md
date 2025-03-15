# Huffman Coding Algoritması

## Problem Tanımı

Huffman Kodlama, veri sıkıştırma algoritmalarında kullanılan bir tekniktir. Verilerin daha az yer kaplamasını sağlamak için karakterlerin frekanslarına dayalı değişken uzunluklu bit dizileri oluşturur.

## Greedy Yaklaşımı

Huffman algoritması, her adımda en düşük frekanslı iki düğümü birleştirerek bir ağaç oluşturur. Bu sayede en sık kullanılan karakterler daha kısa kodlarla temsil edilirken, daha az kullanılan karakterler daha uzun kodlarla gösterilir.

### Adımlar

1. **Karakterlerin Frekanslarını Belirleme:** Girdi metnindeki her karakterin kaç kez geçtiğini hesapla.
2. **Min Heap (Öncelik Kuyruğu) Oluşturma:** Frekansı düşükten yükseğe sıralı bir düğüm listesi oluştur.
3. **Ağaç Yapısını Kurma:** En küçük iki düğümü seç, birleştir ve yeni bir düğüm oluştur.
4. **Kodları Atama:** Ağacın soluna `0`, sağına `1` vererek her karakter için bir bit dizisi oluştur.
5. **Veriyi Sıkıştırma:** Karakterleri belirlenen bit dizileriyle değiştirerek sıkıştırılmış veriyi oluştur.

## Örnek Senaryo

### Girdi

- **Metin:** "BABAABB"

### Frekanslar

| Karakter | Frekans |
|----------|---------|
| A        | 3       |
| B        | 4       |

### Huffman Ağacı Oluşturma

1. `A (3)` ve `B (4)` düğümleri birleştirilir.
2. Yeni düğümün soluna `A`, sağına `B` yerleştirilir.
3. `A` için kod: `0`, `B` için kod: `1` olur.

### Kodlama Sonucu

| Karakter | Huffman Kodu |
|----------|-------------|
| A        | 0           |
| B        | 1           |

### Sıkıştırılmış Çıktı

Metin: `BABAABB`
Huffman Kodu: `1010101`

## Sonuç

Huffman Kodlama, özellikle metin sıkıştırma algoritmalarında (örneğin ZIP, JPEG) yaygın olarak kullanılır. Greedy yaklaşımı ile her adımda en iyi seçimi yaparak minimum bit uzunluğunda temsil sağlar.
