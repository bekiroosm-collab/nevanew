<?php
declare(strict_types=1);
require_once __DIR__ . '/includes.php';
$site = site_settings();
$services = public_services();
$categories = [];
foreach ($services as $s) { $categories[$s['category']] = true; }
$wa = preg_replace('/\D+/', '', (string)($site['whatsapp'] ?? ''));
function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">
<title><?= e($site['site_title'] ?? 'Neva Web Design | Dijitalde Güçlü Bir İz Bırakın') ?></title>
<meta name="description" content="<?= e($site['meta_description'] ?? 'Markanıza özel, modern ve mobil uyumlu web siteleri. Neva Web Design ile dijitalde farkınızı gösterin.') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css?v=1.0">
</head>
<body>
<div class="scroll-progress" id="scrollProgress"></div>
<header class="site-header" id="top">
 <div class="container nav">
  <a class="brand" href="#top" aria-label="Neva Web Design ana sayfa"><span class="brand-mark"><svg viewBox="0 0 40 40" aria-hidden="true"><path d="M9 29V11h5l12 12V11h5v18h-5L14 17v12z" fill="currentColor"/><circle cx="31" cy="9" r="3" fill="#ef4444"/></svg></span><span class="brand-text">neva<span>webdesign</span></span></a>
  <nav class="main-nav" id="mainNav"><a href="#hizmetler">Hizmetler</a><a href="#projeler">Demo Tasarımlar</a><a href="#surec">Çalışma Süreci</a><a href="#hakkimizda">Hakkımızda</a></nav>
  <div class="nav-actions"><a class="nav-contact" href="#iletisim">İletişim <span>↗</span></a><button class="menu-toggle" id="menuToggle" aria-label="Menüyü aç/kapat"><i></i><i></i></button></div>
 </div>
</header>
<main>
<section class="hero section-pad">
 <div class="hero-glow glow-one"></div><div class="hero-glow glow-two"></div>
 <div class="container hero-grid">
  <div class="hero-copy reveal">
   <div class="eyebrow"><span class="eyebrow-dot"></span> STRATEJİ · TASARIM · DİJİTAL DENEYİM</div>
   <h1>Dijitalde sıradan<br>olmak zorunda <span class="gradient-text">değilsiniz.</span></h1>
   <p>Markanızı doğru anlatan, güven veren ve ziyaretçileri müşteriye dönüştürmeye odaklanan dijital deneyimler tasarlıyoruz.</p>
   <div class="hero-buttons"><a class="btn btn-primary" href="#hizmetler">Hizmetleri keşfet <span>↗</span></a><a class="btn btn-ghost" href="#projeler"><span class="play-icon">▷</span> Tasarımları incele</a></div>
   <div class="hero-proof"><div class="proof-avatars"><span>N</span><span>W</span><span>✦</span></div><div><strong>Fikrinizden yayına</strong><small>Şeffaf süreç, size özel çözüm</small></div><div class="proof-divider"></div><div class="proof-check">✓</div><div><strong>Mobil öncelikli</strong><small>Tüm ekranlara uyumlu</small></div></div>
  </div>
  <div class="hero-visual reveal reveal-delay">
   <div class="visual-orbit orbit-a"></div><div class="visual-orbit orbit-b"></div>
   <div class="floating-tag tag-top"><span class="tag-icon purple">✦</span><span><b>Özgün tasarım</b><small>Markanıza özel</small></span></div>
   <div class="browser-card">
    <div class="browser-top"><div class="browser-dots"><i></i><i></i><i></i></div><div class="browser-url"><span>✦</span> markaniz.com</div><span class="browser-menu">•••</span></div>
    <div class="browser-content"><div class="mock-nav"><b><span class="mini-logo">N.</span> YOUR BRAND</b><div>HİZMETLER　 HAKKIMIZDA　 İLETİŞİM</div></div><div class="mock-main"><div><span class="mock-label">YENİ BİR DENEYİM</span><h3>Farkınızı<br><em>gösterin.</em></h3><p>Güçlü markalar için yeni nesil dijital tasarım.</p><span class="mock-cta">KEŞFET <b>↗</b></span></div><div class="mock-art"><div class="art-ring"></div><div class="art-square"></div><div class="art-ball"></div><div class="art-star">✳</div></div></div><div class="mock-stats"><div><b>01</b><span>Strateji</span></div><div><b>02</b><span>Tasarım</span></div><div><b>03</b><span>Geliştirme</span></div></div></div>
   </div>
   <div class="floating-tag tag-bottom"><span class="tag-icon red">↗</span><span><b>Fikrinizi büyütün</b><small>Birlikte başlayalım</small></span><span class="tag-arrow">↗</span></div>
   <div class="visual-caption"><span></span> TASARIMIN GÜCÜYLE İLERİYE</div>
  </div>
 </div>
 <div class="container hero-bottom"><span>FİKRİNİZİ DİJİTALE TAŞIYIN</span><div class="bottom-line"></div><a href="#hizmetler">Aşağı kaydır <span>↓</span></a></div>
</section>
<section class="intro-strip"><div class="container strip-inner"><span class="strip-star">✳</span><p>İyi bir web sitesi yalnızca görünmez. <strong>Markanızı anlatır, güven oluşturur ve harekete geçirir.</strong></p><span class="strip-sign">NEVA / 01</span></div></section>
<section class="services section-pad" id="hizmetler"><div class="container">
 <div class="section-heading reveal"><div><span class="section-label"><i></i> NELER YAPIYORUZ?</span><h2>İhtiyacınıza göre,<br><span class="gradient-text">doğru dijital çözüm.</span></h2></div><p>İşletmenizin hedefini anlayıp sade, güçlü ve işlevsel dijital çözümler tasarlıyoruz.</p></div>
 <div class="service-grid">
 <?php
 $icons = ['web'=>'⌘','store'=>'▤','menu'=>'▦','custom'=>'✳','brand'=>'◈','support'=>'↗'];
 $fallback = [
  ['category'=>'Web Tasarım','name'=>'Kurumsal Web Sitesi','description'=>'Markanızı, hizmetlerinizi ve iletişim bilgilerinizi profesyonel bir deneyimle sunun.','price'=>'5990','icon'=>'web'],
  ['category'=>'E-Ticaret & Katalog','name'=>'Ürün / Hizmet Kataloğu','description'=>'Ürünlerinizi düzenli kategorilerde sergileyin; müşteriler size kolayca ulaşsın.','price'=>'3990','icon'=>'store'],
  ['category'=>'Restoran Çözümleri','name'=>'QR Menü & Sipariş Talebi','description'=>'Menünüzü dijitalleştirin, sipariş ve teklif taleplerini tek yerde toplayın.','price'=>'2490','icon'=>'menu'],
  ['category'=>'Özel Projeler','name'=>'Özel Web Çözümleri','description'=>'İhtiyacınıza göre geliştirilen özel sayfalar, formlar ve iş akışları.','price'=>'0','icon'=>'custom'],
  ['category'=>'Marka Tasarımı','name'=>'Dijital Marka Başlangıcı','description'=>'Dijital görünümünüz için tutarlı, modern ve profesyonel bir başlangıç.','price'=>'1990','icon'=>'brand'],
  ['category'=>'Bakım & Destek','name'=>'Web Sitesi Bakım Desteği','description'=>'Yayın sonrası güncelleme ve bakım ihtiyaçlarınızı birlikte planlayalım.','price'=>'0','icon'=>'support']
 ];
 $items = count($services) ? $services : $fallback;
 foreach ($items as $i=>$s):
  $icon = $s['icon'] ?? array_keys($icons)[$i%count($icons)];
  $price = (float)($s['price'] ?? 0);
 ?>
 <article class="service-card reveal" style="--delay:<?= (int)($i%3)*90 ?>ms">
  <div class="service-card-top"><span class="service-icon"><?= e($icons[$icon] ?? '✦') ?></span><span class="card-number">0<?= $i+1 ?></span></div>
  <div class="service-category"><?= e($s['category'] ?? 'Dijital Çözüm') ?></div><h3><?= e($s['name']) ?></h3><p><?= e($s['description'] ?? '') ?></p>
  <div class="service-card-bottom"><div class="service-price"><?= $price > 0 ? '₺'.number_format($price,0,',','.') : 'Teklif alın' ?><small><?= $price > 0 ? ' başlangıç fiyatı' : ' ihtiyaca göre' ?></small></div><button class="circle-arrow add-service" data-id="<?= (int)($s['id'] ?? 0) ?>" data-name="<?= e($s['name']) ?>" data-price="<?= $price ?>" data-desc="<?= e($s['description'] ?? '') ?>" aria-label="Hizmeti seç">↗</button></div>
 </article>
 <?php endforeach; ?>
 </div>
 <div class="service-note"><span>✦</span> Her proje farklıdır. Fiyatlar başlangıç teklifidir; kapsam ve teslim süresi görüşmede netleştirilir. <a href="#iletisim">Bize danışın ↗</a></div>
</div></section>
<section class="work section-pad" id="projeler"><div class="container">
 <div class="section-heading reveal"><div><span class="section-label"><i></i> SEÇİLMİŞ DEMO TASARIMLAR</span><h2>Her markanın bir<br><span class="gradient-text">hikâyesi var.</span></h2></div><p>Sektörünüze göre nasıl bir dijital deneyim oluşturabileceğimizi örnek tasarımlarla keşfedin.</p></div>
 <div class="work-grid">
  <article class="work-card work-large reveal"><div class="work-visual work-food"><div class="work-topline"><span>DEMO / 001</span><span>RESTAURANT & FOOD</span></div><div class="food-layout"><div><span class="work-mini-label">TADINDA FARK VAR</span><h3>Good food.<br><em>Good mood.</em></h3><p>Lezzetini dijitalde anlat.</p><span class="fake-button">MENÜYÜ KEŞFET ↗</span></div><div class="food-orb"><div class="food-orb-inner">✳</div><span class="orb-caption">FRESH<br>EVERY DAY</span></div></div><div class="work-footer"><span>01 / 03</span><span>MENÜ · MARKA · SİPARİŞ</span></div></div><div class="work-meta"><div><h3>Restoran & Kafe</h3><p>Dijital menü, ürün vitrini ve sipariş talebi.</p></div><span class="work-arrow">↗</span></div></article>
  <article class="work-card reveal"><div class="work-visual work-beauty"><div class="work-topline"><span>DEMO / 002</span><span>BEAUTY & CARE</span></div><div class="beauty-layout"><span class="beauty-kicker">YOUR MOMENT</span><h3>Güzellik,<br><em>detaylarda.</em></h3><div class="beauty-circle">✧</div><span class="beauty-bottom">CARE · CONFIDENCE · YOU</span></div><div class="work-footer"><span>02 / 03</span><span>HİZMET · RANDEVU</span></div></div><div class="work-meta"><div><h3>Güzellik & Bakım</h3><p>Hizmet listesi ve randevu talebi.</p></div><span class="work-arrow">↗</span></div></article>
  <article class="work-card reveal"><div class="work-visual work-property"><div class="work-topline"><span>DEMO / 003</span><span>PROPERTY & LIVING</span></div><div class="property-layout"><span class="property-kicker">SPACE TO LIVE</span><h3>Yeni bir<br><em>başlangıç.</em></h3><div class="property-shapes"><div></div><div></div><div></div></div><span class="property-bottom">FIND YOUR PLACE</span></div><div class="work-footer"><span>03 / 03</span><span>VİTRİN · İLETİŞİM</span></div></div><div class="work-meta"><div><h3>Emlak & Danışmanlık</h3><p>Hizmet vitrini ve hızlı iletişim.</p></div><span class="work-arrow">↗</span></div></article>
 </div><p class="demo-disclaimer">Bu bölümdeki çalışmalar konsept demo örnekleridir; gerçek müşteri işi veya referans olarak sunulmaz.</p>
</div></section>
<section class="why section-pad" id="hakkimizda"><div class="container why-grid"><div class="why-art reveal"><div class="why-backdrop"></div><div class="why-card"><span class="why-overline">NEVA APPROACH / 01</span><div class="why-symbol">N<span>.</span></div><div class="why-rule"></div><p>Net fikir.<br>Güçlü tasarım.<br><em>Doğru deneyim.</em></p><div class="why-bottom"><span>STRATEGY × DESIGN</span><span>✳</span></div></div><div class="why-orbit"></div><span class="why-floating">LESS NOISE.<br>MORE MEANING.</span></div>
 <div class="why-copy reveal"><span class="section-label"><i></i> NEVA YAKLAŞIMI</span><h2>Güzel görünmek<br>başlangıç. <span class="gradient-text">İşe yaramak</span><br>asıl hedef.</h2><p>Her işletmenin ihtiyacı farklı. Bu yüzden hazır kalıplara sıkışmak yerine hedefinizi, müşterinizi ve sunmak istediğiniz değeri merkeze alıyoruz.</p><div class="why-points"><div><span>01</span><div><b>Önce sizi dinliyoruz</b><small>İhtiyaç, hedef ve kapsamı birlikte netleştiriyoruz.</small></div></div><div><span>02</span><div><b>Detayları sadeleştiriyoruz</b><small>Gereksiz karmaşa olmadan, kullanıcıyı yönlendiren tasarım.</small></div></div><div><span>03</span><div><b>Süreç boyunca iletişimdeyiz</b><small>Beklentiler, revizyonlar ve teslim adımları açıkça belirlenir.</small></div></div></div></div>
 </div></section>
<section class="process section-pad" id="surec"><div class="container"><div class="section-heading reveal"><div><span class="section-label"><i></i> NASIL ÇALIŞIYORUZ?</span><h2>Fikirden yayına,<br><span class="gradient-text">adım adım.</span></h2></div><p>Ne yapacağımızı, ne zaman teslim edeceğimizi ve projenin kapsamını en başta netleştiriyoruz.</p></div><div class="process-grid">
<div class="process-step reveal"><span class="process-num">01</span><div class="process-icon">⌕</div><h3>Keşif</h3><p>İşletmenizi ve hedefinizi anlıyoruz.</p><span class="process-line"></span></div>
<div class="process-step reveal"><span class="process-num">02</span><div class="process-icon">✳</div><h3>Planlama</h3><p>Kapsam, fiyat ve teslim takvimini netleştiriyoruz.</p><span class="process-line"></span></div>
<div class="process-step reveal"><span class="process-num">03</span><div class="process-icon">◈</div><h3>Tasarım & Geliştirme</h3><p>Kararlaştırılan yapıyı markanıza göre hazırlıyoruz.</p><span class="process-line"></span></div>
<div class="process-step reveal"><span class="process-num">04</span><div class="process-icon">↗</div><h3>Kontrol & Yayın</h3><p>Son kontrolleri yapıp teslim sürecini tamamlıyoruz.</p><span class="process-line"></span></div>
</div></div></section>
<section class="faq section-pad"><div class="container faq-grid"><div class="faq-intro reveal"><span class="section-label"><i></i> MERAK EDİLENLER</span><h2>Aklınızdaki<br>sorulara <span class="gradient-text">yanıt.</span></h2><p>Başlamadan önce bilmeniz gerekenler.</p><a class="text-link" href="#iletisim">Başka bir sorunuz mu var? <span>↗</span></a></div><div class="faq-list reveal">
<details><summary>Online ödeme yapmak zorunda mıyım?<span>+</span></summary><p>Hayır. Siteden ücretsiz bir sipariş/proje talebi gönderebilirsiniz. Talebiniz incelendikten sonra kapsam, fiyat, teslim süresi ve ödeme yöntemi karşılıklı olarak netleştirilir.</p></details>
<details><summary>Alan adı ve hosting fiyata dahil mi?<span>+</span></summary><p>Alan adı, hosting ve ücretli üçüncü taraf servislerin bedelleri teklif sırasında ayrıca belirtilir. Böylece proje başlamadan önce toplam maliyeti bilirsiniz.</p></details>
<details><summary>Web sitem telefonlarda düzgün çalışır mı?<span>+</span></summary><p>Tasarım mobil, tablet ve masaüstü ekranlara uyum gözetilerek hazırlanır. Yayına almadan önce temel ekran ve form kontrolleri yapılır.</p></details>
<details><summary>Site ne kadar sürede hazırlanır?<span>+</span></summary><p>Süre; sayfa sayısı, içeriklerin hazır olma durumu ve özel işlevlere göre değişir. Kesin teslim takvimi proje kapsamıyla birlikte yazılı olarak belirlenir.</p></details>
<details><summary>Yayınlandıktan sonra değişiklik yapabilir miyim?<span>+</span></summary><p>Proje kapsamındaki revizyonlar teklif içinde belirtilir. Sonraki bakım ve içerik güncellemeleri için ayrıca destek planlanabilir.</p></details>
</div></div></section>
<section class="contact section-pad" id="iletisim"><div class="container contact-grid"><div class="contact-copy reveal"><span class="section-label"><i></i> BİRLİKTE BAŞLAYALIM</span><h2>Bir fikriniz mi var?<br><span class="gradient-text">Konuşalım.</span></h2><p>İhtiyacınızı anlatın. Size uygun hizmeti ve sonraki adımları birlikte belirleyelim.</p><div class="contact-promise"><span>✳</span><div><b>İlk talep ücretsiz.</b><small>Formu doldurmak satın alma veya ödeme yükümlülüğü oluşturmaz.</small></div></div><div class="contact-mini"><span class="contact-mini-icon">↗</span><div><small>DOĞRUDAN İLETİŞİM</small><b>WhatsApp üzerinden görüşelim</b></div><a id="whatsappLink" href="<?= $wa ? 'https://wa.me/'.e($wa) : '#' ?>" target="_blank" rel="noopener">Mesaj gönder ↗</a></div></div>
<form class="contact-form reveal" id="leadForm"><div class="form-heading"><span>PROJE TALEBİ / 01</span><b>Projenizden bahsedin.</b><small>Yıldızlı alanlar zorunludur.</small></div><div class="form-row"><label>Adınız soyadınız *<input name="name" required placeholder="Ad Soyad" maxlength="120"></label><label>Telefon / WhatsApp *<input name="phone" required placeholder="05xx xxx xx xx" maxlength="40"></label></div><div class="form-row"><label>E-posta (isteğe bağlı)<input name="email" type="email" placeholder="ornek@mail.com" maxlength="180"></label><label>İlgilendiğiniz hizmet *<select name="service" required><option value="">Bir hizmet seçin</option><?php foreach ($items as $s): ?><option><?= e($s['name']) ?></option><?php endforeach; ?><option>Henüz karar vermedim</option></select></label></div><label>Projenizi kısaca anlatın<textarea name="details" rows="4" maxlength="3000" placeholder="İşletmeniz, ihtiyaçlarınız ve aklınızdaki fikir..."></textarea></label><label class="consent"><input type="checkbox" name="consent" required><span>Talebimin yanıtlanması için bilgilerimin kullanılmasını kabul ediyorum. <a href="privacy.php" target="_blank">Gizlilik açıklaması</a></span></label><button class="btn btn-primary submit-btn" type="submit">Ücretsiz talep gönder <span>↗</span></button><p class="form-status" id="formStatus" aria-live="polite"></p><small class="form-foot">Bu form ödeme almaz ve otomatik satın alma oluşturmaz.</small></form></div></section>
</main>
<footer class="site-footer"><div class="container footer-main"><a class="brand footer-brand" href="#top"><span class="brand-mark"><svg viewBox="0 0 40 40"><path d="M9 29V11h5l12 12V11h5v18h-5L14 17v12z" fill="currentColor"/><circle cx="31" cy="9" r="3" fill="#ef4444"/></svg></span><span class="brand-text">neva<span>webdesign</span></span></a><p>Markanız için daha iyi bir dijital deneyim.</p><div class="footer-links"><a href="#hizmetler">Hizmetler</a><a href="#projeler">Demolar</a><a href="privacy.php">Gizlilik</a><a href="admin.php">Yönetim</a></div></div><div class="container footer-bottom"><span>© <?= date('Y') ?> Neva Web Design. Tüm hakları saklıdır.</span><span>DESIGNED WITH INTENT <b>✳</b></span></div></footer>
<button class="cart-fab" id="cartFab" aria-label="Sepeti aç"><span>▤</span><b>Seçtiklerim</b><em id="cartCount">0</em></button>
<div class="cart-overlay" id="cartOverlay"></div><aside class="cart-drawer" id="cartDrawer" aria-label="Hizmet sepeti"><div class="cart-head"><div><span class="section-label">NEVA / SEÇİMLERİNİZ</span><h3>Hizmet sepeti</h3></div><button id="closeCart" class="cart-close" aria-label="Sepeti kapat">×</button></div><div id="cartItems" class="cart-items"><div class="cart-empty"><span>✳</span><b>Henüz bir hizmet seçmediniz.</b><p>Hizmet kartlarından + butonuna basarak başlayın.</p></div></div><div class="cart-bottom"><div class="cart-total"><span>Başlangıç toplamı</span><b id="cartTotal">₺0</b></div><small>Özel teklif gerektiren işler toplam tutara dahil değildir. Bu bir satın alma/ödeme işlemi değildir.</small><button class="btn btn-primary" id="cartCheckout">Talep formuna geç <span>↗</span></button></div></aside>
<div class="toast" id="toast" role="status" aria-live="polite"></div>
<script>window.NEVA_CONFIG={whatsapp:<?= json_encode($wa, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>,csrf:<?= json_encode(csrf_token()) ?>};</script>
<script src="assets/app.js?v=1.0"></script>
</body></html>