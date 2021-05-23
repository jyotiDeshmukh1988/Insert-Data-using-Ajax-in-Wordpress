<?php get_header();?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-8">
                    <?php 
					if(have_posts()){
						while(have_posts()){
							the_post(); // increment loop
							//$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
							$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
					?>
                    <!-- Blog post-->
                    <div class="card my-4">
                        <img class="card-img-top" src="<?php echo $url; ?>" alt="Card image cap" />
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title();?></h2>
                            <p class="card-text"><?php the_content();?></p>
                            <a class="btn btn-primary" href="<?php the_permalink();?>">Read More →</a>
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
					<div id="product-new-arrivals">
					<h3>New Arrivals</h3>
					<?php 
					$new_arrival_limit = get_theme_mod("set_new_arrival_limit");
					$new_arrival_column = get_theme_mod("set_new_arrival_column");
					echo do_shortcode('[products limit="'.$new_arrival_limit.'" columns="'.$new_arrival_column.'" orderby="date" class="new-arrival-custom-class"]');?>
					</div>
					<div id="product-popularity">
					<h3>Popularity</h3>
					<?php 
					$new_popularity_limit = get_theme_mod("set_popularity_limit");
					$new_popularity_column = get_theme_mod("set_popularity_column");
					echo do_shortcode('[products limit="'.$new_popularity_limit.'" columns="'.$new_popularity_column.'" orderby="popularity" class="popularity-custom-class"]');?>
					</div>
                 </div>
                <!-- Side widgets-->
                <div class="col-md-4">
                    <!-- Search widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..." />
                                <span class="input-group-append"><button class="btn btn-secondary" type="button">Go!</button></span>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!</div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_footer();?>
