<?php
declare(strict_types=1);
require_once __DIR__.'/includes.php';
if($_SERVER['REQUEST_METHOD']!=='POST') json_out(['ok'=>false,'message'=>'Yalnızca POST kabul edilir.'],405);
csrf_check();
$action=(string)($_POST['action']??'');
if($action==='lead'){
 // lightweight honeypot and rate limit
 if(!empty($_POST['website'])) json_out(['ok'=>true,'message'=>'Talebiniz alındı.']);
 $last=(int)($_SESSION['last_lead']??0);
 if(time()-$last<20) json_out(['ok'=>false,'message'=>'Yeni bir talep göndermeden önce biraz bekleyin.'],429);
 $name=trim((string)($_POST['name']??'')); $phone=trim((string)($_POST['phone']??'')); $email=trim((string)($_POST['email']??'')); $service=trim((string)($_POST['service']??'')); $details=trim((string)($_POST['details']??''));
 if(mb_strlen($name)>120||mb_strlen($phone)>40||mb_strlen($email)>180||mb_strlen($service)>180||mb_strlen($details)>3000) json_out(['ok'=>false,'message'=>'Bir alanın uzunluğu izin verilen sınırı aşıyor.'],422);
 if($name===''||$phone===''||$service==='') json_out(['ok'=>false,'message'=>'Lütfen zorunlu alanları doldurun.'],422);
 if($email!==''&&!filter_var($email,FILTER_VALIDATE_EMAIL)) json_out(['ok'=>false,'message'=>'E-posta adresini kontrol edin.'],422);
 $stmt=db()->prepare('INSERT INTO orders(name,phone,email,service,details,source) VALUES(?,?,?,?,?,?)');
 $stmt->execute([$name,$phone,$email,$service,$details,'site']);
 $_SESSION['last_lead']=time();
 json_out(['ok'=>true,'message'=>'Talebiniz alındı. En kısa sürede sizinle iletişime geçeceğiz.','order_id'=>(int)db()->lastInsertId()]);
}
json_out(['ok'=>false,'message'=>'Geçersiz işlem.'],400);
