<?php get_header();?>
<?php breadcrumb();?>
<div class="container post-list">
	<div class="row">
		<?php while(have_posts()):the_post();?>
		<div class="col-3">
			<div class="grid-view">
				<?php if(has_post_thumbnail()){?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
						<?php the_post_thumbnail('md-square', array( 'class' => 'grid-thumb' )); ?>
					</a>
				<?php }else{?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
						<img src="http://placehold.it/270x270" class="grid-thumb" alt="...">
					</a>
				<?php }?>
				<div class="grid-info">
					<h2 class="grid-title">
						<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
					</h2>
					<div class="grid-excerpt">
						<?php the_excerpt();?>
					</div>
					<div class="grid-more">
						<a href="<?php the_permalink();?>">了解更多</a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>

	</div>
	<!--Paginations-->
	<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav>
		<ul class="pager">
			<li><?php previous_posts_link('<i class="fa fa-angle-left fa-2x"></i>'); ?></li>
			<li><?php next_posts_link('<i class="fa fa-angle-right fa-2x"></i>'); ?></li>
		</ul>
	</nav>
	<?php endif; ?>
	<!-- end of .navigation -->
</div>
<?php get_footer(); ?>