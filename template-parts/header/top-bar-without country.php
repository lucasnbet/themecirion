<?php
$placeholder_text = class_exists( 'ACF' ) ? get_field('search_placeholder_text', 'option') : '';
$placeholder_text = $placeholder_text ? $placeholder_text : esc_attr('Buscar em Cirion','cirion');
?>
<div class="cron-topbar">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-6 col-6">
        <?php get_template_part( 'template-parts/header/logo' ); ?>
      </div>
      <div class="col-lg-9 col-md-6 col-6">
        <div class="cron-mobile-trigger"><span></span></div>
        <div class="cron-topbar-navigation">
          <span class="cron-menu-title">Menu</span>
          <div class="cron-mobile-close"><span></span></div>
          <div class="cron-search-box">
            <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform cron-form" >
              <p>
                <input type="text" name="s" id="s" placeholder="<?php echo $placeholder_text; ?>">
                <input type="submit" id="searchsubmit" class="cron-search-btn" value="">
              </p>
            </form>
          </div>
          <?php if ( has_nav_menu( 'topbar' ) ) { ?>
            <div class="cron-topbar-nav-wrap">
              <nav class="cron-navigation">
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location'    => 'topbar',
                      'container'         => '',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker()
                    )
                  );
                ?>
              </nav>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>