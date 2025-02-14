<?php
/**
 * Template part for displaying a message that posts cannot be found.
**/

?>
<div class="col-md-12">
	<div class="not-found">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'cirion' ); ?></h1>
		<?php
		if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cirion' ); ?></p>
			<div class="widget_search">
				<!-- <?php get_search_form(); ?> -->
			</div><?php
		else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cirion' ); ?></p>
			<div class="widget_search">
				<?php get_search_form(); ?>
			</div><?php
		endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
<?php
