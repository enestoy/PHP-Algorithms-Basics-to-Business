# Turing Machines

Turing makineleri, hesaplamanın temel ilkelerini anlamak ve formüle etmek için geliştirilen soyut bir makine modelidir. 1936'da Alan Turing tarafından matematiksel bir model olarak ortaya konmuş ve hesaplamanın sınırlarını keşfetmek için çok önemli bir araç olmuştur. Turing makineleri, modern bilgisayarların temel yapı taşlarının anlaşılmasında önemli bir yer tutar.

## Temel Özellikler

Bir Turing makinesi, belirli bir dizi kuralı takip ederek bir girdi üzerinde işlem yapabilir ve çıktı üretebilir. Temel bileşenleri şunlardır:

1. **Bant**: Sonsuz uzunlukta bir bellek alanı. Bant, üzerinde veri tutar ve okuma/yazma işlemleri yapılır.
2. **Okuyucu/Yazıcı Başlık**: Bant üzerindeki bir hücreyi okuyup yazabilen hareketli bir başlık.
3. **Durumlar**: Turing makinesinin çalışma sırasında bulunduğu durumlar. Bir durum, makinenin şu anki konumunu ve işlem yapma modunu belirler.
4. **Geçiş Fonksiyonu**: Herhangi bir durum ve okunan sembole göre, Turing makinesinin ne yapacağını belirler (yeni bir sembol yazma, durum değiştirme ve başlık hareketi).

## Turing Makinesi Çalışma Şeması

1. **Başlangıç**: Turing makinesi bir başlangıç durumunda başlar ve ilk okuma başlığı, bant üzerinde bulunan ilk sembolü okur.
2. **Geçişler**: Geçiş fonksiyonu, makineyi belirli bir durumdan başka bir duruma götürür. Her geçiş, yazma, okuma ve başlık hareketini içerir.
3. **Hedef Durumlar ve Durma**: Makine, hedef duruma ulaşana kadar işlem yapmaya devam eder. Eğer geçiş fonksiyonu yeni bir işlem belirlemezse, makine durur.

## Örnek

Bir Turing makinesi örneği, verilen bir girdi üzerinde işlem yaparak belirli bir amaca ulaşmak olabilir. Örneğin, verilen bir sayıyı 2 ile çarpmak:

1. **Başlangıç Durumu**: Sayı bantta yazılıdır (örneğin, "101", yani 5).
2. **Okuma ve Yazma**: Sayıyı okur, sayı üzerinde işlem yapar, gerekli semboller yazar ve başlığı hareket ettirir.
3. **Durum Değiştirme**: Bir sonraki adıma geçmek için geçiş fonksiyonu kullanılır. Bu işlem, hedef duruma ulaşana kadar devam eder.

## Turing Makinesi Örneği: Binary Sayı Çarpma

Diyelim ki 101 (5) sayısını 2 ile çarpmak istiyoruz.

Başlangıçta, bantta 101 yer alır ve Turing makinesi şu adımları takip eder:

1. İlk başta, sayıyı okur ve yazma işlemi yaparak (örneğin, başlık sağa hareket eder) sayıyı 2 ile çarpmaya başlar.
2. Çarpma işlemi sırasında, sayının her basamağı tek tek kontrol edilir ve çarpma işlemi için gerekli semboller yazılır.
3. Sonunda, işlem bitirilir ve sonuç bantta yazılır (10, yani 10).

## Turing Makinesi ve Hesaplamanın Sınırları

Turing makineleri, hesaplama yetenekleri bakımından çok güçlüdür. Ancak, bazı problemler vardır ki, Turing makineleri bu problemleri çözemez. Bu tür problemlere **turing-incompleteness** denir. Yani, bazı hesaplama problemleri, turing makineleri tarafından çözülemez.

### Örnek: Durum Karar Problemi

Bir Turing makinesinin, belirli bir problemin çözülüp çözülemeyeceğini anlaması, bir başka makinenin içindeki tüm geçişleri kontrol etmesini gerektirebilir. Bu tür problemler, Turing makinelerinin çözemeyeceği problemler arasında yer alır.

## Sonuç

Turing makineleri, hesaplamanın teorik temelini atan ve algoritma anlayışımızı derinleştiren önemli bir kavramdır. Gerçek dünyada bilgisayarlar, bu teorik modelin pratik uygulamalarıdır. Turing makineleri, algoritmaların ve hesaplamaların ne kadar güçlü olduğunu gösterse de, bazı sınırlamaları da vardır.
