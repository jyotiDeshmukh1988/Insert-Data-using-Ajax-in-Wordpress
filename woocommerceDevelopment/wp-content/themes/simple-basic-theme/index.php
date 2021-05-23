<?php get_header();?>
<div id="content-area">
<section class="site-slider">Slider</section>
<section class="new-arrivals">New Arrival</section>
<section class="latest-products">Latest Products</section>
<section class="vender-list">Vendor List</section>
<?php 
wp_nav_menu(array(
"theme_location"=>"theme_sidebar_menu"
));
?>
</div>
<?php get_footer();?>