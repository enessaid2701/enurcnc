<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
if(isset($_POST['firma_adi']))
{
  $seo_title    = $_POST['seo_title']; 
  $en_seo_title = $_POST['en_seo_title'];
  $de_seo_title = $_POST['de_seo_title']; 
  $ru_seo_title = $_POST['ru_seo_title'];
  $fr_seo_title = $_POST['fr_seo_title'];
  $es_seo_title = $_POST['es_seo_title'];
  $it_seo_title = $_POST['it_seo_title'];
  $ar_seo_title = $_POST['ar_seo_title'];

  $seo_descriptions    = $_POST['seo_descriptions']; 
  $en_seo_descriptions = $_POST['en_seo_descriptions'];
  $de_seo_descriptions = $_POST['de_seo_descriptions']; 
  $ru_seo_descriptions = $_POST['ru_seo_descriptions'];
  $fr_seo_descriptions = $_POST['fr_seo_descriptions'];
  $es_seo_descriptions = $_POST['es_seo_descriptions'];
  $it_seo_descriptions = $_POST['it_seo_descriptions'];
  $ar_seo_descriptions = $_POST['ar_seo_descriptions'];

  $firma_adi         = $_POST['firma_adi'];
  $en_firma_adi      = $_POST['en_firma_adi'];
  $de_firma_adi      = $_POST['de_firma_adi'];
  $ru_firma_adi      = $_POST['ru_firma_adi'];
  $fr_firma_adi      = $_POST['fr_firma_adi'];
  $es_firma_adi      = $_POST['es_firma_adi'];
  $it_firma_adi      = $_POST['it_firma_adi'];
  $ar_firma_adi      = $_POST['ar_firma_adi'];

  $firma_tanitim     = $_POST['firma_tanitim'];
  $en_firma_tanitim  = $_POST['en_firma_tanitim'];
  $de_firma_tanitim  = $_POST['de_firma_tanitim'];
  $ru_firma_tanitim  = $_POST['ru_firma_tanitim'];
  $fr_firma_tanitim  = $_POST['fr_firma_tanitim'];
  $es_firma_tanitim  = $_POST['es_firma_tanitim'];
  $it_firma_tanitim  = $_POST['it_firma_tanitim'];
  $ar_firma_tanitim  = $_POST['ar_firma_tanitim'];

  $copyright         = $_POST['copyright'];
  $en_copyright      = $_POST['en_copyright'];
  $de_copyright      = $_POST['de_copyright'];
  $ru_copyright      = $_POST['ru_copyright'];
  $fr_copyright      = $_POST['fr_copyright'];
  $es_copyright      = $_POST['es_copyright'];
  $it_copyright      = $_POST['it_copyright'];
  $ar_copyright      = $_POST['ar_copyright'];

  $firma_tel     = $_POST['firma_tel'];
  $en_firma_tel  = $_POST['en_firma_tel'];
  $de_firma_tel  = $_POST['de_firma_tel'];
  $ru_firma_tel  = $_POST['ru_firma_tel'];
  $fr_firma_tel  = $_POST['fr_firma_tel'];
  $es_firma_tel  = $_POST['es_firma_tel'];
  $it_firma_tel  = $_POST['it_firma_tel'];
  $ar_firma_tel  = $_POST['ar_firma_tel'];

  $firma_tel2     = $_POST['firma_tel2'];
  $en_firma_tel2  = $_POST['en_firma_tel2'];
  $de_firma_tel2  = $_POST['de_firma_tel2'];
  $ru_firma_tel2  = $_POST['ru_firma_tel2'];
  $fr_firma_tel2  = $_POST['fr_firma_tel2'];
  $es_firma_tel2  = $_POST['es_firma_tel2'];
  $it_firma_tel2  = $_POST['it_firma_tel2'];
  $ar_firma_tel2  = $_POST['ar_firma_tel2'];

  $firma_tel3     = $_POST['firma_tel3'];
  $en_firma_tel3  = $_POST['en_firma_tel3'];
  $de_firma_tel3  = $_POST['de_firma_tel3'];
  $ru_firma_tel3  = $_POST['ru_firma_tel3'];
  $fr_firma_tel3  = $_POST['fr_firma_tel3'];
  $es_firma_tel3  = $_POST['es_firma_tel3'];
  $it_firma_tel3  = $_POST['it_firma_tel3'];
  $ar_firma_tel3  = $_POST['ar_firma_tel3'];

  $firma_fax = $_POST['firma_fax'];

  $firma_email     = $_POST['firma_email'];
  $en_firma_email  = $_POST['en_firma_email'];
  $de_firma_email  = $_POST['de_firma_email'];
  $ru_firma_email  = $_POST['ru_firma_email'];
  $fr_firma_email  = $_POST['fr_firma_email'];
  $es_firma_email  = $_POST['es_firma_email'];
  $it_firma_email  = $_POST['it_firma_email'];
  $ar_firma_email  = $_POST['ar_firma_email'];

  $firma_email2     = $_POST['firma_email2'];
  $en_firma_email2  = $_POST['en_firma_email2'];
  $de_firma_email2  = $_POST['de_firma_email2'];
  $ru_firma_email2  = $_POST['ru_firma_email2'];
  $fr_firma_email2  = $_POST['fr_firma_email2'];
  $es_firma_email2  = $_POST['es_firma_email2'];
  $it_firma_email2  = $_POST['it_firma_email2'];
  $ar_firma_email2  = $_POST['ar_firma_email2'];

  $firma_email3     = $_POST['firma_email3'];
  $en_firma_email3  = $_POST['en_firma_email3'];
  $de_firma_email3  = $_POST['de_firma_email3'];
  $ru_firma_email3  = $_POST['ru_firma_email3'];
  $fr_firma_email3  = $_POST['fr_firma_email3'];
  $es_firma_email3  = $_POST['es_firma_email3'];
  $it_firma_email3  = $_POST['it_firma_email3'];
  $ar_firma_email3  = $_POST['ar_firma_email3'];

  $firma_adres     = $_POST['firma_adres'];
  $en_firma_adres  = $_POST['en_firma_adres'];
  $de_firma_adres  = $_POST['de_firma_adres'];
  $ru_firma_adres  = $_POST['ru_firma_adres'];
  $fr_firma_adres  = $_POST['fr_firma_adres'];
  $es_firma_adres  = $_POST['es_firma_adres'];
  $it_firma_adres  = $_POST['it_firma_adres'];
  $ar_firma_adres  = $_POST['ar_firma_adres'];

  $google_analytics     = $_POST['google_analytics'];
  $google_verification  = $_POST['google_verification'];
  $yandex_metrika       = $_POST['yandex_metrika'];
  $google_maps          = $_POST['google_maps'];

  $facebook          = $_POST['facebook'];
  $twitter           = $_POST['twitter'];
  $youtube           = $_POST['youtube'];
  $instagram         = $_POST['instagram'];
  $linkedin          = $_POST['linkedin'];

  include('class.upload.php');
  $upload = new upload($_FILES['firma_logo']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($firma_adi).'-'."logo";
    $upload->process("../uploads/logo");
    if ($upload->processed){
     $firmalogo=''.$upload->file_dst_name.'';
   }
 }
 
 $resim_bul=Sonuc(Sorgu("SELECT * FROM site_ayar WHERE id='1'"));
  $update_sql = "";
  if($firmalogo!="")
  {
      if(file_exists("../uploads/logo/".$resim_bul->firma_logo)){
          $resim_sil=unlink("../uploads/logo/".$resim_bul->firma_logo);
      }
      $gitti=$firmalogo=''.$upload->file_dst_name.'';
      $update_sql .= "firma_logo = '$firmalogo', ";
  }

 
 $ayar_duzenle_sorgu=Sorgu("UPDATE site_ayar SET 
    seo_title = '$seo_title', en_seo_title = '$en_seo_title', de_seo_title = '$de_seo_title', ru_seo_title = '$ru_seo_title',
    fr_seo_title = '$fr_seo_title', es_seo_title = '$es_seo_title', it_seo_title = '$it_seo_title', ar_seo_title = '$ar_seo_title',

    seo_descriptions = '$seo_descriptions', en_seo_descriptions = '$en_seo_descriptions', de_seo_descriptions = '$de_seo_descriptions', ru_seo_descriptions = '$ru_page_description',
    fr_seo_descriptions = '$fr_seo_descriptions', es_seo_descriptions = '$es_seo_descriptions', it_seo_descriptions = '$it_seo_descriptions', ar_seo_descriptions = '$ar_page_description',

    firma_adi = '$firma_adi', en_firma_adi = '$en_firma_adi', de_firma_adi = '$de_firma_adi', ru_firma_adi = '$ru_firma_adi',
    fr_firma_adi = '$fr_firma_adi', es_firma_adi = '$es_firma_adi', it_firma_adi = '$it_firma_adi', ar_firma_adi = '$ar_firma_adi',
    
    firma_tanitim = '$firma_tanitim', en_firma_tanitim = '$en_firma_tanitim', de_firma_tanitim = '$de_firma_tanitim', ru_firma_tanitim = '$ru_firma_tanitim',
    fr_firma_tanitim = '$fr_firma_tanitim', es_firma_tanitim = '$es_firma_tanitim', it_firma_tanitim = '$it_firma_tanitim', ar_firma_tanitim = '$ar_firma_tanitim',

    firma_adres = '$firma_adres', en_firma_adres = '$en_firma_adres', de_firma_adres = '$de_firma_adres', ru_firma_adres = '$ru_firma_adres',
    fr_firma_adres = '$fr_firma_adres', es_firma_adres = '$es_firma_adres', it_firma_adres = '$it_firma_adres', ar_firma_adres = '$ar_firma_adres',
    
    copyright = '$copyright', en_copyright = '$en_copyright', de_copyright = '$de_copyright', ru_copyright = '$ru_copyright',
    fr_copyright = '$fr_copyright', es_copyright = '$es_copyright', it_copyright = '$it_copyright', ar_copyright = '$ar_copyright',

    firma_tel = '$firma_tel', en_firma_tel = '$en_firma_tel', de_firma_tel = '$de_firma_tel', ru_firma_tel = '$ru_firma_tel',
    fr_firma_tel = '$fr_firma_tel', es_firma_tel = '$es_firma_tel', it_firma_tel = '$it_firma_tel', ar_firma_tel = '$ar_firma_tel',

    firma_tel2 = '$firma_tel2', en_firma_tel2 = '$en_firma_tel2', de_firma_tel2 = '$de_firma_tel2', ru_firma_tel2 = '$ru_firma_tel2',
    fr_firma_tel2 = '$fr_firma_tel2', es_firma_tel2 = '$es_firma_tel2', it_firma_tel2 = '$it_firma_tel2', ar_firma_tel2 = '$ar_firma_tel2',

    firma_tel3 = '$firma_tel3', en_firma_tel3 = '$en_firma_tel3', de_firma_tel3 = '$de_firma_tel3', ru_firma_tel3 = '$ru_firma_tel3',
    fr_firma_tel3 = '$fr_firma_tel3', es_firma_tel3 = '$es_firma_tel3', it_firma_tel3 = '$it_firma_tel3', ar_firma_tel3 = '$ar_firma_tel3',

    firma_fax = '$firma_fax', $update_sql

    firma_email = '$firma_email', en_firma_email = '$en_firma_email', de_firma_email = '$de_firma_email', ru_firma_email = '$ru_firma_email',
    fr_firma_email = '$fr_firma_email', es_firma_email = '$es_firma_email', it_firma_email = '$it_firma_email', ar_firma_email = '$ar_firma_email',

    firma_email2 = '$firma_email2', en_firma_email2 = '$en_firma_email2', de_firma_email2 = '$de_firma_email2', ru_firma_email2 = '$ru_firma_email2',
    fr_firma_email2 = '$fr_firma_email2', es_firma_email2 = '$es_firma_email2', it_firma_email2 = '$it_firma_email2', ar_firma_email2 = '$ar_firma_email2',

    firma_email3 = '$firma_email3', en_firma_email3 = '$en_firma_email3', de_firma_email3 = '$de_firma_email3', ru_firma_email3 = '$ru_firma_email3',
    fr_firma_email3 = '$fr_firma_email3', es_firma_email3 = '$es_firma_email3', it_firma_email3 = '$it_firma_email3', ar_firma_email3 = '$ar_firma_email3',

    
    google_analytics =  '$google_analytics',
    google_verification = '$google_verification',
    yandex_metrika= '$yandex_metrika',
    google_maps   = '$google_maps',
    google_maps_1 = '$google_maps_1',
    facebook      = '$facebook',
    twitter       = '$twitter',
    youtube       = '$youtube',
    instagram     = '$instagram',
    linkedin      = '$linkedin' WHERE id = '1'");

 if ($ayar_duzenle_sorgu) {
  $bilgi = ' <div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  Başarı ile Güncellenmiştir !
  </div> ';
 }
 else{ $bilgi =  mysqli_error($conn); }
}
$SayfaSonuc  = Sonuc(Sorgu("SELECT * FROM site_ayar WHERE id = '1'"));
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-edit"></i> Genel Site Ayarları</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Genel Site Ayarları</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $bilgi;?>
            <form method="post" action="" id="kayit" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" data-toggle="tab">Türkçe </a></li>
                            <?php $Slider_LangSorgu = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Slider_LangSonuc = mysqli_fetch_array($Slider_LangSorgu)){?>
                            <li <?php if ($Slider_LangSonuc['id']==1): ?>style="display: none;" <?php endif ?>><a href="#<?=$Slider_LangSonuc['id']?>" data-toggle="tab"><?=$Slider_LangSonuc['name']?></a></li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-primary box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Genel Site İçerikleri - Türkçe</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="firma_adi">Firma Adı</label>
                                                    <input type="text" class="form-control" name="firma_adi" value="<?php echo $SayfaSonuc->firma_adi;?>" id="firma_adi" placeholder="Firma Adı (Türkçe)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_tanitim">Firma Tanıtım</label>
                                                    <textarea id="icerik" name="firma_tanitim" placeholder="Firma Tanıtım"><?php echo $SayfaSonuc->firma_tanitim;?></textarea>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="firma_tel">Firma Telefon</label>
                                                    <input type="text" class="form-control" name="firma_tel" value="<?php echo $SayfaSonuc->firma_tel;?>" id="firma_tel" placeholder="Firma Telefon (1)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_tel2">Firma Telefon 2</label>
                                                    <input type="text" class="form-control" name="firma_tel2" value="<?php echo $SayfaSonuc->firma_tel2;?>" id="firma_tel2" placeholder="Firma Telefon (2)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_tel3">Firma Whatsapp</label>
                                                    <input type="text" class="form-control" name="firma_tel3" value="<?php echo $SayfaSonuc->firma_tel3;?>" id="firma_tel3" placeholder="Firma Whatsapp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_fax">Firma Fax</label>
                                                    <input type="text" class="form-control" name="firma_fax" value="<?php echo $SayfaSonuc->firma_fax;?>" id="firma_fax" placeholder="Firma Fax">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="firma_email">Firma E-Mail</label>
                                                    <input type="text" class="form-control" name="firma_email" value="<?php echo $SayfaSonuc->firma_email;?>" id="firma_email" placeholder="Firma E-Mail (1)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_email2">Firma E-Mail 2</label>
                                                    <input type="text" class="form-control" name="firma_email2" value="<?php echo $SayfaSonuc->firma_email2;?>" id="firma_email2" placeholder="Firma E-Mail (2)">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firma_email3">Firma E-Mail 3</label>
                                                    <input type="text" class="form-control" name="firma_email3" value="<?php echo $SayfaSonuc->firma_email3;?>" id="firma_email3" placeholder="Firma E-Mail (3)">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="firma_adres">Firma Adres</label>
                                                    <textarea class="textarea" id="icerik" name="firma_adres" placeholder="Firma Adres"><?php echo $SayfaSonuc->firma_adres;?></textarea>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="copyright">Copyright Metni</label>
                                                    <input type="text" class="form-control" name="copyright" value="<?php echo $SayfaSonuc->copyright;?>" id="copyright" placeholder="Copyright Metni" />
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <?php if($_GET['islem']=="duzenle"){?>
                                                <button type="submit" onclick="submit();" class="btn btn-primary">Güncelle</button>
                                                <?php }else{?>
                                                <button type="submit" onclick="submit();" class="btn btn-primary">Kaydet</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-success box-solid <?php if ($_GET['duzenle']==""): ?>collapsed-box<?php endif ?>">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Genel Site SEO Ayarları - Türkçe</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="seo_title">Sayfa Title (Başlık) (Maks. 60 Karakter)<span id="sonuc" style="color: red;"></span></label>
                                                        <input type="text" class="form-control" name="seo_title" value="<?php echo $SayfaSonuc->seo_title;?>" id="seo_title" placeholder="Sayfa Title" maxlength="60" size="60">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <label for="seo_descriptions">Sayfa Description (Açıklama) (Maks. 155 Karakter)</label>
                                                        <textarea id="icerik" name="seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->seo_descriptions;?></textarea>
                                                    </div>
                                                    <div class="box-footer">
                                                        <?php if($_GET['islem']=="duzenle"){?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                                        <?php }else{?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box box-danger box-solid <?php if ($_GET['duzenle']==""): ?>collapsed-box<?php endif ?>">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Api Ayarları</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="google_maps">Google Maps Kodu</label>
                                                        <textarea id="icerik" name="google_maps" placeholder="<iframe src='BURADAKİ KOD Yazılacak'></iframe>" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->google_maps;?></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <label for="google_analytics">Google Analytics</label>
                                                        <input type="text" class="form-control" name="google_analytics" value="<?php echo $SayfaSonuc->google_analytics;?>" id="google_analytics" placeholder="UA-00000000" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="google_verification">Google Site Verification (Site Doğrulama) Kodu</label>
                                                        <input type="text" class="form-control" name="google_verification" value="<?php echo $SayfaSonuc->google_verification;?>" id="google_verification" placeholder="<meta name='google-site-verification' content='BURADAKİ KOD Yazılacak' />" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="yandex_metrika">Yandex Metrica Kodu</label>
                                                        <input type="text" class="form-control" name="yandex_metrika" value="<?php echo $SayfaSonuc->yandex_metrika;?>" id="yandex_metrika" placeholder="Yandex Metrica Verification Kodu" />
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="box-footer">
                                                        <?php if($_GET['islem']=="duzenle"){?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                                        <?php }else{?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box box-danger box-solid <?php if ($_GET['duzenle']==""): ?>collapsed-box<?php endif ?>">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Sosyal Medya Ayarları</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <a class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>
                                                            <input type="text" class="form-control" name="facebook" value="<?php echo $SayfaSonuc->facebook;?>" id="facebook" placeholder="Facebook Sayfa URL">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <a class="btn btn-block btn-social btn-instagram"><i class="fa fa-instagram"></i>
                                                            <input type="text" class="form-control" name="instagram" value="<?php echo $SayfaSonuc->instagram;?>" id="instagram" placeholder="Instagram Sayfa URL">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <a class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i>
                                                            <input type="text" class="form-control" name="twitter" value="<?php echo $SayfaSonuc->twitter;?>" id="twitter" placeholder="Twitter Sayfa URL">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <a class="btn btn-block btn-social btn-google-plus"><i class="fa fa-youtube"></i>
                                                            <input type="text" class="form-control" name="youtube" value="<?php echo $SayfaSonuc->youtube;?>" id="youtube" placeholder="Youtube Sayfa URL">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <a class="btn btn-block btn-social btn-linkedin"><i class="fa fa-linkedin"></i>
                                                            <input type="text" class="form-control" name="linkedin" value="<?php echo $SayfaSonuc->linkedin;?>" id="linkedin" placeholder="Linkedin Sayfa URL">
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="box-footer">
                                                        <?php if($_GET['islem']=="duzenle"){?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                                        <?php }else{?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box box-danger box-solid <?php if ($_GET['duzenle']==""): ?>collapsed-box<?php endif ?>">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">E-Mail Ayarları</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="m_smtp">SMTP Server</label>
                                                        <input type="text" class="form-control" name="m_smtp" value="<?php echo $SayfaSonuc->m_smtp;?>" id="m_smtp" placeholder="SMTP Server" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="m_port">SMTP Port</label>
                                                        <input type="text" class="form-control" name="m_port" value="<?php echo $SayfaSonuc->m_port;?>" id="m_port" placeholder="SMTP Port" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="m_email">Mail Sertifika</label>
                                                        <select class="form-control" name="m_sertifika" id="m_sertifika">
                                                            <option value="TLS">TLS</option>
                                                            <option value="SSL">SSL</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="m_email">SMTP Email</label>
                                                        <input type="text" class="form-control" name="m_email" value="<?php echo $SayfaSonuc->m_email;?>" id="m_email" placeholder="SMTP Email" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="m_email_sifre">SMTP Email Şifre</label>
                                                        <input type="text" class="form-control" name="m_email_sifre" value="<?php echo $SayfaSonuc->m_email_sifre;?>" id="m_email_sifre" placeholder="SMTP Email Şifre" />
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="box-footer">
                                                        <?php if($_GET['islem']=="duzenle"){?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                                        <?php }else{?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $Slider_LangSorgu2 = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Slider_LangSonuc2 = mysqli_fetch_array($Slider_LangSorgu2)){$code=$Slider_LangSonuc2['code'];?>
                            <div class="tab-pane" id="<?=$Slider_LangSonuc2['id']?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-primary box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Genel Site İçerikleri - <?=$Slider_LangSonuc2['name']?></h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_adi">Firma Adı<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->en_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->de_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->ru_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->fr_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->es_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->it_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adi" name="<?=$Slider_LangSonuc2['code']?>_firma_adi" value="<?php echo $SayfaSonuc->ar_firma_adi;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adi" placeholder="Firma Adı" tabindex="1" /><?php endif ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_tanitim">Firma Tanıtım<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->en_firma_tanitim;?></textarea><?php endif ?>
                                                    <?php if ($code == "de"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->de_firma_tanitim;?>"</textarea><?php endif ?>
                                                    <?php if ($code == "ru"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->ru_firma_tanitim;?></textarea><?php endif ?>
                                                    <?php if ($code == "fr"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->fr_firma_tanitim;?></textarea><?php endif ?>
                                                    <?php if ($code == "es"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->es_firma_tanitim;?></textarea><?php endif ?>
                                                    <?php if ($code == "it"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->it_firma_tanitim;?></textarea><?php endif ?>
                                                    <?php if ($code == "ar"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tanitim" name="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" id="<?=$Slider_LangSonuc2['code']?>_firma_tanitim" placeholder="Firma Tanıtım" tabindex="1"><?php echo $SayfaSonuc->ar_firma_tanitim;?></textarea><?php endif ?>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_tel">Firma Telefon<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->en_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->de_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->ru_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->fr_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->es_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->it_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel" name="<?=$Slider_LangSonuc2['code']?>_firma_tel" value="<?php echo $SayfaSonuc->ar_firma_tel;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel" placeholder="Firma Telefon (1)" tabindex="1" /><?php endif ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_tel2">Firma Telefon<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->en_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->de_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->ru_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->fr_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->es_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->it_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel2" name="<?=$Slider_LangSonuc2['code']?>_firma_tel2" value="<?php echo $SayfaSonuc->ar_firma_tel2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel2" placeholder="Firma Telefon (2)" tabindex="1" /><?php endif ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_tel3">Firma Whatsapp<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->en_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->de_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->ru_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->fr_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->es_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->it_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_tel3" name="<?=$Slider_LangSonuc2['code']?>_firma_tel3" value="<?php echo $SayfaSonuc->ar_firma_tel3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_tel3" placeholder="Firma Whatsapp" tabindex="1" /><?php endif ?>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_email">Firma E-Mail<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->en_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->de_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->ru_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->fr_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->es_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->it_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email" name="<?=$Slider_LangSonuc2['code']?>_firma_email" value="<?php echo $SayfaSonuc->ar_firma_email;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_email2">Firma E-Mail<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->en_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->de_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->ru_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->fr_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->es_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->it_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email2" name="<?=$Slider_LangSonuc2['code']?>_firma_email2" value="<?php echo $SayfaSonuc->ar_firma_email2;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email2" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_email3">Firma E-Mail<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->en_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->de_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->ru_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->fr_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->es_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->it_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_email3" name="<?=$Slider_LangSonuc2['code']?>_firma_email3" value="<?php echo $SayfaSonuc->ar_firma_email3;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_email3" placeholder="Firma E-Mail" tabindex="1" /><?php endif ?>
                                                    
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_firma_adres">Firma Adres<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->en_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "de"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->de_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "ru"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->ru_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "fr"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->fr_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "es"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->es_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "it"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->it_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                    <?php if ($code == "ar"): ?><textarea id="icerik" class="form-control <?=$Slider_LangSonuc2['code']?>_firma_adres" name="<?=$Slider_LangSonuc2['code']?>_firma_adres" value="<?php echo $SayfaSonuc->ar_firma_adres;?>" id="<?=$Slider_LangSonuc2['code']?>_firma_adres" placeholder="Firma Adres" tabindex="1"></textarea><?php endif ?>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_copyright">Copyright Metni<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->en_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->de_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->ru_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->fr_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->es_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->it_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_copyright" name="<?=$Slider_LangSonuc2['code']?>_copyright" value="<?php echo $SayfaSonuc->ar_copyright;?>" id="<?=$Slider_LangSonuc2['code']?>_copyright" placeholder="Copyright Metni" tabindex="1" /><?php endif ?>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <?php if($_GET['islem']=="duzenle"){?>
                                                <button type="submit" onclick="submit();" class="btn btn-primary">Güncelle</button>
                                                <?php }else{?>
                                                <button type="submit" onclick="submit();" class="btn btn-primary">Kaydet</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-success box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Genel Site SEO Ayarları - <?=$Slider_LangSonuc2['name']?></h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="<?=$Slider_LangSonuc2['code']?>_seo_title">Sayfa Title (Başlık) (Maks. 60 Karakter)<span id="<?=$Slider_LangSonuc2['code']?>_sonuc" style="color: red;"></span></label>
                                                        <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->en_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->de_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->ru_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->fr_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->es_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->it_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_title" name="<?=$Slider_LangSonuc2['code']?>_seo_title" value="<?php echo $SayfaSonuc->ar_seo_title;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_title" placeholder="Sayfa Title" tabindex="1" /><?php endif ?>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <label for="seo_descriptions">Sayfa Description (Açıklama) (Maks. 155 Karakter)</label>
                                                        <?php if ($code == "en"): ?><textarea id="icerik" name="en_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->en_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "de"): ?>><textarea id="icerik" name="de_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->de_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "ru"): ?>><textarea id="icerik" name="ru_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->ru_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "fr"): ?>><textarea id="icerik" name="fr_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->fr_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "es"): ?>><textarea id="icerik" name="es_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->es_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "it"): ?>><textarea id="icerik" name="it_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->it_seo_descriptions;?></textarea><?php endif ?>
                                                        <?php if ($code == "ar"): ?>><textarea id="icerik" name="ar_seo_descriptions" placeholder="Sayfa Description" maxlength="155" size="155" style="max-height: 150px; max-width: 100%; min-height: 150px; min-width: 100%;"><?php echo $SayfaSonuc->ar_seo_descriptions;?></textarea><?php endif ?>
                                                    </div>
                                                    <div class="box-footer">
                                                        <?php if($_GET['islem']=="duzenle"){?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                                        <?php }else{?>
                                                        <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    function createPopupWin(pageURL, pageTitle, popupWinWidth, popupWinHeight) {
        var left = (screen.width);
        var top = (screen.height);
        
</script>
<script type="text/javascript">
    $.fn.setCursorPosition = function (pos) {
        this.each(function (index, elem) {
            if (elem.setSelectionRange) {
                elem.setSelectionRange(pos, pos);
            } else if (elem.createTextRange) {
                var range = elem.createTextRange();
                range.collapse(true);
                range.moveEnd('character', pos);
                range.moveStart('character', pos);
                range.select();
            }
        });
        reÜrünn this;
    };
    $('input[name=pagename]')
        .focus()
        .setCursorPosition(1);
    
</script>

<!--<script type="text/javascript">
  $('body').keypress(function(e){
    if (e.keyCode == 13)
    {
      $('#kayit').submit();
    }
  });
</script>

<!-- page-custom.js -->
<script src="page_custom.js" type="text/javascript"></script>
<!-- jQuery 2.1.3 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $(".textarea")
            .wysihtml5();
    });
    
</script>

<link href="dist/css/summernote.css" rel="stylesheet">
<script src="dist/js/summernote.js"></script>
<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote2')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote3')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote4')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote5')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote6')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote7')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote8')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote9')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    
</script>

<script>
    var isEmpty = $('.summernote')
        .summernote('isEmpty');
    $('#summernote10')
        .summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
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
