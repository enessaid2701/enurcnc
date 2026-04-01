<?php
include("../system/settings.php");
include("../system/functions.php");
oturumkontrolana();
if($_SESSION["yonetici_yetki"] != 1){
  header("Location: $base/dsm/odeme-takip-listesi.html");
  exit;
}
$urun_id = $_GET['urun_id'];

$urun_bilgisi = Sonuc(Sorgu("SELECT * FROM urun WHERE id = $urun_id"));

$hizmet_keys=Sorgu("SELECT * FROM urun_urun_kategori WHERE urun_id='$urun_id'");
$hizmet_sonuc = "";
while($veri = mysqli_fetch_object($hizmet_keys)) { 
	$hizmet_sonuc .= $veri->urun_kategori_id .","; 
}
$sayfa_url = $_SERVER['REQUEST_URI'];

$gelen_hizmet_aramasi = g('ara');

if($_POST['Kaydet']=="Kaydet")
{
	$urun_kategori_id = $_POST['urun_kategori_id'];

	$keys55 = rtrim($_POST['hizmetidleri'],",");
	Sorgu("DELETE FROM urun_urun_kategori WHERE urun_id='$urun_id'");
	if ($keys55 != null) {
		$explode55 = explode(",", $keys55);
		foreach($explode55 as $element55)
		{
			$hizmet_ekle_sorgu = Sorgu("INSERT INTO urun_urun_kategori (urun_id, urun_kategori_id) VALUES (".$urun_id.",".$element55.")");
		}
		if($hizmet_ekle_sorgu){
			echo '<script>alert("Ürüne Kategori Eklendi")</script>';
			header("Location: $sayfa_url");	
		}else{
			echo '<script>alert("Ürüne Kategori Eklenemedi")</script>';
		}
	}
	
}

if($_GET['Kaydet']=="sil")
{
	$gid = $_GET['gid'];
	$hizmet_sil_sorgu = Sorgu("DELETE FROM urun_urun_kategori WHERE id='$gid'");
}

/* Aksesuara Marka Ekleme / Silme End */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$urun_bilgisi->page_name?> Ürününe Kategori Ekleme</title>
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
				<h4>Kategori Ekle / Sil</h4>
				<!-- DIRECT CHAT PRIMARY -->
				<div class="box box-success direct-chat direct-chat-success">
					<div class="box-header with-border">
						<h3 class="box-title" style="margin: 25px 0 0 0;text-align: center;"><?=$urun_bilgisi->page_name?> - Ürününe Bağlı Kategoriler </h3>
					</div><!-- /.box-header --> 
					<div class="box-body">
						<div class="col-md-12" style="text-align: center;margin:10px 0;"> 
							<input type="text" name="marka_ara_text" id="marka_ara_text" placeholder="Kategori Ara :" style="padding: 5px; width: 100%" />
							<?php 
							$gelendeger = "";
							if ($gelen_hizmet_aramasi != nul) {
								$gelendeger = " AND page_name LIKE '%".$gelen_hizmet_aramasi."%'  ORDER BY `rank` ASC";	
							}							
							?>
						</div>
						<form action="#" method="post" enctype="multipart/form-data">
							<!-- Conversations are loaded here -->
							<div class="direct-chat-messages row">
								<!-- Message. Default to the left -->
								<div class="direct-chat-msg col-md-12">
									<input id="hizmetidleri" type="text" name="hizmetidleri" value="<?=$hizmet_sonuc;?>" style="display: none;">
									<?php $marka_ara = Sorgu("SELECT id,page_name FROM urun_kategori WHERE statu = 1 " . $gelendeger);
									$num = 0;
									while($SecenekSonuc1 = Sonuc($marka_ara)){?>
										<div class="col-lg-4">
											<div class="input-group">
												<span class="input-group-addon" id="checkboxes">  
													<input name="secenek_kategori1[]" type="checkbox" class="markacls" id="marka<?=$num?>" value="<?php echo $SecenekSonuc1->id;?>" <?php if(in_array($SecenekSonuc1->page_name)){echo "checked";}?>>
													<?php $num++; ?>
												</span>
												<input type="text" disabled class="form-control" value="<?php echo $SecenekSonuc1->page_name;?>">
											</div>
										</div>
										<?php $num++; ?>
									<?php }?>
								</div>
								<!-- /.direct-chat-msg -->
							</div><!-- /.box-body -->
							<div class="box-footer">
								<div class="input-group">
									<span class="input-group-btn">
										<input type="submit" id="markasubmit" value="Kaydet" name="Kaydet" class="btn btn-primary btn-block" />
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
		<script>
			/* Aksesuara Marka Ekleme Start */
			$(document).ready(function () {
				$('.markacls').click(function () {
					var deger = $('#hizmetidleri').val();
					if ($(this).is(':checked')) {
						deger += $(this).attr('value') + ',';
						$('#hizmetidleri').val(deger);
					}
					else {
						var str = $('#hizmetidleri').val();
						var res = str.replace($(this).attr('value') + ',', "");
						$('#hizmetidleri').val(res);
					}
				});
			});

			$(document).ready(function () {
				var valData = $('#hizmetidleri').val();
				var valNew = valData.split(',');
				for (var i = 0; i <= valNew.length; i++) {
					$('#checkboxes input[type=checkbox]').each(function () {
						if (valNew[i] == $(this).val()) {
							$(this).attr("checked", "checked");
						}
					});
				}
			});
			/* Aksesuara Marka Ekleme End */
		</script>
		<!-- Bootstrap 3.3.2 JS -->
		<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Slimscroll -->
		<script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<!-- FastClick -->
		<script src='../plugins/fastclick/fastclick.min.js'></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/app.min.js" type="text/javascript"></script>
		<script>
			$(document).ready(function(){
				var gelenarama;

				$('#marka_ara_text').keyup(function(){
					gelenarama = $(this).val();
					location.href='http://localhost:8080/<?=$sayfa_url;?>&ara=' + gelenarama;
				});
				$('#marka_ara_text').val('<?=$gelen_hizmet_aramasi;?>');
				$('#marka_ara_text').focus();
			});
		</script>
	</body>
	</html>