<?php

// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Xóa social share và rating mặc định
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

// Thêm thông tin dưới nội dung bài viết
add_action('genesis_entry_footer', 'caia_add_content_post_meta', 1);
function caia_add_content_post_meta(){
	echo '<div class="content-info-meta section">';
		echo '<div class="rating-social section">';
			echo do_shortcode('[caia_rating]');	
			echo do_shortcode('[caia_social_share]');
		echo '</div>';
	echo '</div>';
}


add_action('genesis_before_content','add_slide_product');
function add_slide_product(){
	global $post;
	$anhsp = get_post_meta( $post->ID, 'anhsp', true);
	$gt = get_post_meta( $post->ID, 'gt', true);
	$dactrung = get_post_meta( $post->ID, 'dactrung', true);

	if( !empty($anhsp) ||  !empty($gt) ) {
		echo '<div class="chitiet_sp">';
			echo '<div class="slide_sp">';
				echo do_shortcode($anhsp);
				echo do_shortcode($anhsp);
			echo '</div>';

			echo '<div class="info_sp">';
				echo '<h1>'.get_the_title().'</h1>';
				echo do_shortcode($gt);
                echo '<div class="nhantuvan-group">';
                echo '<p class="btn_call"><a href="tel:0961323369">Liên hệ</a></p>';
				echo '<p class="nhanbaogia"><span>Nhận báo giá</span></p>';
                echo '</div>';
			echo '</div>';
				


}
}

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'add_loop_sp' );
function add_loop_sp(){
	global $post;
	$mota = get_post_meta( $post->ID, 'mota', true);
		if( !empty($mota) ) {
		echo '<div class="mota">';
				echo do_shortcode($mota);
		echo '</div>';

	}
		echo '</div>';

	}



	// $pin = get_post_meta( $post->ID, 'pin', true);

	// if( !empty($pin) ) {
	// 	echo '<div class="pin">';
	// 			echo do_shortcode($pin);
	// 	echo '</div>';

	// }

	// $thongso = get_post_meta( $post->ID, 'thongso', true);

	// if( !empty($thongso) ) {
	// 	echo '<div class="thongso">';
	// 			echo do_shortcode($thongso);
	// 	echo '</div>';

	// }

	// $banve = get_post_meta( $post->ID, 'banve', true);

	// if( !empty($banve) ) {
	// 	echo '<div class="banve">';
	// 			echo do_shortcode($banve);
	// 	echo '</div>';

	// }
// }



// Thêm bài viết liên quan
add_action( 'genesis_before_sidebar_widget_area', 'caia_add_product_YARPP' );
function caia_add_product_YARPP(){
	yarpp_related(
		array(
			'post_type' => 'product',
			'threshold' => 1,
			'template' => 'yarpp-template-product.php',
			'limit' => 3,
		)
	);
}

genesis();