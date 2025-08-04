<?php

// Thêm nôi dung slider trang chủ
add_action('genesis_after_header','caia_add_content_slider');
function caia_add_content_slider(){
	if( is_active_sidebar( 'content-slider' ) ){
		echo '<div  class="content-slider section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Nội dung slider' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-doitac' ) ){
		echo '<div data-aos="fade-up" class="content-doitac section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Đối tác' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-thanhqua' ) ){
		echo '<div  class="content-thanhtuu section bg-red-800"><div class="wrap"><div class="wrap-thanhtuu">';
			dynamic_sidebar( 'Trang chủ - Thành tựu' );
		echo '</div></div></div>';
	}
	
	if( is_active_sidebar( 'doitac-gg' ) ){
		echo '<div data-aos="fade-up" class="doitac-gg section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Đối tác Google' );
		echo '</div></div>';
	}
	if( is_active_sidebar( 'content-dichvu' ) ){
		echo '<div data-aos="fade-up" class="content-dichvu section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Dịch vụ' );
		echo '</div></div>';
	}
	if( is_active_sidebar( 'content-lydo' ) ){
		echo '<div data-aos="fade-up" class="content-lydo section"><div class="wrap">';
		   echo '<div class="lydo lydo1">';
				dynamic_sidebar( 'Trang chủ - Lý do 1' );
			echo '</div>';	
			echo '<div class="lydo lydo2">';
				dynamic_sidebar( 'Trang chủ - Lý do 2' );
			echo '</div>';	
		echo '</div></div>';
	}
	if( is_active_sidebar( 'content-news' ) ){
		echo '<div data-aos="fade-up" class="content-news section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tin tức' );
		echo '</div></div>';
	}
	
}

if (wp_is_mobile() ){

}