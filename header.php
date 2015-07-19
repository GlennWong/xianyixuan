<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- basic style -->
	<link href="<?php echo get_template_directory_uri();?>/css/basic.min.css" rel="stylesheet">

	<!--extl style -->
	<link href="<?php echo get_template_directory_uri();?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<!--Basic css-->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri();?>/js/html5shiv.min.js">
	</script>
	<script src="<?php echo get_template_directory_uri();?>/js/respond.min.js">
	</script>
	<![endif]-->
	<?php wp_head(); ?>
	<script src="<?php echo get_template_directory_uri();?>/js/tooltip.js">
	</script>
	<script src="<?php echo get_template_directory_uri();?>/js/popover.js">
	</script>
</head>
<body <?php body_class(); ?>>
<div class="navbar">
	<div class="container">
		<div class="col-3">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x" style="color:#E71E1E;"></i>
				<a href="#" target="_blank"><i class="fa fa-weibo fa-stack-1x fa-inverse" ></i></a>
			</span>
			<span class="fa-stack fa-lg" id="weixin1" rel="popover" data-placement="bottom">
				<i class="fa fa-circle fa-stack-2x" style="color:#0FB150;"></i>
				<i class="fa fa-weixin fa-stack-1x fa-inverse"></i>
				<script>
					$(function (){ 
						$("#weixin1").popover({
							html: true,
							title: '扫码关注微信帐号',
							content: "<img src='<?php echo get_template_directory_uri();?>/image/qrcode.jpg'>"
						});
					});
				</script>
			</span>
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x" style="color:#EAC80F;"></i>
				<a href="#" target="_blank"><i class="fa fa-qq fa-stack-1x fa-inverse"></i></a>
			</span>
		</div>
		<div class="col-3 right text-right">
			<span>
				<a href="tel:15340058648">热线电话：15340058648</a>
			</span>
		</div>
	</div>
</div>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-4 logo">
				<a href="/"><img src="<?php echo get_template_directory_uri();?>/image/logo.png" /></a>
			</div>
			<div class="col-8">
				<?php
					/**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => 'primary',
						'menu' => '',
						'container' => 'div',
						'container_class' => 'nav',
						'container_id' => '',
						'menu_class' => 'navigation',
						'menu_id' => '',
						'echo' => true,
						'fallback_cb' => false,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => ''
					);
				
					wp_nav_menu( $args );?>
			</div>
		</div>
	</div>
</header>