
# Floyd-Warshall Algoritması

Floyd-Warshall algoritması, bir graf üzerindeki tüm düğümler arasındaki en kısa yolları bulmak için kullanılan bir algoritmadır. Bu algoritma, hem negatif ağırlıklı kenarları hem de negatif ağırlıklı döngüleri tespit edebilir. Floyd-Warshall, dinamik programlama yaklaşımına dayanır ve her bir düğüm çifti arasındaki en kısa yolu bulur.

## Temel Özellikler

- **Tüm çiftler için en kısa yol:** Floyd-Warshall algoritması, kaynak-düğüm ve hedef-düğüm arasındaki tüm en kısa yolları bulur.
- **Negatif Ağırlıklı Kenarlar:** Bu algoritma, negatif ağırlıklı kenarları işleyebilir.
- **Negatif Döngü Tespiti:** Eğer bir graf negatif ağırlıklı döngü içeriyorsa, algoritma bu durumu tespit edebilir.
- **Zaman Karmaşıklığı:** O(V^3) — burada V düğüm sayısını temsil eder.

## Algoritmanın Çalışma Prensibi

1. **Başlangıç Durumu:** İlk başta, her düğüm arasındaki mesafeleri belirleriz. Eğer bir kenar varsa, mesafeyi kenarın ağırlığı olarak ayarlarız. Eğer kenar yoksa, mesafeyi sonsuz olarak ayarlarız.

2. **Dinamik Programlama:** Dinamik programlama yaklaşımını kullanarak her bir düğüm çifti için, bir üçüncü düğüm üzerinden geçip geçemeyeceğini kontrol ederiz. Bu işlem, grafın her düğümü için yapılır.

3. **Sonuç:** Sonuç olarak, her düğüm çifti arasındaki en kısa yol ve mesafe hesaplanmış olur.

## Adım Adım Algoritma

1. **Başlangıç:**
   - İlk başta, her düğüm arasındaki mesafeyi belirleyin. Eğer bir kenar varsa, mesafeyi kenarın ağırlığına eşitleyin, yoksa sonsuz yapın.
   - Aynı şekilde, kendi kendine olan mesafeleri sıfır yapın.

2. **Üçlü Döngü:**
   - Üçlü bir döngüde, her bir düğüm çifti arasındaki mesafeyi, üçüncü bir düğüm üzerinden geçerek karşılaştırın.
   - Eğer düğüm u ile düğüm v arasındaki mesafe, düğüm u ile düğüm k ve k ile düğüm v arasındaki mesafeden küçükse, mesafeyi güncelleyin.

3. **Negatif Döngü Kontrolü:**
   - Eğer herhangi bir düğümun kendi kendisine olan mesafesi negatif bir değere düşerse, bu graf negatif döngü içeriyor demektir.

## Örnek

Aşağıdaki gibi bir grafı ele alalım:

```A --(3)--> B --(1)--> C --(2)--> A```

İlk adımda mesafeler şu şekilde olur:

- `A -> B: 3`
- `B -> C: 1`
- `C -> A: 2`

Floyd-Warshall algoritmasında, her bir düğüm çifti için, her düğümün üçüncü bir düğüm üzerinden geçişine bakılır. Eğer bir düğüm daha kısa bir yol keşfederse, mesafeyi güncelleriz.

## Sonuç

Floyd-Warshall algoritması, tüm düğümler arasındaki en kısa yolları bulmak için mükemmel bir seçimdir. Ancak, O(V^3) karmaşıklığına sahip olduğu için büyük graf yapıları için daha verimli olmayabilir. Bununla birlikte, algoritma hem negatif ağırlıklı kenarları hem de negatif döngüleri tespit edebilmesi açısından oldukça faydalıdır.
