<?php get_header(); ?>

			<div id="content">
				<?php
					include(TEMPLATEPATH . "/wp-loop.php");
				?>
			</div>

			<div id="sidebar">
				<?php
					get_sidebar();
				?>
			</div>

<?php get_footer(); ?>

		