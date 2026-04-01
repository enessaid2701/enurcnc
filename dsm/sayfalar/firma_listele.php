<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php

if(g('islem')=="sil")
{
  $id = g('id');
  
  $kategori_sil_sorgu = Sorgu("DELETE FROM musteri WHERE id='$id'");
  
  $bilgi = '<div class="alert alert-success">
  Başarı ile Silinmiştir!
  </div>' ;
  
}

?>
<style>
    .ort{
        vertical-align: middle !important;
    } 
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-tasks"></i> Firma Listesi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Firma Listesi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding:0;">
                        <a href="firma-ekle.html" class="btn bg-navy margin"><i class="fa fa-plus"></i> Firma Ekle</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Cari Kod</th>
                                    <th>Firma Adı</th>
                                    <th>Toplam Ödeme Link Sayısı</th>
                                    <th>Başarılı Ödeme Sayısı</th>
                                    <th>Başarısız Ödeme Sayısı</th>
                                    <th style="width:100px;">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $SayfaSorgu = Sorgu("SELECT m.*,
                                (SELECT COUNT(ol.id) FROM odeme_linki ol WHERE ol.musteri_id = m.id AND odeme_durumu != '0') AS basarili_odeme,
                                (SELECT COUNT(ol.id) FROM odeme_linki ol WHERE ol.musteri_id = m.id) AS tum_odemeler
                                FROM musteri m ORDER BY m.id DESC");
                                $count = 0;
                                while($SayfaSonuc = Sonuc($SayfaSorgu)){
                                $count++; ?>
                                <tr>
                                    <td class= "ort"><?=$count?></td>
                                    <td class= "ort"><?=$SayfaSonuc->kod; ?></td>
                                    <td class= "ort"><?=$SayfaSonuc->firma_adi; ?></td>
                                    <td class= "ort"><span class="label label-info" style="font-size:18px!important "><?=$SayfaSonuc->tum_odemeler; ?></span></td>
                                    <td class= "ort"><span class="label label-success" style="font-size:18px!important"><?=$SayfaSonuc->basarili_odeme; ?></span></td>
                                    <td class= "ort"><span class="label label-danger" style="font-size:18px!important"><?=$SayfaSonuc->tum_odemeler - $SayfaSonuc->basarili_odeme; ?></span></td>
                                    <td class= "ort">
                                        <a href="?sayfa=odeme-linki-olustur&musteri=<?php echo $SayfaSonuc->id;?>" class="btn btn-success btn-xs" title="Düzenle" id="add-sticky">
                                            Link Oluştur
                                        </a>                                        
                                        <a href="?sayfa=firma-ekle&islem=duzenle&id=<?php echo $SayfaSonuc->id;?>" class="btn btn-info btn-xs" title="Düzenle" id="add-sticky">
                                            Firma Detay
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>
<!-- page script -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
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
