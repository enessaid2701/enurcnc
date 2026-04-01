<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `id` = '24'");
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
<?php
$sidebar_sector_query = mysqli_query($conn,"SELECT * FROM sektor WHERE statu = 1 ORDER BY `rank` ASC");
$page_cat_by_urun_kategori_query = mysqli_query($conn,"SELECT urun_kategori.page_name urun_kat_page_name, urun_kategori.seo_link urun_kat_seo_link, urun_kategori.page_image urun_kat_page_image FROM urun_kategori_sektor LEFT JOIN urun_kategori ON urun_kategori.id = urun_kategori_sektor.urun_kategori_id WHERE urun_kategori_sektor.sektor_id = $page_id ORDER BY `rank` ASC");
$page_sector_by_id_query = mysqli_query($conn,"SELECT urun.page_name urun_page_name, urun.seo_link urun_seo_link, urun.page_image urun_page_image FROM urun_sektor LEFT JOIN urun ON urun.id = urun_sektor.urun_id WHERE urun_sektor.sektor_id = $page_id ORDER BY `rank` ASC");
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
                            <?=$get_sayfalar[24]['seo_title']?>
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
                            <li class="active mb-0"><?=$get_sayfalar[24]['seo_title']?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pd_top_60 mb--50 radius-top50">
    <div class="px-5">
        <div class="row justify-content-center">
            <?php
                foreach($sidebar_sector_query as $kullanim_alani){
                ?>
            <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                <div class="service_box style_five dark_color">
                    <div class="service_content">
                        <a href="<?=$base?>/hizmet/<?=$kullanim_alani['seo_link'] ?>">
                            <div class="image_box">
                                <img src="<?=$base?>/uploads/sector/<?=$kullanim_alani['page_image'] ?>" class="img-fluid">
                            </div>
                        </a>
                        <div class="content_inner">
                            <div class="text_box d-flex ms-0">
                                <a href="<?=$base?>/hizmet/<?=$kullanim_alani['seo_link'] ?>"></a>
                                <h2><a class="mb-0" href="<?=$base?>/hizmet/<?=$kullanim_alani['seo_link'] ?>"><?=$kullanim_alani["page_name"]?></a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php include('parts/footer.php'); ?>