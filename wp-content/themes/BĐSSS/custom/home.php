<?php

// Thêm nôi dung slider trang chủ
add_action('genesis_after_header','caia_add_content_slider');
function caia_add_content_slider(){

	if( is_active_sidebar( 'content-background' ) ){
		echo '<div class="content-background section">
		 <div class="bg-opacity"></div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Nổi bật' );
		echo '</div></div>';
	}
	

			if( is_active_sidebar( 'content-tieudetongquan' ) ){
		echo '<div id="section-b" class="content-tieudetongquan section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tiêu đề tổng quan dự án' );
		echo '</div></div>';
	}

		if( is_active_sidebar( 'content-tongquan' ) ){
		echo '<div id="tongquan" class="content-tongquan section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tổng quan dự án' );
		echo '</div></div>';
	}

			if( is_active_sidebar( 'content-vitri' ) ){
		echo '<div id="vitri" class="content-vitri section">
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Vị trí' );
		echo '</div></div>';
	}


	if( is_active_sidebar( 'content-thanhqua' ) ){
		echo '<div class="content-thanhtuu section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Thành tựu' );
		echo '</div></div>';
	}



	if( is_active_sidebar( 'content-quytrinhthietke' ) ){
		echo '<div class="content-quytrinhthietke section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Quy trình thiết kế' );
		echo '</div></div>';
	}

		if( is_active_sidebar( 'content-doitac' ) ){
		echo '<div class="content-doitac section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Đối tác' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-feedback-title' ) ){
		echo '<div  class="content-feedback-title section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Feedback-Tiêu đề' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-feedback' ) ){
		echo '<div  class="content-feedback section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Feedback' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-news' ) ){
		echo '<div  class="content-news section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tin tức' );
		echo '</div></div>';
	}
	
}

if (wp_is_mobile() ){

}