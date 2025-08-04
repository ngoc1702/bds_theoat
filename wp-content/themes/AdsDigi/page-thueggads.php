<?php

/* Template Name: Thuê GG ADS */

// Xóa tiêu đề
remove_action('genesis_entry_header', 'genesis_do_post_title');

add_filter( 'genesis_site_layout', 'caia_cpt_layout' );
function caia_cpt_layout() {
  return 'full-width-content';
}


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

add_action('genesis_after_header','caia_add_bannerpage3',9);
function caia_add_bannerpage3(){
	$banner = rwmb_meta('bannerpage');
if (is_array($banner)) {
	echo '<div data-aos="fade-up" class="banner_page section">';
    foreach ($banner as $value) {
        echo '<div class="image-upload thueggads"><div class="image-wrap">';
        if (is_array($value) && isset($value['bannerpage'])) {
            echo do_shortcode(wpautop($value['bannerpage']));
        } else {
            echo do_shortcode(wpautop($value));
        }
        echo '</div></div>';
    }
	echo '</div>';
}



remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'caia_add_choose');
function caia_add_choose()
{
	// ưu điểm
	global $post;
 	$tieude = get_post_meta($post->ID, 'tieude', true);
	$uudiem = rwmb_meta('uudiem');
    	echo '<div data-aos="fade-up" class="content-uudiem section">';
	echo '<div class="widget">' . $tieude . '</div>';
	echo '<div class="widget_uudiem">';
	foreach ($uudiem as $value) {
		 echo '<div class="card">';
		             echo do_shortcode(wpautop($value['nd']));
		        echo '</div>';
	}
	echo '</div>';
	echo '</div>';


		// lý do thuê

	$tieude1 = get_post_meta( $post->ID, 'tieude1', true);
	$caclydo = rwmb_meta( 'caclydo');
echo '<div data-aos="fade-up" class="content-dichvu section">';
	echo '<div class="widget">' . $tieude1 . '</div>';
	echo '<div class="widgetdv">';
	foreach ($caclydo as $value) {
		echo '<div class="image-upload2">';
		echo do_shortcode(wpautop($value['lydo']));
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';


		// bảng giá dịch vụ
	$banggia = rwmb_meta( 'banggia');

	if(!empty($banggia)){
		echo '<div data-aos="fade-up" class="banggia section"><div class="wrap">';
			echo '<div class="bang_gia">';
		        echo '<div class="widgettitle">';
		             echo do_shortcode(wpautop($banggia['tieude']));
		        echo '</div>';
		        echo '<div class="widget">';
		             echo do_shortcode(wpautop($banggia['nd']));
		        echo '</div>';
		    echo '</div>';
	    echo '</div></div>';
	}
}





}

remove_action( 'genesis_loop', 'genesis_do_loop' );


// Mobile
if (wp_is_mobile() ){

}

genesis();
