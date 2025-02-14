<?php
$copyright_text = class_exists( 'ACF' ) ? get_field('copyright_text', 'option') : '';
if ($copyright_text) {
?>
<div class="row">
  <div class="col-lg-12">
    <div class="cron-copyright">
		<?php if (is_active_sidebar('country')) { dynamic_sidebar( 'country' ); } ?>
		<?php if (is_active_sidebar('copyright')) { dynamic_sidebar( 'copyright' ); } ?>
		<p><?php echo $copyright_text; ?></p>
    </div>
  </div>
</div>
<?php
}
