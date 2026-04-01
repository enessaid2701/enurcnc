<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
/* Yeni Kayıt */
if(p('title') && g('islem')=="")
{
  $title = $_POST['title']; $title2 = $_POST['title2'];
  $en_title = $_POST['en_title']; $en_title2 = $_POST['en_title2'];
  $de_title = $_POST['de_title']; $de_title2 = $_POST['de_title2'];
  $ru_title = $_POST['ru_title']; $ru_title2 = $_POST['ru_title2'];
  $fr_title = $_POST['fr_title']; $fr_title2 = $_POST['fr_title2'];
  $es_title = $_POST['es_title']; $es_title2 = $_POST['es_title2'];
  $it_title = $_POST['it_title']; $it_title2 = $_POST['it_title2'];
  $ar_title = $_POST['ar_title']; $ar_title2 = $_POST['ar_title2'];

  $statu = $_POST['statu'];
  $rank = $_POST['rank'];

  $link = seo($_POST['link']); $link_name = $_POST['link_name'];
  $en_link = seo($_POST['en_link']); $en_link_name = $_POST['en_link_name'];
  $de_link = seo($_POST['de_link']); $de_link_name = $_POST['de_link_name'];
  $ru_link = seo($_POST['ru_link']); $ru_link_name = $_POST['ru_link_name'];
  $fr_link = seo($_POST['fr_link']); $fr_link_name = $_POST['fr_link_name'];
  $es_link = seo($_POST['es_link']); $es_link_name = $_POST['es_link_name'];
  $it_link = seo($_POST['it_link']); $it_link_name = $_POST['it_link_name'];
  $ar_link = seo($_POST['ar_link']); $ar_link_name = $_POST['ar_link_name'];

  include('class.upload.php');
  if(file_exists(__DIR__."/treefolder/folder.functions.php")){ require_once (__DIR__."/treefolder/folder.functions.php");}
  if(isset($_FILES['image']) and !empty($_FILES['image']['name'])){
    $act = new TreeFolder();
    $url = "../uploads/slider/";
    $act->page_url = $url;
    $act->file_name = seo($ayar['firma_adi']).'-'.seo($title);
    $act->files = $_FILES['image'];
    $url = substr($act->AddOneFile(),3);
    $resim_sql = " image = '$url', ";
}

  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($ayar['firma_adi']).'-'.seo($title);
    $upload2->image_resize = true;
    $upload2->image_x = 1920;
    $upload2->image_ratio_y = true;
    $upload2->process("../uploads/slider/webp");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  $gitti2=$image_webp=''.$upload2->file_dst_name.'';
  
  $slider_sorgu = Sorgu("INSERT INTO slider SET
    title = '$title', title2 = '$title2',
    en_title = '$en_title', en_title2 = '$en_title2',
    de_title = '$de_title', de_title2 = '$de_title2',
    ru_title = '$ru_title', ru_title2 = '$ru_title2',
    fr_title = '$fr_title', fr_title2 = '$fr_title2',
    es_title = '$es_title', es_title2 = '$es_title2',
    it_title = '$it_title', it_title2 = '$it_title2',
    ar_title = '$ar_title', ar_title2 = '$ar_title2',

    statu = '$statu',
    rank = '$rank',

    link = '$link', link_name = '$link_name',
    en_link = '$en_link', en_link_name = '$en_link_name',
    de_link = '$de_link', de_link_name = '$de_link_name',
    ru_link = '$ru_link', ru_link_name = '$ru_link_name',
    fr_link = '$fr_link', fr_link_name = '$fr_link_name',
    es_link = '$es_link', es_link_name = '$es_link_name',
    it_link = '$it_link', it_link_name = '$it_link_name',
    ar_link = '$ar_link', ar_link_name = '$ar_link_name',

    $resim_sql
    image_webp = '$image_webp'");
  if ($slider_sorgu) 
  {
    $bilgi = ' <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Başarı ile Eklenmiştir !
    </div> ';
  }
  else{
    $bilgi =  mysqli_error($conn);
  }
}

/* Güncelleme */
if(p('title') && g('islem')=="duzenle")
{
  $title = $_POST['title']; $title2 = $_POST['title2'];
  $en_title = $_POST['en_title']; $en_title2 = $_POST['en_title2'];
  $de_title = $_POST['de_title']; $de_title2 = $_POST['de_title2'];
  $ru_title = $_POST['ru_title']; $ru_title2 = $_POST['ru_title2'];
  $fr_title = $_POST['fr_title']; $fr_title2 = $_POST['fr_title2'];
  $es_title = $_POST['es_title']; $es_title2 = $_POST['es_title2'];
  $it_title = $_POST['it_title']; $it_title2 = $_POST['it_title2'];
  $ar_title = $_POST['ar_title']; $ar_title2 = $_POST['ar_title2'];

  $statu = $_POST['statu'];
  $rank = $_POST['rank'];

  $link = seo($_POST['link']); $link_name = $_POST['link_name'];
  $en_link = seo($_POST['en_link']); $en_link_name = $_POST['en_link_name'];
  $de_link = seo($_POST['de_link']); $de_link_name = $_POST['de_link_name'];
  $ru_link = seo($_POST['ru_link']); $ru_link_name = $_POST['ru_link_name'];
  $fr_link = seo($_POST['fr_link']); $fr_link_name = $_POST['fr_link_name'];
  $es_link = seo($_POST['es_link']); $es_link_name = $_POST['es_link_name'];
  $it_link = seo($_POST['it_link']); $it_link_name = $_POST['it_link_name'];
  $ar_link = seo($_POST['ar_link']); $ar_link_name = $_POST['ar_link_name'];

  $d_id = g('id');
  
  include('class.upload.php'); 
  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($ayar['firma_adi']).'-'.seo($title);
    $upload2->image_resize = true;
    $upload2->image_x = 1920;
    $upload2->image_ratio_y = true;
    $upload2->process("../uploads/slider/webp");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  
    $update_sql = "";
  $resim_bul=Sonuc(Sorgu("SELECT * FROM slider WHERE id='$d_id'"));
  if($_FILES["image"]['name'] != ''){
     $resim_adi = '';
    $resim_adi .= seo($ayar['firma_adi']).'-'.seo($title);
    $dosya_adi = $_FILES['image']["name"];
    $upload2 = mkdir("../uploads/slider");
    $uzanti = substr($dosya_adi,-4,4);
    if($uzanti === ".mp4" || $uzanti === ".jpg" || $uzanti === ".png"){
        $adi    = $resim_adi.$uzanti;
    } else if($uzanti === ".webm" || $uzanti === ".jpeg" || $uzanti === ".webp"){
        $uzanti = substr($dosya_adi,-5,5);
        $adi    = $resim_adi.$uzanti;
    }
    $yol = "../uploads/slider/".$adi;
    // Eskiyi Silme
    if(file_exists("../uploads/slider/".$resim_bul->image)){
          $resim_sil=unlink("../uploads/slider/".$resim_bul->image);
      }
    // Yenisini Atama
    
    // move_uploaded_file($_FILES["image"]["tmp_name"], $yol);
    // $update_sql .= "image = '$adi', ";
    if(file_exists(__DIR__."/treefolder/folder.functions.php")){ require_once (__DIR__."/treefolder/folder.functions.php");}
    if(isset($_FILES['image']) and !empty($_FILES['image']['name'])){
        $act = new TreeFolder();
        $url = "../uploads/slider/";
        $act->page_url = $url;
        $act->file_name = seo($ayar['firma_adi']).'-'.seo($title);
        $act->files = $_FILES['image'];
        $url = substr($act->AddOneFile(),3);
        $update_sql = " image = '$url', ";
    }
  }
  
  if($image_webp!="")
  {
      if(file_exists("../uploads/slider/webp/".$resim_bul->image_webp)){
          $resim_sil=unlink("../uploads/slider/webp/".$resim_bul->image_webp);
      }
      $gitti2=$image_webp=''.$upload2->file_dst_name.'';
      $update_sql .= " image_webp = '$image_webp', ";
  }
  
  $slider_duzenle_sorgu = Sorgu("UPDATE slider SET 
      title = '$title', title2 = '$title2',
    en_title = '$en_title', en_title2 = '$en_title2',
    de_title = '$de_title', de_title2 = '$de_title2',
    ru_title = '$ru_title', ru_title2 = '$ru_title2',
    fr_title = '$fr_title', fr_title2 = '$fr_title2',
    es_title = '$es_title', es_title2 = '$es_title2',
    it_title = '$it_title', it_title2 = '$it_title2',
    ar_title = '$ar_title', ar_title2 = '$ar_title2',

    statu = '$statu',
    rank = '$rank',
    $update_sql
    link = '$link', link_name = '$link_name',
    en_link = '$en_link', en_link_name = '$en_link_name',
    de_link = '$de_link', de_link_name = '$de_link_name',
    ru_link = '$ru_link', ru_link_name = '$ru_link_name',
    fr_link = '$fr_link', fr_link_name = '$fr_link_name',
    es_link = '$es_link', es_link_name = '$es_link_name',
    it_link = '$it_link', it_link_name = '$it_link_name',
    ar_link = '$ar_link', ar_link_name = '$ar_link_name'
      WHERE id= '$d_id'");
  
  if ($slider_duzenle_sorgu) {
    $bilgi = ' <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Başarı ile Eklenmiştir !
    </div> ';
  }
  else{
    $bilgi =  mysqli_error($conn);
  }
}

/* Genel Güncelleme ID */
if($_GET['islem']=="duzenle")
{
  $sayfaid = $_GET['id']; 
  $durum = "duzenle" ;
  $SliderSonuc = Sonuc(Sorgu("SELECT * FROM slider WHERE id='$sayfaid'"));
}
/* Genel Sıra */
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM slider ORDER BY `rank` DESC LIMIT 1"));
$son_sira = intval($son_sira_sorgu->rank +1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-picture-o"></i> Slider Ekle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Slider Ekle</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $bilgi;?>
            <form method="post" action="" id="kayit" enctype="multipart/form-data">
                <div class="col-md-7">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#1" data-toggle="tab">Türkçe </a></li>
                          <?php $Slider_LangSorgu = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Slider_LangSonuc = mysqli_fetch_array($Slider_LangSorgu)){?>
                          <li <?php if ($Slider_LangSonuc['id']==1): ?>style="display: none;"<?php endif ?>><a href="#<?=$Slider_LangSonuc['id']?>" data-toggle="tab"><?=$Slider_LangSonuc['name']?></a></li>
                          <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title">Türkçe İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title">Slider Başlık </label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $SliderSonuc->title;?>" id="title" placeholder="Slider Başlık" required="true" tabindex="1" autofocus="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="title2">Slider Yazısı </label>
                                            <input type="text" class="form-control" name="title2" value="<?php echo $SliderSonuc->title2;?>" id="title2" placeholder="Slider Yazısı" />
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="link">Buton Linki</label>
                                            <input type="text" class="form-control" name="link" value="<?php echo $SliderSonuc->link;?>" id="link" placeholder="https://www.siteadi.com/slider-linki" />
                                        </div>
                                        <div class="form-group">
                                            <label for="link_name">Buton Linki Yazısı</label>
                                            <input type="text" class="form-control" name="link_name" value="<?php echo $SliderSonuc->link_name;?>" id="link_name" placeholder="Buton Link Yazısı" />
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
                            <?php $Slider_LangSorgu2 = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Slider_LangSonuc2 = mysqli_fetch_array($Slider_LangSorgu2)){$code=$Slider_LangSonuc2['code'];?>
                            <div class="tab-pane" id="<?=$Slider_LangSonuc2['id']?>">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title"><?=$Slider_LangSonuc2['name']?> İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="<?=$Slider_LangSonuc2['code']?>_title">Slider Başlık </label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->en_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->de_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->ru_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->fr_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->es_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->it_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title" value="<?php echo $SliderSonuc->ar_title;?>" id="<?=$Slider_LangSonuc2['code']?>_title" placeholder="Slider Başlık" required="true" /><?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="<?=$Slider_LangSonuc2['code']?>_title">Slider Yazısı </label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->en_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->de_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->ru_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->fr_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->es_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->it_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_title2" value="<?php echo $SliderSonuc->ar_title2;?>" id="<?=$Slider_LangSonuc2['code']?>_title2" placeholder="Slider Yazısı" required="true" /><?php endif ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="<?=$Slider_LangSonuc2['code']?>_link">Buton Linki</label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->en_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->de_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->ru_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->fr_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->es_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->it_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link" value="<?php echo $SliderSonuc->ar_link;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Linki" required="true" /><?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="<?=$Slider_LangSonuc2['code']?>_link_name">Buton Link Yazısı</label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->en_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->de_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->ru_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->fr_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->es_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->it_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Slider_LangSonuc2['code']?>_link_name" value="<?php echo $SliderSonuc->ar_link_name;?>" id="<?=$Slider_LangSonuc2['code']?>_link" placeholder="Buton Link Yazısı" required="true" /><?php endif ?>
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box box-danger box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Genel İçerikler</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>GÖRSEL İÇERİK</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SliderSonuc->image){?>
                                                <img src="../<?php echo $SliderSonuc->image;?>" >
                                                <?php } else { ?>
                                                <img src="images/videosec.jpg" alt="" />
                                                <?php }?>
                                                <?php } else { ?>
                                                <img src="images/videosec.jpg" alt="" />
                                                <?php }?>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i>Görsel Yükle</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="image" type="file" class="default" accept=".mp4, .webm, .jpg, .jpeg, .webp, .png" />
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php /*<div class="col-md-6">
                                        <label>Resim (WEBP)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SliderSonuc->image_webp){?>
                                                <img src="../uploads/slider/webp/<?php echo $SliderSonuc->image_webp;?>" alt="" />
                                                <?php } else { ?>
                                                <img src="images/resimsec.jpg" alt="" />
                                                <?php }?>
                                                <?php } else { ?>
                                                <img src="images/resimsec.jpg" alt="" />
                                                <?php }?>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Resim Seç</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="image_webp" type="file" class="default" />
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>*/?>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top: 25px;">
                                        <?php if($_GET['islem']=="duzenle"){?>
                                        <label>Durumu</label>
                                        <div class="square-green">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="1" <?php if($SliderSonuc->statu == '1') {?> checked <?php } ?> name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
                                            </div>
                                        </div>
                                        <div class="square-red">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="0" <?php if($SliderSonuc->statu == '0') {?> checked <?php } ?> name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Pasif</div>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <label>Durumu</label>
                                        <div class="square-green">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="1" checked name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
                                            </div>
                                        </div>
                                        <div class="square-red">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="0" name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Pasif</div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($_GET['islem']==""): ?>
                                    <div class="col-md-6">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?=$son_sira;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" readonly />
                                    </div>
                                    <?php endif ?>
                                    
                                    
                                    <?php if ($_GET['islem']=="duzenle"): ?>
                                    <div class="col-md-6">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?php echo $SliderSonuc->rank;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" />
                                    </div>
                                    <?php endif ?>
                                </div>
                                <div class="box-footer">
                                    <?php if($_GET['islem']=="duzenle"){?>
                                    <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Güncelle</button>
                                    <?php }else{?>
                                    <button type="submit" onclick="submit();" class="btn btn-primary" style="float: right;margin-right: 5px;">Kaydet</button>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- jQuery 2.1.3 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $(".textarea")
            .wysihtml5();
    });
    
</script>
