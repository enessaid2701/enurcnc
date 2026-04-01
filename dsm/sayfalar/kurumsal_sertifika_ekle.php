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

  $link = $_POST['link']; $link_name = $_POST['link_name'];
  $en_link = $_POST['en_link']; $en_link_name = $_POST['en_link_name'];
  $de_link = $_POST['de_link']; $de_link_name = $_POST['de_link_name'];
  $ru_link = $_POST['ru_link']; $ru_link_name = $_POST['ru_link_name'];
  $fr_link = $_POST['fr_link']; $fr_link_name = $_POST['fr_link_name'];
  $es_link = $_POST['es_link']; $es_link_name = $_POST['es_link_name'];
  $it_link = $_POST['it_link']; $it_link_name = $_POST['it_link_name'];
  $ar_link = $_POST['ar_link']; $ar_link_name = $_POST['ar_link_name'];

  include('class.upload.php');

  $upload = new upload($_FILES['image']);
  if ($upload->uploaded){
    $upload->image_resize = true;
    $upload->image_x = 1920;
    $upload->image_ratio_y = true;
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($title).'-'.seo($ayar['firma_adi']);
    $upload->process("../uploads/certificate");
    if ($upload->processed){
      $SertifikaResim=''.$upload->file_dst_name.'';
    }
  }
  $gitti=$SertifikaResim=''.$upload->file_dst_name.'';

  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($title).'-'.seo($ayar['firma_adi']);
    $upload2->process("../uploads/certificate/other");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  $gitti2=$image_webp=''.$upload2->file_dst_name.'';
  //Belge
  $balge_pdf = new upload($_FILES['belge_pdf']);
  if ($balge_pdf->uploaded){
    $balge_pdf->file_auto_rename = true;
    $balge_pdf->file_new_name_body = $title.'-'.seo($ayar['firma_adi']);
    $balge_pdf->process("../uploads/certificate");   
    if ($balge_pdf->processed){
      $Sertifikabelge_tr=''.$balge_pdf->file_dst_name.'';
    }
  }
  $gitti3=$Sertifikabelge_tr=''.$balge_pdf->file_dst_name.'';
  $balge_pdfen = new upload($_FILES['belge_diger_pdf']);
  if ($balge_pdfen->uploaded){
    $balge_pdfen->file_auto_rename = true;
    $balge_pdfen->file_new_name_body = $title.'-'.seo($ayar['firma_adi']);
    $balge_pdfen->process("../uploads/certificate/other");
    if ($balge_pdfen->processed){
      $Sertifikabelge_diger=''.$balge_pdfen->file_dst_name.'';
    }
  }
  $gitti4=$Sertifikabelge_diger=''.$balge_pdfen->file_dst_name.'';
  
  $sayfa_sorgu = Sorgu("INSERT INTO belgeler SET
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
    belgeler_pdf_tr = '$Sertifikabelge_tr',
    belgeler_pdf_diger = '$Sertifikabelge_diger',
    image = '$SertifikaResim',
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

  $link = $_POST['link']; $link_name = $_POST['link_name'];
  $en_link = $_POST['en_link']; $en_link_name = $_POST['en_link_name'];
  $de_link = $_POST['de_link']; $de_link_name = $_POST['de_link_name'];
  $ru_link = $_POST['ru_link']; $ru_link_name = $_POST['ru_link_name'];
  $fr_link = $_POST['fr_link']; $fr_link_name = $_POST['fr_link_name'];
  $es_link = $_POST['es_link']; $es_link_name = $_POST['es_link_name'];
  $it_link = $_POST['it_link']; $it_link_name = $_POST['it_link_name'];
  $ar_link = $_POST['ar_link']; $ar_link_name = $_POST['ar_link_name'];

  $d_id = g('id');

  
  include('class.upload.php'); 
  $upload = new upload($_FILES['image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($title).'-'.seo($ayar['firma_adi']);
    $upload->process("../uploads/certificate");   
    if ($upload->processed){
      $SertifikaResim=''.$upload->file_dst_name.'';
    }
  }
  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($title).'-'.seo($ayar['firma_adi']);
    $upload2->process("../uploads/certificate/other");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  //Belge
  $balge_pdf = new upload($_FILES['belge_pdf']);
  if ($balge_pdf->uploaded){
    $balge_pdf->file_auto_rename = true;
    $balge_pdf->file_new_name_body = $title.'-'.seo($ayar['firma_adi']);
    $balge_pdf->process("../uploads/certificate");   
    if ($balge_pdf->processed){
      $Sertifikabelge_tr=''.$balge_pdf->file_dst_name.'';
    }
  }
  $balge_pdfen = new upload($_FILES['belge_diger_pdf']);
  if ($balge_pdfen->uploaded){
    $balge_pdfen->file_auto_rename = true;
    $balge_pdfen->file_new_name_body = $title.'en-'.seo($ayar['firma_adi']);
    $balge_pdfen->process("../uploads/certificate/other");
    if ($balge_pdfen->processed){
      $Sertifikabelge_diger=''.$balge_pdfen->file_dst_name.'';
    }
  }
  $resim_bul=Sonuc(Sorgu("SELECT * FROM belgeler WHERE id='$d_id'"));
  $belge_sql = '';
//   ----------------------------------------------------------------
  if($SertifikaResim != ''){
    $resim_sil=unlink("../uploads/certificate/".$resim_bul->image);
    $gitti=$SertifikaResim=''.$upload->file_dst_name.'';
   $belge_sql .= "image = '$SertifikaResim', ";   
  }
  if($image_webp != ''){
   $resim_sil=unlink("../uploads/certificate/other/".$resim_bul->belgeler_pdf_diger);
    $gitti2=$image_webp=''.$upload2->file_dst_name.'';
   $belge_sql .= "image_webp = '$image_webp', "; 
  }
//   -----------------------------------------------------------------------
  if($Sertifikabelge_tr != ''){
    $resim_sil=unlink("../uploads/certificate/".$resim_bul->belgeler_pdf_tr);
    $gitti3=$Sertifikabelge_tr=''.$balge_pdf->file_dst_name.'';
   $belge_sql .= "belgeler_pdf_tr = '$Sertifikabelge_tr', ";   
  }
  if($Sertifikabelge_diger != ''){
      if(file_exists("../uploads/certificate/other/".$resim_bul->belgeler_pdf_diger)){
          $resim_sil=unlink("../uploads/certificate/other/".$resim_bul->belgeler_pdf_diger);
      }
  
    $gitti4=$Sertifikabelge_diger=''.$balge_pdfen->file_dst_name.'';
   $belge_sql .= "belgeler_pdf_diger = '$Sertifikabelge_diger', "; 
  }
  
  
  $Sertifika_duzenle_sorgu = Sorgu("UPDATE belgeler SET 
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
    $belge_sql
    link = '$link', link_name = '$link_name',
    en_link = '$en_link', en_link_name = '$en_link_name',
    de_link = '$de_link', de_link_name = '$de_link_name',
    ru_link = '$ru_link', ru_link_name = '$ru_link_name',
    fr_link = '$fr_link', fr_link_name = '$fr_link_name',
    es_link = '$es_link', es_link_name = '$es_link_name',
    it_link = '$it_link', it_link_name = '$it_link_name',
    ar_link = '$ar_link', ar_link_name = '$ar_link_name'
      WHERE id= '$d_id'");
      
  if ($Sertifika_duzenle_sorgu) {
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
  $SayfaSonuc = Sonuc(Sorgu("SELECT * FROM belgeler WHERE id='$sayfaid'"));
}
/* Genel Sıra */
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM belgeler ORDER BY `rank` DESC LIMIT 1"));
$son_sira = intval($son_sira_sorgu->rank +1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-picture-o"></i> Sertifika Ekle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Sertifika Ekle</li>
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
                          <?php $Sertifika_LangSorgu = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Sertifika_LangSonuc = mysqli_fetch_array($Sertifika_LangSorgu)){?>
                          <li <?php if ($Sertifika_LangSonuc['id']==1): ?>style="display: none;"<?php endif ?>><a href="#<?=$Sertifika_LangSonuc['id']?>" data-toggle="tab"><?=$Sertifika_LangSonuc['name']?></a></li>
                          <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title">Türkçe İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title">Sertifika Adı </label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $SayfaSonuc->title;?>" id="title" placeholder="Sertifika Adı" required="true" tabindex="1" autofocus="" />
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
                            <?php $Sertifika_LangSorgu2 = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($Sertifika_LangSonuc2 = mysqli_fetch_array($Sertifika_LangSorgu2)){$code=$Sertifika_LangSonuc2['code'];?>
                            <div class="tab-pane" id="<?=$Sertifika_LangSonuc2['id']?>">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title"><?=$Sertifika_LangSonuc2['name']?> İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="<?=$Sertifika_LangSonuc2['code']?>_title">Sertifika Adı </label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->en_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->de_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->ru_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->fr_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->es_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->it_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$Sertifika_LangSonuc2['code']?>_title" value="<?php echo $SayfaSonuc->ar_title;?>" id="<?=$Sertifika_LangSonuc2['code']?>_title" placeholder="Sertifika Adı" required="true" /><?php endif ?>
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
                                    <div class="col-md-6" style="margin-bottom:10px;">                                    	
                                        <label>Kapak Resim (TR)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 100%; min-height:150px; max-height: 300px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->image){?>
                                                <a href="../uploads/certificate/<?php echo $SayfaSonuc->image;?>" target="_blank"><img src="../uploads/certificate/<?php echo $SayfaSonuc->image;?>" alt="" /></a>
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
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Kapak Resim Seç</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="image" type="file" class="default" />
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="margin-bottom:10px;">
                                        <label>Kapak Resim (Diğer)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 100%; min-height:150px; max-height: 300px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->image_webp){?>
                                                <a href="../uploads/certificate/other/<?php echo $SayfaSonuc->image_webp;?>" target="_blank"><img src="../uploads/certificate/other/<?php echo $SayfaSonuc->image_webp;?>" alt="" /></a>
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
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Kapak Resim Seç</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="image_webp" type="file" class="default" />
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">                                    	
                                        <label>Sertifika PDF(TR)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->belgeler_pdf_tr){?>
                                                <a href="../uploads/certificate/<?php echo $SayfaSonuc->belgeler_pdf_tr;?>" target="_blank"><img src="images/pdf_file.png" alt="" /></a>
                                                <?php } else { ?>
                                                <img src="images/dosya.jpg" alt="" />
                                                <?php }?>
                                                <?php } else { ?>
                                                <img src="images/dosya.jpg" alt="" />
                                                <?php }?>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Sertifika Seç</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="belge_pdf" type="file" class="default" accept=".pdf"/>
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Sertifika PDF(Diğer)</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if($_GET['islem']=='duzenle'){?>
                                                <?php if($SayfaSonuc->belgeler_pdf_diger){?>
                                                <a href="../uploads/certificate/other/<?php echo $SayfaSonuc->belgeler_pdf_diger;?>" target="_blank"><img src="images/pdf_file.png" alt="" /></a>
                                                <?php } else { ?>
                                                <img src="images/dosya.jpg" alt="" />
                                                <?php }?>
                                                <?php } else { ?>
                                                <img src="images/dosya.jpg" alt="" />
                                                <?php }?>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Sertifika Seç</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                                    <input name="belge_diger_pdf" type="file" class="default" accept=".pdf"/>
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top: 25px;">
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
                                    <div class="col-md-6">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?=$son_sira;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" readonly />
                                    </div>
                                    <?php endif ?>
                                    
                                    
                                    <?php if ($_GET['islem']=="duzenle"): ?>
                                    <div class="col-md-6">
                                        <label>Sıra Numarası</label>
                                        <input type="text" class="form-control" name="rank" value="<?php echo $SayfaSonuc->rank;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" />
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
