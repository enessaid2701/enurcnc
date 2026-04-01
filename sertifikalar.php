<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `seo_link` = 'sertifikalar'");
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
<div id="content" class="site-content">
    <link rel="stylesheet" href="lms_inc/css/lightgallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- breadcrumb -->
    <section class="page_header_default style_one pd_top_115 pb-0">
        <!-- <div id="tsparticles"></div> -->
        <div class="parallax_cover">
            <img src="lms_inc/img/backgrounds/breadcrumb.png" alt="bg_image" class="cover-parallax d-block">
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
                                <li class="active mb-0"><?=$page_name?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pd_top_80 radius-top50">
        <div class="full-container px-0">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="common-page-content  pd_top_30 lightGalleryContent">
                        <div class="award-item__wrapper sertifikalar bagidua">
                            <div class="row justify-content-center">
                                <?php
                                $sertifikalar = Select_sorgu('belgeler', '');
                                foreach($sertifikalar as $sertifika){ ?>
                                <div class="col-lg-3 col-md-4 separator">
                                    <div class="featured-project-single-grid bdrs-15">
                                        <a href="<?=$base?>/uploads/certificate/<?=$sertifika['image']?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
                                            <div class="featured-project-single-grid__image h250 text-center">
                                                <img src="<?=$base?>/uploads/certificate/<?=$sertifika['image']?>" class="img-fluid h-100 w-auto anime" alt="<?=$sertifika["title"]?>">
                                            </div>
                                        </a>
                                        <div class="featured-project-single-grid__content">
                                            <h4 class="text border-0 mt-0 pt-0"><?=$sertifika["title"]?></h4>
                                            <a href="<?=$base?>/uploads/certificate/<?=(isset($sertifika['belgeler_pdf_tr']) && $sertifika['belgeler_pdf_tr'] != '')?$sertifika['belgeler_pdf_tr']:$sertifika['image'] ?>" target="_blank" class="project-details-link"><i class="fa fa-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php }if($sertifikalar->num_rows < 1){
                                    echo "<h3 class='text-center text-black'>Sertifikalarımız Güncellenmektedir...</h3>";
                                } ?>
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