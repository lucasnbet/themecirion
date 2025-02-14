<?php
/**
 * Single Post.
 */
global $post;
$cirion_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$cirion_large_image = $cirion_large_image ? $cirion_large_image[0] : '';

// Single Theme Option
if ($cirion_large_image) {
  $img_class = '';
} else {
  $img_class = ' no-img';
}

$cat_list = get_the_category();
$tag_list = get_the_tags();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('cron-blog-post'); ?>>
	<div class="cron-news-detail no-img">
		<div class="cron-news-detail-wrap">
	    <!-- Content -->
			<?php
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
			?>
			<!-- Content -->
		</div>
  </div>
</div><!-- #post-## -->
<?php if ( function_exists( 'cirion_related_post' ) ) { cirion_related_post(); }
