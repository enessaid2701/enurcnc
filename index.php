<?php
include("parts/infrastructure.php");
$seo_title = $ayar['firma_adi'];
$seo_desc = $ayar['seo_descriptions'];
$page_image = $ayar['firma_logo'];
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

include("parts/header.php")
?>
<!---slider-->
<section class="slider style_page_eleven nav_position_one position-relative" id="anasayfa">
    <div class="banner_carousel owl-carousel owl_dots_none owl_nav_none owl-loaded theme_carousel owl-theme home-slider" data-options='{"loop": false, "margin": 0, "autoheight":true, "autoplay": false, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>

        <?php
            $slider_query = mysqli_query($conn,"SELECT * FROM slider WHERE statu = 1 ORDER BY `rank` ASC");
            if ($slider_query instanceof mysqli_result) {
            while ($slider = mysqli_fetch_assoc($slider_query)) {
            $file_path = rtrim($_SERVER['DOCUMENT_ROOT'], "/") . "/" . ltrim((string)($slider["image"] ?? ""), "/");

            $mime_type = (is_file($file_path) && is_readable($file_path)) ? @mime_content_type($file_path) : false;
            $is_video = is_string($mime_type) && strpos($mime_type, 'video') !== false;
            if ($is_video) {
            ?>
        <div class="slide-item-content">
            <div class="slide-item align-content-center">
                <div class="image-layer bg-opacity">
                    <video preload="none" autoplay muted loop class="video-background position-relative" poster="<?=$base?>/lms_inc/video/poster.png">>
                        <source src="<?=$base?>/lms_inc/video/enur_cnc.mp4" type="video/mp4">
                    </video>
                </div>

                <div class="px-5 m_fix001 position-absolute bottom180 d-flex justify-content-between align-items-center w-100">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="slider_content p-0">
                                <div class="animate_down overflow-unset">
                                    <p class="m-0 w-100 overflow-unset fz35">
                                        <?=$slider['title']?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#products" class="bg-main3-opacity slider-btn position-static mx-2 p-4 maxw-550">
                        <p class="fw-bold text-white fz25 lh-base mb-2"><?=$seo_title?></p>
                        <p class="text-white mb-0"><?=$slider['title2']?></p>
                    </a>
                </div>

            </div>
        </div>

        <?php }else{ ?>

        <div class="slide-item-content">
            <div class="slide-item align-content-center">
                <div class="image-layer bg-opacity">
                    <video preload="none" autoplay muted loop class="video-background position-relative" poster="<?=$base?>/lms_inc/video/poster.png">
                        <source src="<?=$base?>/lms_inc/video/enur_cnc.mp4" type="video/mp4">
                    </video>
                </div>

                <div class="px-5 m_fix001 position-absolute bottom180 d-flex justify-content-between align-items-end w-100">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="slider_content p-0">
                                <div class="animate_down overflow-unset">
                                    <p class="m-0 w-100 overflow-unset fz35">
                                        <?=$slider["title"]?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#products" class="bg-main3-opacity slider-btn position-static mx-2 p-4 maxw-420">
                        <p class="fw-bold text-white fz25 lh-base mb-3"><?=$seo_title?></p>
                        <p class="text-white mb-0"><?=$slider['title2']?></p>
                    </a>
                </div>

            </div>
        </div>
        <?php }
            }
            mysqli_free_result($slider_query);
            }
            ?>

    </div>
    <div class="px-5 w-100 controller-field d-flex flex-column justify-content-between bottom25 position-absolute gap-30">
        <div class="carousel-pagination d-md-flex justify-center z-20 d-none">
            <svg id="svg-line-2" class="w-100 active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1380 1">
                <line id="full-field" x2="100%" fill="none" stroke="rgba(255,255,255,0.24)" stroke-width="1"></line>
                <line id="field" x2="100%" fill="none" stroke="#fff" stroke-width="1"></line>
            </svg>
        </div>
        <div class="carousel-navigation d-flex justify-content-between pointer-events-none z-20">
            <div class="count-field-homepage d-flex align-items-center">
                <div class="current text-50 sm-text-40 xs-text-30 text-white font-bold leading-tight duration-450 min-w-20 text-left">1</div>
                <div class="seperator text-18 sm-text-16 xs-text-14 text-white font-bold leading-tight duration-450 ml-10 mr-5">/</div>
                <div class="total text-18 sm-text-16 xs-text-14 text-white leading-tight duration-450">2</div>
            </div>
        </div>
    </div>
</section>
<!---slider-end--->

<!-- ürünler -->
<section class=" project_all filt_style_four" id="urunler">
    <div class="bg-light px-0 div-place pd_bottom_60 pd_top_60 position-static">
        <div class="row px-30 divider_1 pb-4 mb-4">
            <div class="title_all_box style_three light_color pb-4 mx-2">
                <div class="title_sections three left">
                    <h2 class="text-black text-uppercase"><?=$get_sayfalar[4]['seo_title']?></h2>
                </div>
            </div>
            <div class="col-lg-12 px-0">
                <div class="nav nav-tabs urunler-index industry-tab__link-wrapper border-0 flex-wrap" id="nav-tab2" role="tablist">
                    <?php
                        $first = true;
                        foreach($ana_kats as $kat){ ?>
                    <a class="nav-item nav-link bdrs0 <?=($first)?"active":""?>" id="kat-<?=$kat["id"]?>-tab" data-bs-toggle="tab" href="#kat-<?=$kat["id"]?>" role="tab" aria-selected="false" tabindex="-1"><?=$kat["page_name"]?></a>
                    <?php $first = false; } ?>

                </div>
            </div>
        </div>

        <div class="tab-content industry-tab__content-wrapper">
            <?php
                $first = true;
                foreach($ana_kats as $kat){
                $kat_id = $kat["id"];
                $kat_urunler = Sorgu("SELECT * FROM urun WHERE statu = 1 AND page_cat = '$kat_id' ORDER BY `rank` ASC LIMIT 4");
                ?>
            <div class="tab-pane fade <?=($first)?"show active":""?>" id="kat-<?=$kat["id"]?>" role="tabpanel" aria-labelledby="kat-<?=$kat["id"]?>-tab">
                <div class="row">
                    <?php
                        foreach($kat_urunler as $kat_urun){ ?>
                    <div class="project-wrapper col-lg-3 col-md-6 bakir-montaj-kitleri">
                        <div class="service_post style_one bg-white border-0">
                            <div class="image p-4">
                                <img loading="lazy" width="500" height="500" src="<?=$base?>/uploads/product/<?=$kat_urun["page_image"]?>" alt="<?=$kat_urun["page_name"]?>">
                            </div>
                            <div class="service_content icon_yes mt--10 border-0 border-top">
                                <h2 class="title_service"><a class="fw-normal" href="<?=$base?>/urun/<?=$kat_urun["seo_link"]?>" rel="bookmark"><?=$kat_urun["page_name"]?></a></h2>
                                <p class="short_desc text-limit-3"><?=$kat_urun["page_spot_description"]?> </p>
                                <a class="read_more" href="<?=$base?>/urun/<?=$kat_urun["seo_link"]?>"> Keşfet<i class="icon-right-arrow-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php $first = false; } ?>

        </div>

    </div>

</section>

<!---about us-->
<section class="bg-cover position-relative px-5" id="hakkimizda" style="background-image:url('lms_inc/img/backgrounds/enurcnc-kurumsal.jpg'); background-attachment: fixed;">
    <div class="position-relative z1">
        <div class="row align-items-center">
            <div class="col-lg-12 pd_top_60 pd_bottom_60">
                <div class="content text-editor  editor-p-text-white-60 editor-headings-font-light editor-h2-tracking--162px editor-strong-font-medium small-text-18px small-font-extralight small-text-white small-tracking-20px xsm-small-tracking-8px max-w-650px gap-15 editor-strong-text-white editor-h5-text-white-60 xsm-text-center min-lg-editor-h5-leading-30px editor-h5-max-w-550px editor-p-max-w-500px editor-headings-mb-20 md-max-w-full md-editor-h5-max-w-full  srb-all">
                    <?=Sonuc(Sorgu("SELECT page_description FROM sayfalar WHERE id = 30"))->page_description?>
                </div>
            </div>
        </div>
    </div>
</section>
<!---about us end-->

<!-- Hizmetler -->
<section class="pd_top_60 pd_bottom_60 mx-4">
    <div class="title_all_box style_three light_color pb-4 mx-2">
        <div class="title_sections three left">
            <h2 class="text-black text-uppercase">Hizmetler</h2>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper sektorler-swiper">
        <div class="swiper-wrapper">
            <?php foreach($sektorler as $sektor){ ?>
                <div class="swiper-slide">
                    <div class="slide-item-content">
                        <div class="slide-item align-content-center">
                            <div class="sek-cards">
                                <div class="sek-card-image">
                                    <div class="sek-card-films"></div>
                                    <img src="<?=$base?>/uploads/sector/<?=$sektor['page_image'] ?>" alt="<?=$sektor['page_name'] ?>">
                                </div>
                                <div class="sek-card-desc">
                                    <h4><?=$sektor['page_name'] ?></h4>
                                    <h5 class="text-limit-1">
                                        <p><?=$sektor['seo_descriptions'] ?></p>
                                    </h5>
                                    <div class="sek-card-desc-buton">
                                        <a href="<?=$base?>/hizmet/<?=$sektor['seo_link']?>" class="buton">Daha Fazlası</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
 
    </div>
</section>


<?php include('parts/footer.php'); ?><script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.sektorler-swiper', {
        loop: true,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
            1200: { slidesPerView: 4 }
        }
    });
});
</script>