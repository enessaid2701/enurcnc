<?php
include("parts/infrastructure.php");
$seo = $_GET['seo'];
$page_query = Select_sorgu("urun"," AND `seo_link` = '$seo'");
if ( say($page_query) > 0 ){
    $marka_link = "";
    $row = mysqli_fetch_assoc($page_query); 
    $page_id = $row['id'];
    $page_name = $row['page_name']; 
    $page_cat = $row['page_cat'];
    $page_description = $row['page_description'];
    $page_spot_description = $row['page_spot_description'];
    $page_image = $base.'/uploads/service/'.$row['page_image'];
    $page_link = "//www.".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    $seo_link = $row['seo_link'];
    $seo_title = $row['seo_title']." - ".$ayar['firma_adi'];
    $seo_desc = $row['seo_descriptions'];
}else{
    header("Location: $base/404");
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
<link rel="stylesheet" href="<?=$base?>/lms_inc/css/lightgallery.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                            <li>
                                <a href="<?=$base?>/urunler">
                                    Ürünler
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

<section class="pd_top_30 radius-top50">
    <div class="full-container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 p-0 m-auto">
                <div class="flexslider d-flex flex-column-reverse mb-0 lightGalleryContent">
                    <ul class="slides bagidua">
                        <li class="separator">
                            <a href="<?=$base?>/uploads/product/<?=$row["page_image"]?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
                                <img class="img-fluid mb-0 maxh-500 object-contain" src="<?=$base?>/uploads/product/<?=$row["page_image"]?>" alt="<?=$page_name?>">
                            </a>
                        </li>
                        <?php
                            $urun_resimler = Sorgu("SELECT * FROM urun_resim WHERE urun_id = '$page_id' ");
                            foreach($urun_resimler as $urun_resim){ ?>
                        <li class="separator">
                            <a href="<?=$base?>/uploads/product/other/<?=$urun_resim['resim']?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
                                <img class="img-fluid mb-0 maxh-500" src="<?=$base?>/uploads/product/other/<?=$urun_resim['resim']?>" alt="<?=$page_name?>">
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class=" p-4">
                    <div class="d-sm-flex justify-content-between align-items-center pd_bottom_20">
                        <a href="javascript:history.back()">
                            <p class="my-2"><i class="fa fa-arrow-left me-2"></i>Geri Dön</p>
                        </a>
                    </div>
                    <div class="pd_bottom_40">
                        <h3 class="text-uppercase"><?=$page_name?></h3>
                        <p class="mb-0 pt-3"><?=$row['page_spot_description']?></p>
                    </div>
                    <!--<div class="d-flex mt-4">
                            <button class="main-btn border-0 bg-transparent text-black fz20 py-2 px-3 mx-1 my-2" id="scrollLink">Teknik Açıklama <i class="fa fa-angle-down ms-2"></i></button>
                        </div>-->
                </div>
            </div>
        </div>

        <div class="pd_top_70 default_single_product" id="aciklama">
            <div class="woocommerce-tabs wc-tabs-wrapper mb-0 pt-0 border-0 px-0">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h3 class="mb-4">Teknik Açıklama</h3>
                        <div class="content_box">
                            <p><?=$row['page_description']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/gh/Arlina-Design/FlamingTree@master/lightgallery.js"></script>
<script>
    // Light Gallery
    $('.lightGalleryContent').each(function() {
        $(this).find('.bagidua').lightGallery({
            thumbnail: true,
            getCaptionFromTitleOrAlt: true,
            selector: "a[style]"
        });
    });
    // Image Transition
    var scroll = "yes",
        Fscroll = scroll.replace(/(\r\n|\n|\r)/gm, " ");
    "yes" === Fscroll &&
        ($(document).ready(function() {
                $("body").addClass("imgani");
            }),
            $(window).bind("load resize scroll", function() {
                var o = $(this).height();
                $("img").each(function() {
                    var s = 0.1 * $(this).height() - o + $(this).offset().top;
                    $(document).scrollTop() > s && $(this).addClass("anime");
                });
            }));
</script>

<?php include('parts/footer.php'); ?>