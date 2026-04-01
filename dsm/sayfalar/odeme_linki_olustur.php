<?php
use Verot\Upload\upload;
echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_POST["musteri_id"] && $_GET['islem']=="")
{
  $musteri_id = $_POST["musteri_id"];
  $odenecek_tutar = $_POST["hidden_tutar"];
  $odeme_linki = $_POST["odeme_linki"];
  $full_link = $_POST["full_link"];
	
	
	$yonetici_ekle_sorgu	=	Sorgu("INSERT INTO odeme_linki SET
    musteri_id	=	'$musteri_id',
    odenecek_tutar	=	'$odenecek_tutar',
    odeme_linki	=	'$odeme_linki'
    ");	
    if($yonetici_ekle_sorgu){
        header("Location: $base/dsm/firma-ekle.html?islem=duzenle&id=$musteri_id");
        exit;
    }
 
}


if($_POST["musteri_id"] && $_GET['islem']=="duzenle")
{
  $musteri_id = $_POST["musteri_id"];
  $odenecek_tutar = $_POST["hidden_tutar"];
  $odeme_linki = $_POST["odeme_linki"];
  $full_link = $_POST["full_link"];
	
	$g_id = $_GET["id"];
	$yonetici_ekle_sorgu	=	Sorgu("UPDATE odeme_linki SET
    musteri_id	=	'$musteri_id',
    odenecek_tutar	=	'$odenecek_tutar',
    odeme_linki	=	'$odeme_linki'
    WHERE id = $g_id
    ");	
    if($yonetici_ekle_sorgu){
        header("Location: $base/dsm/firma-ekle.html?islem=duzenle&id=$musteri_id");
        exit;
    }
}

if($_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];	
	$durum = "duzenle" ;
	$Yonetici = Sonuc(Sorgu("SELECT * FROM odeme_linki WHERE id = '$sayfaid'"));
  if($Yonetici->link_durumu != "1"){
    header("Location: $base/dsm/odeme-takip-listele.html");
  }
}

?>
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
                <div class="form-group col-md-6">
                  <label for="adsoyad">Firma</label>
                  <select name="musteri_id" class="form-control" id="" required>
                    <option value="" disabled selected>Firma Seçin</option>
                    <?php $musteriler = Sorgu("SELECT id, firma_adi FROM musteri ORDER BY id DESC");
                    foreach($musteriler as $musteri){ ?>
                    <option value="<?=$musteri["id"]?>" <?=(($Yonetici->musteri_id == $musteri["id"]) || ($_GET['musteri'] == $musteri['id']))?"selected":""?>><?=$musteri["firma_adi"]?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="email">Ödeme Tutarı</label>
                  <input type="text" required class="form-control"  oninput="formatNumber(this)" name="odenecek_tutar" value="<?=$Yonetici->odenecek_tutar;?>" id="odenecek_tutar" placeholder="Ödeme Tutarı">
                </div>
                <input type="hidden" id="hidden_tutar" value="<?=$Yonetici->odenecek_tutar;?>" name="hidden_tutar">
                <script>
        function formatNumber(input) {
            let value = input.value.replace(/\./g, '').replace(/[^0-9,]/g, '');
            let parts = value.split(',');

            // Tam sayı kısmını binlik gruplara ayır
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Eğer küsurat kısmı varsa ve 2 basamaktan uzun değilse ekle
            if (parts[1] !== undefined && parts[1].length <= 2) {
                value = parts[0] + ',' + parts[1];
            } else {
                value = parts[0];
            }

            input.value = value;

            // Gizli input için formatla (ondalık ayracı nokta olacak şekilde)
            let hiddenValue = input.value.replace(/\./g, '').replace(',', '.');
            document.getElementById('hidden_tutar').value = hiddenValue;
        }
    </script>
                <div class="form-group col-md-12">
                    <label for="full_link">Ödeme Linki</label>
                    <input type="text" class="form-control" value="<?=$base?>/pay/<?=$Yonetici->odeme_linki?>" name="full_link" id="full_link" placeholder="Ödeme Linki" readonly>
                </div>
                <input type="hidden" value="<?=$Yonetici->odeme_linki?>" name="odeme_linki" id="odeme_linki">
                
              </div><!-- /.box-body -->

              <div class="box-footer text-center">
                <?php if($_GET['islem']=="duzenle"){?>
                  <button type="submit" class="btn btn-success">Linki Güncelle ve Git</button>		
                <?php }else{?>
                  <button type="submit" class="btn btn-success">Link Oluştur ve Git</button>						
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
<script>
    function generateUUID() {
        let d = new Date().getTime(); // Mevcut zaman damgası
        let d2 = (performance && performance.now && (performance.now() * 1000)) || 0; // Mikro-saniye zaman damgası

        return 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            let r = Math.random() * 16; // Rastgele sayı
            if (d > 0) { // Zaman damgasından bit al
                r = (d + r) % 16 | 0;
                d = Math.floor(d / 16);
            } else { // Mikro-saniye zaman damgasından bit al
                r = (d2 + r) % 16 | 0;
                d2 = Math.floor(d2 / 16);
            }
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    }

    function linkOlustur() {
        let uniqueCode = generateUUID();
        document.getElementById("odeme_linki").value = uniqueCode;
        document.getElementById("full_link").value = "https://www.turkcopper.com/pay/" + uniqueCode;
    }
    <?php if($_GET["islem"] != "duzenle"){ ?>
    document.addEventListener('DOMContentLoaded', (event) => {
        linkOlustur(); // Sayfa yüklenince link oluştur
    });
    <?php } ?>
</script>
