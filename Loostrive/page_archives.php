<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>

<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if (get_option('strive_breadcrumb') == 'Display') { ?>
                <div class="subsidiary box">
                    <div class="bulletin fourfifth">
                        <span class="sixth">当前位置：</span><?php loo_breadcrumbs(); ?>
                     </div>
                </div>
            <?php } else{if(!is_mobile()){ echo '<div class="row"></div>';}} ?>
	<?php get_sidebar(); ?>
    <div class="mainleft">
		<div class="article_container row  box">
			<h1 class="page_title"><?php the_title(); ?></h1>
			<?php loo_archives_list(); ?>
		</div>
	<?php endwhile;endif; ?>
	</div>
</div>

<?php get_footer(); ?>