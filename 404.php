<?php
include("parts/infrastructure.php");
include("parts/header.php");
?>
<!-- breadcrumb -->
<section class="page_header_default style_one pd_top_115 pb-0">
    <!-- <div id="tsparticles"></div> -->
    <div class="parallax_cover">
        <img src="lms_inc/img/backgrounds/breadcrumb.png" alt="bg_image" class="cover-parallax">
    </div>
    <div class="page_header_content text-start">
        <div class="px-5">
            <div class="row align-items-center">
                <div class="col-md-6 px-0">
                    <div class="banner_title_inner mb-0">
                        <div class="title_page fz35">
                            404
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
                            <li class="active mb-0">404</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pd_top_80 pd_bottom_80 radius-top50">
    <div class="full-container pd_zero">
        <div class="row text-center">
            <h1 class="main-color fz200 pd_top_120 pd_bottom_80">404</h1>
            <p class="fz20 main-color">OOPS! Aradığınız Sayfa Bulunamadı!</p>

        </div>
    </div>
</section>
<?php include('parts/footer.php'); ?>