<?php
/*
 * Redux Framework Configurations
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */

/* Register menu */
register_nav_menus( array(
	'primary' => esc_html__( 'Main Navigation', 'cirion' )
) );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );

/* Feeds */
add_theme_support( 'automatic-feed-links' );

/* Add support for Title Tag. */
add_theme_support( 'title-tag' );

/* WooCommerce */
add_theme_support( 'woocommerce' );

/* Post formats */
// add_theme_support( 'post-formats', array( 'gallery', 'audio', 'video', 'quote' ) );

/* Added for backwards compatibility to support pre 5.2.0 WordPress versions */
if ( ! function_exists( 'cirion_wp_body_open' ) ) :
  function cirion_wp_body_open() {
    do_action( 'wp_boby_open' );
  }
endif;

/* Custom Header */
$cirion_header_args = array(
  'flex-width'    => true,
  'flex-height'   => true,
  'header-text'   => true,
);
add_theme_support( 'custom-header', $cirion_header_args );

/* Custom Logo */
add_theme_support( 'custom-logo' );

/* Custom Background */
add_theme_support( 'custom-background' );

/* HTML5 */
add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

/* Extend wp_title */
if ( ! function_exists( 'cirion_theme_wp_title' ) ) {
	function cirion_theme_wp_title( $title, $sep ) {
	 global $paged, $page;

	 if ( is_feed() )
	  return $title;

	 // Add the site name.
	 $site_name = get_bloginfo( 'name' );

	 // Add the site description for the home/front page.
	 $site_description = get_bloginfo( 'description', 'display' );
	 if ( $site_description && ( is_front_page() ) )
	  $title = "$site_name $sep $site_description";

	 // Add a page number if necessary.
	 if ( $paged >= 2 || $page >= 2 )
    /* translators: %s: Page */
	  $title = "$site_name $sep" . sprintf( esc_html__( ' Page %s', 'cirion' ), max( $paged, $page ) );

	 return $title;
	}
	add_filter( 'wp_title', 'cirion_theme_wp_title', 10, 2 );
}

/* Languages */
if ( ! function_exists( 'cirion_theme_language_setup' ) ) {
	function cirion_theme_language_setup(){
	  load_theme_textdomain( 'cirion', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'cirion_theme_language_setup');
}

/* Custom Logo */
if ( ! function_exists( 'cirion_custom_logo_setup' ) ) {
	function cirion_custom_logo_setup() {
	 $defaults = array(
	 'height'      => null,
	 'width'       => null,
	 );
	 add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'cirion_custom_logo_setup' );
}

/* Custom Menu Theme Location */
if ( ! function_exists( 'cirion_custom_theme_location' ) ) {
  function cirion_custom_theme_location() {
    register_nav_menus(
      array(
        'topbar' => __( 'Top Bar Navigation' ),
      )
    );
  }
  add_action( 'init', 'cirion_custom_theme_location' );
}

/* Footer Widgets */
if ( ! function_exists( 'cirion_widget_init' ) ) {
	function cirion_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'cirion' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'cirion' ),
					'before_widget' => '<div id="%1$s" class="cron-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);

	    // Footer Widgets
	    register_sidebar(
				array(
					'name' => esc_html__( 'Footer Menu', 'cirion' ),
					'id' => 'footer-1',
					'description' => esc_html__( 'Appears on Footer.', 'cirion' ),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				)
			);
			register_sidebar(
				array(
					'name' => esc_html__( 'Footer Menu - Solutions', 'cirion' ),
					'id' => 'footer-2',
					'description' => esc_html__( 'Appears on Footer.', 'cirion' ),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				)
			);
			register_sidebar(
				array(
					'name' => esc_html__( 'Footer Menu - Products and Services', 'cirion' ),
					'id' => 'footer-3',
					'description' => esc_html__( 'Appears on Footer.', 'cirion' ),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				)
			);
			register_sidebar(
				array(
					'name' => esc_html__( 'Footer Menu - Products and Services', 'cirion' ),
					'id' => 'footer-4',
					'description' => esc_html__( 'Appears on Footer.', 'cirion' ),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				)
			);
      register_sidebar(
        array(
          'name' => esc_html__( 'Footer Menu - Social Icons', 'cirion' ),
          'id' => 'footer-5',
          'description' => esc_html__( 'Appears on Footer.', 'cirion' ),
          'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
          'after_widget' => '</div> <!-- end widget -->',
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>',
        )
      );
	  register_sidebar(
        array(
          'name' => esc_html__( 'Country Widget', 'cirion' ),
          'id' => 'country',
          'description' => esc_html__( 'Appears on Copyright.', 'cirion' ),
          'before_widget' => '<div id="%1$s" class="country-widget %2$s">',
          'after_widget' => '</div> <!-- end widget -->',
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>',
        )
      );
      register_sidebar(
        array(
          'name' => esc_html__( 'Copyright Widget', 'cirion' ),
          'id' => 'copyright',
          'description' => esc_html__( 'Appears on Copyright.', 'cirion' ),
          'before_widget' => '<div id="%1$s" class="copyright-widget %2$s">',
          'after_widget' => '</div> <!-- end widget -->',
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>',
        )
      );
		}
	}
	add_action( 'widgets_init', 'cirion_widget_init' );
}

/* Add a pingback url auto-discovery header for single posts, pages, or attachments. */
if ( ! function_exists( 'cirion_pingback_header' ) ) {
	function cirion_pingback_header() {
	  if ( is_singular() && pings_open() ) {
	    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	  }
	}
	add_action( 'wp_head', 'cirion_pingback_header' );
}

/* Title Area */
if ( ! function_exists( 'cirion_title_area' ) ) {
  function cirion_title_area() {

    global $post, $wp_query;
    // Get post meta in all type of WP pages
    $cirion_id    = ( isset( $post ) ) ? $post->ID : 0;
    $cirion_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $cirion_id;
    $cirion_meta  = get_post_meta( $cirion_id, 'page_type_metabox', true );
    if ($cirion_meta && (!is_archive() || cirion_is_woocommerce_shop())) {
      $custom_title = $cirion_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if ( $custom_title && !is_search()) {
      echo esc_html($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      /* translators: %s: Search Results */
      printf( esc_html__( 'Search Results for %s', 'cirion' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'cirion'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        /* translators: %s: Search Results */
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'cirion' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        /* translators: %s: Search Results */
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'cirion' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        /* translators: %s: Search Results */
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'cirion' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        /* translators: %s: Search Results */
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'cirion' ), $allowed_title_area_tags ), esc_html( get_the_author_meta( 'display_name', $wp_query->post->post_author )));
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'cirion' );
      }
    } else {
      the_title();
    }

  }
}

/* Excerpt Length */
class CirionExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: segovia_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    CirionExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'CirionExcerpt::new_length');
    CirionExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(CirionExcerpt::$types[CirionExcerpt::$length]) )
      return CirionExcerpt::$types[CirionExcerpt::$length];
    else
      return CirionExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }
}

// Custom Excerpt Length
if( ! function_exists( 'cirion_excerpt' ) ) {
  function cirion_excerpt($length = 55) {
    CirionExcerpt::length($length);
  }
}

// Share Options
if ( ! function_exists( 'cirion_wp_share_option' ) ) {
  function cirion_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $media_url =  get_the_post_thumbnail_url();
    $title = $post->post_title;
    global $cirion_redux_options;
    $share_on_text = (isset($cirion_redux_options['share_on_text'])) ? $cirion_redux_options['share_on_text'] : '';
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'cirion-core' );
    ?>
		<div class="cron-blog-share">
      <div class="cron-social">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'cirion'); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'cirion'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'cirion'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&media=<?php print(urlencode($media_url)); ?>" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'cirion'); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
    </div>
  </div>
<?php
  }
}

// Related Post
if ( ! function_exists( 'cirion_related_post' ) ) {
  function cirion_related_post() {
    // get the custom post type's taxonomy terms
    global $post;
    global $cirion_redux_options;
    $related_post_title = (isset($cirion_redux_options['related_post_title'])) ? $cirion_redux_options['related_post_title'] : '';
    $related_post_limit = (isset($cirion_redux_options['related_post_limit'])) ? $cirion_redux_options['related_post_limit'] : '';
    $related_post_order = (isset($cirion_redux_options['related_post_order'])) ? $cirion_redux_options['related_post_order'] : '';
    $related_post_orderby = (isset($cirion_redux_options['related_post_orderby'])) ? $cirion_redux_options['related_post_orderby'] : '';

    $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );

    $title = $related_post_title ? $related_post_title : esc_html__('Related Posts', 'glazov');
    $related_post_limit = $related_post_limit ? $related_post_limit : '2';
    // arguments
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => (int)$related_post_limit,
      'orderby' => $related_post_orderby,
      'order' => $related_post_order,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'id',
          'terms' => $custom_taxterms
        )
      ),
      'post__not_in' => array ($post->ID),
    );
    $related_items = new WP_Query( $args );
    // loop over query
    if ($related_items->have_posts()) :
      echo '<div class="cron-related-post cron-post-wrap">
      <h4 class="related-post-title">'.esc_attr($title).'</h4><div class="row">';
    while ( $related_items->have_posts() ) : $related_items->the_post();

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    ?>
    <div class="col-md-6">
      <div class="cron-news-item">
        <?php if ($large_image) { ?>
          <div class="cron-image">
            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
        <?php } ?>
        <div class="cron-news-info">
          <div class="cron-news-meta">
            <div class="row">
              <div class="col-md-12">
                <div class="cron-news-cats">
                  <?php $cirion_categories = get_the_category();
                  if ($cirion_categories) {
                    foreach ( $cirion_categories as $cirion_category ) : ?>
                      <a href="<?php echo esc_url( get_category_link( $cirion_category->term_id ) ); ?>"><?php echo esc_html( $cirion_category->name ); ?></a>
                    <?php endforeach;
                  } ?>
                </div>
                <?php the_title( '<h3 class="cron-news-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
              </div>
            </div>
          </div>
          <div class="cron-news-btm-meta">
            <span><?php echo esc_html(get_the_date()); ?></span>
            <span><?php esc_html_e(' By', 'cirion'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
          </div>
          <div class="cron-link-wrap">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="cron-news-link"><span><?php esc_html_e( 'Read More', 'cirion' ); ?></span> <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <?php
    endwhile;
    echo '</div></div>';
    endif;
    // Reset Post Data
    wp_reset_postdata();
  }
}

/* Filter the categories archive widget to add a span around post count */
if ( ! function_exists( 'cirion_cat_count_span' ) ) {
	function cirion_cat_count_span( $links ) {
	  $links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
	  $links = str_replace( ')', ')</span>', $links );
	  return $links;
	}
	add_filter( 'wp_list_categories', 'cirion_cat_count_span' );
}

/* Filter the archives widget to add a span around post count */
if ( ! function_exists( 'cirion_archive_count_span' ) ) {
	function cirion_archive_count_span( $links ) {
	  $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
	  $links = str_replace( ')', ')</span>', $links );
	  return $links;
	}
	add_filter( 'get_archives_link', 'cirion_archive_count_span' );
}

if( ! function_exists( 'cirion_is_post_type' ) ) {
  function cirion_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/* Content Length */
class CirionContent {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: segovia_content('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the content,
   * then it adds the WP filter
   * And automatically calls the_content();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    CirionContent::$length = $new_length;
    add_filter('content_length', 'CirionContent::new_length');
    CirionContent::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(CirionContent::$types[CirionContent::$length]) )
      return CirionContent::$types[CirionContent::$length];
    else
      return CirionContent::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_content();
  }
}

// Custom Excerpt Length
if( ! function_exists( 'cirion_content' ) ) {
  function cirion_content($length = 55) {
    CirionContent::length($length);
  }
}

// Remove Type attribute from style & script

function theme_name_setup() {
  add_theme_support( 'html5', array( 'script', 'style' ) );
}
add_action( 'after_setup_theme', 'theme_name_setup' );

// Custom URL's in Yoast SEO
add_action( 'init', 'enable_custom_sitemap' );

function enable_custom_sitemap() {
global $wpseo_sitemaps;
if ( isset( $wpseo_sitemaps ) && ! empty ( $wpseo_sitemaps ) ) {
    $wpseo_sitemaps->register_sitemap( 'TYPE', 'create_TYPE_sitemap' );
  }
}
$current_siteID = get_current_blog_id();

if ($current_siteID == 1) {
  add_filter( 'wpseo_sitemap_index', 'add_sitemap_custom_items' );
  function add_sitemap_custom_items( $sitemap_custom_items ) {
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/en-us/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-ar/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/pt-br/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-cl/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-co/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-ec/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-mx/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-pe/sitemap_index.xml</loc>
                              </sitemap>';
    $sitemap_custom_items .= '<sitemap>
                                <loc>'.get_site_url().'/es-ve/sitemap_index.xml</loc>
                              </sitemap>';

    return $sitemap_custom_items;
  }
} else {
  return;
}