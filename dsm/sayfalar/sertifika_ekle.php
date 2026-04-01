<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
if(p('name') && g('islem')=="")
{
  $name = $_POST['name']; 
  $en_name = $_POST['en_name'];
  $de_name = $_POST['de_name'];
  $ru_name = $_POST['ru_name'];
  $statu = $_POST['statu'];
  $rank = $_POST['rank']; 
  $page_cat = $_POST['page_cat'];
  $description = $_POST['description']; 
  $en_description = $_POST['en_description'];
  $de_description = $_POST['de_description'];
  $ru_description = $_POST['ru_description'];

  include_once('class.upload.php');

  $upload = new upload($_FILES['image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($name).'-'.seo($ayar['firma_adi']);
    $upload->image_resize = true;
    $upload->image_x = 1250;
    $upload->image_ratio_y = true;
    $upload->process("../uploads/documents");
    if ($upload->processed){
      $image=''.$upload->file_dst_name.'';
    }
  }
  $gitti=$image=''.$upload->file_dst_name.'';

  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($name).'-'.seo($ayar['firma_adi']);
    $upload2->image_resize = true;
    $upload2->image_x = 1250;
    $upload2->image_ratio_y = true;
    $upload2->process("../uploads/documents/webp/");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  $gitti2=$image_webp=''.$upload2->file_dst_name.'';
  
  $slider_sorgu = Sorgu("INSERT INTO belgeler SET
    name = '$name',
    en_name = '$en_name',
    de_name = '$de_name',
    ru_name = '$ru_name',
    statu = '$statu',
    `rank` = '$rank', 
    page_cat = '$page_cat', 
    description = '$description', 
    en_description = '$en_description', 
    de_description = '$de_description',
    ru_description = '$ru_description',
    image = '$image',
    image_webp = '$image_webp'");
  if ($slider_sorgu) {
    $bilgi = ' <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    SertifikaEklenmiştir !
    </div> ';
  }
  else{
    $bilgi =  mysqli_error($conn);
  }
}

if(p('name') && g('islem')=="duzenle")
{
  $name = $_POST['name']; 
  $en_name = $_POST['en_name'];
  $de_name = $_POST['de_name'];
  $ru_name = $_POST['ru_name'];
  $statu = $_POST['statu'];
  $rank = $_POST['rank']; 
  $page_cat = $_POST['page_cat'];
  $description = $_POST['description']; 
  $en_description = $_POST['en_description'];
  $de_description = $_POST['de_description'];
  $ru_description = $_POST['ru_description'];
  $d_id = g('id');
  
  include_once('class.upload.php'); 
  $upload = new upload($_FILES['image']);
  if ($upload->uploaded){
    $upload->file_auto_rename = true;
    $upload->file_new_name_body = seo($name).'-'.seo($ayar['firma_adi']);
    $upload->image_resize = true;
    $upload->image_x = 1250;
    $upload->image_ratio_y = true;
    $upload->process("../uploads/documents");   
    if ($upload->processed){
      $image=''.$upload->file_dst_name.'';
    }
  }
  $upload2 = new upload($_FILES['image_webp']);
  if ($upload2->uploaded){
    $upload2->file_auto_rename = true;
    $upload2->file_new_name_body = seo($name).'-'.seo($ayar['firma_adi']);
    $upload2->image_resize = true;
    $upload2->image_x = 1250;
    $upload2->image_ratio_y = true;
    $upload2->process("../uploads/documents/webp/");
    if ($upload2->processed){
      $image_webp=''.$upload2->file_dst_name.'';
    }
  }
  
  $resim_bul=Sonuc(Sorgu("SELECT * FROM belgeler WHERE id='$d_id'"));
  $update_sql = "";
  if($image!="")
  {
      if(file_exists("../uploads/documents/".$resim_bul->image)){
          $resim_sil=unlink("../uploads/documents/".$resim_bul->image);
      }
      $gitti=$image=''.$upload->file_dst_name.'';
      $update_sql .= "image = '$image', ";
  }
  if($image_webp!="")
  {
      if(file_exists("../uploads/documents/webp/".$resim_bul->image_webp)){
          $resim_sil=unlink("../uploads/documents/webp/".$resim_bul->image_webp);
      }
      $gitti2=$image_webp=''.$upload2->file_dst_name.'';
      $update_sql .= "image_webp = '$image_webp', ";
  }
  
   $slider_duzenle_sorgu = Sorgu("UPDATE belgeler SET 
      name = '$name',
      en_name = '$en_name',
      de_name = '$de_name',
      ru_name = '$ru_name',
      statu = '$statu',
      `rank` = '$rank', 
      page_cat = '$page_cat',
      $update_sql
      description = '$description', 
      en_description = '$en_description', 
      de_description = '$de_description',
      ru_description = '$ru_description'      
      WHERE id= '$d_id'");
  
  
  if ($slider_duzenle_sorgu) {
    $bilgi = ' <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Sertifika Başarı ile Güncellenmiştir !
    </div> ';
  }
  else{
    $bilgi = ' <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Sertifika Güncelleme BAŞARISIZ ! !
    </div> ';
  }
}

if($_GET['islem']=="duzenle")
{
  $sayfaid = $_GET['id']; 
  $durum = "duzenle" ;
  $BelgeSonuc = Sonuc(Sorgu("SELECT * FROM belgeler WHERE id='$sayfaid'"));
}
$son_sira_sorgu = Sonuc(Sorgu("SELECT * FROM belgeler ORDER BY `rank` DESC LIMIT 1"));

$son_sira = intval($son_sira_sorgu->rank +1);
?>
<style> 
  #widthleft{ width: 31%; float: left; margin-right: 2%}
</style>
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
      <!-- left column -->
      <div class="col-md-12">
        <?php echo $bilgi;?>
        <!-- general form elements -->
        <div class="box box-primary">
         <div class="row">  
          <div class="col-md-12">
            <!-- form start -->
            <form method="post" action="" id="kayit" enctype="multipart/form-data">
              <div class="box-header with-border">
                <h3 class="box-title">Sertifika Ekle / Düzenle</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group has-error col-md-4">
                  <label for="name">Sertifika Adı (Türkçe) *** (Zorunlu)</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $BelgeSonuc->name;?>" id="name" placeholder="Sertifika Adı (Türkçe)" required="true" tabindex="1" autofocus />
                </div>

                <div class="form-group col-md-4">
                  <label for="en_name">Sertifika Adı (İngilizce)</label>
                  <input type="text" class="form-control" name="en_name" value="<?php echo $BelgeSonuc->en_name;?>" id="en_name" placeholder="Sertifika Adı (İngilizce)" />
                </div>

                <div class="form-group col-md-4">
                  <label for="de_name">Sertifika Adı (Almanca)</label>
                  <input type="text" class="form-control" name="de_name" value="<?php echo $BelgeSonuc->de_name;?>" id="de_name" placeholder="Sertifika Adı (Almanca)" />
                </div>

                <div class="col-md-12"><div class="clearfix"><hr></div>

                <!--<div class="form-group col-md-12">
                  <label>SertifikaKategorisi</label>
                  <select class="form-control" name="page_cat" id="page_cat">
                    <option value="0">Seçiniz</option>
                    <option value="1" <?php if(1 == $BelgeSonuc->page_cat) { ?> selected="selected" <?php } ?>>Sertifikalar</option>
                    <option value="2" <?php if(2 == $BelgeSonuc->page_cat) { ?> selected="selected" <?php } ?>>Marka Tescil Belgeleri</option>
                  </select>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12"><hr></div>-->

                <div class="form-group col-md-3">
                  <label>Sertifika Resim (JPEG, JPEG, PNG)</label>
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <?php if($_GET['islem']=='duzenle'){?>
                      <?php if($BelgeSonuc->image){?>
                        <img src="../uploads/documents/<?php echo $BelgeSonuc->image;?>" style="width: 200px; height: 200px;" alt="" />
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

             <div class="form-group col-md-3">
              <label>Sertifika Resim (WEBP)</label>
              <div class="fileupload fileupload-new" data-provides="fileupload">
               <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <?php if($_GET['islem']=='duzenle'){?>
                  <?php if($BelgeSonuc->image_webp){?>
                    <img src="../uploads/documents/webp/<?php echo $BelgeSonuc->image_webp;?>" style="width: 200px; height: 200px;" alt="" />
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

         <!--<div class="form-group col-md-3">
          <label>SertifikaResim (Almanca)</label>
          <div class="fileupload fileupload-new" data-provides="fileupload">
           <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            <?php if($_GET['islem']=='duzenle'){?>
              <?php if($BelgeSonuc->de_image){?>
                <img src="../uploads/documents/<?php echo $BelgeSonuc->de_image;?>" style="width: 200px; height: 200px;" alt="" />
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
             <input name="de_image" type="file" class="default" />
           </span>
           <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
         </div>
       </div>
     </div>-->


     <?php if($_GET['islem']=="duzenle"){?>
      <div class="form-group col-md-4">
        <label>Durumu</label>
        <div class="square-green">
          <div class="radio">
            <input tabindex="3" type="radio" value="1" <?php if($BelgeSonuc->statu == '1') {?> checked <?php } ?> name="statu">
            <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
          </div>
        </div>
        <div class="square-red">
          <div class="radio">
            <input tabindex="3" type="radio" value="0" <?php if($BelgeSonuc->statu == '0') {?> checked <?php } ?> name="statu"  >
            <div style="margin-left:30px;position:absolute;margin-top:-20px;">Pasif</div>
          </div>
        </div>
      </div>
    <?php }else{?>
      <div class="form-group col-md-4">
        <label>Durumu</label>
        <div class="square-green">
          <div class="radio">
            <input tabindex="3" type="radio" value="1"  checked  name="statu">
            <div style="margin-left:30px;position:absolute;margin-top:-20px;">Aktif</div>
          </div>
        </div>
        <div class="square-red">
          <div class="radio">
            <input tabindex="3" type="radio" value="0"  name="statu"  >
            <div style="margin-left:30px;position:absolute;margin-top:-20px;">Pasif</div>
          </div>
        </div>
      </div>
    <?php } ?>                    

    <?php if ($_GET['islem']==""): ?>
      <div class="col-md-4">
        <label>Sıra Numarası</label>
        <input type="text" class="form-control" name="rank" value="<?=$son_sira;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" readonly />
      </div>
    <?php endif ?>


    <?php if ($_GET['islem']=="duzenle"): ?>
      <div class="col-md-4">
        <label>Sıra Numarası</label>
        <input type="text" class="form-control" name="rank" value="<?php echo $BelgeSonuc->rank;?>" id="rank" placeholder="Sıra Numarası" maxlength="2" size="2" readonly />
      </div>
    <?php endif ?>
  </div>

  <!--<div class="col-md-12"><hr></div>

  <div class="clearfix"></div>

  <div class="form-group col-md-4">
    <label for="icerik">SertifikaAçıklaması (Türkçe)</label>
    <textarea id="summernote" name="description" id="icerik" placeholder="İçerik Giriniz."><?php echo $BelgeSonuc->description;?></textarea>
  </div>
  <div class="form-group col-md-4">
    <label for="icerik">SertifikaAçıklaması (İngilizce)</label>
    <textarea id="summernote2" name="en_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $BelgeSonuc->en_description;?></textarea>
  </div>
  <div class="form-group col-md-4">
    <label for="icerik">SertifikaAçıklaması (Almanca)</label>
    <textarea id="summernote3" name="de_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $BelgeSonuc->de_description;?></textarea>
  </div>
                  <!--<div class="form-group">
                    <label for="icerik">SertifikaAçıklaması (Rusça)</label>
                    <textarea id="summernote4" style="width:100%;" name="ru_page_description" id="icerik" placeholder="İçerik Giriniz."><?php echo $BelgeSonuc->ru_page_description;?></textarea>
                  </div>-->

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <?php if($_GET['islem']=="duzenle"){?>
                      <div class="form-group col-md-12" >
                        <button type="submit" onclick="submit();" style="float: right;" class="btn btn-primary">Güncelle</button> 
                      </div>
                    <?php }else{?>
                      <div class="form-group col-md-12" >
                        <button type="submit" onclick="submit();" style="float: right;"  class="btn btn-primary">Kaydet</button>
                      </div>         
                    <?php } ?>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
            </div>
          </div>
        </div><!--/.col (left) -->
        <!-- right column -->
      </div>   <!-- /.row -->
    </section><!-- /.content -->
  </div>

  <script type="text/javascript">
    $('body').keypress(function(e){
      if (e.keyCode == 13)
      {
        $('#kayit').submit();
      }
    });
  </script>
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
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <link href="dist/css/summernote.css" rel="stylesheet">
  <script src="dist/js/summernote.js"></script>
  <script>
    var isEmpty = $('.summernote').summernote('isEmpty');
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });
    </script>

    <script>
      var isEmpty = $('.summernote').summernote('isEmpty');
      $('#summernote2').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });
    </script>

    <script>
      var isEmpty = $('.summernote').summernote('isEmpty');
      $('#summernote3').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });
    </script>

    <script>
      var isEmpty = $('.summernote').summernote('isEmpty');
      $('#summernote4').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
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

      function onChangeTag(input,tag) {
        alert("Özelliği Değiştir: " + tag);
      }
      $(function() {
        $('#tags_3').tagsInput({
          width: 'auto',
          height: 150,
          autocomplete_url:'test/fake_json_endpoint.html'
        });
      });
    </script>