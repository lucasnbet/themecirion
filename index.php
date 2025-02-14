<?php
/*
 * The main template file.
 * Author & Copyright: Cirion
 * URL: https://www.ciriontechnologies.com/
 */
get_header();
?>
<div id="cron-content" class="cron-post-listing cron-page-spacer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cron-post-wrap">
          <?php
          if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/post/content' );
            endwhile;
          else :
            get_template_part( 'template-parts/post/content', 'none' );
          endif;
          ?>
        </div>	
				<div class="cron-pagenavi">
					<?php
					the_posts_pagination(
						array(
							'prev_text' => '<i class="fa fa-arrow-left"></i>'.esc_html__( ' Prev', 'cirion' ),
							'next_text' => esc_html__( 'Next ', 'cirion' ).'<i class="fa fa-arrow-right"></i>',
						)
					); ?>
				</div>
		    <?php wp_reset_postdata();  // avoid errors further down the page ?>
			</div>
		</div><!-- row -->
	</div>
</div>
