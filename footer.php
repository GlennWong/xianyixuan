<footer class="footer">
	<div class="container">
		<div class="col-4">
			<?php if (!dynamic_sidebar('footer-left')) : ?>页脚左<?php endif;?>
		</div>
		<div class="col-4">
			<?php if (!dynamic_sidebar('footer-center')) : ?>页脚中<?php endif;?>
		</div>
		<div class="col-4">
			<?php if (!dynamic_sidebar('footer-right')) : ?>页脚右<?php endif;?>
		</div>
	</div>
</footer>
<div class="copyright">
	<div class="container">
		 <p>Babysitter Directory &copy; 2015. Privacy Policy </p>
	</div>
</div>
<script src="<?php echo get_template_directory_uri();?>/js/wow.min.js" type="text/javascript"></script>
<?php wp_footer(); ?>
</body>
</html>