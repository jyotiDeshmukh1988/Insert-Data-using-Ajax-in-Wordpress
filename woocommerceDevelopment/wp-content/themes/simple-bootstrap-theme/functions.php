<?php
function simple_bootstrap_theme_load_scripts(){
	// attach theme css
	wp_enqueue_style("bootstrap",get_template_directory_uri()."/assets/vendor/bootstrap/css/bootstrap.min.css",array(),"1.0","all");
	wp_enqueue_style("blog-home",get_template_directory_uri()."/css/blog-home.css",array(),"1.0","all");
	// attach style.css
	wp_enqueue_style("style",get_stylesheet_uri(),array(),"1.0","all");
	// script.js
	wp_enqueue_script("script-js",get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.bundle.min.js",array("jquery"),"1.0",true);	
}
add_action("wp_enqueue_scripts","simple_bootstrap_theme_load_scripts");

/* register nav menus */
function simple_bootstrap_theme_nav_config(){
	register_nav_menus(array(
	// menu id/location => menu name
	"sbt_primary_menu"=>"SBT Primary Menu",
	"sbt_secondary_menu"=>"SBT Sidebar"
	));
	// register theme support
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce',array(
	'thumbnail_image_width'=>150,
	'single_image_width'=>300,
	'product_grid'          => array(
        'default_columns' => 10,
        'min_columns'     => 2,
        'max_columns'     => 3,
        ),
	));
	
	// product thumnail effect support
	add_theme_support("wc-product-gallery-zoom");
	add_theme_support("wc-product-lightbox");
	add_theme_support("wc-product-gallery-slider");
	// widget
	add_theme_support( 'widgets' );
	// title tag
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-logo',[
		"height" => 90,
		"width" => 90,
		"flex_height" => true,
		"flex_width" => true
	]);
}
add_action("after_setup_theme","simple_bootstrap_theme_nav_config");

// adding li class from here
function simple_bootstrap_theme_add_li_class($classes,$item,$args){
	$classes[] = "nav-item sbt-theme";
	return $classes;
}
add_filter("nav_menu_css_class","simple_bootstrap_theme_add_li_class",1,3);

// adding class to anchor links from here
function simple_bootstrap_theme_add_anchor_links($classes,$item,$args){
	$classes['class'] = "nav-link";
	return $classes;
}
add_filter("nav_menu_link_attributes","simple_bootstrap_theme_add_anchor_links",1,3);

if(class_exists("Woocommerce")){
include_once 'include/wc-modifications.php';
}
 /**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'simple_bootstrap_theme_add_to_cart_fragment' );

function simple_bootstrap_theme_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="items-count"><?php echo wc()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}

/* create the customizer section */
function simple_bootstrap_theme_load_wp_customizer($wp_customize){
	// customizer code
	
	// adding section
	$wp_customize->add_section("sec_copyright",array(
	"title" => "Copyright Section",
	"description" => "Copyright Description"
	));
	
	// adding settings/field
	$wp_customize->add_setting("set_copyright",array(
	 "type" => "theme_mod",
	 "default" => "",
	 "sanitize_callback" => "sanitize_text_field"
	));
	
	// add control first parameter will setting id
	$wp_customize->add_control("set_copyright",array(
		"Label" => "Copyright",
		"description" => "Please fill the copyright text",
		"section" => "sec_copyright", // section id
		"type" => "text"
	));
	
	/* section of new arrival / popularity control panel and columns */
	
	// adding section
	$wp_customize->add_section("sec_product_panels",array(
	"title" => "Product Panel Limit & Columns",
	"description" => "This is a section which is going to provide the controls for home page product panels"
	));
	
	// new arrival section
	// adding settings/field
	$wp_customize->add_setting("set_new_arrival_limit",array(
	 "type" => "theme_mod",
	 "default" => "",
	 "sanitize_callback" => "absint"
	));
	
	// add control first parameter will setting id
	$wp_customize->add_control("set_new_arrival_limit",array(
		"Label" => "New Arrival - Product Limit",
		"description" => "Please provide the limit of the new arrival",
		"section" => "sec_product_panels", // section id
		"type" => "number"
	));
	
	// adding settings/field
	$wp_customize->add_setting("set_new_arrival_column",array(
	 "type" => "theme_mod",
	 "default" => "",
	 "sanitize_callback" => "absint"
	));
	
	// add control first parameter will setting id
	$wp_customize->add_control("set_new_arrival_column",array(
		"Label" => "New Arrival - Column Limit",
		"description" => "Please provide the Columns of the new arrival",
		"section" => "sec_product_panels", // section id
		"type" => "number"
	));
	
	// popularity section
	// adding settings/field
	$wp_customize->add_setting("set_popularity_limit",array(
	 "type" => "theme_mod",
	 "default" => "",
	 "sanitize_callback" => "absint"
	));
	
	// add control first parameter will setting id
	$wp_customize->add_control("set_popularity_limit",array(
		"Label" => "Popularity - Limit",
		"description" => "Please provide the limit of the popularity",
		"section" => "sec_product_panels", // section id
		"type" => "number"
	));
	
	// adding settings/field
	$wp_customize->add_setting("set_popularity_column",array(
	 "type" => "theme_mod",
	 "default" => "",
	 "sanitize_callback" => "absint"
	));
	
	// add control first parameter will setting id
	$wp_customize->add_control("set_popularity_column",array(
		"Label" => "Popularity - Column",
		"description" => "Please provide the column of the popularity",
		"section" => "sec_product_panels", // section id
		"type" => "number"
	));
}
add_action('customize_register','simple_bootstrap_theme_load_wp_customizer');

// register sidebar
function simple_bootstrap_theme_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'simple_bootstrap_theme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'simple_bootstrap_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'simple_bootstrap_theme' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'simple_bootstrap_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'simple_bootstrap_theme_widgets_init' );