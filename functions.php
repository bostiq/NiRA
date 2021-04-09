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

/* MODIFY FILE 'WP-LOIGN.PHP'
*/

// Logo

function my_login_logo() { ?>
    <style type="text/css">
        body::before {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/beautiful_seashore-wallpaper-1280x800.jpg) !important;
            filter: blur(0) !important
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/Logo_v1.0.1.png);
        	  height:150px;
		        width:150px;
		        background-size: 150px 150px;
		        background-repeat: no-repeat;
        }
        #login h1:after {
            content: "NiRA";
            font-family: Garamond, 'Times New Roman', serif;
            color: rgba(255, 255, 255, 0.7);
            text-shadow: none;
            font-size: 34px;
            line-height: 40px;
        }
        #login h1 a,
        .login h1 a {
            animation: rotation 120s 0s linear infinite;
            background-color: rgba(0,0,0,0.2);
            padding: 10px 10px;
            background-position: 50%;
            border-radius: 50%;
        }

@keyframes rotation {
    0% {
        -ms-transform: rotate(0deg)
    }
    100% {
        -ms-transform: rotate(360deg)
    }
    0% {
        -webkit-transform: rotate(0deg)
    }
    100% {
        -webkit-transform: rotate(360deg)
    }
    0% {
        transform: rotate(0deg)
    }
    100% {
        transform: rotate(360deg)
    }
}
    </style>
<?php }

// To change the link values so the logo links

add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Name of the site';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// END LOGO

// Attach CSS to wp-login.php

function my_login_stylesheet() {
    // wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login-index.css' );
    wp_enqueue_style( 'custom-fonts', 'https://indexwebmedia.com/bostiq/commons/font-awesome-4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'custom-login-style', 'https://indexwebmedia.com/bostiq/commons/wp-login/login-index.min.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// END CSS

// Attach html after Form to wp-login.php
add_action( 'login_footer', 'login_extra_note' );

function login_extra_note() {

//Adding the text

    ?>
<div id="bottom_html">
    <p class="txt"> </p>
</div>

    <?php
}

// Load the custom stylesheets & conditional scripts

// function theme_styles()  
// {
//   // Load all of the styles that need to appear on all pages
//   wp_enqueue_style( 'custom-font', get_stylesheet_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css' );
//   if(is_page('debriefing-covid-19') or is_page('support-services') or is_page('booking-thanks') or is_page('test-form')) {
// 		wp_enqueue_style( 'form-styles', get_stylesheet_directory_uri() . '/booking.css' );
//   }
// }
// add_action('wp_enqueue_scripts' , 'theme_styles');

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
