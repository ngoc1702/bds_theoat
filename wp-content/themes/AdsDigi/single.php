<?php

// Setting bố cục
add_filter( 'genesis_site_layout', 'caia_cpt_layout' );
function caia_cpt_layout() {
	return 'content-sidebar';
}

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
	echo '<div class="rating-social section">';
		echo do_shortcode('[caia_social_share]');
	echo '</div>';
}

// Thêm tag
//add_action( 'genesis_entry_footer', 'caia_add_post_tags' );
function caia_add_post_tags(){	
	if(has_tag()){
		echo '<div class="post-meta-tag section"><p class="tag">';
			the_tags('<strong>Chủ đề: </strong>', ' ', '');
		echo '</p></div>';
	}
}

// Thêm sản phẩm liên quan
add_action( 'genesis_before_sidebar_widget_area', 'caia_add_post_YARPP', 1 );
function caia_add_post_YARPP(){
		yarpp_related(
			array(
				'post_type' => 'post',
				'threshold' => 1,
				'template' => 'yarpp-template-post.php',
				'limit' => 4,
			)
		);
}

// Xóa tiêu đè trong breadcrumb bài viết
add_filter( 'genesis_single_crumb', 'be_remove_title_from_single_crumb', 10, 2 );
function be_remove_title_from_single_crumb( $crumb, $args ) {	
	return substr( $crumb, 0, strrpos( $crumb, $args['sep'] ) );
}

add_action( 'genesis_entry_header', 'them_ten_chuyen_muc_vao_entry_header', 8 );
function them_ten_chuyen_muc_vao_entry_header() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$lang = get_bloginfo('language');

	$categories = get_the_category();

	if ( ! empty( $categories ) ) {
		// Lấy chuyên mục đầu tiên
		$first_category = $categories[0];
		echo '<div class="ten-chuyen-muc">';

		if($lang == 'vi'){
			//echo '<a href="' . esc_url( get_category_link( $first_category->term_id ) ) . '">';
			echo 'Trang chủ / '.esc_html( $first_category->name );
			//echo '</a>';
		}else{
			echo 'Home / '.esc_html( $first_category->name );
		}
		echo '</div>';
	}
}
remove_filter( 'comment_form_defaults', 'caia_custom_reply_title' );
// remove_filter( 'comment_form_defaults', 'rayno_comment_form_args' );
// remove_action('genesis_before_footer','caia_add_content_after_footer');
genesis();