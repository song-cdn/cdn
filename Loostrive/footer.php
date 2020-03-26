<div class="clear"></div>
<div id="footer">
  <?php if (get_option('strive_footnav') == 'Display') { ?>
  <div class="footnav container">
    <?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'footnav','menu_id'=>'footnav','container'=>'ul'));}?>
  </div>
  <?php } else {} ?>
  <?php if (get_option('strive_flinks') == 'Display') { ?>
  <?php wp_reset_query(); if ( is_home() ) { ?> 
  <div class="footnav container">
    <?php if(function_exists('wp_nav_menu')) {wp_nav_menu(array('theme_location'=>'friendlink','menu_id'=>'friendlink','container'=>'ul'));}?>
  </div>
  <?php } ?>
  <?php } else {} ?>
  <div class="copyright">
  <p> Copyright <?php echo comicpress_copyright();?> <a href="<?php bloginfo('url');?>/"><strong>
    <?php bloginfo('name');?>
    </strong>
    <?php if (get_option('strive_beian') == 'Display') { ?>
    <a href="http://www.miitbeian.gov.cn/" rel="external"><?php echo stripslashes(get_option('strive_beianhao')); ?></a>
    <?php { echo '.'; } ?>
    <?php } else {} ?>
    <?php if (get_option('strive_tj') == 'Display') { ?>
    <?php echo stripslashes(get_option('strive_tjcode')); ?>
    <?php { echo ' '; } ?>
    <?php } else {} ?>
  </p>
  </div>
</div>
</div>
<!--gototop-->
<div id="tbox">
  <?php if( is_single() || is_page()){?>
  <a id="home" href="<?php bloginfo('url');?>"></a>
  <?php } ?>
  <?php if( is_single() || is_page() && comments_open() ){ ?>
  <a id="pinglun" href="#comments_box"></a>
  <?php } ?>
  <a id="gotop" href="javascript:void(0)"></a> </div>
<?php wp_footer(); ?>

<?php if (get_option('strive_bdshare') == 'Display'&&is_home()) { ?>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php }?>
<?php if (get_option('strive_bdshare') == 'Display'&&is_single()) { ?>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php }?>
</body></html>