# Linked List Nedir?

Linked List, her öğesinin bir veri ve bir sonraki öğeyi gösteren işaretçiye sahip olduğu dinamik bir veri yapısıdır. Bu yapı, dizi (array) gibi statik yapılara alternatif olarak, belleği verimli kullanmak amacıyla geliştirilmiştir.

## Linked List Temel Elemanları

1. **Node (Düğüm):**
    - **Veri (Data):** Düğümün taşıdığı veri.
    - **Bağlantı (Next):** Bir sonraki düğümü işaret eden gösterici.

2. **Head (Başlangıç):**
    - Listenin ilk düğümünü işaret eden gösterici.

3. **Tail (Son):**
    - Genellikle listenin sonundaki düğüm.

## Linked List Türleri

- **Singly Linked List (Tek Yönlü Bağlantılı Liste):** Her node yalnızca bir sonraki node’a işaret eder.
- **Doubly Linked List (Çift Yönlü Bağlantılı Liste):** Her node, hem bir sonraki hem de bir önceki node’a işaret eder.
- **Circular Linked List (Dairesel Bağlantılı Liste):** Son node, ilk node’a işaret eder.

## Linked List İşlemleri

1. **Ekleme (Insertion):**
    - Başta, ortada veya sonda yeni düğüm eklemek.
2. **Silme (Deletion):**
    - Belirli bir düğümü silmek.
3. **Arama (Search):**
    - Belirli bir değeri bulmak.
4. **Görüntüleme (Traversal):**
    - Listeyi gezmek.

## Sonuç

Bağlantılı listeler, dizilere kıyasla daha dinamik bir yapı sağlar. Listeye eleman eklemek, silmek ve listeyi gezmek gibi işlemler oldukça etkilidir. Ancak her düğümün işaretçi tutması gerektiği için bellek kullanımı daha yüksektir.
