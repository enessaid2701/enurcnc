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
  $title = $_POST['title'];
  $en_title = $_POST['en_title'];
  $de_title = $_POST['de_title'];
  $ru_title = $_POST['ru_title'];
  $fr_title = $_POST['fr_title'];
  $es_title = $_POST['es_title'];
  $it_title = $_POST['it_title'];
  $ar_title = $_POST['ar_title'];

  $statu = $_POST['statu'];
  $rank = $_POST['rank'];

  $link = $_POST['link'];
  $en_link = $_POST['en_link'];
  $de_link = $_POST['de_link'];
  $ru_link = $_POST['ru_link'];
  $fr_link = $_POST['fr_link'];
  $es_link = $_POST['es_link'];
  $it_link = $_POST['it_link'];
  $ar_link = $_POST['ar_link'];
  
  $videolar_sorgu = Sorgu("INSERT INTO videolar SET
    title = '$title',
    en_title = '$en_title',
    de_title = '$de_title',
    ru_title = '$ru_title',
    fr_title = '$fr_title',
    es_title = '$es_title',
    it_title = '$it_title',
    ar_title = '$ar_title',

    statu = '$statu',
    rank = '$rank',

    link = '$link',
    en_link = '$en_link',
    de_link = '$de_link',
    ru_link = '$ru_link',
    fr_link = '$fr_link',
    es_link = '$es_link',
    it_link = '$it_link',
    ar_link = '$ar_link'");
  if ($videolar_sorgu) 
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
  $title = $_POST['title'];
  $en_title = $_POST['en_title'];
  $de_title = $_POST['de_title'];
  $ru_title = $_POST['ru_title'];
  $fr_title = $_POST['fr_title'];
  $es_title = $_POST['es_title'];
  $it_title = $_POST['it_title'];
  $ar_title = $_POST['ar_title'];

  $statu = $_POST['statu'];
  $rank = $_POST['rank'];

  $link = $_POST['link'];
  $en_link = $_POST['en_link'];
  $de_link = $_POST['de_link'];
  $ru_link = $_POST['ru_link'];
  $fr_link = $_POST['fr_link'];
  $es_link = $_POST['es_link'];
  $it_link = $_POST['it_link'];
  $ar_link = $_POST['ar_link'];

  $d_id = g('id');
  
  $videolar_duzenle_sorgu2 = Sorgu("UPDATE videolar SET 
    title = '$title',
    en_title = '$en_title',
    de_title = '$de_title',
    ru_title = '$ru_title',
    fr_title = '$fr_title',
    es_title = '$es_title',
    it_title = '$it_title',
    ar_title = '$ar_title',

    statu = '$statu',
    rank = '$rank',

    link = '$link',
    en_link = '$en_link',
    de_link = '$de_link',
    ru_link = '$ru_link',
    fr_link = '$fr_link',
    es_link = '$es_link',
    it_link = '$it_link',
    ar_link = '$ar_link'    
      WHERE id= '$d_id'");

  if ($videolar_duzenle_sorgu) {
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
  $videolarSonuc = Sonuc(Sorgu("SELECT * FROM videolar WHERE id='$sayfaid'"));
}
/* Genel Sıra */
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM videolar ORDER BY `rank` DESC LIMIT 1"));
$son_sira = intval($son_sira_sorgu->rank +1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-picture-o"></i> videolar Ekle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">videolar Ekle</li>
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
                          <?php $videolar_LangSorgu = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($videolar_LangSonuc = mysqli_fetch_array($videolar_LangSorgu)){?>
                          <li <?php if ($videolar_LangSonuc['id']==1): ?>style="display: none;"<?php endif ?>><a href="#<?=$videolar_LangSonuc['id']?>" data-toggle="tab"><?=$videolar_LangSonuc['name']?></a></li>
                          <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title">Türkçe İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="title">Video Adı </label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $videolarSonuc->title;?>" id="title" placeholder="Video Adı" required="true" tabindex="1" autofocus="" />
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="link">Video Linki</label>
                                            <input type="text" class="form-control" name="link" value="<?php echo $videolarSonuc->link;?>" id="link" placeholder="Video Linki" />
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
                            <?php $videolar_LangSorgu2 = Sorgu("SELECT * FROM dil WHERE statu = 1 ORDER BY id ASC"); while($videolar_LangSonuc2 = mysqli_fetch_array($videolar_LangSorgu2)){$code=$videolar_LangSonuc2['code'];?>
                            <div class="tab-pane" id="<?=$videolar_LangSonuc2['id']?>">
                                <div class="box box-primary">
                                    <div class="box-header"><br><h3 class="box-title"><?=$videolar_LangSonuc2['name']?> İçerikler</h3><hr style="margin-top: 15px;margin-bottom: 0px;"></div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="<?=$videolar_LangSonuc2['code']?>_title">Video Adı </label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->en_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->de_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->ru_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->fr_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->es_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->it_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_title" value="<?php echo $videolarSonuc->ar_title;?>" id="<?=$videolar_LangSonuc2['code']?>_title" placeholder="Video Adı" required="true" /><?php endif ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="<?=$videolar_LangSonuc2['code']?>_link">Video Linki</label>
                                            <?php if ($code == "en"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->en_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "de"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->de_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "ru"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->ru_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "fr"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->fr_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "es"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->es_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "it"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->it_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
                                            <?php if ($code == "ar"): ?><input type="text" class="form-control" name="<?=$videolar_LangSonuc2['code']?>_link" value="<?php echo $videolarSonuc->ar_link;?>" id="<?=$videolar_LangSonuc2['code']?>_link" placeholder="Video Linki" required="true" /><?php endif ?>
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
                            <h3 class="box-title">Genel Ayarlar</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php if($_GET['islem']=="duzenle"){?>
                                        <label>Durumu</label>
                                        <div class="square-green">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="1" <?php if($videolarSonuc->statu == '1') {?> checked <?php } ?> name="statu">
                                                <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
                                            </div>
                                        </div>
                                        <div class="square-red">
                                            <div class="radio">
                                                <input tabindex="3" type="radio" value="0" <?php if($videolarSonuc->statu == '0') {?> checked <?php } ?> name="statu">
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
                                        <input type="text" class="form-control" name="rank" value="<?php echo $videolarSonuc->rank;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" />
                                    </div>
                                    <?php endif ?>
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
