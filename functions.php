<?php
/**
 * Functions - Child theme custom functions
 */


/************************************************************************************************
***************** CAUTION: do not remove or edit anything within this section ******************/

/**
 * Makes the Divi Children Engine available for the child theme.
 * Do not remove this, your child theme will not work.
 */
require_once('divi-children-engine/divi_children_engine.php');

/***********************************************************************************************/


/*- You can include any custom code for your child theme below this line -*/
/* MODIFY FILE 'WP-LOIGN.PHP'
*/

// Logo

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/Logo_v1.0.1.png);
		height:150px;
		width:150px;
		background-size: 150px 150px;
		background-repeat: no-repeat;
       
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// END LOGO

// Attach CSS to login Page

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login-index.css' );
    wp_enqueue_style( 'custom-fonts', get_stylesheet_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// END CSS

// Load the custom stylesheets & conditional scripts

function theme_styles()  
{
  // Load all of the styles that need to appear on all pages
  wp_enqueue_style( 'custom-font', get_stylesheet_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css' );
  if(is_page('debriefing-covid-19')) {
		wp_enqueue_style( 'form-styles', get_stylesheet_directory_uri() . '/booking.css' );
  }
  if(is_page('help-thanks')) {
		wp_enqueue_style( 'form-styles', get_stylesheet_directory_uri() . '/booking.css' );
  }
  if(is_page('booking-thanks')) {
		wp_enqueue_style( 'form-styles', get_stylesheet_directory_uri() . '/booking.css' );
  }
}
add_action('wp_enqueue_scripts' , 'theme_styles');

function scripts()  
{
	    wp_enqueue_script( 'latest-js', 'https://code.jquery.com/jquery-latest.min.js' );
  if(is_page('home-2')) {
		wp_enqueue_script( 'connect-settings', get_stylesheet_directory_uri() . '/js/connectionSettings.js' );
		wp_enqueue_script( 'connect-app', get_stylesheet_directory_uri() . '/js/jquery.connections.js' );
  }  
}
add_action('wp_enqueue_scripts' , 'scripts');



// END CUSTOM STYLESHEETS & SCRIPTS


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
 
  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }
 
  $filetype = wp_check_filetype( $filename, $mimes );
 
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];
 
}, 10, 4 );
 
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
 
function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

// end SVG
