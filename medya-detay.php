<?php
include("parts/infrastructure.php");
$seo = $_GET['seo'];
$page_query = Select_sorgu("haber"," AND `seo_link` = '$seo'");
if ( say($page_query) > 0 ){
    $marka_link = "";
    $row = mysqli_fetch_assoc($page_query); 
    $page_id = $row['id'];
    $page_name = $row['page_name']; 
    $page_cat = $row['page_cat'];
    $page_description = $row['page_description'];
    $page_spot_description = $row['page_spot_description'];
    $page_image = $base.'/uploads/news/'.$row['page_image'];
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
                            <li>
                                <a href="<?=$base.'/'.$get_sayfalar[25]['seo_link'];?>">
                                    <?=$get_sayfalar[25]['seo_title']?>
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

<section class="pd_top_70 radius-top50">
    <div class="full-container">
        <div class="row default_row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 content-area service">
                <div id="main" class="site-main" role="main">
                    <div class="blog_single_details_outer">
                        <div class="single_content_upper border-0">
                            <div class="blog_feature_image pd_bottom_15">
                                <img src="<?=$base?>/uploads/news/<?=$row['page_image']?>" class="wp-post-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 widget-area all_side_bar">
                <div class="post_single_content">
                    <?=$page_description?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('parts/footer.php'); ?>