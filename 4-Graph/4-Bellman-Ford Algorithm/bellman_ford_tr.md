
# Bellman-Ford Algoritması

Bellman-Ford algoritması, bir kaynaktan tüm düğümlere olan en kısa yolu bulmaya yönelik bir algoritmadır. Bu algoritma, negatif ağırlıklı kenarlara sahip grafikleri işleyebilme yeteneğine sahip olmasıyla Dijkstra algoritmasından farklıdır. Bellman-Ford algoritması, özellikle negatif ağırlıklı döngüleri tespit etmek için kullanılır.

## Temel Özellikler

- **Negatif Ağırlıklı Kenarlar:** Bellman-Ford algoritması, negatif ağırlıklı kenarları işleyebilir.
- **Negatif Döngü Tespiti:** Eğer bir graf negatif ağırlıklı döngü içeriyorsa, Bellman-Ford bu durumu tespit edebilir.
- **Zaman Karmaşıklığı:** O(V * E) — burada V düğüm sayısını, E ise kenar sayısını temsil eder.

## Algoritmanın Çalışma Prensibi

1. **Başlangıç Durumu:** İlk olarak, tüm düğümlere olan mesafeleri sonsuz olarak ayarlarız. Kaynak düğümün mesafesi ise sıfır olarak ayarlanır.

2. **Kenarlarda Gezinme:** Tüm kenarları tekrar tekrar gezerek her kenar için mesafeleri güncelleriz. Bu işlem, toplamda V-1 kez tekrarlanır (V düğüm sayısı). Bu, herhangi bir düğümün en fazla V-1 kenarla ulaşıldığı için yeterlidir.

3. **Sonuç:** Algoritma, her bir kenar için en kısa yolu bulmaya çalışır. Eğer algoritma bu işlemi V-1 kez tamamladıktan sonra hala bir kenar güncellenebilirse, bu durumda graf negatif ağırlıklı döngü içeriyor demektir.

## Adım Adım Algoritma

1. **Başlangıç:**

   - Kaynak düğümünden diğer tüm düğümlere olan mesafeyi sonsuz olarak başlat.
   - Kaynak düğümün mesafesini 0 olarak ayarla.

2. **V-1 Kez Gezinme:**

   - Tüm kenarları (başlangıç-düğüm, bitiş-düğüm, ağırlık) gözden geçir.
   - Eğer `mesafe[u] + ağırlık < mesafe[v]` ise, mesafeyi güncelle.

3. **Negatif Döngü Kontrolü:**
   - V-1 geçişinden sonra, eğer hala bir kenarın mesafesi güncellenebiliyorsa, bu bir negatif döngü olduğunu gösterir.

## Örnek

Aşağıdaki gibi bir grafı ele alalım:

```A --(5)--> B --(2)--> C --(-1)--> A```

- Başlangıç: `A`
- Başlangıç mesafesi: `A=0, B=∞, C=∞`
  
İlk adımda kenarları gezdiğimizde:

- `A -> B` kenarı ile `B`'nin mesafesi `5` olur.
- `B -> C` kenarı ile `C`'nin mesafesi `7` olur.
- `C -> A` kenarı ile `A`'nın mesafesi `6` olur.

İkinci adımda ise:

- `A -> B` kenarı tekrar gözden geçirilir, ancak `B` zaten en kısa mesafeye sahiptir.
- `B -> C` kenarı tekrar gözden geçirilir, ancak `C` zaten en kısa mesafeye sahiptir.
- `C -> A` kenarı tekrar gözden geçirilir, ancak `A`'nın mesafesi zaten daha kısa olduğundan değişmez.

Son olarak, negatif döngü olup olmadığı kontrol edilir. Bu graf, negatif ağırlıklı bir döngü içerdiği için negatif döngü tespit edilir.

## Sonuç

Bellman-Ford algoritması, özellikle negatif ağırlıklı kenarlara sahip grafikleri işlemek için mükemmel bir seçimdir. Ancak, Dijkstra algoritmasına kıyasla daha yavaştır (O(V * E)) ve daha karmaşık graf yapılarında daha iyi çalışabilir.
