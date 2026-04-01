<?php
include("parts/infrastructure.php");
$seo = $_GET['seo'];
$page_query = Select_sorgu("sektor"," AND `seo_link` = '$seo'");
if ( say($page_query) > 0 ){
    $marka_link = "";
    $row = mysqli_fetch_assoc($page_query); 
    $page_id = $row['id'];
    $page_name = $row['page_name']; 
    $page_description = $row['page_description'];
    $page_image = $base.'/uploads/service/'.$row['page_image'];
    $page_link = "//www.".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    $seo_link = $row['seo_link'];
    $seo_title = $row['seo_title']." - ".$ayar['firma_adi'];
    $seo_desc = $row['seo_descriptions'];
}
?>
<!-- Page Metas -->
<title><?=$seo_title?></title>
<meta name="description" content="<?=$seo_desc?>" />
<!-- Twitter Metas -->
<meta name="twitter:card" content="<?=$page_image;?>" />
<meta name="twitter:title" content="<?=$seo_title?>" />
<meta name="twitter:description" content="<?=$seo_desc?>" />
<meta name="twitter:url" content="https://www.<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" />
<meta name="twitter:image" content="<?=$page_image;?>" />
<!-- Facebook Og (Open Graph) Metas -->
<meta property="og:title" content="<?=$seo_title?>" />
<meta property="og:description" content="<?=$seo_desc?>" />
<meta property="og:url" content="https://www.<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" />
<meta property="og:image" content="<?=$page_image;?>" />
<meta property="og:type" content="website" />
<!-- Social: Google+ / Schema.org -->
<meta itemprop="name" content="<?=$seo_title?>" />
<meta itemprop="description" content="<?=$seo_desc;?>" />
<meta itemprop="image" content="<?=$page_image;?>" />
<?php
include("parts/header.php");

$sidebar_sector_query = mysqli_query($conn,"SELECT * FROM sektor WHERE statu = 1 ORDER BY `rank` ASC");
$page_cat_by_urun_kategori_query = mysqli_query($conn,"SELECT urun_kategori.page_name urun_kat_page_name, urun_kategori.seo_link urun_kat_seo_link, urun_kategori.page_image urun_kat_page_image FROM urun_kategori_sektor LEFT JOIN urun_kategori ON urun_kategori.id = urun_kategori_sektor.urun_kategori_id WHERE urun_kategori_sektor.sektor_id = $page_id ORDER BY `rank` ASC");
$page_sector_by_id_query = mysqli_query($conn,"SELECT urun.page_name, urun.seo_link, urun.page_image FROM urun_sektor LEFT JOIN urun ON urun.id = urun_sektor.urun_id WHERE urun_sektor.sektor_id = $page_id ORDER BY `rank` ASC");
?>

<!-- breadcrumb -->
<section class="page_header_default style_one pd_top_115 pb-0">
    <!-- <div id="tsparticles"></div> -->
    <div class="parallax_cover">
        <img src="<?=$base?>/lms_inc/img/backgrounds/breadcrumb.png" alt="bg_image" class="cover-parallax d-block">
    </div>
    <div class="page_header_content text-start">
        <div class="px-5">
            <div class="row align-items-center">
                <div class="col-md-6 px-0">
                    <div class="banner_title_inner mb-0">
                        <div class="title_page fz25 text-uppercase">
                            <?=$page_name?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end px-0 m_fix006">
                    <div class="breadcrumbs turkcopper">
                        <ul class="breadcrumb m-auto align-items-center">
                            <li>
                                <a href="<?=$base?>">
                                    Anasayfa
                                </a>
                            </li>
                            <li><a href="<?=$base?>/<?=$get_sayfalar[24]['seo_link']?>"><?=$get_sayfalar[24]['seo_title']?></a></li>
                            <li class="active mb-0"><?=$page_name?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pd_bottom_80 pd_top_80 radius-top50">
    <div class="full-container">
        <div class="row left-sidebar">
            <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-7 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <div class="single_content_upper">
                        <div class="blog_feature_image pd_bottom_20 detay-write">
                            <img src="<?=$base?>/uploads/sector/<?=$row['page_image']?>" class="wp-post-image" alt="img">
                        </div>
                        <div class="post_single_content">
                            <div class="description_box">
                                <?=$page_description?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="secondary" class="widget-area all_side_bar col-lg-3 col-md-5 col-sm-12">
                <div class="service_siderbar side_bar">

                    <div class="widgets_grid_box">
                        <div class="widget turkcopper_widget_service_list">
                            <h4 class="widget-title">Diğer Hizmetler</h4>
                            <ul class="service_list_box">
                                <?php
                                    $diger_sektorler = Sorgu("SELECT page_name, seo_link FROM sektor WHERE id != '$page_id'");
                                    foreach($diger_sektorler as $ds){ ?>
                                <li><a href="<?=$base?>/hizmet/<?=$ds["seo_link"]?>"><?=$ds["page_name"]?></a> </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="client-brand-section bg_light_2" id="urunler">
        <div class="full-container">
            <div class="row">
                <div class="fullcontainer py-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7 col-sm-12 mb-4 mb-sm-5 mb-md-0 mb-lg-0 mb-xl-0">
                            <div class="title_all_box style_three light_color">
                                <div class="title_sections three left">
                                    <h2 class="text-black"><?=$page_name?> Ürünleri</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12 bg-white bdrs-15">
                            <div class="d-flex justify-content-between align-items-center py-0 m-2 aramaDiv">
                                <p class="m-0 text-nowrap"><span class="fw-bold" id="urunSayisi">6</span> Ürün Bulundu</p>
                                <div class="search-form m-0 w-75 p-2">
                                    <input type="text" placeholder="Arama Yapabilirsiniz">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <?php 
                    foreach($page_sector_by_id_query as $su){
                    ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="project_box style_two">
                            <div class="entry-thumbnail image">
                                <a href="<?=$base?>/urun/<?=$su["seo_link"]?>">
                                    <img width="370" height="247" src="<?=$base?>/uploads/product/<?=$su["page_image"]?>" class="attachment-370x330 size-370x330 wp-post-image" alt="img" loading="lazy">
                                </a>
                                <div class="overlay">
                                    <a href="<?=$base?>/urun/<?=$su["seo_link"]?>">
                                        <span class="fa fa-eye icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="content_inner">
                                <h2><a href="<?=$base?>/urun/<?=$su["seo_link"]?>"><?=$su["page_name"]?></a></h2>
                                <a href="<?=$base?>/urun/<?=$su["seo_link"]?>" class="read_more position-relative"> Detaylı Bilgi <i class="fa fa-angle-right ms-2"></i> </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="pd_bottom_80"></div>
    </section>-->

<script>
    // Ürünler Sayfası Arama
    var aramaInput = document.querySelector('#urunler .search-form input[type="text"]');
    var urunSayi = document.getElementById('urunSayisi');
    var urunCol = document.querySelectorAll('#urunler .col-lg-3.col-md-4');
    var urunlerCount = urunCol.length;


    urunSayi.textContent = urunlerCount;

    aramaInput.addEventListener('input', function() {
        var arananKelime = this.value.trim().toLowerCase();
        var urunlerCount = 0;


        urunCol.forEach(function(column) {
            var productName = column.querySelector('#urunler .project_box .content_inner h2 a').textContent.trim().toLowerCase();

            if (productName.includes(arananKelime)) {
                column.style.display = '';
                urunlerCount++;
            } else {
                column.style.display = 'none';
            }
        });

        urunSayi.textContent = urunlerCount;


    });
</script>
<?php include('parts/footer.php'); ?>