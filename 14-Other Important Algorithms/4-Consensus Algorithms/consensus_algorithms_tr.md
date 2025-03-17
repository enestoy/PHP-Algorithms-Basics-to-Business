# Consensus Algoritmaları (Paxos, Raft, vb.)

Consensus algoritmaları, dağıtık sistemlerde birden fazla düğümün (node) uyum içinde çalışmasını sağlayan algoritmalardır. Bu algoritmalar, sistemdeki tüm düğümlerin ortak bir karar almasını ve veriye tutarlı bir şekilde erişilmesini sağlar.

Dağıtık sistemlerde, düğümler arasında iletişim gecikmeleri, ağ hataları veya düğüm arızaları olabilir. Bu durumlar, verinin tutarsız hale gelmesine yol açabilir. Consensus algoritmaları, bu tür durumlarla başa çıkmak için kullanılır.

## Temel Kavram

- **Dağıtık Sistemler**: Birden fazla bilgisayarın, birbirleriyle iletişim kurarak bir sistemi oluşturduğu yapılar.
- **Consensus (Mutabakat)**: Dağıtık sistemlerde, tüm düğümlerin bir konuda anlaşması gerektiğinde kullanılan bir kavramdır. Her düğüm, diğer düğümlerle uyum içinde kararlar alır.

## Consensus Algoritmalarının Temel Amacı

- **Veri Tutarlılığı**: Farklı düğümlerin aynı veriye aynı anda ve tutarlı bir şekilde erişebilmesini sağlamak.
- **Hata Toleransı**: Düğümler arızalandığında veya iletişimde aksama olduğunda bile sistemin tutarlı kalmasını sağlamak.
- **Ağ Kesintileri ve Gecikmeleri**: Ağda bir kesinti veya gecikme olduğunda bile kararların alınmasını sağlamak.

## Yaygın Consensus Algoritmaları

### 1. **Paxos**

Paxos, dağıtık sistemlerde consensus sağlamak için kullanılan klasik bir algoritmadır. Amaç, birden fazla düğüm arasında tutarlı bir karar almayı sağlamaktır.

#### Temel Adımlar

- **Önerici** (Proposer): Bir değer önerir.
- **Kabul Edici** (Acceptor): Bu değeri kabul eder veya reddeder.
- **Öğrenici** (Learner): Kabul edilen değeri öğrenir.

Paxos algoritması, karmaşık olabilir ve genellikle çok sayıda ağ mesajı gerektirir. Ancak, güvenilir ve sağlamdır.

### 2. **Raft**

Raft, Paxos algoritmasından daha anlaşılır bir alternatif olarak tasarlanmıştır. Genellikle daha pratik ve uygulanabilir olduğu için, modern dağıtık sistemlerde daha yaygın kullanılır.

### Temel Adımları

- **Lider Seçimi**: İlk olarak, bir lider seçilir (leader election). Bu lider, tüm kararları koordine eder.
- **Kayıt Güncelleme**: Lider, diğer düğümlere (followers) kararlarını ve güncellemelerini iletir.
- **Çoğunluk Kararı**: Karar, çoğunluk tarafından kabul edilirse, işlem uygulanır.

Raft, daha az mesajlaşma gerektiren ve daha kolay anlaşılır bir algoritma olduğu için genellikle tercih edilir.

### 3. **Diğer Consensus Algoritmaları**

- **Zab**: Raft'a benzer şekilde, bir lider seçim algoritmasıdır, ancak daha büyük sistemlerde daha verimli olabilir.
- **Viewstamped Replication**: Raft’a benzer bir algoritmadır ve özellikle yüksek kullanılabilirlik gereksinimlerinde kullanılır.

## Consensus Algoritmalarının Kullanım Alanları

- **Dağıtık Veritabanları**: Veritabanlarında tutarlılığı sağlamak için kullanılır.
- **Blockchain Teknolojisi**: Konsensüs, blokların onaylanması ve doğrulanması için gereklidir.
- **Mikroservis Mimarileri**: Farklı servislerin ortak bir karar alması gerektiğinde, consensus algoritmaları devreye girer.
- **Hata Toleransı Gereksinimleri**: Yüksek erişilebilirlik ve hata toleransı olan sistemlerde yaygın olarak kullanılır.

## Avantajları

- **Tutarlılık**: Dağıtık sistemlerde veri tutarlılığını sağlar.
- **Yüksek Erişilebilirlik**: Düğümler arasında hata olsa bile sistemin çalışmaya devam etmesini sağlar.
- **Güvenilirlik**: Ağ hatalarına ve düğüm arızalarına karşı güvenilir bir sistem sağlar.

## Zorluklar

- **Bürokratik Olabilir**: Özellikle Paxos gibi algoritmalar çok fazla iletişim gerektirebilir.
- **Performans Sorunları**: Ağda gecikmeler olduğunda performans sorunları oluşabilir.
- **Karmaşıklık**: Özellikle büyük sistemlerde, konsensüs algoritmalarının yönetilmesi zor olabilir.
