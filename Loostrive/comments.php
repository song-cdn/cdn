<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if (post_password_required( $post )) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">必须输入密码，才能查看评论！</p>
			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = '';
?>
<!-- You can start editing here. -->
<?php if ('open' == $post->comment_status || !the_comment()){ ?><div class="row box">
<?php if ($comments) : ?>
	<h3 id="comments">网友评论<span class="red"><?php comments_number('0', '1', '%' );?></span>条</h3>
	<div class="navigation push-right">
		<div class="pagination">
        <?php paginate_comments_links(); ?></div>
	</div>
	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=weisay_comment&end-callback=weisay_end_comment&max_depth=23'); ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h3 id="comments"><?php the_title(); ?>：等您坐沙发呢！</h3>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">报歉!评论已关闭.</p>-->
	<?php endif; ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<div id="respond_box">
	<div id="respond">
		<h3>发表评论</h3>	
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <p><?php print '当前登录：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a></p>
	<?php elseif ( '' != $comment_author ): ?>
	<p><?php printf(__('欢迎回来 <strong>%s</strong>'), $comment_author); ?>
			<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></p>
			<script type="text/javascript" charset="utf-8">
				//<![CDATA[
				var changeMsg = "[ 更改 ]";
				var closeMsg = "[ 隐藏 ]";
				function toggleCommentAuthorInfo() {
					jQuery('#comment-author-info').slideToggle('slow', function(){
						if ( jQuery('#comment-author-info').css('display') == 'none' ) {
						jQuery('#toggle-comment-author-info').text(changeMsg);
						} else {
						jQuery('#toggle-comment-author-info').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('#comment-author-info').hide();
				});
				//]]>
			</script>
	<?php endif; ?>
	<?php if ( ! $user_ID ): ?>
	<div id="comment-author-info">
		<div id="real-avatar">
				<?php if(isset($_COOKIE['comment_author_email_'.COOKIEHASH])) : ?>
				<?php echo get_avatar($comment_author_email, 40);?>
				<?php else :?>
				<?php global $user_email;?><?php echo get_avatar($user_email, 40); ?>
				<?php endif;?>
			</div>	
        <ul class="comment_input">    
            <label for="author"><span class="input-prepend">昵称</span></label>
            <input type="text" name="author" id="author" class="" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
            <label for="email"><span class="input-prepend">邮箱</span></label>
            <input type="email" name="email" id="email" class="" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
            <label for="url"><span class="input-prepend">网址</span></label>
            <input type="text" name="url" id="url" class="" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
        </ul>
	</div>
      <?php endif; ?>
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
      <div class="clear"></div>
      <div class="comt-box">
		<textarea name="comment" id="comment" class="comt-area" tabindex="4" cols="50" rows="5" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
        <div class="comt-ctrl">
			<a class="comt-addsmilies" href="javascript:;">表情</a>
			<div class="comt-smilies"><?php wp_smilies() ?></div>
            <span class="comt-num">还能输入<em>210</em>个字</span>
			<input class="comt-submit" name="submit" type="submit" id="submit" tabindex="5" value="发布评论" />
			<?php comment_id_fields(); ?>
         </div>
       </div>
		<script type="text/javascript">	//Crel+Enter
		//<![CDATA[
			jQuery(document).keypress(function(e){
				if(e.ctrlKey && e.which == 13 || e.which == 10) { 
					jQuery(".submit").click();
					document.body.focus();
				} else if (e.shiftKey && e.which==13 || e.which == 10) {
					jQuery(".submit").click();
				}          
			})
		// ]]>
		</script>
		<?php do_action('comment_form', $post->ID); ?>
    </form>
	<div class="clear"></div>
    <?php endif; // If registration required and not logged in ?>
  </div>
  </div>
  <?php endif; // if you delete this the sky will fall on your head ?>
</div><?php } else {} ?>
  
  <script type="text/javascript">
  function ajacpload(){
$('#comment_pager a').click(function(){
    var wpurl=$(this).attr("href").split(/(\?|&)action=AjaxCommentsPage.*$/)[0];
    var commentPage = 1;
    if (/comment-page-/i.test(wpurl)) {
    commentPage = wpurl.split(/comment-page-/i)[1].split(/(\/|#|&).*$/)[0];
    } else if (/cpage=/i.test(wpurl)) {
    commentPage = wpurl.split(/cpage=/)[1].split(/(\/|#|&).*$/)[0];
    };
    //alert(commentPage);//获取页数
    var postId =$('#cp_post_id').text();
	//alert(postId);//获取postid
    var url = wpurl.split(/#.*$/)[0];
    url += /\?/i.test(wpurl) ? '&' : '?';
    url += 'action=AjaxCommentsPage&post=' + postId + '&page=' + commentPage;        
    //alert(url);//看看传入参数是否正确
    $.ajax({
    url:url,
    type: 'GET',
    beforeSend: function() {
    document.body.style.cursor = 'wait';
    var C=0.7;//修改下面的选择器，评论列表div的id，分页部分的id
    $('#thecomments,#comment_pager').css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});
    var loading='Loading';
    $('#comment_pager').html(loading);
    },
    error: function(request) {
        alert(request.responseText);
    },
    success:function(data){
    var responses=data.split('');
    $('#thecomments').html(responses[0]);
    $('#comment_pager').html(responses[1]);
    var C=1; //修改下面的选择器，评论列表div的id，分页部分的id
    $('#thecomments,#comment_pager').css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});
    $('#cmploading').remove();
    document.body.style.cursor = 'auto';
    ajacpload();//自身重载一次
	//single_js();//需要重载的js，注意
	$body.animate( { scrollTop: $('#comment_header').offset().top - 200}, 1000);
        }//返回评论列表顶部
    });    
    return false;
    });
}
  </script>