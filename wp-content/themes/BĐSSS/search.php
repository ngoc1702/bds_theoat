<?php

global $wp_query;
$id_category_product = caia_get_option('id_category_product');
$id_category_product = explode(',', $id_category_product );
$sub_cats[] = $id_category_product;
foreach( $id_category_product as $id ){
	$sub_cats = get_term_children( $id, 'category' );
	$sub_cats = array_merge( $sub_cats, $sub_cats );
}
$id_category_product =  array_merge( $id_category_product, $sub_cats  );
$args = array_merge( $wp_query->query, array( 'post_type' => 'post', 'posts_per_page' => 12, 'post_status' => 'publish', 'category__not_in' => $id_category_product ) );
query_posts( $args );

// Đặt class riêng
add_filter( 'body_class','wp_body_classes_new' );
function wp_body_classes_new( $classes ) {
    $classes[] = 'class-new';
    return $classes;
}	

// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//Đưa ảnh lên trước tiêu đề
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

//Sửa chữ read-more
add_filter( 'excerpt_more', 'be_more_link' );
add_filter( 'get_the_content_more_link', 'be_more_link' );
add_filter( 'the_content_more_link', 'be_more_link' );
function be_more_link($more_link) {
	$lang = get_bloginfo('language');
	// if($lang == 'vi'){
	// 	return sprintf('...<a href="%s" class="more-link">%s</a>', get_permalink(), 'Tìm hiểu thêm');
	// }else{
	// 	return sprintf('...<a href="%s" class="more-link">%s</a>', get_permalink(), 'See more');
	// }
}

genesis();