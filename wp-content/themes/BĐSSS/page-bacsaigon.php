<?php

/* Template Name: Trang CTCP Bắc Sài Gòn */

add_filter( 'genesis_site_layout', 'caia_cpt_layout' );
function caia_cpt_layout() {
  return 'full-width-content';
}


// Xóa tiêu đề
remove_action('genesis_entry_header', 'genesis_do_post_title');
// Xóa social share
add_action('genesis_before_loop', 'cong_ty_bac_sai_gon');

// Xóa post-info và post-meta
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_footer', 'genesis_post_meta');

remove_action('genesis_loop', 'genesis_do_loop');
function cong_ty_bac_sai_gon() {
    global $post;
    $tieude = get_post_meta($post->ID, 'tieude', true);
	$gioithieu = rwmb_meta( 'gioithieu');

    echo '<div class="content-bacsaigon section">';
    echo '<div class="widgettd">' . $tieude . '</div>';

    if ($gioithieu) {
    echo '<div class="gioithieu-wrapper">';
    
    // Lấy trực tiếp từng field
    $nd1 = isset($gioithieu['nd1']) ? $gioithieu['nd1'] : '';
    $nd2 = isset($gioithieu['nd2']) ? $gioithieu['nd2'] : '';
    
    if ($nd1) {
        echo '<div class="content-1">' . wpautop($nd1) . '</div>';
    }
    if ($nd2) {
        echo '<div class="content-2">' . wpautop($nd2) . '</div>';
    }
    
    echo '</div>';
}

    echo '</div>';
}



// Thêm bài viết liên quan
add_action( 'genesis_before_footer', 'caia_add_post_YARPP', 7 );
function caia_add_post_YARPP(){
	yarpp_related(
		array(
			'post_type' => 'post',
			'threshold' => 1,
			'template' => 'yarpp-template-post.php',
			'limit' => 3,
		)
	);
}


// Mobile
if (wp_is_mobile()) {
}

genesis();
