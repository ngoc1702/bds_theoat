<?php

/* Template Name: Dịch vụ GG ADS */


// Xóa tiêu đề
//remove_action('genesis_entry_header', 'genesis_do_post_title');

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

add_action('genesis_after_header','caia_add_bannerpage',9);
function caia_add_bannerpage(){
	global $post; 
    $banner = rwmb_meta('bannerpage');
if (is_array($banner)) {
	echo '<div data-aos="fade-up" class="banner_page section">';
    foreach ($banner as $value) {
        echo '<div class="image-upload">';
        if (is_array($value) && isset($value['bannerpage'])) {
            echo do_shortcode(wpautop($value['bannerpage']));
        } else {
            echo do_shortcode(wpautop($value));
        }
        echo '</div>';
    }
	echo '</div>';
}

	// cam kết
    global $post;
	$tieude = get_post_meta($post->ID, 'tieude', true);
	$dangky = get_post_meta($post->ID, 'dangky', true);
    $camket = rwmb_meta( 'camket');
	echo '<div data-aos="fade-up" class="content-chiendich section">';
	echo '<div class="widgettd">' . $tieude . '</div>';
	if(!empty($camket)){
		echo '<div class="widgetcd">';
			foreach ( $camket as $value ) {
		        echo '<div class="card">';
		             echo do_shortcode(wpautop($value['nd2']));
		        echo '</div>';
		    }	
	    echo '</div>';
	}
	echo '<div>' . $dangky . '</div>';
	  echo '</div>';

	  //chiến dịch
	  $chiendich = rwmb_meta( 'chiendich');

	if(!empty($chiendich)){
		echo '<div data-aos="fade-up" class="chiendich_ggads section"><div class="wrap">';
			foreach ( $chiendich as $value ) {
		        echo '<div class="widget">';
		             echo do_shortcode(wpautop($value['nd_chiendich']));
		        echo '</div>';
		    }	
	    echo '</div></div>';
	}

	// quy trình

	$tieude_qt = get_post_meta($post->ID, 'tieude_qt', true);
	$cacbuoc = rwmb_meta('cacbuoc');

	echo '<div data-aos="fade-up" class="content-cauhoi section">';
	echo '<div class="widgettitle">' . wpautop($tieude_qt) . '</div>';
	echo '<div class="list_ques">';
	foreach ($cacbuoc as $value) {
		echo '<div class="question">';
		echo '<div class="title">';
		echo do_shortcode($value['tieude']);
		echo '</div>';
		echo '<div class="answer">';
		echo do_shortcode(wpautop($value['traloi']));
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';

	echo '</div>';



	// gói dịch vụ

	$ttdichvu = get_post_meta( $post->ID, 'ttdichvu', true);
	$goidv = rwmb_meta( 'goidv');
	if(!empty($goidv)){
		echo '<div data-aos="fade-up" class="cacgoi section"><div class="wrap">';
		    echo '<div class="widgettitle">';
	             echo do_shortcode($ttdichvu);
	        echo '</div>';

	        echo '<div class="goi_dichvu">';
			    foreach ( $goidv as $value ) {
			    	echo '<div class="goi">';
			    		echo '<h3>';
				             echo do_shortcode($value['tieude']);
				        echo '</h3>';
				        echo '<div class="noidung">';
				             echo do_shortcode(wpautop($value['nd']));
				        echo '</div>';
			    	echo '</div>';
			    }	
		    echo '</div>';
	    echo '</div></div>';
	}

}

remove_action( 'genesis_loop', 'genesis_do_loop' );


// Mobile
if (wp_is_mobile() ){

}

genesis();
