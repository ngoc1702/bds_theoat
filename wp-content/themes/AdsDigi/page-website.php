<?php

/* Template Name: Thiết kế website */

add_filter( 'genesis_site_layout', 'caia_cpt_layout' );
function caia_cpt_layout() {
  return 'full-width-content';
}


// Xóa tiêu đề
remove_action('genesis_entry_header', 'genesis_do_post_title');

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

add_action('genesis_after_header','caia_add_bannerpage4',9);
function caia_add_bannerpage4(){
	global $post;
	$banner = rwmb_meta('bannerpage');
if (is_array($banner)) {
	echo '<div data-aos="fade-up" class="banner_page section">';
    foreach ($banner as $value) {
        echo '<div class="image-upload thueggads website"><div class="image-wrap">';
        if (is_array($value) && isset($value['bannerpage'])) {
            echo do_shortcode(wpautop($value['bannerpage']));
        } else {
            echo do_shortcode(wpautop($value));
        }
        echo '</div></div>';
    }
	echo '</div>';
}

	// tại sao

	$taisao = rwmb_meta( 'taisao');

	if(!empty($taisao)){
		echo '<div data-aos="fade-up" class="taisao section"><div class="wrap">';
        echo '<div class="widget">';
             echo do_shortcode(wpautop($taisao['nd']));
        echo '</div>';
        echo '<div class="widget">';
             echo do_shortcode(wpautop($taisao['nd2']));
        echo '</div>';
	    echo '</div></div>';
	}

	// dv thiết kế web
	$tieudetkweb = get_post_meta( $post->ID, 'tieudetkweb', true);
	$tkeweb = rwmb_meta( 'tkeweb');
	if(!empty($tkeweb)){
		echo '<div data-aos="fade-up" class="dichvu_tkweb section">';
			echo '<div class="widgettitle"><h2>';
	             echo do_shortcode($tieudetkweb);
	        echo '</h2></div>';
	        echo '<div class="gia_dv">';
				foreach ($tkeweb as $value) {
						echo '<div class="web">';
					     echo '<h3>';
				             echo do_shortcode($value['tieude']);
				        echo '</h3>';
				        echo '<div class="noidung">';
				             echo do_shortcode(wpautop($value['nd']));
				        echo '</div>';
		        echo '</div>';
			    }
		    echo '</div>';
	    echo '</div>';
	}

	// landing page
	$tieudetkpage = get_post_meta( $post->ID, 'tieudetkpage', true);
	$tkeldp = rwmb_meta( 'tkeldp');
	if(!empty($tkeldp)){
		echo '<div data-aos="fade-up" class="dichvu_ldp section"><div class="wrap">';
			echo '<div class="widgettitle"><h2>';
	             echo do_shortcode($tieudetkpage);
	        echo '</h2></div>';
	        echo '<div class="gia_ldp">';
				foreach ($tkeldp as $value) {
					echo '<div class="ldp">';
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

	// quy trình


	$tieude2 = get_post_meta($post->ID, 'tieude2', true);
	$cacbuoc = rwmb_meta('cacbuoc');

	echo '<div data-aos="fade-up" class="content-cauhoi section">';
	echo '<div class="widgettitle">' . wpautop($tieude2) . '</div>';
	echo '<div class="list_ques">';
	foreach ($cacbuoc as $value) {
		echo '<div class="question">';
		echo '<div class="title">';
		echo do_shortcode($value['buoc']);
		echo '</div>';
		echo '<div class="answer">';
		echo do_shortcode(wpautop($value['nd']));
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';

	echo '</div>';


	// Dịch vụ website
	$tieude3 = get_post_meta( $post->ID, 'tieude3', true);
	$caccd = rwmb_meta( 'caccd');

	if(!empty($caccd)){
		echo '<div data-aos="fade-up" class="dichvu_web section"><div class="wrap">';
		    echo '<div class="widgettitle">';
	             echo do_shortcode($tieude3);
	        echo '</div>';

	        echo '<div class="danhmuc">';
			    foreach ( $caccd as $value ) {
			    	echo '<div class="muc">';
				        echo do_shortcode(wpautop($value['nd']));
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
