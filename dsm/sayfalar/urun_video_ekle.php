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

$urun_bilgisi = Sonuc(Sorgu("SELECT * FROM urun WHERE id = $urun_id"));

/* Video Ekleme / Silme Start */

if($_POST['VideoEkle']=="VideoEkle")
{
	$urun_id = $_GET['urun_id'];
	$video_link = $_POST['video_link'];

	/*if (empty($_GET['video_link']))
	{ 
		echo '<script>alert("Lütfen bir Video Linki Giriniz...");history.back();</script>'; 
		exit; 
	}*/

	$video_ekle_sorgu = Sorgu("INSERT INTO urun_video SET	urun_id	= '$urun_id', video_link = '$video_link'");

	if($video_ekle_sorgu){
		echo '<script>alert("Video Linki Eklendi")</script>';
	}else{
		echo '<script>alert("Video Linki Eklenemedi")</script>';
	}
}

if($_GET['VideoEkle']=="sil")
{
	$gid = $_GET['gid'];
	$video_sil_sorgu = Sorgu("DELETE FROM urun_video WHERE id='$gid'");
}

/* Video Ekleme / Silme End */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$urun_bilgisi->page_name?> Ürünü Video Ekleme</title>
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
				<h4>Video Ekle / Sil</h4>
				<!-- DIRECT CHAT PRIMARY -->
				<div class="box box-success direct-chat direct-chat-success">
					<div class="box-header with-border">
						<h3 class="box-title" style="margin: 25px 0 0 0;text-align: center;"><?=$urun_bilgisi->page_name?> - Ürünü Video Linkleri </h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><span data-toggle="tooltip" class='badge bg-green'>Kapat / Aç</span> <i class="fa fa-minus"></i></button>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<form action="#" method="post" enctype="multipart/form-data">
							<!-- Conversations are loaded here -->
							<div class="direct-chat-messages row">
								<!-- Message. Default to the left -->
								<div class="direct-chat-msg col-md-12">
									<?php $Sorgu = Sorgu("SELECT * FROM urun_video WHERE urun_id ='$urun_id' ORDER BY id DESC");
									while($Sonuc = Sonuc($Sorgu)){?>
									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class='direct-chat-info clearfix'>
											<a href="<?=$Sonuc->video_link;?>" target="_blank"><span class="btn btn-block btn-social btn-vk" style="padding-left: 10px!important;"><?=$Sonuc->video_link;?></span></a>
											<a href="?VideoEkle=sil&gid=<?=$Sonuc->id;?>&urun_id=<?=$urun_id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Silmek İçin Tıklayın<a/>
										</div>
										<!-- /.direct-chat-info -->
									</div>
									<?php }?>
									</div>
									<!-- /.direct-chat-msg -->
								</div><!-- /.box-body -->
								<div class="box-footer">
									<div class="input-group">
										<input type="text" class="form-control" name="video_link" value="" placeholder="Video Linki" />
										<span class="input-group-btn">
											<input type="submit" value="VideoEkle" name="VideoEkle" class="btn btn-primary btn-flat" />
										</span>
									</div>
								</div><!-- /.box-footer-->							
						</form>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
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