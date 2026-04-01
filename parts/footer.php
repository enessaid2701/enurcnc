</div>

</div>

<footer class="hm2-footer pt-3">
    <div class="mx-4 pt-2">
        <div class="row">
            <div class="col-lg-3 col-md-6 m-auto">
                <a href="index.php" class="logo navbar-brand">
                    <img src="<?=$base?>/lms_inc/img/logo/logo.png" alt="" class="d-flex m-auto">
                </a>
            </div>
            <div class="col-lg-2 col-md-6 navbar-wrap py-2">
                <ul class="navigation flex-column">
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>">Anasayfa</a></li>
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>/<?=$get_sayfalar[21]['seo_link']?>"><?=$get_sayfalar[21]['seo_title']?></a></li>
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>/urunler"><?=$get_sayfalar[4]['seo_title']?></a></li>
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>/<?=$get_sayfalar[24]['seo_link']?>"><?=$get_sayfalar[24]['seo_title']?></a></li>
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>/<?=$get_sayfalar[25]['seo_link']?>"><?=$get_sayfalar[25]['seo_title']?></a></li>
                    <li class="ms-0 width-max-content"><a class="text-white" href="<?=$base?>/iletisim">İletişim</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 py-2">
                <h5 class="text-white fw-normal text-uppercase fz15">Adres</h5>
                <a href="https://maps.app.goo.gl/XjZewHfXbsu9qNBj9" target="_blank" class="text-f3f5f7"><?=$ayar["firma_adres"]?></a>
                <h5 class="text-white fw-normal text-uppercase fz15 pt-3">Telefon</h5>
                <a class="text-f3f5f7" href="tel:<?=not_masked_phone($ayar["firma_tel"])?>"><?=$ayar["firma_tel"]?></a>
                <h5 class="text-white fw-normal text-uppercase fz15 pt-3">E-posta</h5>
                <a class="text-f3f5f7" href="mailto:<?=$ayar["firma_email"]?>"><?=$ayar["firma_email"]?></a>
            </div>
            <div class="col-lg-4 col-md-6 py-2">
                <iframe src="<?=$ayar["google_maps"]?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="hm2-footer-copyright position-relative py-2 mt-5">
            <div class="hm2-footer-hr"></div>
            <div class="mt-4">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-6 col-lg-6 m_fix002"> <span class="fz-13 text-white copright">© <?=date("Y")?> <?=$ayar['firma_adi']?> -
                            Tüm Hakları Saklıdır.</span> </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 m_fix002 text-end">
                        <a href="http://lumossoft.com" target="_blank"> <img src="<?=$base?>/lms_inc/img/logo/lumos-logo.png" class="lumos-logo" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="tel:<?=not_masked_phone($ayar['firma_tel3'])?>" target="_blank">
    <div class="phone-box d-md-block">
        <div class="d-flex align-items-center">
            <i class="fa fa-phone text-white fz-40 me-2"></i>
            <span>
                <div class="d-flex align-items-center">
                    <p class="fz-12 me-1 mb-0 text-white">Satış - Destek</p>
                    <div class="wp-tag text-white">Online</div>
                </div>
                <h5 class="mb-0 text-white"><?=$ayar['firma_tel']?></h5>
            </span>
        </div>
    </div>
</a>
<a href="https://api.whatsapp.com/send?phone=<?=not_masked_phone($ayar['firma_tel3'])?>&amp;text=Merhaba,%20ürünleriniz%20hakkında%20bilgi%20almak%20istiyorum." target="_blank">
    <div class="whatsapp-box d-md-block">
        <div class="d-flex align-items-center">
            <i class="fa fa-whatsapp text-white fz-40 me-2"></i>
            <span>
                <div class="d-flex align-items-center">
                    <p class="fz-12 me-1 mb-0 text-white">Canlı Destek</p>
                    <div class="wp-tag text-white">Online</div>
                </div>
                <h5 class="mb-0 text-white">7/24 WhatsApp Destek</h5>
            </span>
        </div>
    </div>
</a>

</div>

<!--JS-->
<script type='text/javascript' src='<?=$base?>/lms_inc/js/jquery-3.6.0.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/bootstrap.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/jquery.fancybox-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/jQuery.style.switcher.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/jquery.flexslider-min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/color-scheme-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/owl-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/swiper.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/isotope.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/countdown-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/simpleParallax.min-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/appear-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/jquery.countTo-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/sharer-1.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/validation-1.js'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/tsparticles@1.18.11/dist/tsparticles.min.js'></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/index.js?v=0.02'></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="<?=$base?>/lms_inc/js/gmaps-1.js"></script>
<script src="<?=$base?>/lms_inc/js/map-helper-1.js"></script>
<script type='text/javascript' src='<?=$base?>/lms_inc/js/enur-extension-1.js'></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>