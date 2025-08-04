<?php

/* Template Name: Trang blog */

add_filter( 'genesis_site_layout', 'caia_cpt_layout' );
function caia_cpt_layout() {
  return 'full-width-content';
}


// Xóa tiêu đề
//remove_action('genesis_entry_header', 'genesis_do_post_title');

// Xóa social share
add_action('genesis_before_loop', 'remove_caia_rating');
function remove_caia_rating(){
	global $caia_rating;
	$star_pri = has_filter( 'the_content', array($caia_rating, 'add_rating_content_bottom'));
	if ($star_pri !== false){
		remove_filter('the_content', array($caia_rating, 'add_rating_content_bottom'), $star_pri);
	}

	global $caia_social;
	$social_pri = has_filter( 'the_content', array($caia_social, 'add_native_share_button_at_bottom'));
	if ($social_pri !== false){
		remove_filter('the_content', array($caia_social, 'add_native_share_button_at_bottom'), $social_pri);
	}
}


// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs',9);
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action ('genesis_loop' , 'add_page_blog');

remove_action('genesis_before_footer','caia_add_content_after_footer',8);


function add_page_blog(){
	global $post;
	echo '<h1 style="display:none">'.get_the_title().'</h1>';
	if( is_active_sidebar( 'page_blog' ) ){
		echo '<div data-aos="fade-up" class="page_blog section"><div class="wrap">';
			dynamic_sidebar( 'Trang Blog' );
		echo '</div></div>';
	}
}


// Mobile
if (wp_is_mobile() ){

}

genesis();
