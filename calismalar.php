<?php
include("parts/infrastructure.php");
$page_query = Select_sorgu("sayfalar"," AND `id` = '29'");
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
<style>
    .text-limit-8 {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .text-limit-5 {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
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
                        <div class="title_page fz25 text-uppercase">
                            <?=$page_name?>
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
                            <li class="active mb-0"><?=$page_name?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="grid_all three_column pd_top_80 pd_bottom_20 radius-top50">
    <div class="full-container">
        <div class="row pd_bottom_60">

            <div class="col-md-6">
                <a class="fz35" target="_blank" href="#" rel="bookmark">
                    <div class="news_box style_two grid_box _card has_images h-100 mb-0">
                        <div class="content_box h-100 align-content-center">
                            <div class="overlay"> </div>
                            <img src="" class="img-fluid insta-img" alt="img">
                            <div class="content_mid p-0">
                                <span class="date_in_number insta-date"></span>
                                <p class="short_desc text-limit insta-desc"></p>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <div class="news_box default_style list_view has_images">
                    <a href="#" target="_blank" rel="bookmark">
                        <div class="row">

                            <div class="image img_hover-1 col-md-6">
                                <img width="750" height="420" src="" class="img-fluid insta-img" alt="img">
                                <div class="categories date">
                                    <span class="date_in_number insta-date"></span>
                                </div>
                            </div>

                            <div class="content_box py-3 col-md-6 align-content-center">
                                <p class="short_desc text-limit-8 insta-desc mb-0"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="news_box default_style list_view has_images mb-0">
                    <a href="#" target="_blank" rel="bookmark">
                        <div class="row">
                            <div class="image img_hover-1 col-md-6">
                                <img width="750" height="420" src="" class="img-fluid insta-img" alt="img">
                                <div class="categories date">
                                    <span class="date_in_number insta-date"></span>
                                </div>
                            </div>
                            <div class="content_box py-3 col-md-6 align-content-center">
                                <p class="short_desc text-limit-8 insta-desc mb-0"></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <!-- <div class="grid_show_case grid_layout clearfix">
                <a href="#" target="_blank" rel="bookmark">
                    <div class="grid_box">
                        <div class="news_box default_style list_view has_images">
                            <div class="image img_hover-1">
                                <img width="750" height="420" src="" class="img-fluid insta-img" alt="img">
                                <div class="categories date">
                                    <span class="date_in_number insta-date"></span>
                                </div>          
                            </div>
                            <div class="content_box py-3 align-content-center">
                            <p class="short_desc text-limit-5 insta-desc mb-0"></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
        <div class="row">
            <div class="insta-tag row" id="additional-posts"></div>
        </div>

    </div>

</section>

<script>
    const accessToken = 'IGQWRNVlBndDRqcmdobWFvY2ZAEQlpGWmZAJd0xIMDVsd0NxUzB6TDZAoVHZAQTU00ZAGNlWTl1ZAXdORFBpaXlkR1ZANd2RxUlhqNWJRcDdwY0xTd01FNkctbmRQY1J2NDh6M2hwMlN0UTJ3VjVOV2RYQVJkZAjFCVXhSXzAZD';
    const url = `https://graph.instagram.com/me/media?fields=id,caption,media_url,permalink,timestamp&access_token=${accessToken}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const posts = data.data;
            const firstThreePosts = posts.slice(0, 3);
            const remainingPosts = posts.slice(3);

            // Update the first three posts in a specific design
            firstThreePosts.forEach((media, index) => {
                const imgElement = document.querySelectorAll('.insta-img')[index];
                const dateElement = document.querySelectorAll('.insta-date')[index];
                const descElement = document.querySelectorAll('.insta-desc')[index];
                const anchorElement = imgElement.closest('a');

                imgElement.src = media.media_url;
                const date = new Date(media.timestamp);
                dateElement.textContent = new Date(media.timestamp).toLocaleDateString();
                descElement.textContent = media.caption;
                anchorElement.href = media.permalink;
            });

            // Append the remaining posts in the .grid_show_case layout
            const gridContainer = document.querySelector('.insta-tag');
            remainingPosts.forEach(media => {
                const gridItem = document.createElement('div');
                gridItem.classList.add('col-md-4');

                gridItem.innerHTML = `
        <a href="${media.permalink}" target="_blank" rel="bookmark">
          <div class="news_box default_style list_view has_images">
            <div class="image img_hover-1">
              <img width="750" height="420" src="${media.media_url}" class="img-fluid insta-img" alt="img">
              <div class="categories date">
                <span class="date_in_number insta-date">${new Date(media.timestamp).toLocaleDateString()}</span>
              </div>          
            </div>
            <div class="content_box py-3 align-content-center">
              <p class="short_desc text-limit-5 insta-desc mb-0">${media.caption}</p>
            </div>
          </div>
        </a>
      `;

                gridContainer.appendChild(gridItem);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>


<?php include('parts/footer.php'); ?>