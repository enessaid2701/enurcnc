<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php

if($_POST["musteri_sil"] && g('islem')=="duzenle")
{
    $sil_id = $_POST["musteri_sil"];
    Sorgu("DELETE FROM musteri WHERE id = '$sil_id '");
}elseif($_POST["firma_adi"] && g('islem')=="")
{
  $firma_adi = addslashes($_POST["firma_adi"]);
  $firma_adres = addslashes($_POST["firma_adres"]);
  $vergi_no = addslashes($_POST["vergi_no"]);
  $vergi_daire = addslashes($_POST["vergi_daire"]);
  $kod = $_POST["kod"];
	
	
	$yonetici_ekle_sorgu	=	Sorgu("INSERT INTO musteri SET
    firma_adi	=	'$firma_adi',
    firma_adres	=	'$firma_adres',
    vergi_no	=	'$vergi_no',
    kod	=	'$kod',
    vergi_daire	=	'$vergi_daire'
    ");	
 
	$bilgi = '  <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 Firma Başarı ile Eklenmiştir !
 </div>
 ' ;
 
}


if(p('firma_adi') && g('islem')=="duzenle")
{
  $d_id = $_GET["id"];
  $firma_adi = addslashes($_POST["firma_adi"]);
  $firma_adres = addslashes($_POST["firma_adres"]);
  $vergi_no = addslashes($_POST["vergi_no"]);
  $vergi_daire = addslashes($_POST["vergi_daire"]);
  $kod = $_POST["kod"];
	
	$yonetici_duzenle_sorgu = Sorgu("UPDATE musteri SET 
    firma_adi	=	'$firma_adi',
    firma_adres	=	'$firma_adres',
    vergi_no	=	'$vergi_no',
    kod	=	'$kod',
    vergi_daire	=	'$vergi_daire'
    WHERE id	=	'$d_id'
   ");
  $bilgi = '  <div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  Firma Başarı ile Güncellenmiştir !
  </div>
  ' ;
}

if($_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];	
	$durum = "duzenle" ;
	$Yonetici = Sonuc(Sorgu("SELECT m.*,
	(SELECT COUNT(ol.id) FROM odeme_linki ol WHERE ol.musteri_id = m.id ) AS odeme_link_sayi
	FROM musteri m WHERE m.id = '$sayfaid'"));
}

?>
    <style>
        .linktooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .linktooltip .linktooltiptext {
            visibility: hidden;
            width: 450px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -225px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .linktooltip .linktooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: black transparent transparent transparent;
        }

        .linktooltip:hover .linktooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .kopyala-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
        }
    </style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small><i class="fa fa-users"></i> Firma Ekle / Güncelle</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
      <li class="active">Firma Ekle</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
                <?php if(isset($_GET["id"]) && $_GET["id"] > 0){ ?>
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding:0;">
                        <h3 class="text-center">
                          <?=$Yonetici->firma_adi?>
                          </h3>
                          <h4 class="text-center">Ödeme Hareketleri
                        </h4>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Ödeme Linki</th>
                                    <th>Link Oluşturma Tarihi</th>
                                    <th>İşlem No</th>
                                    <th>Ödeme Durumu</th>
                                    <th>Ödeme Tarih</th>
                                    <th>Talep Edilen Ödeme Tutarı</th>
                                    <th>Ödenen Tutar</th>
                                    <th>Yetkili Ad-Soyad</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $SayfaSorgu = Sorgu("SELECT * FROM odeme_linki WHERE musteri_id = '$sayfaid' ORDER BY `id` DESC");
                                $count = 0;
                                $current_time = new DateTime();
                                while($SayfaSonuc = Sonuc($SayfaSorgu)){
                                $upt_id = $SayfaSonuc->id;
                                $link_statu = $SayfaSonuc->link_durumu;
                                $created_time = new DateTime($SayfaSonuc->created_at);
                                $interval = $current_time->getTimestamp() - $created_time->getTimestamp();
                                if ($interval >= 43200) {
                                    Sorgu("UPDATE odeme_linki SET link_durumu = '0' WHERE id = '$upt_id' ");
                                    $link_statu = 0;
                                }
                                $count++;?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td>
                                        <?php if($link_statu == 1){ ?>
                                        <div class="linktooltip">
                                            <button class="btn btn-sm btn-info" onclick="copyToClipboard(this)">Linki Kopyala</button>
                                            <span class="linktooltiptext"><?=$baseOdeme?>/<?=$SayfaSonuc->odeme_linki; ?></span>
                                        </div>
                                        <?php }else{ ?>
                                            <span class="label label-danger">Pasif Link</span>
                                        <?php } ?>
                                    </td>
                                    <td><?=$SayfaSonuc->created_at; ?></td>
                                    <td><?=($SayfaSonuc->islem_no != "")?$SayfaSonuc->islem_no:"---" ?></td>
                                    <td>
                                        <?php if($SayfaSonuc->odeme_durumu == 0){ ?>
                                            <span class="label label-danger">Ödenmedi</span>
                                        <?php }elseif($SayfaSonuc->odeme_durumu == 1){ ?>
                                            <span class="label label-warning">Kısmen Ödendi</span>
                                        <?php }elseif($SayfaSonuc->odeme_durumu == 2){ ?>
                                            <span class="label label-success">Ödendi</span>
                                        <?php } ?>
                                    </td>
                                    <td><?=$SayfaSonuc->odenen_tarih; ?></td>
                                    <td>
                                      <?=$SayfaSonuc->odenecek_tutar; ?>
                                      <?php if($link_statu == 1){?>
                                          <a href="<?=$base?>/dsm/odeme-linki-olustur.html?islem=duzenle&id=<?=$upt_id?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                      <?php } ?>
                                    </td>
                                    <td><?=$SayfaSonuc->odenen_tutar; ?></td>
                                    <td><?=$SayfaSonuc->yetkili_ad; ?> <?=$SayfaSonuc->yetkili_soyad; ?></td>
                                    <td><?=$SayfaSonuc->yetkili_tel; ?></td>
                                    <td><?=$SayfaSonuc->yetkili_mail; ?></td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php } ?>
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <?php echo $bilgi;?>
        <!-- general form elements -->
        <div class="box box-primary">
         <div class="row">  
          <div class="col-md-12">
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group col-md-4">
                  <label for="cari_kod">Cari Kod</label>
                  <input type="text" class="form-control" name="kod" value="<?php echo $Yonetici->kod;?>" id="cari_kod" placeholder="Cari Kod">
                </div>

                <div class="form-group col-md-4">
                  <label for="adsoyad">Firma Adı</label>
                  <input type="text" class="form-control" name="firma_adi" value="<?php echo $Yonetici->firma_adi;?>" id="adsoyad" placeholder="Firma Adı">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="email">Vergi No</label>
                  <input type="text" class="form-control" name="vergi_no" value="<?php echo $Yonetici->vergi_no;?>" id="email" placeholder="Vergi No">
                </div>
                
                <div class="form-group col-md-6">
                  <label for="firma_adres">Firma Adresi</label>
                  <textarea name="firma_adres" class="form-control" id="firma_adres" cols="30" rows="10"><?php echo $Yonetici->firma_adres;?></textarea>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="vergi_daire">Vergi Dairesi</label>
                  <textarea name="vergi_daire" class="form-control" id="vergi_daire" cols="30" rows="10"><?php echo $Yonetici->vergi_daire;?></textarea>
                </div>
                
              </div><!-- /.box-body -->

              <div class="box-footer text-center">
                <?php if($_GET['islem']=="duzenle"){?>
                  <button type="submit" onclick="submit();" class="btn btn-primary">Bilgileri Güncelle</button>	
                  <a href="<?=$ayar["website_link"]?>/dsm/odeme-linki-olustur.html?musteri=<?=$sayfaid?>" class="btn btn-success">Ödeme Linki Oluştur</a>	
                <?php }else{?>
                  <button type="submit" onclick="submit();" class="btn btn-primary">Kaydet</button>
                <?php } ?>
                <?php if($_GET['islem']=="duzenle" && $Yonetici->odeme_link_sayi < 1){?>
                  <button type="submit" name="musteri_sil" value="<?=$_GET['id']?>" class="btn btn-danger">Müşteriyi Sil</button>
                <?php } ?>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
      </div>
    </div><!--/.col (left) -->
    <!-- right column -->
  </div>   <!-- /.row -->

</section><!-- /.content -->
</div>

<!-- jQuery 2.1.3 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>
<script type="text/javascript">
    $(function () {
        $("#example1")
            .dataTable();
        $('#example2')
            .dataTable({
                "bPaginate": true
                , "bLengthChange": false
                , "bFilter": false
                , "bSort": true
                , "bInfo": true
                , "bAutoWidth": false
            });
    });
    
</script>

<script>
        function copyToClipboard(button) {
            const tooltipText = button.nextElementSibling;
            const link = tooltipText.textContent;
            navigator.clipboard.writeText(link).then(function() {
                console.log('Link kopyalandı: ', link);
            }, function(err) {
                console.error('Link kopyalama hatası: ', err);
            });
        }
    </script>
