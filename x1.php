<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ders 1</title>
</head>
<body>
<form method="POST">
    <label>Sayıları girin (her biri ayrı kutuda):</label><br><br>
    <input type="number" name="numbers[]" required><br><br>
    <input type="number" name="numbers[]" required><br><br>
    <input type="number" name="numbers[]" required><br><br>
    <input type="number" name="numbers[]" required><br><br>
    <button type="submit">Gönder</button>
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcının girdiği sayıları al ve filtrele
    // filter_input(), $_GET, $_POST, $_COOKIE, $_SERVER gibi süper global dizilerden gelen veriyi filtrelemek için kullanılır.
    // INPUT_POST sabiti, $_POST dizisinden veri almak için kullanılır.
    // Kodda 'numbers' değişken ismi olarak kullanılıyor
    // FILTER_DEFAULT, varsayılan bir filtreleme işlemi yapmaz. Yani, gelen veriyi olduğu gibi bırakır.
    // FILTER_REQUIRE_ARRAY, gelen verinin bir dizi (array) olması gerektiğini belirtir.
    $sayilar = filter_input(INPUT_POST, 'numbers', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

    if (!$sayilar) {
        echo "Lütfen geçerli sayılar girin.";
    } else {
        // Geçerli tam sayıları al
        // array_map() fonksiyonu, bir dizinin her bir elemanına belirli bir fonksiyonu uygulamak için kullanılır.
        // intval() fonksiyonu, bir değeri tam sayıya (integer) dönüştürmek için kullanılır.


        $sayilar = array_map('intval', $sayilar);

        echo "Girilen sayılar: " . implode(", ", $sayilar) . "<br>";

        // Toplamını hesapla
        $toplam = array_sum($sayilar);
        echo "Toplam: " . $toplam . "<br>";

        // En büyük ve en küçük sayıyı bul
        echo "En büyük sayı: " . max($sayilar) . "<br>";
        echo "En küçük sayı: " . min($sayilar) . "<br>";

        // Ortalama hesapla
        $ortalama = $toplam / count($sayilar);
        echo "Ortalama: " . number_format($ortalama, 2);
    }
}
?>
