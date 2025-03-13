# Subset Sum Problemi ve Geri İzleme Algoritması

## Problem Tanımı

Subset Sum Problemi, bir dizi tam sayının ve bir hedef toplamın verildiği bir karar problemidir. Amaç, verilen dizinin bir alt kümesinin toplamının hedef toplamla eşit olup olmadığını belirlemektir.

### Örnek

Verilen tam sayılar kümesi `{3, 34, 4, 12, 5, 2}` ve hedef toplam `9` ise, `{4, 5}` alt kümesinin toplamı `9` olduğundan, cevap "Evet" olacaktır.

## Geri İzleme Yaklaşımı

Geri İzleme, bir problemi çözmek için adayları keşfeden ve geçerli bir çözüme yol açamayacağını fark ettiğinde bu adayları terk eden bir tekniktir.

### Subset Sum Problemini Geri İzleme ile Çözme Adımları

1. **İlk elemandan başla**: Dizinin ilk elemanını göz önünde bulundur.
2. **Elemanı dahil et ya da etme**: Her eleman için iki seçeneğin vardır:
    - **Elemanı dahil et**: Elemanı mevcut alt kümeye ekleyip, hedef toplamı o elemanın değeri kadar azalt.
    - **Elemanı hariç tut**: Elemanı alt kümeye eklemeden bir sonraki elemana geç.
3. **Toplam hedefe eşit mi kontrol et**: Mevcut alt kümenin toplamı hedef toplam ile eşitse, çözüm bulunmuştur.
4. **Geriye adım at**: Eğer herhangi bir noktada toplam hedefi aşarsa ya da tüm elemanlar kontrol edildikten sonra çözüm bulunmazsa, son dahil edilen elemanı çıkararak bir önceki adımı geri al ve bir sonraki olası elemanı dene.
5. **İşlemi tekrarla**: Bu işlemi, tüm olası kombinasyonları göz önünde bulundurarak tekrarla.
6. **Çözüm bulundu**: Geçerli bir alt küme bulunduğunda "Evet" olarak döndür. Eğer tüm olasılıklar kontrol edildikten sonra geçerli bir alt küme bulunamazsa, "Hayır" döndür.

## Sonuç

Geri İzleme algoritması, Subset Sum Problemini çözmek için güçlü bir tekniktir. Bu yöntem, dizinin elemanlarının tüm olası kombinasyonlarını keşfederek, hedef toplamı sağlayan bir çözüm bulur ve geçersiz yolları etkili bir şekilde terk eder.
