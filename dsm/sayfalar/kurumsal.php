<?php include_once("parts/infrastructure.php"); 
$page_query = mysql_query("SELECT * FROM sayfalar WHERE seo_link = 'hakkimizda'");
if ( mysql_affected_rows() ){
	$row = mysql_fetch_assoc($page_query);
	$page_name = $row['page_name'];
	$page_description = $row['page_description'];
	$page_image = $row['page_image'];
	$page_title = $row['seo_title']." | ".$ayar['firma_adi'];
	$page_desc = $row["seo_descriptions"];
}
?>
<!--meta info-->
<title><?=$page_title;?></title>
<meta name="keywords" content="<?=$page_key;?>">
<meta name="description" content="<?=$page_desc;?>">
<?php include_once("parts/header-bottom.php");?>
<div class="clearfix"></div>
<!--Page title-->
<section class="page-title" style="background-image:url(images/background/6.jpg)">
	<div class="container">
		<div class="outer-box">
			<h1><?=$page_name;?></h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?=$base?>/"><span class="fa fa-home"></span>Anasayfa</a></li>
				<li class="active"><?=$page_name;?></li>
			</ul>
		</div>                
	</div>
</section>
<!-- What we do -->
<section class="what-we-do sp-two">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="sec-title">
					<div class="big-title">Kurumsal</div>
					<h1>30 Yıllık <br>Tecrübesiyle</h1>
				</div>
				<div class="text">
					<p>Karadeniz Raf, kurulduğu 1977 yılından günümüze raf sektöründe kazandığı tecrübe ve güçle müşterilerine  yüzde yüz memnuniyet ilkesi çerçevesinde hizmet vermeyi benimsemiştir.</p>
					<p>Günümüzde birçok  kurumsal firmaya hizmet sağlayan firmamız müşteri odaklı üretimi ön plana çıkarmıştır.Müşterileri ile güvene dayalı bir ticari ilişkiyi kurmayı amaç edinmiş firmamız bu doğrultuda en kaliteli hizmeti müşterilerine sunmayı firma felsefesi olarak görmüştür.</p>
					<p>Firmamız imal ettiği ürünleri Avrupa, Rusya, Orta Asya, Afrika ve Türk Cumhuriyetlerine ihraç etmektedir.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="stacked-image-carousel">
					<!--Slides-->
					<div class="slides">
						<!--Slide-->
						<div class="slide">
							<div class="image"><img src="images\resource\service-5.jpg" alt=""></div>
						</div>
						<!--Slide-->
						<div class="slide active">
							<div class="image"><img src="images\resource\service-6.jpg" alt=""></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- About Mission -->
<section class="our-mission">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="mission-block">
					<div class="inner-box">
						<h4><a href="#">Misyonumuz</a></h4>
						<div class="text">Sektörümüzün değişen ve gelişen ihtiyaçlarını, tüm paydaşlarımızın memnuniyetini göz önünde bulundurarak, çağdaş yönetim yaklaşımları ile ürün ve hizmet kalitesinden ödün vermeden, teknolojik gelişmeleri yakından takip edip uygulayarak karşılamak ve yenilikçi atılımlar ile farklılıklar yaratmak.</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mission-block">
					<div class="inner-box">
						<h4><a href="#">Vizyonumuz</a></h4>
						<div class="text"><p>Öncelikle teknolojik gelişmeleri yakından takip ederek,çalışanlarımızla ve müşterilerimizle bir aile olarak dünya raf sektöründe en güçlü ve kaliteli Türk firması olmaktır.</p></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- funfact section  -->
<section class="funfact-section-two black-bg-3 pt-145">
	<div class="container">
		<div class="fact-counter">
			<div class="row">
				<!--Column-->
				<article class="column counter-column col-lg-3 col-md-6 wow fadeIn" data-wow-duration="900ms">
					<div class="item">
						<div class="inner-box">
							<div class="icon-box">
								<i class="flaticon-creative-idea"></i>
							</div>
							<div class="count-outer count-box">
								<span class="count-text" data-speed="3000" data-stop="30">0</span>
								<p>Yıllık Tecrübe </p>
							</div>
						</div>                                                      
					</div>
				</article>
				<!--Column-->
				<article class="column counter-column col-lg-3 col-md-6 wow fadeIn" data-wow-duration="300ms">
					<div class="item">
						<div class="inner-box">
							<div class="icon-box">
								<i class="flaticon-project"></i>
							</div>
							<div class="count-outer count-box">
								<span class="count-text" data-speed="3000" data-stop="350">0</span>
								<p>Farklı Ürün Gamı</p>
							</div>
						</div>                                                     
					</div>
				</article>
				<!--Column-->
				<article class="column counter-column col-lg-3 col-md-6 wow fadeIn" data-wow-duration="600ms">
					<div class="item">
						<div class="inner-box">
							<div class="icon-box">
								<i class="flaticon-group"></i>
							</div>
							<div class="count-outer count-box">
								<span class="count-text" data-speed="3000" data-stop="350">0</span>
								<p>İş Ortağı</p>
							</div>
						</div>                                                      
					</div>
				</article>
				<!--Column-->
				<article class="column counter-column col-lg-3 col-md-6 wow fadeIn" data-wow-duration="900ms">
					<div class="item">
						<div class="inner-box">
							<div class="icon-box">
								<i class="flaticon-location-pin"></i>
							</div>
							<div class="count-outer count-box">
								<span class="count-text" data-speed="3000" data-stop="350">0</span>
								<p>Ülkeye İhracat</p>
							</div>
						</div>                                                     
					</div>
				</article>
			</div>
		</div> 
	</div>
</section>
<!-- Client Logo -->
<section class="client-logo grey-bg">
    <div class="container-fluid">
        <div class="client-logo-area">
            <ul class="eight-item-carousel owl-carousel owl-theme owl-theme owl-dot-none owl-nav-none">
                <li><a href="#"><img src="images/clients/6.png" alt=""></a></li>
                <li><a href="#"><img src="images/clients/7.png" alt=""></a></li>
                <li><a href="#"><img src="images/clients/8.png" alt=""></a></li>
                <li><a href="#"><img src="images/clients/9.png" alt=""></a></li>
                <li><a href="#"><img src="images/clients/10.png" alt=""></a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Client Logo -->
<?php include_once("parts/footer.php"); ?>