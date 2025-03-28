<?php
/*
 * The header for Cirion theme.
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */
?>
<!DOCTYPE html>
<?php 
function get_flag_by_blogname($blogname) {
    $flags = [
        "English" => "en-US",
        "Argentina" => "es-AR",
        "Brazil" => "pt-BR",
        "Brasil" => "pt-BR",
        "Chile" => "es-CL",
        "Colombia" => "es-CO",
        "Ecuador" => "es-EC",
        "México" => "es-MX",
        "Mexico" => "es-MX",
        "Perú" => "es-PE",
        "Peru" => "es-PE",
        "Venezuela" => "es-VE",
    ];
    return $flags[$blogname] ?? "en-US";
}

// Obtener detalles del sitio activo
$active_site_id = get_current_blog_id();
$current_slug = ltrim($_SERVER['REQUEST_URI'], '/'); // Eliminar la barra inicial
$es_ar_slug = class_exists('ACF') && get_field('es_ar_slug') ? get_field('es_ar_slug') : $current_slug;
$pt_br_slug = class_exists('ACF') && get_field('pt_br_slug') ? get_field('pt_br_slug') : $current_slug;
$en_us_slug = class_exists('ACF') && get_field('en_us_slug') ? get_field('en_us_slug') : $current_slug;

// Generar etiquetas hreflang para cada sitio
if (is_multisite()) {
    $sites = get_sites();
    $site_list = [];

    foreach ($sites as $site) {
        $blogid = $site->blog_id;
        if ($blogid != 1) { // Omitir el sitio principal si es necesario
            $sitdetail = get_blog_details(['blog_id' => $blogid]);
            $blogname = str_replace("Cirion ", "", $sitdetail->blogname);
            $flag = get_flag_by_blogname($blogname);
            $site_list[] = [
                'url' => $sitdetail->siteurl,
                'flag' => $flag,
            ];
        }
    }

    foreach ($site_list as $site) {
        // Seleccionar slug según el idioma
        $slug = ($site['flag'] === 'en-US') ? $en_us_slug : (($site['flag'] === 'pt-BR') ? $pt_br_slug : $es_ar_slug);
        echo '<link rel="alternate" href="' . $site['url'] . '/' . $slug . '" hreflang="' . $site['flag'] . '">' . "\n";
    }

    // Self-referencing hreflang
    $current_flag = get_flag_by_blogname(get_blog_details(['blog_id' => $active_site_id])->blogname);
    echo '<link rel="alternate" href="' . get_site_url($active_site_id) . '/' . $current_slug . '" hreflang="' . $current_flag . '">' . "\n";

    // x-default (opcional)
    echo '<link rel="alternate" href="https://webdev.ciriontechnologies.com/en-us/' . $en_us_slug . '" hreflang="x-default">' . "\n";
}
?>
<html <?php echo 'lang="' . $current_flag . '"'; ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
<meta name="theme-color" content="#EF2AC1">
<meta name="msapplication-TileColor" content="#EF2AC1">
<meta name="msapplication-navbutton-color" content="#EF2AC1">
<meta name="apple-mobile-web-app-status-bar-style" content="#EF2AC1">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php wp_head(); ?>

<!-- Pass UTM Parameters to Links -->
<script type="text/javascript">
function PassParameters() {
    let currentParams = new URLSearchParams(window.location.search);

    // Si estamos en una página de resultados de búsqueda, mantenemos 's=' y eliminamos 'post_type'
    if (currentParams.has("s")) {
        currentParams.delete("post_type");
        let newURL = window.location.origin + window.location.pathname + "?" + currentParams.toString();
        window.history.replaceState({}, document.title, newURL);
    }
	}
	function PassParameters() {
		clearcurrentURL();
    // Modificar todos los enlaces de la página
		let allLinks = document.querySelectorAll("a[href]");

    for (let link of allLinks) {
        if (link.closest('nav[aria-label="Pagination"]')) a.onclick=clearcurrentURL;
	else try{
		console.log(link,link,href);
		   let linkURL = new URL(link.href, window.location.origin);

            // Evitar modificar enlaces externos
            if (linkURL.origin !== window.location.origin) continue;

            let linkParams = new URLSearchParams(linkURL.search);

            // Si el enlace no está en la página de búsqueda, eliminamos 's=' y 'post_type'
            if (!linkURL.search.includes("?s=")) {
                linkParams.delete("post_type");
                linkParams.delete("s");
            }

            // Reconstruir la URL correctamente sin añadir 's=' innecesariamente
            let newHref = linkURL.origin + linkURL.pathname + (linkParams.toString() ? "?" + linkParams.toString() : "") + linkURL.hash;
            link.href = newHref;

        } catch (error) {
            console.warn("Error al procesar enlace:", link.href, error);
        }
    }
}

window.addEventListener("DOMContentLoaded", PassParameters);
</script>

<!-- Cookie -->
<script type="text/javascript" defer charset="UTF-8" src="//cdn.cookie-script.com/s/fce7ac85c20553e34e0ad9f17a4af5d3.js"></script>
</head>
<body <?php body_class(); ?>>
<?php cirion_wp_body_open(); ?>
<main class="cron-main-wrap">
  <a class="skip-link screen-reader-text" href="#cron-content"><?php esc_html_e( 'Skip to content', 'cirion' ); ?></a>
  <div class="main-wrap-inner">
  <header class="cron-header cron-sticky<?php echo esc_attr($text_logo_class . $site_tagline_class); ?>">
    <?php get_template_part( 'template-parts/header/top', 'bar' );
    get_template_part( 'template-parts/header/menu', 'bar' ); ?>
  </header>
