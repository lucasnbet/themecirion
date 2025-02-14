<?php
$cirion_custom_logo_id = get_theme_mod( 'custom_logo' );
$cirion_logo = wp_get_attachment_image_url( $cirion_custom_logo_id , 'full' );
if ( has_custom_logo() ) {
	$cirion_logo_class = ' has-logo';
} else {
	$cirion_logo_class = ' no-logo';
}
?>
<div class="cron-brand<?php echo esc_attr($cirion_logo_class); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
		if ( has_custom_logo() ) {
      echo '<img src="' . esc_url( $cirion_logo ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
		} elseif (display_header_text() == true){
			if (get_bloginfo( 'name' )){
	      echo '<h1 class="cron-text-logo">'. esc_html( get_bloginfo( 'name' ) ) .'</h1>';
	    }
	    if (get_bloginfo( 'description' )){
      	echo '<h2 class="cron-site-tagline">'.esc_html( get_bloginfo('description') ) .'</h2>';
      }
		}
	?>
	</a>
</div>
