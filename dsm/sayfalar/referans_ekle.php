<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
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

  $link = seo($_POST['title']); $link_name = $_POST['link_name'];
  $en_link = seo($_POST['en_title']); $en_link_name = $_POST['en_link_name'];
  $de_link = seo($_POST['de_title']); $de_link_name = $_POST['de_link_name'];
  $ru_link = seo($_POST['ru_title']); $ru_link_name = $_POST['ru_link_name'];
  $fr_link = seo($_POST['fr_title']); $fr_link_name = $_POST['fr_link_name'];
  $es_link = seo($_POST['es_title']); $es_link_name = $_POST['es_link_name'];
  $it_link = seo($_POST['it_title']); $it_link_name = $_POST['it_link_name'];
  $ar_link = seo($_POST['ar_title']); $ar_link_name = $_POST['ar_link_name'];

  include('class.upload.php');



  $upload = new upload($_FILES['image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($ayar['title']);
    $upload->process("../uploads/references");
    if ($upload->processed){
      $ReferansResim=''.$upload->file_dst_name.'';
    }
  }
  $gitti=$ReferansResim=''.$upload->file_dst_name.'';

  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($ayar['title']);
    $upload2->process("../uploads/references/other");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  $gitti2=$image_webp=''.$upload2->file_dst_name.'';
  
  $sayfa_sorgu = Sorgu("INSERT INTO referanslar SET
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

    image = '$ReferansResim',
    image_webp = '$image_webp'");
  if ($sayfa_sorgu) 
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
  
    $link = seo($_POST['title']); $link_name = $_POST['link_name'];
    $en_link = seo($_POST['en_title']); $en_link_name = $_POST['en_link_name'];
    $de_link = seo($_POST['de_title']); $de_link_name = $_POST['de_link_name'];
    $ru_link = seo($_POST['ru_title']); $ru_link_name = $_POST['ru_link_name'];
    $fr_link = seo($_POST['fr_title']); $fr_link_name = $_POST['fr_link_name'];
    $es_link = seo($_POST['es_title']); $es_link_name = $_POST['es_link_name'];
    $it_link = seo($_POST['it_title']); $it_link_name = $_POST['it_link_name'];
    $ar_link = seo($_POST['ar_title']); $ar_link_name = $_POST['ar_link_name'];

  $d_id = g('id');
  
  $image_dir = "../uploads/references";
  $image_webp_dir = "../uploads/references/other";
    if (!file_exists($image_dir)) {
        if (!mkdir($image_dir, 0777, true)) {
            die("Klasör oluşturulamadı: $image_dir");
        }
    }

    if (!file_exists($image_webp_dir)) {
        if (!mkdir($image_webp_dir, 0777, true)) {
            die("Klasör oluşturulamadı: $image_webp_dir");
        }
    }

    $seo_title = isset($_POST['title']) ? seo($_POST['title']) : '';
$image_name = '';
$image_webp_name = '';
$update_sql = "";

if (isset($_FILES['image']) && isset($_FILES['image_webp'])) {
    // Yüklenen image dosyasını işleme
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_original_name = $_FILES['image']['name'];
    $image_ext = pathinfo($image_original_name, PATHINFO_EXTENSION);
    $image_name = $seo_title . '.' . $image_ext;
    $image_target_file = $image_dir . '/' . $image_name;

    if (move_uploaded_file($image_tmp_name, $image_target_file)) {
    }

    // Yüklenen image_webp dosyasını işleme
    $image_webp_tmp_name = $_FILES['image_webp']['tmp_name'];
    $image_webp_original_name = $_FILES['image_webp']['name'];
    $image_webp_name = $seo_title . '.webp';
    $image_webp_target_file = $image_webp_dir . '/' . $image_webp_name;

    if (move_uploaded_file($image_webp_tmp_name, $image_webp_target_file)) {
    }
}
if($image_name != ""){
    $update_sql .= "image = '$image_name',";
}
if($image_webp_name != ""){
    $update_sql .= "image_webp = '$image_webp_name',";
}
  
  $resim_bul=Sonuc(Sorgu("SELECT * FROM referanslar WHERE id='$d_id'"));

  
  
  $Referans_duzenle_sorgu = Sorgu("UPDATE referanslar SET 
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
  
  if ($Referans_duzenle_sorgu) {
    $bilgi = ' <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Başarı ile Güncellenmiştir !
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
  $SayfaSonuc = Sonuc(Sorgu("SELECT * FROM referanslar WHERE id='$sayfaid'"));
}
/* Genel Sıra */
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM referanslar ORDER BY `rank` DESC LIMIT 1"));
$son_sira = intval($son_sira_sorgu->rank +1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-picture-o"></i> Referans Ekle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Referans Ekle</li>
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
                          <?php $Referans_LangSorgu = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Referans_LangSonuc = mysqli_fetch_array($Referans_LangSorgu)){?>
                          <li <?php if ($Referans_LangSonuc['id']==1): ?>style="display: none;"<?php endif ?>><a href="#<?=$Referans_LangSonuc['id']?>" data-toggle="tab"><?=$Referans_LangSonuc['name']?></a></li>
                          <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title">Türkçe İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title">Referans Adı </label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $SayfaSonuc->title;?>" id="title" placeholder="Referans Adı" required="true" tabindex="1" autofocus="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="icerik">Referans Açıklaması</label>
                                            <textarea id="summernote" style="width:100%;" name="title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->title2;?></textarea>
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
                            <?php $Referans_LangSorgu2 = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Referans_LangSonuc2 = mysqli_fetch_array($Referans_LangSorgu2)){$code=$Referans_LangSonuc2['code'];?>
                            <div class="tab-pane" id="<?=$Referans_LangSonuc2['id']?>">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title"><?=$Referans_LangSonuc2['name']?> İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="<?=$Referans_LangSonuc2['code']?>_title">Referans Adı </label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->en_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->de_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->ru_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->fr_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->es_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->it_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Referans_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->ar_title;?>" id="<?=$Referans_LangSonuc2['code']?>_title" placeholder="Referans Adı" required="true" /><?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="icerik">Ürün Açıklaması</label>
                                            <?php if ($code == "en"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->en_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "de"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->de_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "ru"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->ru_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "fr"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->fr_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "es"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->es_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "it"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->it_title2;?></textarea><?php endif ?>
                                            <?php if ($code == "ar"): ?><textarea id="summernote<?=$Referans_LangSonuc2['id']?>" style="width:100%;" name="<?=$Referans_LangSonuc2['code']?>_title2" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->ar_title2;?></textarea><?php endif ?>
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
                                    <div class="col-md-6">                                      
                                        <label>Referans (TR)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->image){?>
                                                <a href="../uploads/references/<?php echo $SayfaSonuc->image;?>" target="_blank"><img src="../uploads/references/<?php echo $SayfaSonuc->image;?>" alt="" /></a>
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
                                                    <input name="image" type="file" class="default" />
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Referans (Diğer)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->image_webp){?>
                                                <a href="../uploads/references/other/<?php echo $SayfaSonuc->image_webp;?>" target="_blank"><img src="../uploads/references/other/<?php echo $SayfaSonuc->image_webp;?>" alt="" /></a>
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
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <div class="col-md-6" style="margin-top: 25px;">
                                        <?php if($_GET['islem']=="duzenle"){?>
                                        <label>Durumu</label>
                                        <div class="square-green">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="1" <?php if($SayfaSonuc->statu == '1') {?> checked <?php } ?> name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
                                            </div>
                                        </div>
                                        <div class="square-red">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="0" <?php if($SayfaSonuc->statu == '0') {?> checked <?php } ?> name="statu">
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
                                    <div class="col-md-6" style="margin-top: 25px;">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?=$son_sira;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" readonly />
                                    </div>
                                    <?php endif ?>
                                    <?php if ($_GET['islem']=="duzenle"): ?>
                                    <div class="col-md-6" style="margin-top: 25px;">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?php echo $SayfaSonuc->rank;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" />
                                    </div>
                                    <?php endif ?>
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