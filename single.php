<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: Cirion
 * URL: https://www.ciriontechnologies.com/
 */
get_header();
?>
<div id="cron-content" class="cron-post-single cron-page-spacer">
	<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cron-unit-fix">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', 'single' );
							if ( comments_open() || get_comments_number() ) :
			          comments_template();
			        endif;
						endwhile;
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif; ?>
				</div><!-- unit-fix -->
			</div><!-- layout -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- mid -->
<?php
get_footer();
