<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php bloginfo('title');?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <?php wp_head();?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo home_url();?>">
				<?php 
				if(has_custom_logo()){
					the_custom_logo();
				} 
				else 
				{ 
					echo bloginfo('title');
				}?>
				</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
				<?php 
				wp_nav_menu(array(
				"theme_location"=>"sbt_primary_menu",
				"container"=>false,
				"items_wrap"=>'<ul class="navbar-nav ml-auto">%3$s</ul>'
				));
				?>
				<?php if(class_exists('WooCommerce')):?>
				<?php if(is_user_logged_in()):?>
				<a class="btn btn-primary" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php _e('My Account',''); ?></a>&nbsp;&nbsp;
				<a class="btn btn-danger" href="<?php echo wp_logout_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php _e('Logout',''); ?>"><?php _e('Logout',''); ?></a>&nbsp;&nbsp;
				<?php else : ?>
				<a class="btn btn-primary" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php _e('Login/Register',''); ?></a>&nbsp;&nbsp;
				<?php endif; ?>
				<a class="btn btn-primary" href="<?php echo wc_get_cart_url() ?>">Cart (<span class="items-count"><?php echo wc()->cart->get_cart_contents_count();?></span>)</a>
				<?php endif; ?>
				</div>
            </div>
        </nav>