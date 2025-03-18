<?php
/* 
Mülakat Sorusu:

Bir e-ticaret platformunda, ürünlerin fiyatlarına göre özel indirimler uygulanacak. 
İndirimler, fiyatın asal sayı olup olmamasına göre belirlenecek. 
Örneğin, bir ürünün fiyatı asal bir sayı ise %10 indirim uygulanacak. Bu nedenle, belirli bir fiyat aralığındaki tüm asal sayıları hızlı bir şekilde bulmamız gerekiyor.

Problem:
- 2'den n'e kadar olan tüm asal sayıları bulmamız gerekiyor.

- n, kullanıcı tarafından verilen bir üst sınırdır.

- Asal sayıları bulduktan sonra, bu sayıların listesini döndürmemiz gerekiyor.
*/


class SieveOfEratosthenes {
    /**
     * Belirli bir üst sınıra kadar olan asal sayıları bulur.
     *
     * @param int $n Üst sınır.
     * @return array Asal sayıların listesi.
     */
    public function findPrimes($n) {
        // 0 ve 1 asal olmadığı için başlangıçta false olarak işaretle.
        $isPrime = array_fill(0, $n + 1, true);
        $isPrime[0] = $isPrime[1] = false;

        // 2'den sqrt(n)'e kadar olan sayıları kontrol et.
        for ($i = 2; $i * $i <= $n; $i++) {
            // Eğer $i asal ise, katlarını asal olmayan olarak işaretle.
            if ($isPrime[$i]) {
                for ($j = $i * $i; $j <= $n; $j += $i) {
                    $isPrime[$j] = false;
                }
            }
        }

        // Asal sayıları topla ve döndür.
        $primes = [];
        for ($i = 2; $i <= $n; $i++) {
            if ($isPrime[$i]) {
                $primes[] = $i;
            }
        }

        return $primes;
    }
}

// Örnek Kullanım:
$sieve = new SieveOfEratosthenes();
$n = 50; // 50'e kadar olan asal sayıları bul.
$primes = $sieve->findPrimes($n);

echo "2'den $n'e kadar olan asal sayılar:\n";
echo implode(", ", $primes) . "\n";

?>