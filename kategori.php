<?php
include("parts/infrastructure.php");
$seo = $_GET['seo'];
if($seo == 'urunler'){
    $db = "sayfalar";
}else{
    $db = 'urun_kategori';
}
   $page_query = Select_sorgu($db," AND `seo_link` = '$seo'");
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
}else{
   header("Location: ".$base."/404");
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

?>
<!-- breadcrumb -->
<section class="page_header_default style_one pd_top_115 pb-0">
    <!-- <div id="tsparticles"></div> -->
    <div class="parallax_cover">
        <img src="<?=$base?>/lms_inc/img/backgrounds/breadcrumb.png" alt="bg_image" class="cover-parallax">
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
                <div class="col-md-6 col-sm-12 text-end m_fix003 px-0">
                    <div class="breadcrumbs enur">
                        <ul class="breadcrumb m-auto align-items-center">
                            <li>
                                <a href="<?=$base?>">
                                    Anasayfa
                                </a>
                            </li>
                            <li class="active mb-0"><?=$page_name?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pd_bottom_20 radius-top50">

    <div class="project_all filt_style_six  filter_enabled pd_top_20">
        <div class="row urunler get_sticky_header">
            <div class="col-lg-12">
                <div class="fliter_group mb-0 py-3" style="text-align:center!important;">
                    <ul class="project_filter mb-0 dark clearfix">
                        <div class="swiper-container mx60" data-swiper='{
    "loop": false,
    "autoplay": false,
    "speed": 1000,
    "centeredSlides": false,
    "slidesPerView": 5,
    "spaceBetween": 10,
    "navigation": {
        "nextEl": ".next-single-one",
        "prevEl": ".prev-single-one"
    },
    "pagination": {
        "el": ".number-pagination",
        "type": "fraction"
    },
    "breakpoints": {
        "1905": {
            "slidesPerView": 5
        },
        "1720": {
            "slidesPerView": 4 
        },
        "1340": {
            "slidesPerView": 4 
        },
        "966": {
            "slidesPerView": 3
        },
        "786": {
            "slidesPerView": 2 
        },
        "0": {
            "slidesPerView": 1 
        }
    }
}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="<?=$base?>/urunler">
                                        <li class="w-100 text-uppercase <?=($seo == 'urunler')?'current':''?>">
                                            Tümü
                                        </li>
                                    </a>
                                </div>
                                <?php
        if($seo != 'urunler'){ ?>
                                <div class="swiper-slide">
                                    <a href="<?=$base?>/urunler/<?=$row["seo_link"]?>">
                                        <li class="w-100 text-uppercase current">
                                            <?=$page_name?>
                                        </li>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php
        $diger_kats = Sorgu("SELECT seo_link, page_name
        FROM urun_kategori
        WHERE statu = 1 AND id != '$page_id'
        ORDER BY rank ASC ");
        foreach ($diger_kats as $dk) { ?>
                                <div class="swiper-slide">
                                    <a href="<?=$base?>/urunler/<?=$dk["seo_link"]?>">
                                        <li class="w-100 text-uppercase">
                                            <?=$dk["page_name"]?>
                                        </li>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="arrows position-relative top--80 zIndex-1">
                            <div class="prev-single-one position-absolute left-0"></div>
                            <div class="next-single-one position-absolute right-55"></div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="full-container">
            <div class="project_container pd_top_60 position-relative clearfix " style=" height: 600px;">
                <div class="row clearfix">
                    <?php
                        if($seo == 'urunler'){
                            $sql = '';
                        }else{
                            $sql = "AND page_cat = '$page_id' ";
                        }
                        $ana_kat_urun = mysqli_query($conn,"SELECT * FROM urun WHERE statu = 1 $sql ORDER BY `rank` ASC");

                        foreach($ana_kat_urun as $urun){ ?>
                    <div class="project-wrapper col-xxl-3 col-lg-4 col-md-6 col-sm-12 bakir-montaj-kitleri">
                        <div class="project_post border style_six">
                            <a href="<?=$base.'/urun/'.$urun['seo_link']?>">
                                <div class="image_box ">
                                    <img width="746" height="497" src="<?=$base?>/uploads/product/<?=$urun['page_image']?>" class="attachment-turkcopper_project_caro_image_style_one size-turkcopper_project_caro_image_style_one wp-post-image" alt="img">
                                </div>
                                <div class="row justify-content-between align-item-center bg-light py-4">
                                    <div class="col-8">
                                        <h2 class="title_pro text-limit-1"><a href="<?=$base.'/urun/'.$urun['seo_link']?>" rel="bookmark" class="fz20"><?=$urun["page_name"]?></a></h2>
                                    </div>
                                    <div class="col align-content-center">
                                        <a href="<?=$base.'/urun/'.$urun['seo_link']?>" class="zoom_icon theme-btn four position-static text-end w-auto px-2"><i class="icon-arrow-right "></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php }if(say($ana_kat_urun) < 1){
                                echo "<div class='text-center'>
                                <h3>Ürünlerimiz Güncellenmektedir...</h3>
                            </div>";
                            } ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include('parts/footer.php'); ?>