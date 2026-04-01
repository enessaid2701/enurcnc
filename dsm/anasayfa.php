<?php
use Verot\Upload\upload;
define("GUVENLIK",true);?>
<?php
include("system/settings.php");
include("system/functions.php");
oturumkontrolana();
?>
<?php
if(isset($_GET['cikis'])){
  session_destroy();
  header("Location:anasayfa.html");
}
$base = $ayar["website_link"];
$baseOdeme = $ayar["website_link"]."/pay";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?=$ayar['firma_adi']; ?> - Yönetim Paneli</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
  <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- Date Picker -->
  <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck for checkboxes and radio inputs -->
  <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
  <!-- fileUploads -->
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-fileupload.min.css" />
  <!-- DATA TABLES -->
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="dist/js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="dist/js/iCheck/skins/square/green.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="dist/jquery.tagsinput.css" />
  <link rel="stylesheet" type="text/css" href="dist/jquery-ui.css" />
  <!-- Javascript -->
  <link rel="stylesheet" href="assets/css/supersized.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="assets/js/jquery-1.8.2.min.js"></script>
  <script src="assets/js/supersized.3.2.7.min.js"></script>
  <script src="assets/js/supersized-init.js"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
        <style>
        .seo_desc {
          max-height: 150px;
          max-width: 100%;
          min-height: 150px;
          min-width: 100%;
        }

      </style>
    </head>
    
    <body class="layout-wide skin-green fixed">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="anasayfa.html" class="logo"><b>Dijital SEO Medya</b></a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                  <a href="site-ayar.html" class="dropdown-toggle">
                    <i class="fa fa-cog"></i>
                  </a>
                </li>
                <li class="dropdown notifications-menu">
                  <a href="?cikis=1" class="dropdown-toggle">
                    <i class="fa fa-sign-out"></i>
                    <span class="label label-danger">Çıkış</span>
                  </a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a target="_blank" href="../" class="dropdown-toggle">
                    <i class="fa fa-hand-o-right"></i>
                    <span class="hidden-xs">Site Önizleme</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            error_reporting(0);
            $sayfa=isset($_GET['sayfa']) ? addslashes($_GET['sayfa']) : "";

            if($sayfa=="site-ayar"){
              $siteayar='active';

            }else if($sayfa=="dil-ekle"){
              $dilekle='active';
            }else if($sayfa=="dil-listele"){
              $dillistele='active';

            }else if($sayfa=="yonetici-ekle"){
              $yoneticiekle='active';
            }else if($sayfa=="yonetici-listele"){
              $yoneticilistele='active';

            }
            else if($sayfa=="slider-ekle"){
              $sliderekle='active';
            }
            else if($sayfa=="slider-listele"){
              $sliderlistele='active';
            }
            else if($sayfa=="firma-ekle"){
              $firmaekle='active';
            }
            else if($sayfa=="firma-listele"){
              $firmalistele='active';
            }
            else if($sayfa=="odeme-linki-olustur"){
              $odemelinkiolustur='active';
            }
            else if($sayfa=="odeme-takip-listele"){
              $odemetakiplistele='active';
            }
            else if($sayfa=="urun-kategori-ekle"){
              $urunkategoriekle='active';
            }else if($sayfa=="urun-kategori-listele"){
              $urunkategorilistele='active';

            }else if($sayfa=="alt-kategori-ekle"){
              $altkategoriekle='active';
            }else if($sayfa=="alt-kategori-listele"){
              $altkategorilistele='active';

            }else if($sayfa=="urun-ekle"){
              $urunekle='active';
            }else if($sayfa=="urun-listele"){
              $urunlistele='active';

            }else if($sayfa=="sektor-ekle"){
              $sektorekle='active';
            }else if($sayfa=="sektor-listele"){
              $sektorlistele='active';

            }else if($sayfa=="uygulama-alanlari-ekle"){
              $uygulamaalanlariekle='active';
            }else if($sayfa=="uygulama-alanlari-listele"){
              $uygulamaalanlarilistele='active';

            }else if($sayfa=="medya-kategori-ekle"){
              $medyakategoriekle='active';
            }else if($sayfa=="medya-kategori-listele"){
              $medyakategorilistele='active';

            }else if($sayfa=="medya-ekle"){
              $medyaekle='active';
            }else if($sayfa=="medya-listele"){
              $medyalistele='active';

            }else if($sayfa=="kurumsal-sertifika-ekle"){
              $kurumsalsertifikaekle='active';
            }else if($sayfa=="kurumsal-sertifika-listele"){
              $kurumsalsertifikalistele='active';

            }else if($sayfa=="kurumsal-katalog-ekle"){
              $kurumsalkatalogekle='active';
            }else if($sayfa=="kurumsal-katalog-listele"){
              $kurumsalkataloglistele='active';

            }else if($sayfa=="kurumsal-sayfa-ekle"){
              $kurumsalsayfaekle='active';
            }else if($sayfa=="kurumsal-sayfa-listele"){
              $kurumsalsayfalistele='active';

            }else if($sayfa=="referans-ekle"){
              $referansekle='active';
            }else if($sayfa=="referans-listele"){
              $referanslistele='active';

             }else if($sayfa=="kurumsal-katalog-ekle"){
              $kurumsalkatalogekle='active';
            }else if($sayfa=="kurumsal-katalog-listele"){
              $kurumsalkataloglistele='active';

            }else if($sayfa=="kurumsal-video-ekle"){
              $kurumsalvideoekle='active';
            }else if($sayfa=="kurumsal-video-listele"){
              $kurumsalvideolistele='active';

            }else if($sayfa=="anasayfa"){
              $anasayfa='class="aktif"';
            }else{
              $anasayfa='class="aktif"';
            } ?>
            <ul class="sidebar-menu" style="overflow-y: auto!important;">
              <div class="user-panel">
                <div class="pull-left info">
                  <p><?=$ayar['firma_adi']; ?></p>
                  <a href="yonetici-listele.html"><i class="fa fa-circle text-success"></i> Online Durumdasınız !!! </a>
                </div>
              </div>
              <li class="header"></li>
              <?php if($_SESSION["yonetici_yetki"] == 1){ ?>
              <!--------------------------------- Anasayfa ------------------------------------------->
              <li class="treeview">
                <a href="anasayfa.html">
                  <i class="fa fa-home"></i>
                  <span>Anasayfa</span>
                </a>
              </li>
                <?php } ?>

            <?php if($_SESSION["yonetici_yetki"] == 1){ ?>
              <!--------------------------------- Banner Yönetimi ------------------------------------------->
              <li class="treeview <?php echo $sliderekle; ?> <?php echo $sliderlistele; ?>">
                <a href="#">
                  <i class="fa fa-image"></i> <span>Slider Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $sliderekle; ?>">
                    <a href="slider-ekle.html"><i class="fa fa-circle-o"></i> Slider Ekle</a>
                  </li>
                  <li class="<?php echo $sliderlistele; ?>">
                    <a href="slider-listele.html"><i class="fa fa-circle-o"></i> Slider Listesi</a>
                  </li>
                </ul>
              </li>

              <!--------------------------------- Ürün Yönetimi ------------------------------------------->
              
              <li class="treeview <?php echo $urunkategoriekle; ?> <?php echo $urunkategorilistele; ?> <?php echo $urunekle; ?> <?php echo $urunlistele; ?>">
                <a href="#">
                  <i class="fa fa-tasks"></i> <span>Ürün Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $urunkategoriekle; ?>">
                    <a href="urun-kategori-ekle.html"><i class="fa fa-circle-o"></i>Ana Kategori Ekle</a>
                  </li>
                  <li class="<?php echo $urunkategorilistele; ?>">
                    <a href="urun-kategori-listele.html"><i class="fa fa-circle-o"></i>Ana Kategori Listesi</a>
                  </li>
                  <li class="<?php echo $urunekle; ?>">
                    <a href="urun-ekle.html"><i class="fa fa-circle-o"></i>Ürün Ekle</a>
                  </li>
                  <li class="<?php echo $urunlistele; ?>">
                    <a href="urun-listele.html"><i class="fa fa-circle-o"></i>Ürün Listesi</a>
                  </li>
                </ul>
              </li>

              <!--------------------------------- Hizmet Yönetimi ------------------------------------------->

              <li class="treeview <?php echo $sektorekle; ?> <?php echo $sektorlistele; ?> ">
                <a href="#">
                  <i class="fa fa-building"></i> <span>Hizmet Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $sektorekle; ?>">
                    <a href="sektor-ekle.html"><i class="fa fa-circle-o"></i> Hizmet Ekle</a>
                  </li>
                  <li class="<?php echo $sektorlistele; ?>">
                    <a href="sektor-listele.html"><i class="fa fa-circle-o"></i> Hizmet Listesi</a>
                  </li>
                </ul>
              </li>

              <!--------------------------------- Sektör Yönetimi ------------------------------------------->

              <li class="treeview <?php echo $medyakategoriekle;?> <?php echo $medyakategorilistele;?> <?php echo $medyaekle;?> <?php echo $medyalistele;?> ">
                <a href="#">
                  <i class="fa fa-h-square"></i> <span>Sektör Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <!--<li class="<?php echo $medyakategoriekle; ?>">
                    <a href="medya-kategori-ekle.html"><i class="fa fa-circle-o"></i>Sektör Ekle</a>
                  </li>
                  <li class="<?php echo $medyakategorilistele; ?>">
                    <a href="medya-kategori-listele.html"><i class="fa fa-circle-o"></i>Kategori Listesi</a>
                  </li>-->
                  <li class="<?php echo $medyaekle; ?>">
                    <a href="medya-ekle.html"><i class="fa fa-circle-o"></i>Sektör Ekle</a>
                  </li>
                  <li class="<?php echo $medyalistele; ?>">
                    <a href="medya-listele.html"><i class="fa fa-circle-o"></i>Sektör Listesi</a>
                  </li>
                </ul>
              </li>

              <!--------------------------------- Referanslar Yönetimi -----------------------------------------

              <li class="treeview <?php echo $referansekle; ?> <?php echo $referanslistele; ?> ">
                <a href="#">
                  <i class="fa fa-bullhorn"></i> <span>Referans Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $referansekle; ?>">
                    <a href="referans-ekle.html"><i class="fa fa-circle-o"></i> Referans Ekle</a>
                  </li>
                  <li class="<?php echo $referanslistele; ?>">
                    <a href="referans-listele.html"><i class="fa fa-circle-o"></i> Referans Listesi</a>
                  </li>
                </ul>
              </li>-->

              <!--------------------------------- Kurumsal Sayfa Yönetimi ------------------------------------------->
              <li class="treeview <?php echo $kurumsalsayfaekle; ?> <?php echo $kurumsalsayfalistele; ?>">
                <a href="#">
                  <i class="fa fa-edit"></i>
                  <span>Kurumsal Sayfa Yön.</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $kurumsalsayfaekle; ?>">
                    <a href="kurumsal-sayfa-ekle.html"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                  </li>
                  <li class="<?php echo $kurumsalsayfalistele; ?>">
                    <a href="kurumsal-sayfa-listele.html"><i class="fa fa-circle-o"></i> Sayfa Listesi</a>
                  </li>
                </ul>
              </li>

              <!--------------------------------- Kurumsal Sertifika Yönetimi -----------------------------------------

              <li class="treeview <?php echo $kurumsalsertifikaekle;?> <?php echo $kurumsalsertifikalistele; ?>">
                <a href="#">
                  <i class="fa fa-file"></i> <span>Kurumsal Sertifika Yön.</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $kurumsalsertifikaekle; ?>">
                    <a href="kurumsal-sertifika-ekle.html"><i class="fa fa-circle-o"></i>Sertifika Ekle</a>
                  </li>
                  <li class="<?php echo $kurumsalsertifikalistele; ?>">
                    <a href="kurumsal-sertifika-listele.html"><i class="fa fa-circle-o"></i>Sertifika Listesi</a>
                  </li>
                </ul>
              </li>-->

              <!---------------------------------------------------------------------------->

              <li class="treeview <?php echo $siteayar; ?> <?php echo $eklenti; ?> <?php echo $yoneticiekle; ?> <?php echo $yoneticilistele; ?>">
                <a href="#">
                  <i class="fa fa-cogs"></i> <span>Site Yönetimi</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo $siteayar; ?>">
                    <a href="site-ayar.html"><i class="fa fa-circle-o"></i> Site Ayarları</a>
                  </li>
                                <!--<li class="<?php echo $eklenti; ?>">
            <a href="eklenti.html"><i class="fa fa-circle-o"></i> Eklenti Yönetimi</a>
          </li>-->
          <li class="<?php echo $yoneticiekle; ?>">
            <a href="yonetici-ekle.html"><i class="fa fa-circle-o"></i> Yeni Yönetici Ekleme</a>
          </li>
          <li class="<?php echo $yoneticilistele; ?>">
            <a href="yonetici-listele.html"><i class="fa fa-circle-o"></i> Yönetici Listesi</a>
          </li>
        </ul>
      </li>
      <!---------------------------------------------------------------------------->
      <?php } ?>
      <li>
        <a href="?cikis=1">
          <i class="fa fa-sign-out"></i> <span>Oturumu Kapat</span>
        </a>
      </li>
      <!---------------------------------------------------------------------------->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<?php 
if(isset($_GET['sayfa'])){
  $s = $_GET['sayfa'];
  switch($s){

    case 'anasayfa';
    require_once("sayfalar/home.php");
    break;

    case 'kurumsal-sayfa-ekle';
    require_once("sayfalar/kurumsal_sayfa_ekle.php");
    break;
    case 'kurumsal-sayfa-listele';
    require_once("sayfalar/kurumsal_sayfa_listele.php");
    break;

    // case 'kurumsal-video-ekle';
    // require_once("sayfalar/kurumsal_video_ekle.php");
    // break;
    // case 'kurumsal-video-listele';
    // require_once("sayfalar/kurumsal_video_listele.php");
    // break;

    case 'kurumsal-sertifika-ekle';
    require_once("sayfalar/kurumsal_sertifika_ekle.php");
    break;
    case 'kurumsal-sertifika-listele';
    require_once("sayfalar/kurumsal_sertifika_listele.php");
    break;

    // case 'kurumsal-katalog-ekle';
    // require_once("sayfalar/kurumsal_katalog_ekle.php");
    // break;
    // case 'kurumsal-katalog-listele';
    // require_once("sayfalar/kurumsal_katalog_listele.php");
    // break;

    // case 'dil-ekle';
    // require_once("sayfalar/dil_ekle.php");
    // break;
    // case 'dil-listele';
    // require_once("sayfalar/dil_listele.php");
    // break;

    case 'sektor-ekle';
    require_once("sayfalar/sektor_ekle.php");
    break;
    case 'sektor-listele';
    require_once("sayfalar/sektor_listele.php");
    break;

    case 'urun-kategori-ekle';
    require_once("sayfalar/urun_kategori_ekle.php");
    break;
    case 'urun-kategori-listele';
    require_once("sayfalar/urun_kategori_listele.php");
    break;

    // case 'alt-kategori-ekle';
    // require_once("sayfalar/alt_kategori_ekle.php");
    // break;
    // case 'alt-kategori-listele';
    // require_once("sayfalar/alt_kategori_listele.php");
    // break;

    case 'urun-ekle';
    require_once("sayfalar/urun_ekle.php");
    break;
    case 'urun-listele';
    require_once("sayfalar/urun_listele.php");
    break;

    case 'medya-kategori-ekle';
    require_once("sayfalar/medya_kategori_ekle.php");
    break;
    case 'medya-kategori-listele';
    require_once("sayfalar/medya_kategori_listele.php");
    break;

    case 'medya-ekle';
    require_once("sayfalar/medya_ekle.php");
    break;
    case 'medya-listele';
    require_once("sayfalar/medya_listele.php");
    break;

    case 'slider-ekle';
    require_once("sayfalar/slider_ekle.php");
    break;

    case 'slider-listele';
    require_once("sayfalar/slider_listele.php");
    break;

    // case 'firma-ekle';
    // require_once("sayfalar/firma_ekle.php");
    // break;

    // case 'firma-listele';
    // require_once("sayfalar/firma_listele.php");
    // break;

    // case 'odeme-linki-olustur';
    // require_once("sayfalar/odeme_linki_olustur.php");
    // break;

    // case 'odeme-takip-listele';
    // require_once("sayfalar/odeme_takip_listele.php");
    // break;

    // case 'sertifika-ekle';
    // require_once("sayfalar/sertifika_ekle.php");
    // break;
    // case 'sertifika-listele';
    // require_once("sayfalar/sertifika_listele.php");
    // break;

    case 'referans-ekle';
    require_once("sayfalar/referans_ekle.php");
    break;
    case 'referans-listele';
    require_once("sayfalar/referans_listele.php");
    break;

    case 'site-ayar';
    require_once("sayfalar/site_ayar.php");
    break;

    case 'yonetici-ekle';
    require_once("sayfalar/yonetici_ekle.php");
    break;

    case 'yonetici-listele';
    require_once("sayfalar/yonetici_listele.php");
    break;

    // case 'hizmet-ekle';
    // require_once("sayfalar/hizmet_ekle.php");
    // break;

    // case 'hizmet-listele';
    // require_once("sayfalar/hizmet_listele.php");
    // break;

    default:
    require_once("sayfalar/home.php");
  }
}else{
  require_once("sayfalar/home.php");
}
?>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; <?=date('Y');?> - <a href="https://www.dijitalseomedya.com" target="_blank">Dijital SEO Medya</a></strong> Tüm Yazılım ve Tasarım Hakları Gizlidir. İzin Kullanılamaz.
  <div class="float-right">
    <b>Version</b> 21.10.04 - AB.OC - DSM
  </div>
</footer>
</div><!-- ./wrapper -->
<!--file upload-->
<script type="text/javascript" src="dist/js/bootstrap-fileupload.min.js"></script>
<!--icheck -->
<script src="dist/js/iCheck/jquery.icheck.js"></script>
<script src="dist/js/icheck-init.js"></script>

<script src="dist/js/summernote.js"></script>
<script>
  var isEmpty = $('.summernote')
  .summernote('isEmpty');
  $('#summernote')
  .summernote({
                    height: 300, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: true // set focus to editable area after initializing summernote
                  });

                </script>
                <script type="text/javascript" src="dist/jquery.tagsinput.js"></script>
                <script type='text/javascript' src='dist/jquery-ui.min.js'></script>
                <script type="text/javascript">
                  function onAddTag(tag) {
                    alert("Özellik Ekle: " + tag);
                  }

                  function onRemoveTag(tag) {
                    alert("Özelliği Kaldır: " + tag);
                  }

                  function onChangeTag(input, tag) {
                    alert("Özelliği Değiştir: " + tag);
                  }
                  $(function () {
                    $('#tags_3')
                    .tagsInput({
                      width: 'auto'
                      , height: 150
                      , autocomplete_url: 'test/fake_json_endpoint.html'
                    });
                  });

                </script>
                <script>
                  function PopupCenter(url, title) {
                var w = 1000; //pencere genislik
                var h = 500; //pencere yukseklik
                /*sayfaya ortala*/
                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
                var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
                var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
                var left = ((width / 2) - (w / 2)) + dualScreenLeft;
                var top = ((height / 2) - (h / 2)) + dualScreenTop;
                /*--------------*/
                window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
              }

            </script>

          </body>

          </html>
