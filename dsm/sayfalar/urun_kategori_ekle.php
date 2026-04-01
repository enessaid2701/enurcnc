<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
/* Yeni Kayıt */
if(p('page_name') && g('islem')=="")
{
  $seo_title = $_POST['seo_title']; 
  $en_seo_title = $_POST['en_seo_title'];
  $de_seo_title = $_POST['de_seo_title']; 
  $ru_seo_title = $_POST['ru_seo_title'];
  $fr_seo_title = $_POST['fr_seo_title'];
  $es_seo_title = $_POST['es_seo_title'];
  $it_seo_title = $_POST['it_seo_title'];
  $ar_seo_title = $_POST['ar_seo_title'];

  $seo_descriptions = $_POST['seo_descriptions']; 
  $en_seo_descriptions  = $_POST['en_seo_descriptions'];
  $de_seo_descriptions = $_POST['de_seo_descriptions']; 
  $ru_seo_descriptions = $_POST['ru_seo_descriptions'];
  $fr_seo_descriptions = $_POST['fr_seo_descriptions'];
  $es_seo_descriptions = $_POST['es_seo_descriptions'];
  $it_seo_descriptions = $_POST['it_seo_descriptions'];
  $ar_seo_descriptions = $_POST['ar_seo_descriptions'];

  $seo_link = $_POST['seo_link'];  
  $en_seo_link = $_POST['en_seo_link'];  
  $de_seo_link = $_POST['en_seo_link'];
  $ru_seo_link = $_POST['en_seo_link'];
  $fr_seo_link = $_POST['en_seo_link'];
  $es_seo_link = $_POST['en_seo_link'];
  $it_seo_link = $_POST['en_seo_link'];
  $ar_seo_link = $_POST['en_seo_link'];

  $page_name = $_POST['page_name']; 
  $en_page_name = $_POST['en_page_name']; 
  $de_page_name = $_POST['de_page_name']; 
  $ru_page_name = $_POST['ru_page_name'];
  $fr_page_name = $_POST['fr_page_name'];
  $es_page_name = $_POST['es_page_name'];
  $it_page_name = $_POST['it_page_name'];
  $ar_page_name = $_POST['ar_page_name'];

  $page_description = $_POST['page_description']; 
  $en_page_description = $_POST['en_page_description'];
  $de_page_description = $_POST['de_page_description']; 
  $ru_page_description = $_POST['ru_page_description'];
  $fr_page_description = $_POST['fr_page_description'];
  $es_page_description = $_POST['es_page_description'];
  $it_page_description = $_POST['it_page_description'];
  $ar_page_description = $_POST['ar_page_description'];

  $statu  = p('statu');
  $rank   = p('rank');

  include('class.upload.php');
  $upload = new upload($_FILES['page_image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = $seo_link.'-'.seo($ayar['firma_adi']);
    $upload->process("../uploads/product_cat");
    if ($upload->processed){
      $sayfaresim=''.$upload->file_dst_name.'';
    }
  }
  $gitti=$sayfaresim=''.$upload->file_dst_name.'';

  $upload2 = new upload($_FILES['page_image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = $seo_link.'-'.seo($ayar['firma_adi']);
    $upload2->process("../uploads/product_cat/webp");
    if ($upload2->processed){
      $page_image_webp=''.$upload2->file_dst_name.'';
    }
  }
  $gitti2=$page_image_webp=''.$upload2->file_dst_name.'';
  
  $sor = Sonuc(Sorgu("SELECT id FROM urun_kategori WHERE seo_link='$seo_link'"));
  if($sor->id != '')
  { 
    $bilgi = ' <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Aynı Kayıttan Mevcut. Lütfen Farklı Kategori Ekleyiniz !
    </div> '; 
  } 
  else { 
    $sayfa_sorgu  = Sorgu("INSERT INTO urun_kategori SET
      page_name = '$page_name', en_page_name = '$en_page_name', de_page_name = '$de_page_name', ru_page_name = '$ru_page_name',
      fr_page_name = '$fr_page_name', es_page_name = '$es_page_name', it_page_name = '$it_page_name', ar_page_name = '$ar_page_name',

      page_description = '$page_description', en_page_description = '$en_page_description', de_page_description = '$de_page_description', ru_page_description = '$ru_page_description',
      fr_page_description = '$fr_page_description', es_page_description = '$es_page_description', it_page_description = '$it_page_description', ar_page_description = '$ar_page_description',

      seo_title = '$seo_title', en_seo_title = '$en_seo_title', de_seo_title = '$de_seo_title', ru_seo_title = '$ru_seo_title',
      fr_seo_title = '$fr_seo_title', es_seo_title = '$es_seo_title', it_seo_title = '$it_seo_title', ar_seo_title = '$ar_seo_title',

      seo_descriptions = '$seo_descriptions', en_seo_descriptions = '$en_seo_descriptions', de_seo_descriptions = '$de_seo_descriptions', ru_seo_descriptions = '$ru_seo_descriptions',
      fr_seo_descriptions = '$fr_seo_descriptions', es_seo_descriptions = '$es_seo_descriptions', it_seo_descriptions = '$it_seo_descriptions', ar_seo_descriptions = '$ar_seo_descriptions',

      seo_link = '$seo_link', en_seo_link = '$en_seo_link', de_seo_link = '$de_seo_link', ru_seo_link = '$en_seo_link',
      fr_seo_link = '$fr_seo_link', es_seo_link = '$es_seo_link', it_seo_link = '$it_seo_link', ar_seo_link = '$en_seo_link',

      page_image   = '$sayfaresim',
      page_image_webp   = '$page_image_webp',
      rank    = '$rank',
      statu = '$statu'"); 

    if ($sayfa_sorgu) {
      $bilgi = ' <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Başarı ile Eklenmiştir !
      </div> ';
    } else {
      $bilgi = mysqli_error($conn);
    }
  } 
}

/* Güncelleme */
if(p('page_name') && g('islem')=="duzenle")
{
    $ana_kat_id = $_GET['id'];
    Sorgu("DELETE FROM alt_kategori_baglac WHERE kat_id = '$ana_kat_id' ");
    if(isset($_POST['alt_kategori_sec']) && $_POST['alt_kategori_sec'] != ''){
        foreach($_POST['alt_kategori_sec'] as $alt_cat){
            Sorgu("INSERT INTO alt_kategori_baglac SET kat_id = '$ana_kat_id', alt_kat_id = '$alt_cat' ");
        }
    }
  $seo_title = $_POST['seo_title']; 
  $en_seo_title = $_POST['en_seo_title'];
  $de_seo_title = $_POST['de_seo_title']; 
  $ru_seo_title = $_POST['ru_seo_title'];
  $fr_seo_title = $_POST['fr_seo_title'];
  $es_seo_title = $_POST['es_seo_title'];
  $it_seo_title = $_POST['it_seo_title'];
  $ar_seo_title = $_POST['ar_seo_title'];

  $seo_descriptions = $_POST['seo_descriptions']; 
  $en_seo_descriptions  = $_POST['en_seo_descriptions'];
  $de_seo_descriptions = $_POST['de_seo_descriptions']; 
  $ru_seo_descriptions = $_POST['ru_seo_descriptions'];
  $fr_seo_descriptions = $_POST['fr_seo_descriptions'];
  $es_seo_descriptions = $_POST['es_seo_descriptions'];
  $it_seo_descriptions = $_POST['it_seo_descriptions'];
  $ar_seo_descriptions = $_POST['ar_seo_descriptions'];

  $seo_link = $_POST['seo_link'];  
  $en_seo_link = $_POST['en_seo_link'];  
  $de_seo_link = $_POST['en_seo_link'];
  $ru_seo_link = $_POST['en_seo_link'];
  $fr_seo_link = $_POST['en_seo_link'];
  $es_seo_link = $_POST['en_seo_link'];
  $it_seo_link = $_POST['en_seo_link'];
  $ar_seo_link = $_POST['en_seo_link'];

  $page_name = $_POST['page_name']; 
  $en_page_name = $_POST['en_page_name']; 
  $de_page_name = $_POST['de_page_name']; 
  $ru_page_name = $_POST['ru_page_name'];
  $fr_page_name = $_POST['fr_page_name'];
  $es_page_name = $_POST['es_page_name'];
  $it_page_name = $_POST['it_page_name'];
  $ar_page_name = $_POST['ar_page_name'];

  $page_description = $_POST['page_description']; 
  $en_page_description = $_POST['en_page_description'];
  $de_page_description = $_POST['de_page_description']; 
  $ru_page_description = $_POST['ru_page_description'];
  $fr_page_description = $_POST['fr_page_description'];
  $es_page_description = $_POST['es_page_description'];
  $it_page_description = $_POST['it_page_description'];
  $ar_page_description = $_POST['ar_page_description'];

  $statu    = p('statu');
  $rank    = p('rank');
  $d_id     = g('id');
  
  include('class.upload.php');
  $upload = new upload($_FILES['page_image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($ayar['firma_adi']).'-'.$seo_link;
    $upload->process("../uploads/product_cat");
    if ($upload->processed){
      $sayfaresim=''.$upload->file_dst_name.'';
    }
  }
  $upload2 = new upload($_FILES['page_image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($ayar['firma_adi']).'-'.$seo_link;
    $upload2->process("../uploads/product_cat/webp");
    if ($upload2->processed){
      $page_image_webp=''.$upload2->file_dst_name.'';
    }
  }
  
  $sor = Sonuc(Sorgu("SELECT id FROM urun_kategori WHERE seo_link='$seo_link' AND id != '$d_id'"));

  if($sor->id != "")
    {
      $bilgi = ' <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Aynı Kayıttan MevcutÜrün. Lütfen Farklı Bir Kategori Adı Giriniz !
      </div> '; 
    } else {
      $resim_bul=Sonuc(Sorgu("SELECT * FROM urun_kategori WHERE id='$d_id'"));
      $update_sql = "";
      if($sayfaresim!="")
      {
          if(file_exists("../uploads/product_cat/".$resim_bul->page_image)){
              $resim_sil=unlink("../uploads/product_cat/".$resim_bul->page_image);
          }
          
          $gitti=$sayfaresim=''.$upload->file_dst_name.'';
          $update_sql .= "page_image = '$sayfaresim', ";
      }
      if($page_image_webp!="")
      {
          if(file_exists("../uploads/product_cat/webp/".$resim_bul->page_image_web)){
              $resim_sil=unlink("../uploads/product_cat/webp/".$resim_bul->page_image_web);
          }
          
          $gitti2=$page_image_webp=''.$upload2->file_dst_name.'';
          $update_sql .= "page_image_web = '$page_image_webp', ";
      }
      
      $sayfa_duzenle_sorgu  = Sorgu("UPDATE urun_kategori SET 
        page_name = '$page_name', en_page_name = '$en_page_name', de_page_name = '$de_page_name', ru_page_name = '$ru_page_name',
      fr_page_name = '$fr_page_name', es_page_name = '$es_page_name', it_page_name = '$it_page_name', ar_page_name = '$ar_page_name',

      page_description = '$page_description', en_page_description = '$en_page_description', de_page_description = '$de_page_description', ru_page_description = '$ru_page_description',
      fr_page_description = '$fr_page_description', es_page_description = '$es_page_description', it_page_description = '$it_page_description', ar_page_description = '$ar_page_description',

      seo_title = '$seo_title', en_seo_title = '$en_seo_title', de_seo_title = '$de_seo_title', ru_seo_title = '$ru_seo_title',
      fr_seo_title = '$fr_seo_title', es_seo_title = '$es_seo_title', it_seo_title = '$it_seo_title', ar_seo_title = '$ar_seo_title',

      seo_descriptions = '$seo_descriptions', en_seo_descriptions = '$en_seo_descriptions', de_seo_descriptions = '$de_seo_descriptions', ru_seo_descriptions = '$ru_seo_descriptions',
      fr_seo_descriptions = '$fr_seo_descriptions', es_seo_descriptions = '$es_seo_descriptions', it_seo_descriptions = '$it_seo_descriptions', ar_seo_descriptions = '$ar_seo_descriptions',

      seo_link = '$seo_link', en_seo_link = '$en_seo_link', de_seo_link = '$de_seo_link', ru_seo_link = '$en_seo_link',
      fr_seo_link = '$fr_seo_link', es_seo_link = '$es_seo_link', it_seo_link = '$it_seo_link', ar_seo_link = '$en_seo_link',

        $update_sql
        rank    = '$rank',
        statu = '$statu' 
        WHERE id= '$d_id'");
        
      if ($sayfa_duzenle_sorgu) {
        $bilgi = ' <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Başarı ile Güncellenmiştir !
        </div> ';
      } else {
        $bilgi = ' <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Kategori ile Güncellenmemiştir ! Lütfen Daha Sonra Tekrar Dene yiniz !
        </div> ';
      }
  }
}

/* Genel Güncelleme ID */
if($_GET['islem']=="duzenle")
{
  $sayfaid = $_GET['id']; 
  $statu = "duzenle" ;
  
  $SayfaSonuc = Sonuc(Sorgu("SELECT * FROM urun_kategori WHERE id='$sayfaid'"));
}
/* Genel Sıra */
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM urun_kategori ORDER BY `rank` DESC LIMIT 1"));
$son_sira = intval($son_sira_sorgu->rank +1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-edit"></i> Kategori Ekle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Kategori Ekle</li>
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
                                                <h3 class="box-title">Kategori İçerikleri - Türkçe</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group has-error">
                                                    <label for="page_name">Kategori Adı *** (Zorunlu)</label>
                                                    <input type="text" class="form-control page_name" name="page_name" value="<?php echo $SayfaSonuc->page_name;?>" id="page_name" placeholder="Kategori Adı" tabindex="1" autofocus required>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <hr />
                                                </div>
                                                <div class="clearfix"></div>
                                                
                                                <div class="form-group">
                                                    <label for="icerik">Kategori Açıklaması</label>
                                                    <textarea id="summernote" style="width:100%;" name="page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->page_description;?></textarea>
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
                                                <h3 class="box-title">SEO Ayarlar - Türkçe</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="seo_link">Sayfa Linki</label>
                                                        <input type="text" class="form-control" name="seo_link" value="<?php echo $SayfaSonuc->seo_link;?>" id="seo_link" placeholder="Sayfa Linki" />
                                                    </div>
                                                    
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
                                                <h3 class="box-title">Genel Ayarlar - Türkçe</h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label>Resim (JPEG, PNG)</label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <?php if($_GET['islem']=='duzenle'){?>
                                                                    <?php if($SayfaSonuc->page_image){?>
                                                                    <img src="../uploads/product_cat/<?php echo $SayfaSonuc->page_image;?>" alt="" />
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
                                                                        <input name="page_image" type="file" class="default" />
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Resim (WEBP)</label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <?php if($_GET['islem']=='duzenle'){?>
                                                                    <?php if($SayfaSonuc->page_image_webp){?>
                                                                    <img src="../uploads/product_cat/webp/<?php echo $SayfaSonuc->page_image_webp;?>" alt="" />
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
                                                                        <input name="page_image_webp" type="file" class="default" />
                                                                    </span>
                                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <?php
                                                            if(isset($_GET['islem']) && $_GET['islem'] == "duzenle"){
                                                            $baglaclar = Sorgu("SELECT * FROM alt_kategori_baglac WHERE kat_id = '$sayfaid' ");
                                                            $baglac_arr = [];
                                                            foreach($baglaclar as $baglac){
                                                                $baglac_arr[$baglac['alt_kat_id']] = $baglac['alt_kat_id'];
                                                            }
                                                            $alt_kategoriler = Sorgu("SELECT * FROM urun_alt_kategori WHERE statu = 1");
                                                            if(isset($alt_kategoriler) && $alt_kategoriler != ''){
                                                            foreach($alt_kategoriler as $alt_kategori){
                                                            ?>
                                                            <div class="col-md-6">
                                                                <label for=""><?=$alt_kategori['seo_title']?></label>
                                                                 
                                                                <input <?=(isset($baglac_arr[$alt_kategori['id']]))?"checked selected": "";?> type="checkbox" name="alt_kategori_sec[]" value="<?=$alt_kategori['id']?>">
                                                            </div>
                                                            <?php
                                                            }}}
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <?php if($_GET['islem']=="duzenle"){?>
                                                            <label>Durumu</label>
                                                            <div class="square-green">                                                              
                                                                <div class="radio">
                                                                    <input tabindex="3" type="radio" value="1" <?php if ($SayfaSonuc->statu == '1'): ?> checked <?php endif ?> name="statu">
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
                                                <h3 class="box-title">Kategori İçerikleri - <?=$Slider_LangSonuc2['name']?></h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group has-error">
                                                    <label for="<?=$Slider_LangSonuc2['code']?>_page_name">Kategori Adı</label>
                                                    <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->en_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->de_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->ru_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->fr_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->es_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->it_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                    <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_page_name" name="<?=$Slider_LangSonuc2['code']?>_page_name" value="<?php echo $SayfaSonuc->ar_page_name;?>" id="<?=$Slider_LangSonuc2['code']?>_page_name" placeholder="Kategori Adı" tabindex="1" /><?php endif ?>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <hr />
                                                </div>
                                                <div class="clearfix"></div>
                                                
                                                <div class="form-group">
                                                    <label for="icerik">Kategori Açıklaması</label>
                                                    <?php if ($code == "en"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->en_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "de"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->de_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "ru"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->ru_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "fr"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->fr_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "es"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->es_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "it"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->it_page_description;?></textarea><?php endif ?>
                                                    <?php if ($code == "ar"): ?><textarea id="summernote<?=$Slider_LangSonuc2['id']?>" style="width:100%;" name="<?=$Slider_LangSonuc2['code']?>_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->ar_page_description;?></textarea><?php endif ?>
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
                                                <h3 class="box-title">SEO Ayarlar - <?=$Slider_LangSonuc2['name']?></h3>
                                                <div class="pull-right box-tools">
                                                    <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Aç / Kapat "> Aç / Kapat &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="<?=$Slider_LangSonuc2['code']?>_seo_link">Sayfa Linki</label>
                                                        <?php if ($code == "en"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->en_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "de"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->de_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "ru"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->ru_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "fr"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->fr_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "es"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->es_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "it"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->it_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                        <?php if ($code == "ar"): ?><input type="text" class="form-control <?=$Slider_LangSonuc2['code']?>_seo_link" name="<?=$Slider_LangSonuc2['code']?>_seo_link" value="<?php echo $SayfaSonuc->ar_seo_link;?>" id="<?=$Slider_LangSonuc2['code']?>_seo_link" placeholder="Sayfa Linki" tabindex="1" /><?php endif ?>
                                                    </div>
                                                    
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
    var left = (screen.width ) ;
    var top = (screen.height ) ; }
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
        return this;
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
