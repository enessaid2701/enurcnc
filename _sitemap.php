<?php 

$host 	=	"localhost";
$db		=	"plusformer_db";
$user 	=	"plusformer_user";
$pass 	=	"N@#ky_qMFmOt";
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<urlset xmlns=\"https://www.sitemaps.org/schemas/sitemap/0.9\">";
echo "<url>
		<loc>https://".$_SERVER['HTTP_HOST']."</loc>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>";

$baglan=mysqli_connect($host,$user,$pass,$db);

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `haber` WHERE statu = 1 AND page_cat = 1 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/haber/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.9</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `haber` WHERE statu = 1 AND page_cat = 2 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/blog/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.9</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `haber_kategori` WHERE statu = 1 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.9</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `sayfalar` WHERE statu = 1 ORDER BY `id` DESC ");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.6</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `urun_kategori` WHERE statu = 1 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/urunler/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.6</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `urun` WHERE statu = 1 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/urun/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.6</priority>
		</url>"; 
}

$query = mysqli_query($baglan, "SELECT `id`, `seo_link` FROM `sektor` WHERE statu = 1 ORDER BY `id` DESC");
while($makale = mysqli_fetch_array($query)){
	echo "<url>
			<loc>https://".$_SERVER['HTTP_HOST']."/uygulama-alanlari/".$makale['seo_link']."</loc>
			<changefreq>weekly</changefreq>
			<priority>0.6</priority>
		</url>"; 
}

echo "</urlset>";
mysqli_close($baglan);

?>