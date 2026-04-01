<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `id` = '2'");
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
                            İletişim
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
                            <li class="active mb-0">İletişim</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!---iletişim-->
    <section class="pd_top_80 radius-top50">
        <div class="px-5">

            <div class="row">
                <div class="col-lg-4 col-md-6 m-auto">

                    <a href="https://maps.app.goo.gl/XjZewHfXbsu9qNBj9" target="_blank" class="d-table">
                        <div class="contact_box_inner icon_yes">
                            <div class="contnet">
                                <h5> Adres </h5>
                                <p>
                                    <?=$ayar['firma_adres']?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="tel:<?=not_masked_phone($ayar['firma_tel2'])?>" target="_blank" class="d-table">
                        <div class="contact_box_inner icon_yes">
                            <div class="contnet">
                                <h5> Telefon Numarası </h5>
                                <p>
                                    <?=$ayar['firma_tel2']?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="tel:<?=not_masked_phone($ayar['firma_tel'])?>" target="_blank" class="d-table">
                        <div class="contact_box_inner icon_yes">
                            <div class="contnet">
                                <h5> Whatsapp Hattı </h5>
                                <p>
                                    <?=$ayar['firma_tel']?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="mailto:<?=$ayar['firma_email']?>" target="_blank" class="d-table">
                        <div class="contact_box_inner icon_yes">
                            <div class="contnet">
                                <h5> E-Posta </h5>
                                <p>
                                    <?=$ayar['firma_email']?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-6 pe-0 iletisimYanUzunCubuk position-relative">
                    <section class="map-section overflow-hidden">
                        <!--Map-->
                        <iframe src="<?=$ayar['google_maps']?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <?php include("parts/footer.php"); ?>