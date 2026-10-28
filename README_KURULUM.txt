NEVA WEB DESIGN — KURULUM VE YAYINA ALMA
========================================

PAKET İÇERİĞİ
- index.php: Premium vitrin sitesi, hizmet kataloğu, sepet ve proje talep formu
- admin.php: Yönetim paneli (ilk yönetici hesabını oluşturma, giriş, siparişler, hizmetler/fiyatlar, site ayarları, şifre değiştirme)
- api.php: Proje talep formunun sunucu tarafı kayıt API'si
- includes.php: SQLite veritabanı, başlangıç hizmetleri ve güvenlik yardımcıları
- privacy.php: Düzenlenmesi gereken örnek gizlilik açıklaması
- assets/: Tasarım, animasyonlar ve yönetim paneli JavaScript/CSS
- .htaccess: Apache dizin listeleme ve temel güvenlik kuralları

GEREKSİNİMLER
- PHP 8.1 veya üstü önerilir (PHP 8.0 bazı fonksiyonlarla uyumlu olmayabilir)
- PDO SQLite eklentisi etkin olmalı
- Apache hosting önerilir; .htaccess Apache içindir
- Siteyi HTTPS/SSL ile yayınlayın
- data/ klasörünün PHP tarafından yazılabilir olması gerekir

KURULUM
1. ZIP dosyasını bilgisayarınıza çıkarın.
2. İçindeki tüm dosya ve klasörleri hostinginizin web kök dizinine (çoğu cPanel hostingde public_html) yükleyin.
3. PHP sürümünü 8.1+ seçin ve PDO SQLite eklentisinin açık olduğundan emin olun.
4. data/ klasörünün PHP tarafından yazılabilir olduğundan emin olun. Hosting izin vermiyorsa hosting panelinden klasör izinlerini kontrol edin; gereksiz yere 777 vermeyin. Gerekirse hosting desteğinden PHP kullanıcısına yazma izni isteyin.
5. Alan adınızda HTTPS/SSL etkinleştirin.
6. Alan adınızı açın. Veritabanı ve varsayılan hizmetler ilk açılışta otomatik oluşur.
7. https://ALANADINIZ/admin.php adresini açın. İlk ziyarette yönetici hesabınızı oluşturun. En az 12 karakterlik güçlü bir şifre seçin.
8. Yönetim > Site Ayarları bölümünden WhatsApp numaranızı ülke koduyla, yalnızca rakam olacak şekilde girin. Örnek biçim: 905xxxxxxxxx. Site başlığını ve meta açıklamasını kontrol edin.
9. Yönetim > Hizmetler & Fiyatlar bölümünden hizmetleri, fiyatları ve açıklamaları güncelleyin.
10. Siteden kendinize bir test proje talebi gönderin; yönetim panelindeki Sipariş Talepleri bölümüne düştüğünü doğrulayın. Ardından test talebini silebilirsiniz.
11. privacy.php içindeki örnek gizlilik açıklamasını işletme bilgilerinize göre düzenleyin ve yayına almadan önce hukuki gereklilikleri kontrol edin.

ÖNEMLİ SINIRLAR / GERÇEK DURUM
- Bu paket gerçek bir PHP/SQLite uygulamasıdır; yalnızca görsel demo değildir. Talep formu sipariş talebini sunucudaki SQLite veritabanına kaydeder, yönetim paneli talepleri listeler.
- Sepet, seçilen hizmetleri talep formuna taşır. Bu sistem bir ödeme veya kesin satın alma işlemi yapmaz; müşteri bir proje talebi gönderir.
- Bu paket otomatik e-posta gönderimi yapmaz. Talepler admin paneline kaydolur. E-posta bildirimi istenirse SMTP yapılandırması ayrıca eklenmelidir.
- WhatsApp numarası ayarlara girilince iletişim bağlantısı çalışır. Form kayıtları doğrudan WhatsApp'a gönderilmez; güvenli şekilde veritabanına kaydedilir.
- Bu bir başlangıç sürümüdür. Otomatik fatura, online ödeme, kargo, müşteri hesabı, çoklu yönetici, gelişmiş raporlama veya dosya yükleme özellikleri dahil değildir.
- Gerçek müşteri verileri toplamadan önce gizlilik/KVKK metnini, saklama süresini, iletişim bilgilerini ve gerekli açık rıza/aydınlatma akışlarını uzman desteğiyle kontrol edin.
- Veritabanı data/neva.sqlite dosyasında tutulur. Hosting yedekleme sistemini etkinleştirin ve veritabanı dosyasını herkese açık şekilde paylaşmayın.
- Yönetim paneli adresi admin.php'dir. Güçlü şifre kullanın, siteyi HTTPS ile yayınlayın ve PHP'yi güncel tutun.
- Bu paket içinde gerçek müşteri referansı, gerçek portföy veya doğrulanmış sonuç iddiası yoktur; demo görselleri konsept örneklerdir.

SORUN GİDERME
- “could not find driver” hatası: Hostingte pdo_sqlite/sqlite3 eklentisi kapalı veya yok. Hosting desteğinden etkinleştirmesini isteyin ya da MySQL sürümüne dönüştürmek gerekir.
- “database is locked” / yazma hatası: data klasörü PHP tarafından yazılabilir değil. İzinleri hosting paneliyle düzeltin.
- Sayfa 500 hatası: PHP sürümünü kontrol edin; hosting error logunu inceleyin.
- .htaccess çalışmıyorsa: sunucu Nginx olabilir; hosting destek ekibine data/ klasörünü web erişimine kapattırın.
