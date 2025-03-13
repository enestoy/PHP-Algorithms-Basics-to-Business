# N-Queens Problemi ve Geri İzleme Algoritması

## Problem Tanımı

N-Queens problemi, `N` adet şahını, `N x N` boyutunda bir satranç tahtasında öyle yerleştirmeyi amaçlayan klasik bir bulmacadır ki, hiçbir iki şah birbirini tehdit etmemelidir. Yani:

- İki şah aynı satırda yer alamaz.
- İki şah aynı sütunda yer alamaz.
- İki şah aynı diyagonal üzerinde yer alamaz.

## Geri İzleme Yaklaşımı

Geri İzleme, çözüm adaylarını adım adım oluşturan ve eğer bir aday kısıtları ihlal ederse, önceki adıma geri dönerek yeni bir aday deneyen genel bir algoritma tekniğidir.

### N-Queens Problemini Geri İzleme ile Çözme Adımları

1. **İlk satırdan başla**: İlk satıra bir şah yerleştir, sonra bir sonraki satıra geç ve aynı işlemi tekrarla.
2. **Sütun kısıtı**: Her satır için, şahı öyle bir sütuna yerleştir ki, o sütunda başka bir şah olmasın.
3. **Diyagonal kısıtı**: Her satır için, yerleştirilen şahın başka bir şahla aynı diyagonal üzerinde olmaması sağlanmalıdır.
4. **Geriye doğru adım at**: Bir satıra geçerken uygun bir konum bulamazsan, son yerleştirilen şahı kaldırarak bir önceki satırda yeni bir konum dene.
5. **İşlemi tekrarla**: Her satır için şahları yerleştirmeye devam et, ta ki tüm şahlar tahtaya yerleştirilene kadar.
6. **Çözüm bulundu**: Bütün şahlar, kısıtlamalara uyarak tahtaya yerleştirildiğinde, bu düzen geçerli bir çözüm olacaktır.
7. **Tüm olasılıkları keşfet**: Algoritma, tüm olası çözümleri keşfederek işlemeye devam eder.

## Sonuç

Geri İzleme algoritması, N-Queens problemini çözmek için etkili bir yöntemdir. Bu yöntem, tüm olasılıkları adım adım deneyerek, geçerli olmayan bir düzenle karşılaşıldığında geri adım atarak tüm çözümleri keşfeder ve kısıtlamaları korur.
