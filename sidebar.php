<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */
?>
<div class="cron-secondary">
	<?php if (is_active_sidebar('sidebar-1')) {
		dynamic_sidebar( 'sidebar-1' );
	} ?>
</div><!-- #secondary -->
<?php
