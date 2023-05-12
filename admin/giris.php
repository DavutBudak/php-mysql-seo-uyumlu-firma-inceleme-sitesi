<?php
// UYE GIRISI yapılmışsa  SAYFASINA YONLENDIR
session_start();

include "admin_init.php";
if ($_SESSION["admin_login"]) {
    header("Location:index.php");
    

}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<title>Admin Giriş - Site-İsmi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="img/icons/favicon.png" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="giriscss/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="giriscss/util.css">
<link rel="stylesheet" type="text/css" href="giriscss/main.css">
<script src="https://kit.fontawesome.com/1d31c2c74b.js" crossorigin="anonymous"></script>

<meta name="robots" content="noindex, follow">
</head>

    
   <?php
             if ($_POST) {
                 $admin_kullaniciadi = htmlspecialchars(addslashes(strip_tags(trim($_POST["admin_kullaniciadi"]))));
                 $admin_sifre = htmlspecialchars(addslashes(strip_tags(trim($_POST["admin_sifre"]))));
                 if (!$admin_kullaniciadi || !$admin_sifre) {
                    echo '<p>Lütfen kullanıcı adı ve sifre alanını doldurunuz.</p>';
                } else {
                    $admin_uye_varmi = $db->prepare("SELECT * FROM firma_admin WHERE BINARY admin_kadi = ? AND BINARY  admin_sifre = ?");
                    $admin_uye_varmi->execute(array($admin_kullaniciadi, $admin_sifre));
                    if ($admin_uye_varmi->rowCount() > 0) {
                        $admin_uye = $admin_uye_varmi->fetch(PDO::FETCH_OBJ);
                        $_SESSION["admin_login"] = true;
                        $_SESSION["admin_uye"] = $admin_uye->admin_kadi;
                        $_SESSION["admin_id"] = $admin_uye->admin_id;
    
                        // İP ADRESİ İÇİN 

$ip = $_SERVER['REMOTE_ADDR'];

$ch = curl_init('http://ip-api.com/json/'.$ip.'?lang=en');                                                                     
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json'                                                                                
));
$result = curl_exec($ch);

$data = json_decode($result);
 


$file = @fopen("ipkayit.txt", "a");
$text = "Tarih: ".date('Y-m-d- H:i:s')." - IPAdresi: ".$ip." - Ülke: ".$data->country." - ÜlkeKodu: ".$data->countryCode." - Şehir: ".$data->regionName." - PostaKodu: ".$data->zip." - FirmaAdı: ".$data->as."     \n";
@fwrite($file, $text);
@fclose($file);

$file = @fopen("ipkayit_yedek.txt", "a");
$text = "Tarih: ".date('Y-m-d- H:i:s')." - IPAdresi: ".$ip." - Ülke: ".$data->country." - ÜlkeKodu: ".$data->countryCode." - Şehir: ".$data->regionName." - PostaKodu: ".$data->zip." - FirmaAdı: ".$data->as."     \n";
@fwrite($file, $text);
@fclose($file);

// İP ADRESİ İÇİN 

                        header("Refresh: 0; url=index.php");
                       
                    } else {
                        echo '<p>Lütfen kullanıcı adı ve sifrenizi doğru giriniz.</p>';
                    }
                }
            }
          
          ?>

<div class="limiter">
<div class="container-login100" style="background-image: url('assets/giriscss/img-01.jpg');">
<div class="wrap-login100 p-t-190 p-b-30">
<form class="login100-form validate-form" method="POST" action="">
<div class="login100-form-avatar">
<img src="giriscss/avatar.jpg" alt="AVATAR">
</div>
<span class="login100-form-title p-t-20 p-b-45">
<b>ADMİN</b>
</span>
<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
<input class="input100" type="text" name="admin_kullaniciadi" placeholder="Kullanıcı Adı">
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-user"></i>
</span>
</div>
<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
<input class="input100" type="password" name="admin_sifre" placeholder="Şifre">
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock"></i>
</span>
</div>
<div class="container-login100-form-btn p-t-10">
<button class="login100-form-btn">
Giriş Yap
</button>
</div>
</form>
<footer style="margin-top:30px;">
    <div> <p style="text-align:center; color:white;"> <b> COPYRIGHT &copy; - 2023 </b></p> </div>
</footer>
</div>
</div>
</div>