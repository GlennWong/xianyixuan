<?php get_header(); ?>
<?php if(have_posts()):the_post();?>
	<?php breadcrumb();?>
	<div class="container the-post">
		<div class="row">
			<div class="post-content col-8">
				<?php the_post_thumbnail('medium', array( 'class' => 'post-img' ));?>
				<h2 class="post-title">
					<?php the_title();?>
				</h2>
				<div class="post-meta">
					<?php the_date("Y.m.d");?> /<?php the_author();?>
				</div>
				<?php the_content();?>
			</div>
			<?php if (in_category(1)) { ?>
			<div class="post-aside col-4">
				<div class="post-suggest">
					<h2>感兴趣的课程</h2>
					<?php suggest_posts();?>
				</div>
			</div>
			<?php }else{ ?>
			<div class="post-aside col-4">
				<div class="post-related">
					<h2>相关文章</h2>
					<?php related_posts();?>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
<?php endif;?>
<?php get_footer(); ?>