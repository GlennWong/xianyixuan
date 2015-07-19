<?php get_header();?>
<?php breadcrumb();?>
<div class="container post-list">
	<div class="row">
		<?php while(have_posts()):the_post();?>
			<div class="list-view">
				<?php if(has_post_thumbnail()){?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
						<?php the_post_thumbnail('large', array( 'class' => 'list-thumb' )); ?>
					</a>
				<?php }else{?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
						<img src="http://placehold.it/1170x350" class="list-thumb" alt="...">
					</a>
				<?php }?>
				<div class="col-1 list-icon">
					<span class="fa-stack fa-3x">
						<i class="fa fa-circle fa-stack-2x" style="color:#F5C63A"></i>
						<i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="col-11 list-info">
					<h2 class="list-title">
						<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a>
					</h2>
					<div class="list-meta">
						<?php the_date("Y.m.d");?> /<?php the_author();?>
					</div>
					<div class="list-excerpt">
						<?php the_excerpt();?>
					</div>
					<div class="list-more">
						<a href="<?php the_permalink();?>">了解更多</a>
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