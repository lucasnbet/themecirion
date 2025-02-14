<?php
/*
 * Template Name: Generic Search Results
 * Author & Copyright: Cirion
 * URL: https://www.ciriontechnologies.com/
 */
get_header();
$count_all = cirion_search_results_count(remove_special_characters($_REQUEST['keyword']), "all");
$count_solutions = cirion_search_results_count(remove_special_characters($_REQUEST['keyword']), "94");
$count_products = cirion_search_results_count(remove_special_characters($_REQUEST['keyword']), "81");
$count_cases = cirion_search_results_count(remove_special_characters($_REQUEST['keyword']), "95");
if( $count_all <= 10 ) {
  $count_class = 'no-page';
} else {
  $count_class = '';
}
if( $count_solutions <= 10 ) {
  $solutions_count_class = 'no-page';
} else {
  $solutions_count_class = '';
}
if( $count_products <= 10 ) {
  $products_count_class = 'no-page';
} else {
  $products_count_class = '';
}
if( $count_cases <= 10 ) {
  $cases_count_class = 'no-page';
} else {
  $cases_count_class = '';
}

$search_page_heading_text = class_exists( 'ACF' ) ? get_field('search_page_heading_text', 'option') : '';
$search_page_heading_text = $search_page_heading_text ? $search_page_heading_text : esc_attr('Resultados de Búsqueda','cirion');

$search_page_tab_all_text = class_exists( 'ACF' ) ? get_field('search_page_tab_all_text', 'option') : '';
$search_page_tab_all_text = $search_page_tab_all_text ? $search_page_tab_all_text : esc_attr('TODOS','cirion');

$search_page_tab_solutions_text = class_exists( 'ACF' ) ? get_field('search_page_tab_solutions_text', 'option') : '';
$search_page_tab_solutions_text = $search_page_tab_solutions_text ? $search_page_tab_solutions_text : esc_attr('SOLUCIONES','cirion');

$search_page_tab_products_text = class_exists( 'ACF' ) ? get_field('search_page_tab_products_text', 'option') : '';
$search_page_tab_products_text = $search_page_tab_products_text ? $search_page_tab_products_text : esc_attr('PRODUCTOS','cirion');

$search_page_tab_use_cases_text = class_exists( 'ACF' ) ? get_field('search_page_tab_use_cases_text', 'option') : '';
$search_page_tab_use_cases_text = $search_page_tab_use_cases_text ? $search_page_tab_use_cases_text : esc_attr('CASOS DE USO','cirion');
?>

<section class="cron-generic-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo $search_page_heading_text; ?></h1>
        <div class="generic-search-form">
          <?php 
          global $blog_id;
          $current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
          $blogname = str_replace("Cirion ", "", $current_blog_details->blogname); 
          if($blogname == "USA") {
            $search_results_slug = "search-results/";
          } elseif($blogname == "Brazil" || $blogname == "Brasil") {
            $search_results_slug = "procurar-resultados/";
          } else {
            $search_results_slug = "resultados-de-la-busqueda/";
          }
          ?>
          <form action="<?php echo esc_url(home_url('/').$search_results_slug); ?>" class="genericsearch" id="genericsearch" method="post" autocomplete="off">
              <?php $ct_nonce_action = wp_nonce_field( 'ct_nonce_action', 'ct_nonce', true, false );
              echo $ct_nonce_action; ?>
              <input type="text" name="keyword" id="keyword_inner" value="<?php echo remove_special_characters($_REQUEST["keyword"]); ?>" />
              <input type="submit" class="cron-generic-btn" value="" />
          </form>
        </div>
        <?php if ( !empty($_REQUEST["keyword"]) ) { ?>
          <div class="search-key">
            <?php echo cirion_count_calc( remove_special_characters($_REQUEST["keyword"]), $count_all ); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- Cirion Generic Search Results -->
<section class="cron-generic-filter">
  <div class="container">
    <div class="row">
      <div class="generic-tab">
        <div class="generic-tab-wrap">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <h2 class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" role="tab" aria-controls="all" aria-selected="true"> <?php echo $search_page_tab_all_text; ?> (<span class="search-count"><?php echo $count_all; ?></span>)  </h2>
            </li>
            <li class="nav-item" role="presentation">
              <h2 class="nav-link" id="solutions-tab" data-bs-toggle="tab" data-bs-target="#solutions" role="tab" aria-controls="solutions" aria-selected="false"> <?php echo $search_page_tab_solutions_text; ?> (<span class="search-count"><?php echo $count_solutions; ?></span>) </h2>
            </li>
            <li class="nav-item" role="presentation">
              <h2 class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" role="tab" aria-controls="products" aria-selected="false"> <?php echo $search_page_tab_products_text; ?> (<span class="search-count"><?php echo $count_products; ?></span>) </h2>
            </li>
            <li class="nav-item" role="presentation">
              <h2 class="nav-link" id="cases-tab" data-bs-toggle="tab" data-bs-target="#cases" role="tab" aria-controls="cases" aria-selected="false"> <?php echo $search_page_tab_use_cases_text; ?> (<span class="search-count"><?php echo $count_cases; ?></span>) </h2>
            </li>                 
          </ul>
        </div>
        <div class="tab-content" id="CirionTabContent">
          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="search_page_loading">
              <div class="cron-ajax-loader" id="loading" style="display:none;"> 
                <i class="fa fa-spinner fa-pulse"></i>
              </div>
              <div class="search-results-all <?php echo $count_class; ?>"></div>
            </div>
          </div>
          <div class="tab-pane fade" id="solutions" role="tabpanel" aria-labelledby="solutions-tab">                   
            <div class="search_page_loading">
              <div class="cron-ajax-loader" id="loading-solutions" style="display:none;"> 
                <i class="fa fa-spinner fa-pulse"></i>
              </div>
              <div class="search-results-solutions <?php echo $solutions_count_class; ?>"></div>
            </div>
          </div>
          <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
            <div class="search_page_loading">
              <div class="cron-ajax-loader" id="loading-products" style="display:none;"> 
                <i class="fa fa-spinner fa-pulse"></i>
              </div>
              <div class="search-results-products <?php echo $products_count_class; ?>"></div>
            </div>
          </div>
          <div class="tab-pane fade" id="cases" role="tabpanel" aria-labelledby="cases-tab">                    
            <div class="search_page_loading">
              <div class="cron-ajax-loader" id="loading-usecases" style="display:none;"> 
                <i class="fa fa-spinner fa-pulse"></i>
              </div>
              <div class="search-results-usecases <?php echo $cases_count_class; ?>"></div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</section>

<?php
if( $count_all <= 10 ) {
  
  $property_types = array();
  $product_category = 'products';
  $posts = new \WP_Query(array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'post_parent' => '0',
    'tax_query' => array(
      array(
          'taxonomy' => 'page_category',
          'field' => 'slug',
          'terms' => $product_category,
      ),
    ),
    'posts_per_page'    => '100',
  ));
 
  foreach($posts->posts as $cbt_post){
    if($cbt_post->post_parent == '0'){
      $argid = $cbt_post->ID;
      $product_categories[] = $argid;
    }
  } 
  wp_reset_query();
  asort($product_categories);  ?>
  <!-- Product Tiles -->
  <section class="cron-products cron-products-search">
    <div class="container">
      <div class="col-md-12">
          <div class="cron-sec-title">
            <h2>Descubre nuestras categorías de productos y servicios</h2>
          </div>
      </div>
      <div class="products-group">
        <?php foreach($product_categories as $each_product_category) {
          $product_title = get_the_title($each_product_category);
          $product_title_link = get_permalink($each_product_category);
          $product_content = get_the_excerpt($each_product_category);
          $image = get_the_post_thumbnail_url($each_product_category);
          $image_id = get_post_thumbnail_id($each_product_category);
          $image_url = !empty($image) ? $image : '';
          $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          if( $image_url ) { ?>
            <a href="<?php echo esc_url($product_title_link); ?>" class="products-item eqheight">
              <div class="products-item-inner">
                <div class="cron-image"><img src="<?php echo esc_url($image_url); ?>" alt="<?php echo strip_tags($image_alt ? $image_alt : $product_title); ?>"></div>
                <h3><?php echo $product_title; ?></h3>
                <p><?php echo $product_content; ?></p>
              </div>
            </a>
        <?php }
        } ?>
      </div>
    </div>
    </section>

<?php }
?>

<div class="search-results-wrap">
  <?php the_content(); ?>
</div>
<?php
get_footer();
?>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

    // AJAX call for all posts
    function generic_search_all_posts(page) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajaxurl,
        data: {
          page: page,
          action: "load-all-posts-with-pagination",
          value: "<?php echo remove_special_characters(remove_special_characters($_REQUEST['keyword'])); ?>",
        },
        beforeSend : function () {
          $('#loading').fadeIn(800);
          $('.search-results-all').fadeOut(800);
          $('html, body').animate({scrollTop: $('header.cron-sticky').height()+$('.cron-generic-search').height()}, 100);
          $(".search_page_loading").css('min-height', '100px');
        },
        success: function (response) {
          $("#loading").fadeOut(600).css('min-height', '0');
          $('.search-results-all').fadeIn(600);
          $(".search-results-all").html(response);
          $(".search_page_loading").css('min-height', 'auto');
        },
        complete: function (response) {
          $('.search-results-all').css('min-height', $('.search-results-all').find(".search-pagination-content").height()+88);
        }
      });
    }

    // AJAX call for solutions posts
    function generic_search_solutions_posts(page) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajaxurl,
        data: {
          page: page,
          action: "load-solutions-posts-with-pagination",
          value: "<?php echo remove_special_characters($_REQUEST['keyword']); ?>",
        },
        beforeSend : function () {
          $('#loading-solutions').fadeIn(800);
          $('.search-results-solutions').fadeOut(800);
          $('html, body').animate({scrollTop: $('header.cron-sticky').height()+$('.cron-generic-search').height()}, 100);
        },
        success: function (response) {
          $("#loading-solutions").fadeOut(600).css('min-height', '0');
          $('.search-results-solutions').fadeIn(600);
          $(".search-results-solutions").html(response);
        },
        complete: function (response) {
          $('.search-results-solutions').css('min-height', $('.search-results-solutions').find(".search-pagination-content").height()+88);
        }
      });
    }

    // // AJAX call for products posts
    function generic_search_products_posts(page) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajaxurl,
        data: {
          page: page,
          action: "load-products-posts-with-pagination",
          value: "<?php echo remove_special_characters($_REQUEST['keyword']); ?>",
        },
        beforeSend : function () {
          $('#loading-products').fadeIn(800);
          $('.search-results-products').fadeOut(800);
          $('html, body').animate({scrollTop: $('header.cron-sticky').height()+$('.cron-generic-search').height()}, 100);
        },
        success: function (response) {
          $("#loading-products").fadeOut(600).css('min-height', '0');
          $('.search-results-products').fadeIn(600);
          $(".search-results-products").html(response);
        },
        complete: function (response) {
          $('.search-results-products').css('min-height', $('.search-results-products').find(".search-pagination-content").height()+88);
        }
      });
    }

    // // AJAX call for use cases posts
    function generic_search_usecases_posts(page) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: ajaxurl,
        data: {
          page: page,
          action: "load-usecases-posts-with-pagination",
          value: "<?php echo remove_special_characters($_REQUEST['keyword']); ?>",
        },
        beforeSend : function () {
          $('#loading-usecases').fadeIn(800);
          $('.search-results-usecases').fadeOut(800);
          $('html, body').animate({scrollTop: $('header.cron-sticky').height()+$('.cron-generic-search').height()}, 100);
        },
        success: function (response) {
          $("#loading-usecases").fadeOut(600).css('min-height', '0');
          $('.search-results-usecases').fadeIn(600);
          $(".search-results-usecases").html(response);
        },
        complete: function (response) {
          $('.search-results-usecases').css('min-height', $('.search-results-usecases').find(".search-pagination-content").height()+88);
        }
      });
    }
    
    // Load page 1 as the default

    <?php if( empty($_REQUEST['keyword']) ) { ?>
      // Load page 1 as the default
      generic_search_all_posts(1);
      generic_search_solutions_posts(1);
      generic_search_products_posts(1);
      generic_search_usecases_posts(1);
    <?php } else {
      $retrieved_nonce = $_REQUEST['ct_nonce'];
      if (wp_verify_nonce($retrieved_nonce, 'ct_nonce_action' ) || empty( $retrieved_nonce )) { ?>
        // Load page 1 as the default
        generic_search_all_posts(1);
        generic_search_solutions_posts(1);
        generic_search_products_posts(1);
        generic_search_usecases_posts(1);
      <?php } else { ?>
        $("#keyword").css("border-color", "red");
        $("#keyword_inner").css("border-color", "red");
      <?php }
    } ?>

    // Handle the clicks
    $("body").on("click", ".search-results-all .cron-search-pagination li.active", function(){
        var page = $(this).attr('p');
        generic_search_all_posts(page);
    });
    $("body").on("click", ".search-results-solutions .cron-search-pagination li.active", function(){
        var page = $(this).attr('p');
        generic_search_solutions_posts(page);
    });
    $("body").on("click", ".search-results-products .cron-search-pagination li.active", function(){
        var page = $(this).attr('p');
        generic_search_products_posts(page);
    });
    $("body").on("click", ".search-results-usecases .cron-search-pagination li.active", function(){
        var page = $(this).attr('p');
        generic_search_usecases_posts(page);
    });      
  });
</script>