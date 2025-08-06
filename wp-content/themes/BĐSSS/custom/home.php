<?php

// Thêm nôi dung slider trang chủ
add_action('genesis_after_header','caia_add_content_slider');
function caia_add_content_slider(){

	if( is_active_sidebar( 'content-background' ) ){
		echo '<div id="noibat" class="content-background section">
		 <div class="bg-opacity"></div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Nổi bật' );
		echo '</div></div>';
	}
	

			if( is_active_sidebar( 'content-tieudetongquan' ) ){
		echo '<div  id="tongquan" class="content-tieudetongquan section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tiêu đề tổng quan dự án' );
		echo '</div></div>';
	}

		if( is_active_sidebar( 'content-tongquan' ) ){
		echo '<div class="content-tongquan section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tổng quan dự án' );
		echo '</div></div>';
	}

			if( is_active_sidebar( 'content-vitri' ) ){
		echo '<div id="vitri" class="content-vitri section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Vị trí dự án' );
		echo '</div></div>';
	}


	if( is_active_sidebar( 'content-matbang' ) ){
		echo '<div id="matbang" class="content-matbang section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Mặt bằng' );
		echo '</div></div>';
	}



	if( is_active_sidebar( 'content-tienich' ) ){
		echo '<div id="tienich" class="content-tienich section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tiện ích' );
		echo '</div></div>';
	}

		if( is_active_sidebar( 'content-lienhe' ) ){
		echo '<div id="lienhe" class="content-lienhe section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Liên hệ' );
		echo '</div></div>';
	}

	// if( is_active_sidebar( 'content-feedback-title' ) ){
	// 	echo '<div  class="content-feedback-title section"><div class="wrap">';
	// 		dynamic_sidebar( 'Trang chủ - Feedback-Tiêu đề' );
	// 	echo '</div></div>';
	// }

	// if( is_active_sidebar( 'content-feedback' ) ){
	// 	echo '<div  class="content-feedback section"><div class="wrap">';
	// 		dynamic_sidebar( 'Trang chủ - Feedback' );
	// 	echo '</div></div>';
	// }

	if( is_active_sidebar( 'content-news' ) ){
		echo '<div id="tinthitruong"  class="content-news section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tin tức' );
		echo '</div></div>';
	}
	
}

if (wp_is_mobile() ){

}