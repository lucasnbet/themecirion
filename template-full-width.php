<?php
/*
 * Template Name: Full Width
 * Author & Copyright: Cirion
 * URL: https://www.ciriontechnologies.com/
 */

get_header();
?>
<div id="cron-content" class="cron-container-fluid">
	<?php
	while ( have_posts() ) : the_post();
		the_content();
		wp_link_pages(
			array(
				'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'cirion' ),
		  'after'            => '</div>',
		  'link_before'      => '<span>',
		  'link_after'       => '</span>',
		  'next_or_number'   => 'number',
		  'separator'        => ' ',
		  'pagelink'         => '%',
		  'echo'             => 1
			)
		);
		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;
	endwhile;
	?>	
</div>
<?php
get_footer();