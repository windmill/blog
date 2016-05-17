
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

				<div class="post">
						<h2><?php if (is_page() || is_single()) { the_title(); ?> <?php } else { ?> <a href="<?php the_permalink() ?>" rel="bookmark"
						title="Permanent Link to <?php the_title(); ?>"><?php
						the_title(); ?></a> <?php } ?></h2>

						<div class="post-info">
							<?php if(!is_page()) : ?>
                            <span class="setting user"><?php echo the_author() ? '' : 'Unknown'; ?></span>
							<span class="setting datetime"><?php the_time('F d, Y'); ?></span>
                        	<span class="setting filedlink"><?php the_category(', ') ?></span> 
                      		<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'setting commentslink'); ?>
                      		</span> 
                            <?php edit_post_link($link = 'Edit Post', $before = '<span class="setting editlink">', $after = '</span>'); ?>
                            <p><?php the_tags('Tags: ', ', ') ?></p>
							<?php endif; ?>
						</div>

					<div class="post-entry">
                    	<?php if(is_page() || is_single()) { ?>
						<?php the_content('Continue Reading &raquo;'); ?>
                        <?php } else { ?>
                        <?php the_excerpt_reloaded(100, '<h3>,<h4>,<a>,<img>,<p>,<ul>,<ol>,<li>', 'content', TRUE, 'Continue Reading', FALSE, 2); ?>
                        <?php } ?>
					</div>
                    <div class="post-meta">

						<?php if(is_single()) : ?>							
							<p>You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open
						?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open
						?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not
						?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open
						?>
							Both comments and pings are currently closed.

						<?php } ?>
						</p>
						<?php endif; ?>
					</div>
					
				</div>

		<?php endwhile; ?>

	<?php else : ?>

				<div class="post">
					<div class="post-entry">
						<h2>Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
					</div>
				</div>
		

	<?php endif; ?>
