<?php
   $get_sayfalar = Sayfalar();
   ?>
<meta charset="utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow, archive" />
<meta name="author" content="BAHADIR ORHAN, lumos@lumossoft.com" />
<meta name="designer" content="BAHADIR ORHAN - LUMOS SOFT TEKNOLOJI ve YAZILIM COZUMLERI A.S." />
<meta name="content-language" content="tr-TR" />
<meta name="language" content="Turkish" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="copyright" content="<?=date('Y')?> - <?=$ayar['firma_adi']?>" />
<meta name="distribution" content="global" />
<meta name="googlebot" content="index, follow, archive" />
<meta name="reply-to" content="<?=date('Y')?> - <?=$ayar['firma_adi']?>" />
<!--Favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="<?=$base?>/lms_inc/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?=$base?>/lms_inc/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=$base?>/lms_inc/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=$base?>/lms_inc/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=$base?>/lms_inc/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=$base?>/lms_inc/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?=$base?>/lms_inc/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=$base?>/lms_inc/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=$base?>/lms_inc/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?=$base?>/lms_inc/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=$base?>/lms_inc/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?=$base?>/lms_inc/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$base?>/lms_inc/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?=$base?>/lms_inc/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?=$base?>/lms_inc/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--CSS-->
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/bootstrap.min-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/owl-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/swiper.min-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/jquery.fancybox.min-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/icomoon-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/flexslider-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/font-awesome.min-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/style-1.css' type='text/css' media='all'>
<link rel='stylesheet' id="enur-color-switcher-css" href='<?=$base?>/lms_inc/css/scss/elements/color-switcher/color-1.css' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/scss/elements/lumos-css-1.css?v=0.10' type='text/css' media='all'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/index.css?v=0.015'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/footer.css?v=0.03'>
<link rel='stylesheet' href='<?=$base?>/lms_inc/css/style.css?v=0.05'>
<!--ReCaptcha-->
<meta name="google-site-verification" content="<?=$ayar['google_verification'];?>" />
</head>

<body>
   <div id="page" class="page_wapper hfeed site">
      <div id="wrapper_full" class="content_all_warpper">

         <!----header----->
         <div class="header_area" id="header_contents">
            <header class="header header_default style_nine header_eleven head_absolute pd_top_20 transparent-bg">
               <div class="px-5">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-lg-4 col-md-5 col-sm-5 col-xs-5 logo_column px-0">
                        <div class="header_logo_box">
                           <a href="<?=$base?>" class="logo navbar-brand">
                              <img src="<?=$base?>/lms_inc/img/logo/logo.png" alt="" class="logo_default">
                              <img src="<?=$base?>/lms_inc/img/logo/logo.png" alt="" class="logo_fixed">
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-5 col-sm-5 col-xs-5 menu_column px-0 text-center">
                        <div class="navbar_togglers hamburger_menu color_white">
                           <span class="line"></span>
                           <span class="line"></span>
                           <span class="line"></span>
                        </div>
                        <div class="header_content_collapse">
                           <div class="header_menu_box d-flex">
                              <div class="navigation_menu w-100">
                                 <ul id="myNavbar" class="navbar_nav sm-d-block d-flex justify-content-end">
                                    <li class="menu-item nav-item">
                                       <a href="<?=$base.'/'.$get_sayfalar[21]['seo_link'];?>" class="dropdown-item nav-link">
                                          <span><?=$get_sayfalar[21]['seo_title']?></span>
                                       </a>
                                    </li>
                                    <li class="menu-item menu-item-has-children nav-item icon-hover text-nowrap position-static">
                                       <a href="<?=$base?>/urunler" class="dropdown-toggle nav-link">
                                          <span><?=$get_sayfalar[4]['seo_title']?></span>
                                       </a>
                                       <div class="dropdown-menu w-100 p-0">
                                          <div class="row text-transform-none">
                                             <div class="acilir-menu-white">
                                                <ul class="text-uppercase text-wrap">
                                                   <?php
                                                   $ana_kats = Sorgu("SELECT * FROM urun_kategori WHERE statu = 1 ORDER BY rank ASC");
                                                   foreach($ana_kats as $ana_kat){ ?>
                                                   <li class="py-2">
                                                      <a href="<?=$base?>/urunler/<?=$ana_kat["seo_link"]?>" id="<?=$ana_kat['seo_link']?>-<?=$ana_kat["id"]?>" class="header-product-btn active-header-product"><?=$ana_kat["page_name"]?> <img src="<?=$base?>/lms_inc/img/icons/acilir-menu-ok.png"></a>
                                                   </li>
                                                   <?php } ?>
                                                </ul>
                                             </div>

                                             <div class="acilir-menu-mainColor text-wrap">
                                                <div id="parent-header-product">
                                                   <?php
                                                   $count = 0;
                                                   foreach($ana_kats as $ana_kat){
                                                   $count++; ?>
                                                   <div class="<?=$ana_kat['seo_link']?>-<?=$ana_kat["id"]?>" <?=($count > 1)?'style="display: none;"':''?> >
                                                      <div class="container">
                                                         <div class="row">
                                                            <div class="col-lg-7">
                                                               <h5><?=$ana_kat["page_name"]?></h5>
                                                               <p>
                                                                  <?=$ana_kat["page_spot_description"]?>
                                                               </p>
                                                               <div class="buton-mar-top header-acilir-menu-daha-fazlasi-btn">
                                                                  <a href="<?=$base?>/urunler/<?=$ana_kat["seo_link"]?>" class="buton">Daha Fazlası<i class="fa fa-arrow-right ms-2"></i></a>
                                                               </div>
                                                            </div>
                                                            <div class="col-lg-5 acilir-menu-resim-rakam">
                                                               <img src="<?=$base?>/uploads/product_cat/<?=$ana_kat["page_image"]?>">
                                                               <span><?=($count < 10)?"0".$count:$count?></span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <?php } ?>
                                                </div>
                                             </div>

                                          </div>
                                       </div>
                                    </li>
                                    <?php
                                    $kategori33 = Sorgu("SELECT * FROM urun_kategori WHERE id = 33 AND statu = 1");
                                    foreach($kategori33 as $kat){ ?>
                                    <li class="menu-item nav-item">
                                       <a href="<?=$base?>/urunler/<?=$kat["seo_link"]?>" class="dropdown-item nav-link">
                                          <span><?=$kat["page_name"]?></span>
                                       </a>
                                    </li>
                                    <?php } ?>
                                    <li class="menu-item menu-item-has-children nav-item icon-hover text-nowrap">
                                       <a href="<?=$base?>/<?=$get_sayfalar['24']['seo_link']?>" class="dropdown-toggle nav-link">
                                          <span><?=$get_sayfalar[24]['seo_title']?></span>
                                       </a>
                                       <ul class="dropdown-menu">
                                          <?php
                                          $sektorler = Select_sorgu('sektor', '');
                                          foreach($sektorler as $sektor){
                                          ?>
                                          <li class="menu-item nav-item">
                                             <a href="<?=$base?>/hizmet/<?=$sektor['seo_link']?>" class="dropdown-item nav-link">
                                                <span><?=$sektor['page_name']?></span>
                                             </a>
                                          </li>
                                          <?php } ?>
                                       </ul>
                                    </li>
                                    <li class="menu-item nav-item">
                                       <a href="<?=$base.'/'.$get_sayfalar[25]['seo_link'];?>" class="dropdown-item nav-link">
                                          <span><?=$get_sayfalar[25]['seo_title']?></span>
                                       </a>
                                    </li>
                                    <li class="menu-item nav-item">
                                       <a href="<?=$base?>/iletisim" class="dropdown-toggle nav-link">
                                          <span>İletişim</span>
                                       </a>
                                       <ul class="dropdown-menu iletisim-dropdown left-minus-175 padd-15px">
                                          <li class="menu-item nav-item">
                                             <a class="text-black" href="<?=$base?>/iletisim">
                                                <img class="w-25px me-2 mobile-none dr-t10px" src="<?=$base?>/lms_inc/img/icons/placeholder.svg"> İletişime Geç                                                    
                                                <span class="iletisim-dropdown-span mobile-none">Bizimle İletişime Geçin</span>
                                             </a>
                                          </li>
                                          <li class="menu-item nav-item">
                                             <a class="text-black" href="tel:<?=not_masked_phone($ayar['firma_tel'])?>">
                                                <img class="w-25px me-2 mobile-none dr-t10px" src="<?=$base?>/lms_inc/img/icons/phone.svg"> Şimdi Ara                                                    
                                                <span class="iletisim-dropdown-span mobile-none"><?=$ayar['firma_tel']?></span>
                                             </a>
                                          </li>
                                          <li class="menu-item nav-item">
                                             <a class="text-black" target="_blank" href="https://api.whatsapp.com/send?phone=<?=not_masked_phone($ayar['firma_tel3'])?>&amp;text=Merhaba,%20ürünleriniz%20hakkında%20bilgi%20almak%20istiyorum.">
                                                <img class="w-25px me-2 mobile-none dr-t10px" src="<?=$base?>/lms_inc/img/icons/whatsapp.svg"> Whatsapp
                                                <span class="iletisim-dropdown-span mobile-none">Whatsapp İle İletişime Geç</span>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </header>
         </div>
         
         <div class="crt_mobile_menu">
            <div class="menu-backdrop"></div>
            <nav class="menu-box">
               <img src="<?=$base?>/lms_inc/img/logo/fixed-logo.png" class="float-start w200">
               <div class="close-btn"><i class="icon-close"></i></div>
               <div class="menu-outer">
                  
               </div>
            </nav>
         </div>
         
         <div id="content" class="site-content">