<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `seo_link` = 'hakkimizda'");
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
    </div>

    <!---about us-->
    <section class="radius-top50 px-4">
        <div class="pd_zero">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 col-12 pd_top_60 pd_bottom_60">
                    <p>
                        <?=$get_sayfalar[21]['page_description']?>

                    </p>
                </div>
                <!--<div class="col-lg-6 pd_top_60 pd_bottom_60 text-center mt--120-md">
                    <img src="<?=$base?>/lms_inc/img/logo/favicon.png"
                        class="h-auto w550 object-contain object-center" loading="lazy" alt="">
                </div>-->
            </div>
        </div>
    </section>

    <?php include("parts/footer.php"); ?>