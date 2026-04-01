<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `id` = '25'");
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
<?php
$medyalar_sorgu = Select_sorgu('haber', 'AND page_cat = 1 ORDER BY id ASC');
$medyalar_arr = [];

foreach($medyalar_sorgu as $medya){
    $medyalar_arr[] = [
        "page_name" => $medya["page_name"],
        "page_image" => $medya["page_image"],
        "seo_link" => $medya["seo_link"],
        "spot_aciklama" => $medya["page_spot_description"],
        "created_at" => $medya["update_date"]
    ];
}

?>
<section class="grid_all three_column pd_top_80 pd_bottom_20 radius-top50">
    <div class="full-container">
        <div class="row pd_bottom_30">
            <?php
                if($medyalar_sorgu->num_rows > 0){ ?>
            <div class="col-md-6">
                <div class="news_box style_two grid_box _card has_images h-100 pb-5 mb-0">
                    <div class="content_box h-100 align-content-center">
                        <div class="overlay"> </div>
                        <img src="<?=$base?>/uploads/news/<?=$medyalar_arr[0]["page_image"]?>" class="img-fluid" alt="img">
                        <div class="content_mid p-0">
                            <h2 class="title"><a class="fz35" href="<?=$base?>/sektor/<?=$medyalar_arr[0]["seo_link"]?>" rel="bookmark"><?=$medyalar_arr[0]["page_name"]?></a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-6">
                <?php
                    if($medyalar_sorgu->num_rows > 1){ ?>
                <div class="news_box default_style list_view has_images">
                    <div class="image img_hover-1">
                        <img width="750" height="420" src="<?=$base?>/uploads/news/<?=$medyalar_arr[1]["page_image"]?>" class="img-fluid" alt="img">
                    </div>
                    <div class="content_box py-3">
                        <h2 class="title"><a href="<?=$base?>/sektor/<?=$medyalar_arr[1]["seo_link"]?>" rel="bookmark"><?=$medyalar_arr[1]["page_name"]?></a></h2>
                        <p class="short_desc text-limit-2"><?=$medyalar_arr[1]["spot_aciklama"]?></p>
                        <a href="<?=$base?>/sektor/<?=$medyalar_arr[1]["seo_link"]?>" class="link__go">Daha Fazla</a>
                    </div>
                </div>
                <?php } ?>
                <?php
                    if($medyalar_sorgu->num_rows > 2){ ?>
                <div class="news_box default_style list_view has_images">
                    <div class="image img_hover-1">
                        <img width="750" height="420" src="<?=$base?>/uploads/news/<?=$medyalar_arr[2]["page_image"]?>" class="img-fluid" alt="img">
                    </div>
                    <div class="content_box py-3">
                        <h2 class="title"><a href="<?=$base?>/sektor/<?=$medyalar_arr[2]["seo_link"]?>" rel="bookmark"><?=$medyalar_arr[2]["page_name"]?></a></h2>
                        <p class="short_desc text-limit-2"><?=$medyalar_arr[2]["spot_aciklama"]?></p>
                        <a href="<?=$base?>/sektor/<?=$medyalar_arr[2]["seo_link"]?>" class="link__go">Daha Fazla</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <?php
                $count = 0;
                foreach($medyalar_sorgu as $ms){
                if($count <= 2){
                    $count++;
                    continue;
                }
                     ?>
            <div class="col-md-4">
                <div class="news_box default_style list_view has_images">
                    <div class="image img_hover-1">
                        <img width="750" height="420" src="<?=$base?>/uploads/news/<?=$ms["page_image"]?>" class="img-fluid" alt="img">
                    </div>
                    <div class="content_box py-3">
                        <h2 class="title"><a href="<?=$base?>/sektor/<?=$ms["seo_link"]?>" rel="bookmark"><?=$ms["page_name"]?></a></h2>
                        <p class="short_desc text-limit-2"><?=$ms["page_spot_description"]?></p>
                        <a href="<?=$base?>/sektor/<?=$ms["seo_link"]?>" class="link__go">Daha Fazla</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php if($medyalar_sorgu->num_rows < 1){
                echo '<h3 class="text-center">İçeriklerimiz Güncellenmektedir...</h3>';
            }
            ?>
    </div>

</section>

<?php include('parts/footer.php'); ?>