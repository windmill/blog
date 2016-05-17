<?php get_header(); ?>

			<div id="content">
				<div class="post-arch-info">
					<?php /* If this is a category archive */ if (is_category()) { ?>
						<p>* You are viewing the archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</p>
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<p>* You are viewing Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</p>
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<p>* You are viewing the archive for <?php the_time('F jS, Y'); ?></p>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<p>* You are viewing the archive for <?php the_time('F, Y'); ?></p>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<p>* You are viewing the archive for <?php the_time('Y'); ?></p>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<p>* You are viewing the author archive</p>
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<p>* You are viewing the Blog Archives</p>
					<?php } ?>
	  			</div>

				<?php
					include(TEMPLATEPATH . "/wp-loop.php");
				?>

			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
            
			</div>

			<div id="sidebar">
				<?php
					get_sidebar();
				?>
			</div>

<?php get_footer(); ?>
