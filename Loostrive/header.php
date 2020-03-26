<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php include('includes/seo.php');?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="shortcut icon" href="<?php echo stripslashes(get_option('strive_favicon')); ?>" type="image/x-icon" />
<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
<!--[if lte IE 7]><script>window.location.href='http://up.loome.net/upgrade-your-browser2.html?referrer='+location.href;</script><![endif]-->
<?php wp_head()?>
<style>
	#post_container .fixed-hight .thumbnail{height:<?php echo stripslashes(get_option('strive_timthigh')); ?>px; overflow: hidden;}
	@media only screen and (max-width: 640px) {#post_container .fixed-hight .thumbnail{height:<?php echo stripslashes(get_option('strive_timthigh')*'0.525'); ?>px; overflow: hidden;}}
	.related,.related_box{height: <?php echo stripslashes(get_option('strive_relatedhigh'))+'90'; ?>px;}
	.related_box .r_pic,.related_box .r_pic img {height: <?php echo stripslashes(get_option('strive_relatedhigh')); ?>px;}
	<?php if (get_option('strive_gg') == 'Display' || is_mobile()) { echo'@media only screen and (max-width: 640px) {.mainmenus { margin-bottom: 1.5em; }}'; }?>
	<?php if (get_option('strive_waterfall') == 'Hide') {echo'@media only screen and (max-width: 640px) {#post_container li .article h2{height: 45px;overflow: hidden;padding-bottom: 0;margin-bottom: 10px;}}'; }?>
	</style>
</head>
<body  class="custom-background">
<?php if ( is_home() || is_search() || is_category() || is_month() || is_author() || is_archive() ) { ?>
<?php include('includes/loading.php'); ?>
<?php } ?>
		<div id="head" class="row">
        <?php if (get_option('strive_toolbar') == 'Display') { ?>			
        	<div class="mainbar row">
                <div class="container">
                        <div id="topbar">
                            <?php if(function_exists('wp_nav_menu')) {
                            wp_nav_menu(array(
                            'theme_location'=>'toolbar',
                            'menu_id'=>'toolbar',
                            'container'=>'ul')
                            );}
                            ?>
                        </div>
                        <div id="rss">
                            <ul>
                                <?php if (get_option('strive_sbaidu') == 'Display') { ?>
                                <li><a href="<?php echo stripslashes(get_option('strive_sbaidumap')); ?>" target="_blank" class="icon5" title="百度站点地图"></a></li><?php } else { } ?>
                                 <?php if(get_option('strive_tqq') == 'Display') { ?>
                                <li><a href="<?php echo stripslashes(get_option('strive_tqqurl')); ?>" target="_blank" class="icon2" title="我的腾讯微博" rel="nofollow"></a></li><?php } else { } ?>
                                <?php if(get_option('strive_weibo') == 'Display') { ?>
                                <li><a href="<?php echo stripslashes(get_option('strive_weibourl')); ?>" target="_blank" class="icon3" title="我的新浪微博" rel="nofollow"></a></li><?php } else { } ?>
                                <?php if(get_option('strive_site') == 'Display') { ?>
                                <li><a href="<?php echo stripslashes(get_option('strive_sitemap')); ?>" target="_blank" class="icon6" title="站点地图"></a></li><?php } else { } ?>
                            </ul>
                        </div>
                 </div>  
             </div>
             <div class="clear"></div>
         <?php }else{?>              
			<div class="row"></div>
		<?php }?>
				<div class="container">
					<div id="blogname" class="third">
                    	<a href="<?php bloginfo('url');?>/" title="<?php bloginfo('name');?>"><?php if ( is_home() || is_search() || is_category() || is_month() || is_author() || is_archive() ) { ?><h1><?php bloginfo('name');?></h1><?php } ?>
                        <img src="<?php echo stripslashes(get_option('strive_mylogo')); ?>" alt="<?php bloginfo('name');?>" /></a>
                    </div>
                 	<?php if (get_option('strive_logoadccode') == true) { ?>
                 	<div class="banner push-right">
                 	<?php echo stripslashes(get_option('strive_logoadccode')); ?>
					</div>
                	<?php } ?>
                </div>
				<div class="clear"></div>
		</div>
		<div class="mainmenus container">
			<div class="mainmenu">
				<div class="topnav">
					<?php if (get_option('strive_home') == 'Display') { ?>
                		<a href="<?php bloginfo('url');?>" title="首页" class="<?php if ( is_home() ){ ?>home <?php } else {echo 'home_none'; } ?>">首页</a>
    				<?php }?>
                    <div class="menu-button"><i class="menu-ico"></i></div>
                    	<?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'nav','container'=>'ul'));}?>
               <?php if (get_option('strive_menusearch') == 'Display') { ?>     
                <ul class="menu-right">
                    <li class="menu-search">
                    	<a href="#" id="menu-search" title="搜索"></a>
                    	<div class="menu-search-form ">
							<form action="<?php bloginfo('url');?>" method="get">
                            	<input name="s" type="text" id="search" value="" maxlength="150" placeholder="请输入搜索内容" x-webkit-speech style="width:135px">
                            	<input type="submit" value="搜索" class="button"/>
                            </form>
                        </div>
                    </li>
                </ul> 
                <?php }?>
                 <!-- menus END -->                    
            </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php if(is_mobile()){?><div class="adphone container"><div class="row"><?php echo stripslashes(get_option('strive_adphone')); ?></div></div><?php }?>
