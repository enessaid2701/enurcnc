<?php
use Verot\Upload\upload;

include("../system/settings.php");
include("../system/functions.php");
oturumkontrolana();
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
$urun_id = $_GET['urun_id'];
$urun_id2 = $_GET['urun_id2'];

$urun_bilgisi = Sonuc(Sorgu("SELECT * FROM urun WHERE id = $urun_id"));

/* Resim Ekleme / Silme Start */
if($_POST['ResimEkle']=="ResimEkle")
{
	$urun_id = $_GET['urun_id'] ;
	if (empty($_FILES["resim"]["name"])) 
	{ 
		echo ' 
		<script language="javascript"> 
		alert("Lütfen Bir Dosya Seçiniz"); 
		history.back();  
		</script>'; 
		exit; 
	}

	include('../class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
		$upload->file_auto_rename = true;
		//$upload->file_new_name_body = seo($ayar['firma_adi']).'-'.seo($$urun_bilgisi->page_name);
		$upload->process("../../uploads/product/other");
		if ($upload->processed){
			$UrunResim=''.$upload->file_dst_name.'';
		}
	}
	$gitti1	=$UrunResim=''.$upload->file_dst_name.'';

	$sayfa_ekle_sorgu = Sorgu("INSERT INTO urun_resim SET
		urun_id	=	'$urun_id', 
		resim	=	'$UrunResim'");

	if($sayfa_ekle_sorgu){
		echo '<script>alert("Resim Eklendi")</script>';
	}else{
		echo '<script>alert("Resim Eklenemedi")</script>';
	}
}

if($_GET['islem']=="sil")
{
	$gid=$_GET['gid'];
	$resim_bul=Sonuc(Sorgu("SELECT * FROM urun_resim WHERE id='$gid'"));
	$resim_sil=unlink("../../uploads/product/other/".$resim_bul->resim);
	$sayfa_sil_sorgu = Sorgu("DELETE FROM urun_resim WHERE id='$gid'");
}
/* Resim Ekleme / Silme End */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$urun_bilgisi->page_name?> Ürünü Resim Ekleme</title>
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
				<h4>Resim Ekle / Sil</h4>
				<!-- DIRECT CHAT PRIMARY -->
				<div class="box box-primary direct-chat direct-chat-primary" style="margin-bottom:0!important">
					<div class="box-header with-border">
						<h3 class="box-title" style="margin: 25px 0 0 0;text-align: center;"><?=$urun_bilgisi->page_name?> - Ürünü Resimleri </h3>
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
									<?php $Sorgu = Sorgu("SELECT * FROM urun_resim WHERE urun_id ='$urun_id' ORDER BY id DESC");
									while($Sonuc = Sonuc($Sorgu)){?>
										<div class="direct-chat-info clearfix" style="float: left; width: 50%; margin-bottom: 25px;">
											<img class="direct-chat-img" src="../../uploads/product/other/<?=$Sonuc->resim;?>" alt="" style="width: 100px;height: 150px;" />
											<div class='direct-chat-info clearfix' style="position: relative;top: 25px;left: 25px;">
												<a href="?islem=sil&gid=<?=$Sonuc->id;?>&urun_id=<?=$urun_id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Resmi Sil<a/>
												<br><br>
												<a href="../../uploads/product/other/<?=$Sonuc->resim;?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-trash-o"></i> Resmi Gör<a/>
											</div><!-- /.direct-chat-info -->
										</div>										
									<?php }?>
								</div><!-- /.direct-chat-msg -->
							</div><!-- /.box-body -->
							<div class="box-footer">
								<div class="input-group">
									<input type="file" name="resim" class="form-control" />
									<span class="input-group-btn">
										<input type="submit" value="ResimEkle" name="ResimEkle"  class="btn btn-primary btn-flat" />
									</span>
								</div>
							</div><!-- /.box-footer-->							
						</form>
					</div><!--/.direct-chat -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		<div class="col-md-12"><hr /></div>
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