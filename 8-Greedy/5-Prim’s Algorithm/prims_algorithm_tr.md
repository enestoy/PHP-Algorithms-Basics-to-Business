# Prim's Algorithm (Minimum Spanning Tree - MST)

## Problem Tanımı

Prim’in Algoritması, **Minimum Spanning Tree (MST)** oluşturmak için kullanılan bir **Greedy (Açgözlü) Algoritma**dır. Bir bağlı, ağırlıklı ve yönsüz graf için, tüm düğümleri kapsayan minimum toplam ağırlıklı ağacı (MST) bulmayı hedefler.

## Algoritmanın Temel Mantığı

- MST, **V düğüm** ve **V-1 kenardan** oluşan en düşük maliyetli ağaçtır.
- Algoritma bir **düğüme** rastgele başlar ve **komşu en düşük ağırlıklı kenarı** seçerek genişler.
- Her adımda **daha önce seçilmeyen düğümler** içinden en düşük ağırlıklı kenar eklenir.
- İşlem tüm düğümler eklenene kadar devam eder.

## Adımlar

1. **Başlangıç düğümü seçilir** (rastgele veya belirli bir noktadan başlanabilir).
2. **En düşük ağırlıklı kenar** seçilir ve MST’ye eklenir.
3. **Yeni düğümün komşuları incelenir** ve en küçük maliyetli kenar eklenir.
4. **Tüm düğümler eklenene kadar** bu süreç tekrar edilir.

## Örnek Senaryo

### Girdi - Ağırlıklı Grafik

```  (A)
    /   \  
  2/     \3
  /       \  
(B)-------(C)
  \       /
  4\     /5
    \   /
     (D)     ```

### Kenarlar ve Ağırlıklar

| Kenar  | Ağırlık |
|--------|---------|
| A - B  | 2       |
| A - C  | 3       |
| B - C  | 1       |
| B - D  | 4       |
| C - D  | 5       |

### Algoritmanın İşleyişi

1. **A düğümünden başlanır.**
2. **En küçük kenar (A - B, ağırlık = 2) eklenir.**
3. **Yeni düğüm B’den en küçük kenar (B - C, ağırlık = 1) eklenir.**
4. **Yeni düğüm C’den en küçük kenar (A - C yerine B - D, ağırlık = 4) eklenir.**
5. **Tüm düğümler bağlandığı için algoritma tamamlanır.**

### Çıktı - Minimum Spanning Tree (MST)

- **Seçilen Kenarlar:** (A - B), (B - C), (B - D)
- **Toplam Ağırlık:** 2 + 1 + 4 = **7**

## Kullanım Alanları

- **Ağ Tasarımı (Network Design)**
- **Elektrik Dağıtım Hatları**
- **Yol ve Ulaşım Planlaması**
- **Veri Kümeleme (Data Clustering)**

## Sonuç

Prim’s Algoritması, her adımda **en düşük ağırlıklı kenarı seçerek** çalışır ve **grafı kapsayan minimum ağırlıklı ağacı oluşturur**. Bu sayede etkin ve optimal bir MST elde edilir.
