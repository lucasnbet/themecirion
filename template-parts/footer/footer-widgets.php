<?php
if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
?>
  <!-- Footer Widgets -->
  <div class="logo_footer">
    <div class="cron-custom-col col-one">
      <?php if (is_active_sidebar('footer-1')) {
        dynamic_sidebar('footer-1');
      } ?>
    </div>
  </div>
  <div class="footer_2025">
    <div class="cron-custom-col col-two">
      <?php if (is_active_sidebar('footer-1')) {
        dynamic_sidebar('footer-2');
      } ?>
    </div>
    <div class="cron-custom-col col-three">
      <?php if (is_active_sidebar('footer-1')) {
        dynamic_sidebar('footer-3');
      } ?>
    </div>
    <div class="cron-custom-col col-four">
      <?php if (is_active_sidebar('footer-1')) {
        dynamic_sidebar('footer-4');
      } ?>
    </div>
    <div class="cron-custom-col col-five">
      <?php if (is_active_sidebar('footer-1')) {
        dynamic_sidebar('footer-5');
      } ?>
    </div>
  </div>
  <!-- Footer Widgets -->
<?php } ?>