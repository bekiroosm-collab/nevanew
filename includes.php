<?php
declare(strict_types=1);
session_start();
define('NEVA_DB', __DIR__ . '/data/neva.sqlite');
function db(): PDO {
 static $pdo = null;
 if ($pdo instanceof PDO) return $pdo;
 if (!is_dir(__DIR__.'/data')) @mkdir(__DIR__.'/data',0750,true);
 $pdo = new PDO('sqlite:'.NEVA_DB, null, null, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
 $pdo->exec('PRAGMA foreign_keys=ON');
 $pdo->exec('CREATE TABLE IF NOT EXISTS settings (key TEXT PRIMARY KEY, value TEXT NOT NULL)');
 $pdo->exec('CREATE TABLE IF NOT EXISTS admins (id INTEGER PRIMARY KEY AUTOINCREMENT, username TEXT NOT NULL UNIQUE, password_hash TEXT NOT NULL, created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP)');
 $pdo->exec('CREATE TABLE IF NOT EXISTS services (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, category TEXT NOT NULL DEFAULT "Web Tasarım", description TEXT NOT NULL DEFAULT "", price REAL NOT NULL DEFAULT 0, icon TEXT NOT NULL DEFAULT "web", active INTEGER NOT NULL DEFAULT 1, sort_order INTEGER NOT NULL DEFAULT 0, created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP)');
 $pdo->exec('CREATE TABLE IF NOT EXISTS orders (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, phone TEXT NOT NULL, email TEXT NOT NULL DEFAULT "", service TEXT NOT NULL, details TEXT NOT NULL DEFAULT "", status TEXT NOT NULL DEFAULT "Yeni", source TEXT NOT NULL DEFAULT "site", created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP)');
 $count=(int)$pdo->query('SELECT COUNT(*) FROM settings')->fetchColumn();
 if ($count===0) {
  $seed=['site_title'=>'Neva Web Design | Dijitalde Güçlü Bir İz Bırakın','meta_description'=>'Markanıza özel, modern ve mobil uyumlu web siteleri.','whatsapp'=>'','business_email'=>'','currency'=>'TRY'];
  $stmt=$pdo->prepare('INSERT OR IGNORE INTO settings(key,value) VALUES(?,?)');
  foreach($seed as $k=>$v)$stmt->execute([$k,$v]);
 }
 $count=(int)$pdo->query('SELECT COUNT(*) FROM services')->fetchColumn();
 if($count===0){
  $seed=[
   ['Kurumsal Web Sitesi','Web Tasarım','Markanızı, hizmetlerinizi ve iletişim bilgilerinizi profesyonel bir deneyimle sunun.',5990,'web',1],
   ['Ürün / Hizmet Kataloğu','E-Ticaret & Katalog','Ürünlerinizi düzenli kategorilerde sergileyin; müşteriler size kolayca ulaşsın.',3990,'store',2],
   ['QR Menü & Sipariş Talebi','Restoran Çözümleri','Menünüzü dijitalleştirin, sipariş ve teklif taleplerini tek yerde toplayın.',2490,'menu',3],
   ['Özel Web Çözümleri','Özel Projeler','İhtiyacınıza göre geliştirilen özel sayfalar, formlar ve iş akışları.',0,'custom',4],
   ['Dijital Marka Başlangıcı','Marka Tasarımı','Dijital görünümünüz için tutarlı, modern ve profesyonel bir başlangıç.',1990,'brand',5],
   ['Web Sitesi Bakım Desteği','Bakım & Destek','Yayın sonrası güncelleme ve bakım ihtiyaçlarınızı birlikte planlayalım.',0,'support',6]
  ];
  $stmt=$pdo->prepare('INSERT INTO services(name,category,description,price,icon,sort_order) VALUES(?,?,?,?,?,?)');
  foreach($seed as $s)$stmt->execute($s);
 }
 return $pdo;
}
function site_settings(): array { $out=[]; foreach(db()->query('SELECT key,value FROM settings') as $r)$out[$r['key']]=$r['value']; return $out; }
function public_services(): array { return db()->query('SELECT * FROM services WHERE active=1 ORDER BY sort_order ASC,id ASC')->fetchAll(); }
function csrf_token(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function csrf_check(): void { $v=$_POST['csrf']??$_SERVER['HTTP_X_CSRF_TOKEN']??''; if(!is_string($v)||!hash_equals(csrf_token(),$v)){http_response_code(419);header('Content-Type: application/json; charset=utf-8');echo json_encode(['ok'=>false,'message'=>'Güvenlik doğrulaması başarısız. Sayfayı yenileyip tekrar deneyin.']);exit;} }
function json_out(array $data,int $status=200): never { http_response_code($status);header('Content-Type: application/json; charset=utf-8');header('Cache-Control: no-store');echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);exit; }
function admin_logged_in(): bool { return !empty($_SESSION['admin_id']); }
function require_admin(): void { if(!admin_logged_in()){header('Location: admin.php');exit;} }
function e($v): string { return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8'); }
db();
