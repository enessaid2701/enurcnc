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
        .bg-black{
            background-color: #000;
        }
    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small><i class="fa fa-tasks"></i> Ödeme Takip Listesi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Ödeme Takip Listesi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding:0; display:flex; align-items:center;">
                        <div class="col-md-9 mt-5">

                            <form  action="" method="post">
                                <div class="row">
                                    <button name="bugun" class="btn btn-sm btn-info">Bugün</button>
                                    <button name="buhafta" class="btn btn-sm btn-info">Bu Hafta</button>
                                    <button name="buay" class="btn btn-sm btn-info">Bu Ay</button>
                                    <div class="col-md-2">
                                        <select class="form-control" name="durumu" id="">
                                        <option value="2" <?=($_POST['durumu'] == 2 && !isset($_POST['temizle']))?"selected":""?>>Tümü</option>
                                        <option value="1" <?=($_POST['durumu'] == 1 && !isset($_POST['temizle']))?"selected":""?>>Ödendi</option>
                                        <option value="0" <?=(isset($_POST['durumu']) && $_POST['durumu'] == 0 && !isset($_POST['temizle']))?"selected":""?>>Ödenmedi</option>
                                    </select>
                                </div>
                                <button name="temizle" class="btn btn-sm btn-info bg-black">Tümünü Göster</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 text-right">

                        <a href="odeme-linki-olustur.html" class="btn bg-navy margin"><i class="fa fa-plus"></i> Ödeme Linki Oluştur</a>
                    </div>
                    </div><!-- /.box-header -->
                    <?php
                    $filtre = "";

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['buhafta'])) {
                            $start_date = (new DateTime('monday this week'))->format('Y-m-d 00:00:00');
                            $end_date = (new DateTime('sunday this week'))->format('Y-m-d 23:59:59');
                            $filtre = "AND created_at BETWEEN '$start_date' AND '$end_date'";
                        } elseif (isset($_POST['buay'])) {
                            $start_date = (new DateTime('first day of this month'))->format('Y-m-d 00:00:00');
                            $end_date = (new DateTime('last day of this month'))->format('Y-m-d 23:59:59');
                            $filtre = "AND created_at BETWEEN '$start_date' AND '$end_date'";
                        } elseif (isset($_POST['bugun'])) {
                            $start_date = date('Y-m-d 00:00:00');
                            $end_date = date('Y-m-d 23:59:59');
                            $filtre = "AND created_at BETWEEN '$start_date' AND '$end_date'";
                        }
                    }
                    if ($_POST['durumu'] == 1 ) {
                        $filtre .= "AND odeme_durumu = '2' ";
                    }elseif(isset($_POST["durumu"]) && $_POST["durumu"] == 0){
                        $filtre .= "AND odeme_durumu = '0'";
                    }
                    if (isset($_POST['temizle'])) {
                        $filtre = "";
                    }
                    ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Firma Adı</th>
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
                                <?php $SayfaSorgu = Sorgu("SELECT ol.*, m.firma_adi FROM odeme_linki ol
                                LEFT JOIN musteri m ON m.id = ol.musteri_id
                                WHERE ol.id > 0 $filtre
                                ORDER BY ol.id DESC");
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
                                $count++; ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$SayfaSonuc->firma_adi; ?></td>
                                    <td>
                                        <?php if($link_statu == 1){ ?>
                                        <div class="linktooltip">
                                            <button class="btn btn-sm btn-info" onclick="copyToClipboard(this)">Linki Kopyala</button>
                                            <span class="linktooltiptext"><?=$baseOdeme?>/<?=$SayfaSonuc->odeme_linki; ?></span>
                                        </div>
                                        <?php }else{ ?>
                                            <span class="label label-danger">Link Aktif Değildir</span>
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
                                    <td><?=$SayfaSonuc->odenecek_tutar; ?>
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
<!-- page script -->
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
