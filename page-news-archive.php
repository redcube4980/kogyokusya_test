fHM43ZfHM43Z<?php
/**
* Template Name: news-archive
*/
get_header();
$current_category = single_cat_title('', false);
?>

  <div id="container" class="cf school-life">
        <div id="breadcrumb">
            <ul>
                <li>
                    <a href="/">トップ</a>
                </li>
                <li>
                    <a href="/news-archive/">NEWS一覧</a>
                </li>
            </ul>
        </div>
        <div id="main" class="news-list-main">
			<div class="left-menu">
            <div class="left-menu-list">
                <p class="left-menu-ttl">NEWS一覧</p>
                <ul class="news-list-menu">
                    <li class="category-top-ttl"><a href="/news-archive/">NEWS一覧トップ</a></li>
                    <?php
                        $categories = get_categories(array('hide_empty' => 0)); 
                        foreach ($categories as $cat) {
                            if ($cat->cat_name === '未分類') {
                                continue;
                            }
                            if ($cat->cat_name === $current_category) {
                                $list_item = '<li class="now-page">'.$cat->cat_name.'</li>';
                            } else {
                                $list_item = '<li><a href="/news-archive/'.$cat->slug.'/">'.$cat->cat_name.'</a></li>';
                            }
                            echo $list_item;
                        }
                    ?>
                </ul>
            </div>
				<?php date_default_timezone_set('Asia/Tokyo');?>
				<?php if (date('Y-m-d H:i:s') < '2021-02-07 06:00:00') :?>
				<div class="sidebar-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php else:?>
				<div class="sidebar-banner">
					<a href="https://www.go-pass.net/kogyokuj"><img style="display: none;" class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/pass-banner.png" alt="pass-banner"></a>
				</div>
				<?php endif;?>
				<div class="sidebar-banner">
					<a href="https://mirai-compass.net/usr/kogyokuj/common/login.jsf"><img class="sidebar-banner-img" src="<?php echo get_template_directory_uri();?>/img/bunner.png" alt="bunner"></a>
				</div>
			</div>
            <div class="right-wrap">
                <div class="ttl-area">
                    <h2 class="news-list-ttl">NEWS一覧トップ</h2>
                    <p><span></span></p>
                </div>
                <div class="news-list-warp">

                    <?php 
                    if (have_posts()) : 
                        while (have_posts()) { the_post();
                    ?>
                        <div class="document">
                            <div class="document-icon">
                                <?php $image = get_field('news_image');?>
                                <?php if(isset($image)):?>
                                    <img src="<?php echo $image['sizes']['large']; ?>">
                                <?php endif;?>
                            </div>
                            <div class="document-txt">
                                <?php $category = get_the_category(); ?>
                                <div class="tag"><?php echo $category[0]->name; ?></div>
                                <p class="document-time"><?php echo get_the_date(); ?></p>
                                <p class="document-ttl"><a href="<?php the_permalink(); ?>" target=""><?php the_title(); ?></a></p>
                                <p><?php the_field('news_catch_phrase');?></p>
                            </div>
                        </div>
                    <?php 
                    }
                    endif;
                    ?>

                </div>
                <div class="pager">

                    <?php if( function_exists("the_pagination") ) the_pagination(); ?>

                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>