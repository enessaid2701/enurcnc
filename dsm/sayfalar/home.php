<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;
if($_SESSION["yonetici_yetki"] != 1){
  echo "<script>window.location.href='".$base."/dsm/odeme-takip-listele.html';</script>";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=ucwords($_SESSION['yonetici_ad_soyad'])?>
            <small>Hoşgeldin | Site Yönetim Paneli</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <?php $bilgi= Sorgu("SELECT * FROM slider"); $mevcut = say($bilgi);?>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $mevcut; ?></h3>
                        <p>Slider Yönetimi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="slider-listele.html" class="small-box-footer">Slider Listesi &nbsp<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>            
            <div class="col-lg-6 col-xs-6">
                <?php $bilgi= Sorgu("SELECT * FROM urun"); $mevcut = say($bilgi);?>
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $mevcut; ?></h3>
                        <p>Ürün Yönetimi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="urun-listele.html" class="small-box-footer">Ürün Listesi &nbsp<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <?php $bilgi= Sorgu("SELECT * FROM urun_kategori"); $mevcut = say($bilgi);?>
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $mevcut; ?></h3>
                        <p>Ürün Kategori Yönetimi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="urun-kategori-listele.html" class="small-box-footer">Ürün Kategori Listesi &nbsp<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <?php $bilgi= Sorgu("SELECT * FROM sayfalar"); $mevcut = say($bilgi);?>
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $mevcut; ?></h3>
                        <p>Kurumsal Sayfa Yönetimi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="kurumsal-sayfa-listele.html" class="small-box-footer">Sayfa Listesi &nbsp<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
    
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
