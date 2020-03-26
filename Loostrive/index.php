<?php get_header();?>
<div class="container">
	<?php if (get_option('strive_gg') == 'Display') { ?>
	<div class="subsidiary row box">
		<div class="bulletin fourfifth">
			<span class="sixth">站点公告：</span>
            <marquee class="fivesixth" direction=left onmouseout=start(); onmouseover=stop(); scrollAmount=2 scrollDelay=15;>
            	<?php echo get_option('strive_announce'); ?>
            </marquee>
         </div>
         <div class="bdshare_small fifth">
         <?php if (get_option('strive_bdshare') == 'Display') { ?>
			<!-- Baidu Button BEGIN -->
                    <div class="bdsharebuttonbox">
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a href="#" class="bds_huaban" data-cmd="huaban" title="分享到花瓣"></a>
                    	<a href="#" class="bds_more" data-cmd="more"></a>
                    </div>
			<!-- Baidu Button END -->
			<?php }?>
        </div>
	</div>
    <?php } else{if(!is_mobile()){ echo '<div class="row"></div>';}} ?>
    <?php if (get_option('strive_slidebar') == 'Display') { ?>
    <?php get_sidebar();?>
    	<?php if (get_option('strive_slides') == 'Display'&& $post==$posts[0] && !is_paged()) { ?>
        	<?php include('includes/slides.php'); ?>
    <?php }} ?>

    <div class="mainleft">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页幻灯区域') ) :; endif;?>
        <ul id="post_container" class="masonry clearfix">
        <?php $limit = get_option('posts_per_page');$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
        <?php if (get_option( 'sticky_posts' )){ query_posts( array('post__in'=>get_option( 'sticky_posts' ),'ignore_sticky_posts' => 1,'paged'=>$paged))?>
		<?php include('includes/list_post.php');} ?>
        <?php query_posts(array('cat'=>get_option('strive_leiid'),'post__not_in' => get_option( 'sticky_posts' ),'paged'=>$paged)); ?>
			<?php include('includes/list_post.php'); ?>
    	</ul>
		<div class="clear"></div>
			<div class="navigation container"><?php pagination(5);?></div>
		</div>
	</div>
<div class="clear"></div>
<?php get_footer()?>
