<?php
/**
 * Template part for displaying posts.
 */
global $post;

$cirion_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$cirion_large_image = $cirion_large_image ? $cirion_large_image[0] : '';

if (is_sticky()) {
  $cirion_sticky_class = ' sticky';
} else {
  $cirion_sticky_class = '';
}
if ($cirion_large_image) {
  $cirion_img_class = '';
  $col1_class = 'col-lg-3 col-md-4';
  $col2_class = 'col-lg-9 col-md-8';
} else {
  $cirion_img_class = ' no-img';
  $col1_class = '';
  $col2_class = 'col-md-12';
}

?>

<div class="col-md-12">
	<div class="cron-news-item<?php echo esc_attr($cirion_sticky_class.$cirion_img_class); ?>">
		<div id="post-<?php the_ID(); ?>" class="row align-items-center">
			<?php if ($cirion_large_image) { ?>
				<div class="<?php echo esc_attr($col1_class); ?>">
				  <div class="cron-image">
				    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
				  </div>
			  </div>
			<?php } ?>
			<div class="<?php echo esc_attr($col2_class); ?>">
			  <div class="cron-news-info">
					<div class="cron-news-meta">
						<span><?php echo esc_html(get_the_date('d/m/Y')); ?></span>
			  	</div>
					<?php echo '<h3><a href="'.esc_url( get_permalink() ).'">'.esc_html(get_the_title()).'</a></h3>'; ?>
			    <?php
					$exceprt = get_the_excerpt();
					echo '<p>';
					echo $exceprt;
					echo '</p>';
					?>
			    <div class="cron-link-wrap">
			      <a href="<?php echo esc_url( get_permalink() ); ?>" class="cron-link"><?php esc_html_e( 'VER MÁS', 'cirion' ); ?></a>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php
