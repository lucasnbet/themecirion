<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */
$current_siteID = get_current_blog_id();
if ($current_siteID == 2) {
  $title = esc_html__( 'Ooops!!! Something went Wrong', 'cirion' );
  $content = esc_html__( 'The page you are looking for is removed or might never exist.', 'cirion' );
  $button = esc_html__( 'BACK TO HOME', 'cirion' );
} elseif ($current_siteID == 4) {
  $title = esc_html__( 'Ops!!! Algo deu errado', 'cirion' );
  $content = esc_html__( 'A página que você está procurando foi removida ou pode nunca existir.', 'cirion' );
  $button = esc_html__( 'VOLTAR PARA CASA', 'cirion' );
} else {
  $title = esc_html__( 'Ups!!! Algo salió mal', 'cirion' );
  $content = esc_html__( 'La página que está buscando se eliminó o es posible que nunca exista.', 'cirion' );
  $button = esc_html__( 'DE VUELTA A CASA', 'cirion' );
}

get_header();
?>
<div class="cron-error">
  <div class="container">
    <h1 class="error-title"><?php echo esc_html__( '404', 'cirion' ); ?></h1>
    <h2 class="error-subtitle"><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <div class="cron-btn-wrap"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="cron-btn"><?php echo $button; ?></a></div>
  </div>
</div>
<?php
get_footer();
