			<!-- Begin Sidebar -->
			<div>
				<ul>
                <?php /* Menu for subpages of current page */
                        global $notfound;
                        if (is_page() and ($notfound != '1')) {
                            $current_page = $post->ID;
                            while($current_page) {
                                $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
                                $current_page = $page_query->post_parent;
                            }
                            $parent_id = $page_query->ID;
                            $parent_title = $page_query->post_title;
                    
                            if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_type != 'attachment'")) {
                        ?>

                    <?php } } ?>
                    
				<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
                    
                    <li class="widget">
                       <h2>Recent Posts</h2>
                    	<ul id="recent-posts">
						<?php query_posts('showposts=5'); ?>
						<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
							<li><span><a href="<?php the_permalink() ?>" title="Continue reading <?php the_title(); ?>"><?php the_title() ?></a></span></li>
					<?php endif; endwhile; ?>
						</ul>
                    </li>
					<li class="widget"><h2>Categories</h2>
						<ul id="categories">
							<?php wp_list_categories('title_li=&show_count=0&hierarchical=0'); ?>
						</ul>
					</li>
                 	<li class="widget"><h2>Archives</h2>
                    	<ul class="list-archives">
        				<?php wp_get_archives('type=monthly'); ?>
      					</ul>
                    </li>
                    <li class="widget"><h2>Blogroll</h2>
                    	<ul class="linkcat">
        			<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      					</ul>
                    </li>
                  <?php endif; ?>
				</ul>
			</div><!-- End Sidebar -->