<?php

// Thêm nôi dung slider trang chủ
add_action('genesis_after_header','caia_add_content_slider');
function caia_add_content_slider(){


if ( is_active_sidebar( 'content-video' ) ) {
    echo '<div class="content-video section">';
    dynamic_sidebar( 'content-video' );
    echo '</div>';
}


	// if( is_active_sidebar( 'content-background' ) ){
	// 	echo '<div id="noibat" class="content-background section">
	// 	 <div class="bg-opacity"></div>
	// 	<div class="wrap">';
	// 		dynamic_sidebar( 'Trang chủ - Nổi bật' );
	// 	echo '</div></div>';
	// }

				if( is_active_sidebar( 'content-moban1' ) ){
		echo '<div  class="content-moban1 section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Mở bán 1' );
		echo '</div></div>';
	}

					if( is_active_sidebar( 'content-moban2' ) ){
		echo '<div  class="content-moban2 section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Mở bán 2' );
		echo '</div></div>';
	}
	


		if( is_active_sidebar( 'content-tongquan' ) ){
		echo '<div id="tongquan" class="content-tongquan section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tổng quan dự án' );
		echo '</div></div>';
	}

			if( is_active_sidebar( 'content-vitri1' ) ){
		echo '<div id="vitri" class="content-vitri1 section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Vị trí dự án 1' );
		echo '</div></div>';
	}

				if( is_active_sidebar( 'content-vitri2' ) ){
		echo '<div class="content-vitri2 section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Vị trí dự án 2' );
		echo '</div></div>';
	}



	if( is_active_sidebar( 'content-matbang' ) ){
		echo '<div id="matbang" class="content-matbang section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Mặt bằng' );
		echo '</div></div>';
	}

		if( is_active_sidebar( 'content-tuvan' ) ){
		echo '<div class="content-tuvan section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tư vấn' );
		echo '</div></div>';
	}

			if( is_active_sidebar( 'content-sanpham' ) ){
		echo '<div id="sanpham" class="content-sanpham section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Sản phẩm' );
		echo '</div></div>';
	}
   

	if( is_active_sidebar( 'content-tienich' ) ){
		echo '<div id="tienich" class="content-tienich section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tiện ích' );
		echo '</div></div>';
	}


	if( is_active_sidebar( 'content-news' ) ){
		echo '<div id="tinthitruong"  class="content-news section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tin tức' );
		echo '</div></div>';
	}

	// 		if( is_active_sidebar( 'content-thanhvien' ) ){
	// 	echo '<div  class="content-thanhvien section"><div class="wrap">';
	// 		dynamic_sidebar( 'Trang chủ - Thành viên' );
	// 	echo '</div></div>';
	// }
	
}

if (wp_is_mobile() ){

}