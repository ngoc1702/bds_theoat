<?php

// Bật HTML5
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Thêm metabox
include('metabox.php');

// Thêm caiajs
include('js/caiajs.php');

// Thêm jquery
add_action('wp_enqueue_scripts', 'caia_add_scripts_homes');
function caia_add_scripts_homes(){
	wp_enqueue_script('caia-slick', CHILD_URL.'/custom/js/slick.js', array('jquery'));
}

function add_swiper_webcomponent_script() {
    echo '<script type="module">
      import "https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js";
    </script>';
}
add_action('wp_footer', 'add_swiper_webcomponent_script');




add_action('wp_enqueue_scripts', 'custom_override_style', 100);
function custom_override_style() {
    // Đảm bảo đúng với theme con
    $style_path = get_stylesheet_directory() . '/style.css';
    $version = file_exists($style_path) ? filemtime($style_path) : time();

    // Handle thực tế (cập nhật lại nếu bạn tìm thấy tên khác sau bước kiểm tra)
    $handle = 'caia';

    // Gỡ bỏ và thêm lại
    wp_dequeue_style($handle);
    wp_deregister_style($handle);
    wp_enqueue_style($handle, get_stylesheet_uri(), array(), $version);
}

//Cho phép upload ảnh định dạng Svg
add_filter('upload_mimes', 'caia_mime_types', 1, 1);
function caia_mime_types($mime_types){  
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
}

add_filter( 'wp_check_filetype_and_ext', 'caia_disable_real_mime_check', 10, 4 );
function caia_disable_real_mime_check( $data, $file, $filename, $mimes ) {
	$wp_filetype = wp_check_filetype( $filename, $mimes );
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];
	$proper_filename = $data['proper_filename'];
	return compact( 'ext', 'type', 'proper_filename' );
}

// Xóa các kích thước mặc định trong Wordpress
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
function prefix_remove_default_images( $sizes ){
	unset( $sizes['medium']);
	unset( $sizes['large']);
	unset( $sizes['medium_large']);
	unset( $sizes['1536x1536']);
	unset( $sizes['2048x2048']);
	return $sizes;
}

// Ẩn hiển thị các kích thước ảnh mặc định
add_filter( 'intermediate_image_sizes', function( $sizes ){
    return array_filter( $sizes, function( $val ){
        return 'medium' !== $val && 'medium_large' !== $val && 'large' !== $val && '1536x1536' !== $val && '2048x2048' !== $val;
    });
});

// Đặt kích thước mặc định cho website
update_option( 'thumbnail_size_w', 750 );
update_option( 'thumbnail_size_h', 395 );

// Thêm kích thước ảnh sản phẩm
add_image_size('product-image',640,640,true);
add_image_size('product-avatar',300,300,true);

add_filter( 'image_size_names_choose', 'caia_custom_sizes' );
function caia_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
		'product-image' => __( 'Kích thước 640x640' ),
    ));
}

// Bỏ toàn bộ thẻ H4 khỏi tiêu đề widget
add_filter( 'genesis_register_widget_area_defaults', 'caia_change_all_widget_titles' );
function caia_change_all_widget_titles( $defaults ) { 
	$defaults['before_title'] = '<div class="widget-title widgettitle">';
	$defaults['after_title'] = "</div>";
	return $defaults;
}

// Thêm thẻ đóng mở cho tiêu đề của widget
add_filter( 'widget_title', 'caia_add_html_widget_title' );
function caia_add_html_widget_title( $title ) {	
	$title = str_replace( '[span]', '<span>', $title );
	$title = str_replace( '[/span]', '</span>', $title );	
	return $title;
}

// Thêm font
add_action('wp_head','caia_add_font_website');
function caia_add_font_website(){
	?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php
}

genesis_register_sidebar( 
	array(
		'id'			=> 'nhantuvan',
		'name'			=> 'Toàn bộ - Nhận tư vấn',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-background',
		'name'			=> 'Trang chủ - Nổi bật',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-moban1',
		'name'			=> 'Trang chủ - Mở bán 1',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-moban2',
		'name'			=> 'Trang chủ - Mở bán 2',
	)
);



genesis_register_sidebar( 
	array(
		'id'			=> 'content-tongquan',
		'name'			=> 'Trang chủ - Tổng quan dự án',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-vitri1',
		'name'			=> 'Trang chủ - Vị trí dự án 1',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-vitri2',
		'name'			=> 'Trang chủ - Vị trí dự án 2',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-matbang',
		'name'			=> 'Trang chủ - Mặt bằng',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-tuvan',
		'name'			=> 'Trang chủ - Tư vấn',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-sanpham',
		'name'			=> 'Trang chủ - Sản phẩm',
	)
);


genesis_register_sidebar( 
	array(
		'id'			=> 'content-tienich',
		'name'			=> 'Trang chủ - Tiện ích',
	)
);



genesis_register_sidebar( 
	array(
		'id'			=> 'content-lienhe',
		'name'			=> 'Trang chủ - Liên hệ',
	)
);

// genesis_register_sidebar( 
// 	array(
// 		'id'			=> 'content-feedback-title',
// 		'name'			=> 'Trang chủ - Feedback-Tiêu đề',
// 	)
// );


// genesis_register_sidebar( 
// 	array(
// 		'id'			=> 'content-feedback',
// 		'name'			=> 'Trang chủ - Feedback',
// 	)
// );



genesis_register_sidebar( 
	array(
		'id'			=> 'content-news',
		'name'			=> 'Trang chủ - Tin tức',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'page_blog',
		'name'			=> 'Trang Blog',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-contact',
		'name'			=> 'Toàn bộ - Liên hệ tư vấn',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-bfooter',
		'name'			=> 'Toàn bộ - Nội dung trước chân trang',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-footer',
		'name'			=> 'Toàn bộ - Nội dung chân trang',
	)
);

genesis_register_sidebar( 
	array(
		'id'			=> 'content-fix',
		'name'			=> 'Toàn bộ - Nội dung cố định',
	)
);

add_action('genesis_before_header','caia_add_contactus');
function caia_add_contactus(){
	if( is_active_sidebar( 'nhantuvan' ) ){
		echo '<div class="nhantuvan section"><div class="wrap">';
			dynamic_sidebar( 'Toàn bộ - Nhận tư vấn' );
		echo '</div></div>';
	}
}


remove_action('genesis_footer','genesis_do_footer');
add_action('genesis_footer','caia_add_content_footer');
function caia_add_content_footer(){
	if( is_active_sidebar( 'content-footer' ) ){
		dynamic_sidebar( 'Toàn bộ - Nội dung chân trang' );		
	}
}

add_action('genesis_before_footer','caia_add_content_after_footer',8);
function caia_add_content_after_footer(){
	echo '<div data-aos="fade-up" class="content-contact section"><div class="wrap">';
		dynamic_sidebar( 'Toàn bộ - Liên hệ tư vấn' );
	echo '</div></div>';
}

add_action('genesis_before_footer','caia_add_content_after_footer2');
function caia_add_content_after_footer2(){
	echo '<div class="before_footer section"><div class="wrap"><div class="wrap-section">';

		dynamic_sidebar( 'Toàn bộ - Nội dung trước chân trang' );
	echo '</div></div></div>';
}

add_action('genesis_after_footer','caia_add_content_fix');
function caia_add_content_fix(){
	if( is_active_sidebar( 'content-fix' ) ){
		echo '<div class="content-fix">';
			dynamic_sidebar( 'Toàn bộ - Nội dung cố định' );		
		echo '</div>';
	}
}

// Chỉnh hiển thị nút Next Page và Previous Page trong phân trang
add_filter ( 'genesis_next_link_text' , 'caia_next_page_link' );
function caia_next_page_link( $text ) {
    return '&#x000BB;';
}

add_filter ( 'genesis_prev_link_text' , 'caia_previous_page_link' );
function caia_previous_page_link( $text ) {
    return '&#x000AB;';
}

// Thay đổi vị trí breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_after_header', 'genesis_do_breadcrumbs',9);

// Tùy biến breadcrumbs trong Genesis
add_filter( 'genesis_breadcrumb_args', 'caia_breadcrumb_args' );
function caia_breadcrumb_args( $args ){
	$args['home'] = '<span class="home">Trang chủ</span>';
	$args['sep'] = '<span aria-label="breadcrumb separator" class="label"> » </span>';
	$args['list_sep'] = ', ';
	$args['prefix'] = '<div class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList"><div class="wrap"><div class="thanhdieuhuong">';
	$args['suffix'] = '</div></div></div>';
	$args['heirarchial_attachments'] = true;
	$args['heirarchial_categories']  = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = '';
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['search'] = '';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';
	$args['labels']['404'] = '';
	return $args;
}

// Sửa form tìm kiếm
// add_filter( 'genesis_search_text', 'custom_search_text' );
// function custom_search_text($text) {
// 	if(ICL_LANGUAGE_CODE=='vi'){
// 		return esc_attr( 'Tìm kiếm...' );
// 	}else{
// 		return esc_attr( 'Search...' );
// 	}
// }

// add_filter('genesis_search_button_text', 'custom_search_button_text');
// function custom_search_button_text($text) {
// 	if(ICL_LANGUAGE_CODE=='vi'){
// 		return esc_attr( 'Tìm' );
// 	}else{
// 		return esc_attr( 'Search' );
// 	}
// }

// Thiết kế lại form comment
add_filter( 'comment_form_defaults', 'rayno_comment_form_args' );
function rayno_comment_form_args($defaults) {
	global $user_identity, $id;
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? ' aria-required="true"' : '' );
	$author = '<div class="popup-comment"><div class="box-comment"><span class="close-popup-comment">✕</span><p>Bạn vui lòng điền thêm thông tin!</p><p class="comment-form-author">' .
	          '<input id="author" name="author" type="text" class="author" placeholder="Họ và tên" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $aria_req . '/>' .
	          '</p>';
	$email = '<p class="comment-form-email">' .
	         '<input id="email" name="email" type="text" class="email" placeholder="Email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />' .
	         '</p>';
	$comment_field = '<p class="comment-form-comment">' .
	                 '<textarea id="comment" name="comment" cols="45" rows="8" class="form" tabindex="4" aria-required="true" placeholder="Nội dung bình luận"></textarea>' .
	                 '</p>';
	$args = array(
		'fields' => array(
		'author' => $author,
		'email'  => $email,
		),
		'comment_field'        => $comment_field,
		'title_reply'          => __( 'Bình luận của bạn', 'genesis' ),
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
	);
	$args = wp_parse_args( $args, $defaults );
	return apply_filters( 'raynoblog_comment_form_args', $args, $user_identity, $id, $commenter, $req, $aria_req );
}

// Sửa nút comment
add_filter( 'comment_form_defaults', 'caia_change_submit_comment' );
function caia_change_submit_comment( $defaults ){
    $defaults['label_submit'] = 'Gửi đi';
    return $defaults;
}

// Sửa chữ comment
add_filter( 'genesis_title_comments', 'caia_title_comments' );
function caia_title_comments() {
	echo '';
}

// Thay đổi chữ says
add_filter('comment_author_says_text', 'caia_change_says');
function caia_change_says($args){
	$args = 'đã bình luận';
	return $args;
}

// Sửa thẻ h4 ý kiến của bạn
add_filter( 'comment_form_defaults', 'caia_custom_reply_title' );
function caia_custom_reply_title( $defaults ){
	$defaults['title_reply_before'] = '<p id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after'] = '</p>';
	return $defaults;
}

// Thêm nút comment
add_action( 'comment_form_logged_in_after', 'additional_fields',1 );
add_action( 'comment_form_after_fields', 'additional_fields',1 );
function additional_fields (){
	if(!is_user_logged_in()){
		echo '<p class="comment-form-phone"><input id="author" name="phone" type="text" size="30" tabindex="4" placeholder="Số điện thoại"/></p>
		<p><input name="actionsubmit" type="hidden" value="1" /><input id="submit-commnent" name="submit-commnent" type="submit" value="Hoàn tất" /></p></div></div>';
	}
}

// Lưu nội dung comment 
add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ){
	if ( ( isset( $_POST['phone'] ) ) && ( $_POST['phone'] != '') )
	$phone = wp_filter_nohtml_kses($_POST['phone']);
	add_comment_meta( $comment_id, 'phone', $phone );
}

// Add the filter to check if the comment meta data has been filled or not
add_filter( 'preprocess_comment', 'verify_comment_meta_data', 1, 1 );
function verify_comment_meta_data( $commentdata ){
	$commentdata['phone'] = ( ! empty ( $_POST['phone'] ) ) ? sanitize_text_field( $_POST['phone'] ) : false;
	if ( ! $commentdata['phone'] && ! is_admin() ){
		wp_die( __( '<p>Lỗi: Vui lòng điền số điện thoại</p><a href="javascript:history.back()">« Quay lại</a>' ) );
	}	
    return $commentdata;
}

// Thêm nút trong trang quản trị 
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box() {
    add_meta_box( 'title', __( 'Thông tin số điện thoại khách hàng' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}
 
function extend_comment_meta_box ( $comment ){
    $phone = get_comment_meta( $comment->comment_ID, 'phone', true );
    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?><p><label for="phone"><?php _e( 'Số điện thoại' ); ?></label><input type="text" name="phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat" /></p><?php
}

// Cập nhật khi thay đổi 
add_action( 'edit_comment', 'extend_comment_edit_metafields' );
function extend_comment_edit_metafields( $comment_id ){
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) return;
	if ( ( isset( $_POST['phone'] ) ) && ( $_POST['phone'] != '') ) : 
	$phone = wp_filter_nohtml_kses($_POST['phone']);
	update_comment_meta( $comment_id, 'phone', $phone );
	else :
	delete_comment_meta( $comment_id, 'phone');
	endif;
}

//Thêm cột số điện thoại trong admin
add_filter( 'manage_edit-comments_columns', 'myplugin_comment_columns' );
function myplugin_comment_columns( $columns ){
	return array_merge( $columns, array(
		'phone' => __( 'Số điện thoại' ),
	) );
}

add_filter( 'manage_comments_custom_column', 'myplugin_comment_column', 10, 2 );
function myplugin_comment_column( $column, $comment_ID ){
	switch ( $column ) {
		case 'phone':
			if ( $meta = get_comment_meta( $comment_ID, $column , true ) ) {
				echo $meta;
			} else {
				echo '-';
			}
		break;
	}
}

add_action('admin_head', 'my_column_width');
function my_column_width() {
    echo '<style type="text/css">';
    echo 'th#phone {width: 15%;}';
    echo '</style>';
}

function wp_youtube_video($atts) {
         extract(shortcode_atts(array(

              'id'    => '',
              'width'   => '',
              'height'  => ''

         ), $atts));

        return '<div class="embed-video"><iframe id="videoIframe" width="'.$atts['width'].'" height="'.$atts['height'].'" src="https://www.youtube.com/embed/'.$atts['id'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
    }
add_shortcode('youtube', 'wp_youtube_video');



// Tạo chuyên mục cho sản phẩm
add_action( 'init', 'caia_create_category_product', 0 );
function caia_create_category_product() {
    $labels = array(
            'name' => 'Chuyên mục sản phẩm',
            'singular' => 'Chuyên mục sản phẩm',
            'menu_name' => 'Chuyên mục sản phẩm'
    );
    $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array( 'slug' => 'danh-muc-san-pham' ),
    );
    register_taxonomy('product_cat', 'product', $args);
    //flush_rewrite_rules(); 
}

// Tạo thẻ cho sản phẩm
add_action( 'init', 'caia_create_tag_product', 0 );
function caia_create_tag_product() {
    $labels = array(
            'name' => 'Thẻ sản phẩm',
            'singular' => 'Thẻ sản phẩm',
            'menu_name' => 'Thẻ sản phẩm'
    );
    $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array( 'slug' => 'the-san-pham' ),
    );
    register_taxonomy('product_tag', 'product', $args);
   // flush_rewrite_rules(); 
}

// Tạo sản phẩm
add_action( 'init', 'caia_custom_post_type', 0 );
function caia_custom_post_type() {
	$labels = array(
		'name'                => __( 'Sản phẩm'),
		'singular_name'       => __( 'Sản phẩm'),
		'menu_name'           => __( 'Sản phẩm'),
		'parent_item_colon'   => __( 'Sản phẩm cha'),
		'all_items'           => __( 'Tất cả sản phẩm'),
		'view_item'           => __( 'Xem sản phẩm'),
		'add_new_item'        => __( 'Thêm mới sản phẩm'),
		'add_new'             => __( 'Thêm mới'),
		'edit_item'           => __( 'Sửa sản phẩm'),
		'update_item'         => __( 'Cập nhật sản phẩm'),
		'search_items'        => __( 'Tìm kiếm sản phẩm'),
		'not_found'           => __( 'Không tìn thấy'),
		'not_found_in_trash'  => __( 'Không tìm thấy'),
	);
	$args = array(
		'label'               => __( 'Sản phẩm'),
		'description'         => __( 'Sản phẩm'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'genesis-scripts', 'thumbnail', 'revisions', 'excerpt', 'comments'),
		'taxonomies'          => array( 'product_cat', 'tags' ),
		'hierarchical'        => false,
		'public'              => true,
		'menu_icon'  		  => 'dashicons-cart',
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'rewrite'			  => array('slug' => 'san-pham'),
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );
}

// Tạo khung lọc sản phẩm theo chuyên mục trong admin
add_action( 'restrict_manage_posts', 'caia_filter_customs_taxonomy_product' );
function caia_filter_customs_taxonomy_product() {
	global $typenow;
	$taxonomies = array('product_cat');
	if( $typenow == 'product' ){
		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>$tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}

// Phân trang chuyên mục sản phẩm
add_action( 'pre_get_posts',  'change_number_posts_per_category'  );
function change_number_posts_per_category( $query ) {
	if( is_tax( 'product_cat' ) || is_tax( 'product_tag') ){
	    $query->set( 'posts_per_page', 12 );
		return $query;	
	}
}





// Mobile
if (wp_is_mobile() ){
	// remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	// wp_enqueue_style( 'style-mobile', CHILD_URL.'/style-mobile.css' );

}