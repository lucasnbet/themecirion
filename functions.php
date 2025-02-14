<?php
/*
 * Cirion Theme's Functions
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */

/**
 * Define - Folder Paths
 */
define( 'CIRION_THEMEROOT_PATH', get_template_directory() );
define( 'CIRION_THEMEROOT_URI', get_template_directory_uri() );
define( 'CIRION_CSS', CIRION_THEMEROOT_URI . '/assets/css' );
define( 'CIRION_IMAGES', CIRION_THEMEROOT_URI . '/assets/images' );
define( 'CIRION_SCRIPTS', CIRION_THEMEROOT_URI . '/assets/js' );
define( 'CIRION_FRAMEWORK', get_template_directory() . '/inc' );
define( 'CIRION_LAYOUT', get_template_directory() . '/template-parts' );

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$cirion_theme_child = wp_get_theme();
	$cirion_get_parent = $cirion_theme_child->Template;
	$cirion_theme = wp_get_theme($cirion_get_parent);
} else { // Parent Theme Active
	$cirion_theme = wp_get_theme();
}
define('CIRION_NAME', $cirion_theme->get( 'Name' ));
define('CIRION_VERSION', $cirion_theme->get( 'Version' ));
define('CIRION_BRAND_URL', $cirion_theme->get( 'AuthorURI' ));
define('CIRION_BRAND_NAME', $cirion_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
/* Theme All Basic Setup */
require_once( CIRION_FRAMEWORK . '/enqueue-files.php' );
require_once( CIRION_FRAMEWORK . '/configuration.php' );

/* Bootstrap Menu Walker */
require_once( CIRION_FRAMEWORK . '/plugins/class-wp-bootstrap-navwalker.php' );

/* Install Plugins */
require_once( CIRION_FRAMEWORK . '/plugins/notify/activation.php' );

/* Include the TGM_Plugin_Activation class. */
require_once( CIRION_FRAMEWORK . '/plugins/notify/class-tgm-plugin-activation.php' );

/* Integrate - Redux Framework */
require_once( CIRION_FRAMEWORK .'/theme-options.php' );

/* Ccontent Width */
function cirion_content_width() {
	if ( ! isset( $content_width ) ) $content_width = 1200;
}
add_action( 'after_setup_theme', 'cirion_content_width', 0 );

// cookie setup without mpml
add_action('init', function() {
// multi site list
$sites = get_sites(); 
$cirion_site_list=array();
foreach($sites as $sites){
  $cirion_site=str_replace("/","",$sites->path);
  if(!empty($cirion_site)){
		$cirion_site_list[]=$cirion_site;
  }
}

if( isset($_COOKIE['wp-wpml_current_language']) && $_COOKIE['wp-wpml_current_language']!="") {
	$site_id=get_current_blog_id();
	$current_site_details = get_blog_details( array( 'blog_id' => $site_id ) );
	$current_site=str_replace("/","",$current_site_details->path);
	$current_laguage = $_COOKIE['wp-wpml_current_language'];
	if(($site_id!='') && ($site_id!=1)) {
		$siteprefix = 'cirion_prefer_site_';

		$sitefiltered = array_filter( $_COOKIE, function( $key ) use ( $siteprefix ) {
			return strpos( $key, $siteprefix ) === 0;
		}, ARRAY_FILTER_USE_KEY );
		$site_url = get_site_url();
		$site_url_wh = str_replace("http://", "", str_replace("https://", "", str_replace("http://www.", "", str_replace("https://www.", "", $site_url))));
		if ( ! empty( $sitefiltered ) ) {
				foreach($cirion_site_list as $cirion_site_list){
					setcookie($siteprefix.$cirion_site_list, null, time() - 3600, '/',$site_url_wh);
				}
			setcookie($siteprefix.$current_site,$current_site,time() + 3600,'/',$site_url_wh);
		} else {
			setcookie($siteprefix.$current_site,$current_site,time() + 3600,'/',$site_url_wh);
		}

	} else {

	}
}
});

function cirion_page_category() {
	register_taxonomy('page_category', 'page', [
	'label' => __('Category'),
	'hierarchical' => true,
	'rewrite' => ['slug' => 'services-category'],
	'show_admin_column' => true,
	'show_in_rest' => true,
	'labels' => [
		'singular_name' => __('Category'),
		'all_items' => __('All Category'),
		'edit_item' => __('Edit Category'),
		'view_item' => __('View Category'),
		'update_item' => __('Update Category'),
		'add_new_item' => __('Add New Category'),
		'new_item_name' => __('New Category Name'),
		'search_items' => __('Search Category'),
		'parent_item' => __('Parent Category'),
		'parent_item_colon' => __('Parent Category:'),
		'not_found' => __('No Category found'),
	]
	]);
}

add_action( 'init', 'cirion_page_category', 0 );

// Enable Page Excerpt Option
add_post_type_support( 'page', 'excerpt' );

// Removes special characters
function remove_special_characters( $string ) {
	return preg_replace('/(^[\s]+|[\s]+$)|[^A-Za-zÀ-ÿ0-9?!\\- ]/u', '', $string);
}



// Function to grant menu editing capability to editors
function allow_menu_edit_for_specific_user() {
  // Get the user object based on username
  // $user = get_user_by('login', 'elizabeth');

  // get the the role object
	$user_role = get_role( 'editor' );

  // Check if the user or role exists
  if ($user_role) {
    // Grant menu editing capability
    $user_role->add_cap('edit_theme_options');

    // Remove other Appearance submenus
    global $submenu;
    // unset($submenu['themes.php'][6]); // Remove 'Customize'
    unset($submenu['themes.php'][15]); // Remove 'Header'
    unset($submenu['themes.php'][20]); // Remove 'Background'
    remove_submenu_page('themes.php', 'themes.php'); // Remove 'Themes'
    // remove_submenu_page('themes.php', 'widgets.php'); // Remove 'Widgets'
  }
}
add_action('admin_init', 'allow_menu_edit_for_specific_user');
/*
function kq_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
} 
add_action( 'wp_enqueue_scripts', 'kq_remove_wp_block_library_css', 100 );

function kq_defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace('src', 'defer src', $url );
}
add_filter( 'script_loader_tag', 'kq_defer_parsing_of_js', 10 );

add_filter( 'style_loader_tag',  'preload_filter', 10, 2 );

function preload_filter( $html, $handle ){
    if (strcmp($handle, 'preload-style') == 0) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' ", $html);
    }
    return $html;
}*/
// Start code - Tab Component Enhancement feature is added by Verticurl - 03/10/2023
function add_custom_query_var($vars) {
	$vars[] = 'tab';
	return $vars;
}
add_filter('query_vars', 'add_custom_query_var');
// End code
// Start code - Hero Banner Slider Enhancement feature is added by Verticurl - 27/10/2023
function cirion_wp_is_mobile() {
	static $is_mobile;

	if ( isset($is_mobile) ) {
			return $is_mobile;
	}

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
			$is_mobile = false;
	} elseif (
			strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
	) {
			$is_mobile = true;
	} elseif (
			strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
			&& strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false
	) {
			$is_mobile = true;
	} else {
			$is_mobile = false;
	}

	return $is_mobile;
}

function cirion_wp_is_tablet() {
	static $is_tablet;

	if ( isset($is_tablet) ) {
			return $is_tablet;
	}

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
			$is_tablet = false;
	} elseif (
			strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false
			|| (strpos($_SERVER['HTTP_USER_AGENT'], 'Tablet') !== false
			&& strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false)
	) {
			$is_tablet = true;
	} else {
			$is_tablet = false;
	}

	return $is_tablet;
}
// End code
// Function to set the default table prefix for the catfolders plugin
function set_my_plugin_prefix() {
	global $wpdb;

	// Check if the plugin is active
	if (is_plugin_active('catfolders/catfolders.php')) {
			// Define your default table prefix for the plugin
			$my_plugin_prefix = 'wp_3_';

			// Set the default table prefix for the plugin
			$wpdb->prefix = $my_plugin_prefix;
	}
}

// Hook into the 'after_setup_theme' action to ensure it runs early
add_action('after_setup_theme', 'set_my_plugin_prefix');

// Centralized Media Library Enhancement
function get_attachment_url_dynamic($settings, $key, $blog_id = 3) {
	// Use the null coalescing operator to simplify the code
	$value_id = $settings[$key]['id'] ?? '';
	$value_url = $settings[$key]['url'] ?? '';
	$attachment_url = wp_get_attachment_url($value_id);

	if (!empty($attachment_url)) {
			// If attachment ID is available, get the URL directly
			$attachment_url = wp_get_attachment_url($value_id);
	} else {
			// If attachment ID is not available but URL is, switch to the specified blog
			switch_to_blog($blog_id);
			$attachment_url = wp_get_attachment_url($value_id);
			restore_current_blog();
	}

	return $value_url;
}

function get_attachment_alt_dynamic($settings, $key, $blog_id = 3) {
		// Use the null coalescing operator to simplify the code
		$value_id = $settings[$key]['id'] ?? '';
		$value_alt = $settings[$key]['alt'] ?? '';
		$attachment_alt = wp_get_attachment_url($value_id);

		if (!empty($attachment_alt)) {
				// If attachment ID is available, get the URL directly
				$attachment_alt = get_post_meta($value_id, '_wp_attachment_image_alt', true) ? get_post_meta($value_id, '_wp_attachment_image_alt', true) : 'Cirion';
		} else {
				// If attachment ID is not available but URL is, switch to the specified blog
				switch_to_blog($blog_id);
				$attachment_alt = $value_alt;
				restore_current_blog();
		}
		return $value_alt;
}

// Start code - ThreeWP Broadcast plugin feature is added by Verticurl - 17/01/2023
add_action('save_post', 'regenerate_css_on_page_update_multisite', 11, 3);
function regenerate_css_on_page_update_multisite($post_id, $post, $update) {
  if ('page' === $post->post_type && $update) { // Target page updates only
    // Check if we're in a multisite context
    if (is_multisite()) {
      // Get current blog ID
      $current_blog_id = get_current_blog_id();

      // Iterate through all blogs in the network
      foreach (get_sites() as $site) {
        switch_to_blog($site->blog_id);

        // Trigger CSS regeneration for the current blog
        \Elementor\Plugin::$instance->files_manager->clear_cache();

        restore_current_blog(); // Switch back to the original blog
      }
    } else {
      // Single site context, simply regenerate CSS
      \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
  }
}

function bc_threewp_broadcast_broadcasting_modify_post( $action ) {
	$bcd = $action->broadcasting_data;
	echo $post_parent = $action->broadcasting_data->post->post_parent;
	// Get the parent page's slug chosen in the master site
	global $wpdb; 
	$parent_page_slug = $wpdb->get_results("SELECT post_name FROM wp_3_posts WHERE ID = '".$post_parent."' AND post_status = 'publish' AND post_type = 'page'"); 
	$master_parent_slug = $parent_page_slug[0]->post_name;
	$broadcasted_to = $bcd->broadcast_data->get_linked_children();
	// print_r($broadcasted_to);
	foreach ( $broadcasted_to as $broadcasted_single => $key ) {
		switch_to_blog( $broadcasted_single );
		$destination_page_parent_id = get_page_by_slug($master_parent_slug);

		global $wpdb; 
		$table_name = $wpdb->prefix . "posts";
		$wpdb->update($table_name, array('post_parent' => $destination_page_parent_id), array('ID' => $key));

	 //	$action->broadcasting_data->modified_post->post_parent = $destination_page_parent_id;
		restore_current_blog();
	}
}
add_action( 'threewp_broadcast_broadcasting_modify_post', 'bc_threewp_broadcast_broadcasting_modify_post' );

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page') { 
	global $wpdb; 
	$table_name = $wpdb->prefix . "posts";
	$page = $wpdb->get_results("SELECT ID FROM $table_name WHERE post_name = '".$page_slug."' AND post_status = 'publish' AND post_type = 'page'"); print_r($page);
	if ($page) {
		return $page[0]->ID;
	} else {
		return null;
	} 
}
function my_threewp_broadcast_get_user_writable_blogs( $action ) {
	// And we want to remove access to blog # 1
	$action->blogs->forget( 1 );
	$action->blogs->forget( 2 );
	$action->blogs->forget( 4 );
}
add_action( 'threewp_broadcast_get_user_writable_blogs', 'my_threewp_broadcast_get_user_writable_blogs', 200 );
/* End Code */

/* Start code - Page Synchronization feature is added by Verticurl - 08/02/2024 */
/* Disable update button for synced child pages in ThreeWP Broadcast.*/
function disable_update_button_for_synced_child_pages() {
	global $pagenow;

	// Check if we are on the edit page.
	if ($pagenow == 'post.php') {
			$post_id = isset($_GET['post']) ? $_GET['post'] : '';
			$current_blog_id = get_current_blog_id();
			if( $current_blog_id != "3") {
				// Check if the post has been broadcasted (synced).
				global $wpdb;
				$table_name = "wp__3wp_broadcast_broadcastdata";
				$broadcast_linked = $wpdb->get_results("SELECT ID FROM $table_name WHERE post_id = '".$post_id."' AND blog_id = '".$current_blog_id."'");

				if (!empty($broadcast_linked)) {
					// Enqueue jQuery and add the script to the footer.
					add_action('admin_footer', function() {
						?>
						<script type="text/javascript">
								jQuery(document).ready(function($) {
									setTimeout(function() {
										// Disable the Update button.
										$('.editor-post-publish-button').prop('disabled', true).addClass('button-disabled').css({ "border":"1px solid #CCCCCC" });
										// Create a message element and append it to the admin header.
										var message = '<div class="notice notice-warning" style="display:flex; padding: 6px 15px; position: absolute; left: 7%;right: 0; justify-content: center; width: 42%; margin: 0 auto; box-shadow: 3px 3px 10px #9f9c9c;"><div class="e-major-update-warning__icon"><i class="eicon-info-circle"></i></div><div>This is the child page linked from the master page on the Argentina site. Any edits must be made only on the master page.</div></div>';
										$('#wpbody .edit-post-header__toolbar .edit-post-header-toolbar').append(message).css({ "font-weight": "600" });
									}, 3000);
								});
						</script>
						<?php
				});
			}
		}
	}
}
add_action('admin_enqueue_scripts', 'disable_update_button_for_synced_child_pages');

/* Disable ThreeWP Broadcast plugin update */
function disable_threewp_broadcast_plugin_updates($value) {
	if (isset($value) && is_object($value)) {
		if (isset($value->response['threewp-broadcast/ThreeWP_Broadcast.php'])) {
			unset($value->response['threewp-broadcast/ThreeWP_Broadcast.php']);
		}
	}
	return $value;
}
add_filter('site_transient_update_plugins', 'disable_threewp_broadcast_plugin_updates');
/* End code */

/* Start code - Page Synchronization feature is added by Verticurl - 03/04/2024 */
// Remove broadcast meta box for a USA and Brazil sites within a Multisite network
function remove_broadcast_meta_box_for_specific_site( $post_type, $post ) {
	if ( is_multisite() && (get_current_blog_id() == 2 || get_current_blog_id() == 4)) {
			remove_meta_box( 'threewp_broadcast', $post_type, 'side' );
	}
}
add_action( 'add_meta_boxes', 'remove_broadcast_meta_box_for_specific_site', 999, 2 );
/* End code */

