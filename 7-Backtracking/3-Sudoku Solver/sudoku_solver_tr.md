# Sudoku Çözücü ve Geri İzleme Algoritması

## Problem Tanımı

Sudoku, mantık tabanlı bir sayı yerleştirme bulmacasıdır. Amaç, 9x9 boyutunda bir ızgarayı 1'den 9'a kadar sayılarla doldurmak ve aşağıdaki kurallara uymaktır:

- Her satırda 1'den 9'a kadar olan her sayı yalnızca bir kez yer almalıdır.
- Her sütunda 1'den 9'a kadar olan her sayı yalnızca bir kez yer almalıdır.
- 9 adet 3x3 alt ızgaranın her birinde 1'den 9'a kadar olan her sayı yalnızca bir kez yer almalıdır.

Verilen kısmi bir ızgara ile amaç, bu bulmacayı tamamlamaktır.

## Geri İzleme Yaklaşımı

Geri İzleme, tüm olası çözümleri deneyerek ve kısıtları ihlal edenleri reddederek bir problemi çözme tekniğidir. Sudoku durumunda, boş hücrelere sayılar yerleştirerek ilerleriz ve eğer şu anki seçim geçersiz bir yapı oluşturursa geri adım atarız.

### Sudoku Bulmacasını Geri İzleme ile Çözme Adımları

1. **İlk boş hücreyle başla**: İlk boş hücreyi (sayıyla doldurulmamış hücre) belirleyin.
2. **Bir sayı yerleştirmeyi dene**: Boş hücreye 1'den 9'a kadar sayılardan birini yerleştirmeyi deneyin.
3. **Kısıtları kontrol et**: Bir sayı yerleştirdikten sonra, bu sayının Sudoku kurallarını ihlal edip etmediğini kontrol edin:
    - Sayı aynı satırda yer alan başka bir sayıyla çakışmamalıdır.
    - Sayı aynı sütunda yer alan başka bir sayıyla çakışmamalıdır.
    - Sayı aynı 3x3 alt ızgarada yer alan başka bir sayıyla çakışmamalıdır.
4. **Geçerliyse bir sonraki boş hücreye geç**: Eğer mevcut yerleştirme geçerliyse, bir sonraki boş hücreye geçin ve işlemi tekrarlayın.
5. **Geriye adım at**: Eğer bir sayı, geçersiz bir konfigürasyona (satır, sütun veya alt ızgara ihlali) yol açarsa, son yerleştirilen sayıyı çıkarın ve o hücre için bir sonraki olası sayıyı deneyin.
6. **İşlemi tekrarla**: Bu işlemi, tüm boş hücreler için geçerli yerleştirmeleri deneyecek şekilde tekrarlayın.
7. **Çözüm bulundu**: Eğer tüm hücreler kurallara uygun şekilde doldurulmuşsa, Sudoku bulmacası çözülmüş demektir.

## Sonuç

Geri İzleme, Sudoku bulmacalarını çözmek için etkili bir yöntemdir. Bu yöntem, sayılar için tüm olası yerleştirmeleri sistematik olarak keşfeder, her adımda kısıtları kontrol eder ve geçersiz yolları terk ederek geçerli bir çözüm bulur.
