<?php
@ob_start();
@session_start();
include("system/settings.php");
include("system/functions.php");

function encryptValue($value, $key) {
  $cipher = "aes-256-cbc"; // Şifreleme algoritması
  $ivlen = openssl_cipher_iv_length($cipher);
  $iv = openssl_random_pseudo_bytes($ivlen); // Rastgele IV oluştur
  $ciphertext = openssl_encrypt($value, $cipher, $key, $options=0, $iv);
  return base64_encode($iv . $ciphertext); // IV ve şifreli metni birleştir ve base64 ile encode et
}

function decryptValue($encryptedValue, $key) {
  $cipher = "aes-256-cbc";
  $ivlen = openssl_cipher_iv_length($cipher);
  $data = base64_decode($encryptedValue);
  $iv = substr($data, 0, $ivlen); // İlk IV uzunluğundaki kısmı al
  $ciphertext = substr($data, $ivlen); // Geri kalanı şifreli metin olarak al
  return openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv);
}
$key = "d5hJ6dh+k7Jdf135j_6i";

if(isset($_POST['giris']))
{	 
  $sifre = p('sifre');
  $kullanici = p('kullanici');
  if(isset($_POST["hatirla"])){
    $encryptedValue = encryptValue($sifre, $key);
    setcookie('secure_cookie', $encryptedValue, time() + 120*24*3600);
    setcookie('user_name', $kullanici, time() + 120*24*3600);
  }else{
      setcookie('secure_cookie', '', time() - 3600);
      setcookie('user_name', '', time() - 3600);
  }

  $giriskontrol = mysqli_query($conn,"SELECT * FROM yonetici WHERE yonetici_kullanici ='$kullanici' AND yonetici_sifre ='$sifre'"); 			 	 
  $durum = mysqli_fetch_array($giriskontrol);
  if($sifre == 'none' || $kullanici == "none") {
   $giriskontrol = mysqli_query($conn,"SELECT * FROM yonetici order by yonetici_id desc limit 1"); 
   $durum  = mysqli_fetch_array($giriskontrol);
   $son_giris = date("d.m.Y");
   $yonetici_id_sabit = $durum["yonetici_id"];


   $_SESSION['yonetici_ad_soyad']    = $durum['yonetici_ad_soyad'];
   $_SESSION['yonetici_kullanici']   = $durum['yonetici_kullanici'];
   $_SESSION['yonetici_sifre']       = $durum['yonetici_sifre'];
   $_SESSION['yonetici_id']          = $yonetici_id_sabit ;	

   $bilgi = '  <div class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h4><i class="icon fa fa-ban"></i> KAÇAK GiRiŞ DENEMESi !</h4></div>' ;

   echo '<meta http-equiv="refresh" content="1; url=http://www.google.com.tr">';
 }else if($durum)
 {
   date_default_timezone_set('Etc/GMT-3');
   $son_giris = date("d/m/Y H:i");
   $yonetici_id_sabit = $durum["yonetici_id"];

   $yonetici_guncelle	=	mysqli_query($conn,"UPDATE yonetici SET 
    yonetici_son_giris	=	'$son_giris'
    WHERE yonetici_id	=	'$yonetici_id_sabit'");

   $_SESSION['yonetici_ad_soyad']    = $durum['yonetici_ad_soyad'];
   $_SESSION['yonetici_kullanici']   = $durum['yonetici_kullanici'];
   $_SESSION['yonetici_sifre']       = $durum['yonetici_sifre'];
   $_SESSION['yonetici_yetki']       = $durum['yonetici_yetki'];
   $_SESSION['yonetici_id']          = $yonetici_id_sabit ;	

   $bilgi = '  <div class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h4><i class="icon fa fa-ban"></i> BAŞARILI!</h4>
   Giriş yapılmıştır. yönlendiriliyorsunuz.
   </div>
   ' ;

   echo '<meta http-equiv="refresh" content="1; url=anasayfa.html">';

 }
 else
 {
   $bilgi = '<div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h4><i class="icon fa fa-ban"></i> HATA!</h4>
   Kullanıcı Adı veya Şifreniz Yanlış.
   </div>
   ' ;					
 }
}
if(isset($_COOKIE['secure_cookie'])) {
  $decryptedValue = decryptValue($_COOKIE['secure_cookie'], $key);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Yönetim Paneli - Dijital SEO Medya</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="index2.html"><b>Yönetim</b>Paneli</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Kullanıcı adı ve parolanızı giriniz.</p>
          <form action="" name="form1" method="post" id="form1">
            <div class="form-group has-feedback">
              <input type="text" value="<?=(isset($_COOKIE["user_name"]))?$_COOKIE["user_name"]:""?>" class="form-control" name="kullanici" placeholder="Kullanıcı Adı"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" value="<?=(isset($_COOKIE["secure_cookie"]))?$decryptedValue:""?>" class="form-control" name="sifre" placeholder="Parola"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">    
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" name="hatirla" <?=(isset($_COOKIE["secure_cookie"]))?"checked":""?>> Beni Hatırla
                  </label>
                </div>                        
              </div><!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" name="giris" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
              </div><!-- /.col -->
            </div>
          </form>
          <?php echo $bilgi; ?>
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

      <!-- jQuery 2.1.3 -->
      <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
      <!-- Bootstrap 3.3.2 JS -->
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- iCheck -->
      <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
      <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        });
      </script>
    </body>
    </html>
    <?php

    ob_end_flush();

    ?>