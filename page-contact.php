<?php
/**
 * Template Name: Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>
<style>
#frmContactus table td{
	border:0px;
}
.cover-header .entry-header *{
	color:#fff;
}
#frmContactUs .false{color:red;}    
#frmContactUs .true{color:green;} 
</style>
<div class="wrap">
<?php "This is my test" ;?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<form id="frmContactUs">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" required/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" required/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" id="submit" name="submit"/></td>
        </tr>
    </table>
    <div id="result_msg"></div>
</form>
</div><!-- .wrap -->

<?php
get_footer();
?>
<script>
jQuery('#frmContactUs').submit(function(){
	event.preventDefault();
	var link = "<?php echo admin_url('admin-ajax.php')?>";
	var form = jQuery('#frmContactUs').serialize();
	var formData = new FormData;
	formData.append('action','contact');
	formData.append('contact_us',form);
	jQuery.ajax({
		url:link,
		data:formData,
		processData:false,
		contentType:false,
		type:'post',
		success:function(result){
			if(result.success==true){
                jQuery('#frmContactUs')[0].reset();
            }
			//alert(result.data);
			jQuery('#result_msg').html('<span class="'+result.success+'">'+result.data+'</span>') 
		}
	})
});
</script>
