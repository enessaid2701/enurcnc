<?php
include("../system/settings.php");
include("../system/functions.php");
oturumkontrolana();
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
$urun_id = $_GET['urun_id'];
$urun_id2 = $_GET['urun_id2'];
$dosya_adi = $_POST['dosya_adi'];

$urun_bilgisi = Sonuc(Sorgu("SELECT * FROM urun WHERE id = $urun_id"));

/* dosya Ekleme / Silme Start */
if($_POST['dosyaEkle']=="dosyaEkle")
{
	$urun_id = $_GET['urun_id'] ;
	if (empty($_FILES["dosya"]["name"]) && $_GET['islem']!="duzenle") 
	{ 
		echo ' 
		<script language="javascript"> 
		alert("Lütfen Bir Dosya Seçiniz"); 
		history.back();  
		</script>'; 
		exit; 
	}

	include('../class.upload.php');
	$upload = new upload($_FILES['dosya']);
	if ($upload->uploaded){
		$upload->file_auto_rename = true;
    	$upload->file_new_name_body = seo($dosya_adi)."-".seo($ayar['firma_adi']);
		$upload->process("../../uploads/product/file");
		if ($upload->processed){
			$Urundosya=''.$upload->file_dst_name.'';
		}
	}
	$gitti1	=$Urundosya=''.$upload->file_dst_name.'';

	$sayfa_ekle_sorgu = "";
	if($_GET['islem']=="duzenle")
	{
		$gid=$_GET['gid'];
		$sayfa_ekle_sorgu = Sorgu("UPDATE urun_dosya SET dosya_adi='$dosya_adi' where id='$gid'");
	}
	else
	{
		$sayfa_ekle_sorgu = Sorgu("INSERT INTO urun_dosya SET
		urun_id	=	'$urun_id', 
		dosya	=	'$Urundosya',
		dosya_adi	=	'$dosya_adi'");
	}

	if($sayfa_ekle_sorgu){
		echo '<script>alert("Dosya Eklendi")</script>';
	}else{
		echo '<script>alert("Dosya Eklenemedi")</script>';
	}
}

if($_GET['islem']=="sil")
{
	$gid=$_GET['gid'];
	$dosya_bul=Sonuc(Sorgu("SELECT * FROM urun_dosya WHERE id='$gid'"));
	$dosya_sil=unlink("../../uploads/product/file/".$dosya_bul->dosya);
	$sayfa_sil_sorgu = Sorgu("DELETE FROM urun_dosya WHERE id='$gid'");
}
else if($_GET['islem']=="duzenle")
{
	$gid=$_GET['gid'];
	$DosyaSonuc=Sonuc(Sorgu("SELECT * FROM urun_dosya WHERE id='$gid'"));
}

$sayfa_url = $sitepath . 'dk-admin/sayfalar/urun_dosya_ekle.php?urun_id='.$urun_id;

/* dosya Ekleme / Silme End */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$urun_bilgisi->page_name?> Ürün Dosya Ekleme</title>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <br />
    <div class="col-md-12">
        <!-- Direct Chat -->
        <div class="row">
            <div class="col-md-3">
                <h4>Ürün Dosyası Ekle / Sil</h4>
                <!-- DIRECT CHAT PRIMARY -->
                <div class="box box-primary direct-chat direct-chat-primary" style="margin-bottom:0!important">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin: 25px 0 0 0;text-align: center;"><?=$urun_bilgisi->page_name?> - Ürün Dosyaları </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><span data-toggle="tooltip" class='badge bg-light-blue'>Kapat / Aç</span> <i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages row">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg col-md-12">
                                    <?php $Sorgu = Sorgu("SELECT * FROM urun_dosya WHERE urun_id ='$urun_id' ORDER BY id DESC");
									while($Sonuc = Sonuc($Sorgu)){?>
                                    <div class="direct-chat-info clearfix" style="float: left; width: 50%; margin-bottom: 25px;">
                                        <div class="row" style="margin: 0 1px 0 1px;">
                                            <div class="col-md-12 text-center font-weight-bold" style="background-color:#ebebeb;"> <?=$Sonuc->dosya_adi;?> </div>
                                            <div class="col-md-6">
                                                <a href="../../uploads/product/file/<?=$Sonuc->dosya;?>" target="_blank" style="width: 100px;height: 150px;">
                                                    <img class="direct-chat-img" src="../images/pdf_file.png" style="width: 75px;height: 75px;" />
                                                </a>
                                            </div>
                                            <div class="col-md-6">

                                                <div class='direct-chat-info clearfix' style="position: relative;top: 7px;left: 15px;">
                                                    <a href="../../uploads/product/file/<?=$Sonuc->dosya;?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-trash-o"></i> Gör </a>
                                                    </br>
                                                    <a href="?islem=duzenle&gid=<?=$Sonuc->id;?>&urun_id=<?=$urun_id;?>" class="btn btn-warning btn-sm"><i class="fa fa-trash-o"></i> Düzenle </a>
                                                    </br>
                                                    <a href="?islem=sil&gid=<?=$Sonuc->id;?>&urun_id=<?=$urun_id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Sil<a />
                                                </div><!-- /.direct-chat-info -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div><!-- /.direct-chat-msg -->
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <div class="input-group">
                                    <input type="text" name="dosya_adi" placeholder="Dosya Adı" value='<?php echo $DosyaSonuc->dosya_adi;?>' class="form-control" />
                                    <input type="file" name="dosya" class="form-control" />
                                    <span class="input-group-btn">
                                        <input type="submit" value="dosyaEkle" name="dosyaEkle" class="btn btn-primary btn-flat" style="height:68px;" />
                                    </span>
                                </div>
                            </div><!-- /.box-footer-->
                        </form>
                    </div>
                    <!--/.direct-chat -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="col-md-12">
            <hr />
        </div>
        <!-- jQuery 2.1.3 -->
        <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js" type="text/javascript"></script>

</body>

</html>