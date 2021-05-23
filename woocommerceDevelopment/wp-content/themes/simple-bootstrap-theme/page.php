<?php get_header();?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-12">
                    <?php 
					if(have_posts()){
						while(have_posts()){
							$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
							the_post();
					?>
                    <!-- Blog post-->
                    <div class="card my-4">
                        <?php if(has_post_thumbnail()){?>
						<img class="card-img-top" src="<?php echo $url; ?>" alt="Card image cap" />
						<?php } ?>
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title();?></h2>
                            <p class="card-text"><?php the_content();?></p>
                            <!--<a class="btn btn-primary" href="<?php the_permalink();?>">Read More →</a>-->
                        </div>
                        <div class="card-footer text-muted">
                            Posted on January 1, 2021 by
                            <a href="#!">Start Bootstrap</a>
                        </div>
                    </div>
					<?php 
						}
					}
					?>
                 </div>
            </div>
        </div>
        <?php get_footer();?>
