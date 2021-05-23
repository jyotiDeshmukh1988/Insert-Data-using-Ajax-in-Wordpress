<!-- Footer-->
<div class="container">
<div class="row">
<div class="col-md-6">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer 1', 'simple_bootstrap_theme' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			?>
				<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
				<?php
		}
		?>
	</aside><!-- .widget-area -->
<?php endif;?>
</div>
<div class="col-md-6">
<?php
if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer 2', 'simple_bootstrap_theme' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div>
				<?php
		}
		?>
	</aside><!-- .widget-area -->
<?php endif; ?>
</div>
</div>
</div>
	<footer class="py-5 bg-dark"> <!-- pass setting id in the theme mod function -->
            <div class="container"><p class="m-0 text-center text-white"><?php echo get_theme_mod("set_copyright","Set your coyright content");?></p></div>
        </footer>
		<?php wp_footer();?>
    </body>
</html>