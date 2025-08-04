<?php

// Thêm nôi dung slider trang chủ
add_action('genesis_after_header','caia_add_content_slider');
function caia_add_content_slider(){

	if( is_active_sidebar( 'content-feature_product' ) ){
		echo '<div class="content-feature_product section">
		 <div class="overlay"></div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Sản phẩm nổi bật' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-thanhqua' ) ){
		echo '<div class="content-thanhtuu section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Thành tựu' );
		echo '</div></div>';
	}

if( is_active_sidebar( 'content-temkimloai' ) ){
	echo '<div class="content-temkimloai section">
		<div class="custom-navigation navigation-kimloai">
			<div class="swiper-button-prev custom-prev-kimloai"></div>
			<div class="swiper-button-next custom-next-kimloai"></div>
		</div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Huy chương' );
	echo '</div></div>';
}



if( is_active_sidebar( 'content-temnhua' ) ){
	echo '<div class="content-temnhua section">
		<div class="custom-navigation navigation-nhua">
			<div class="swiper-button-prev custom-prev-nhua"></div>
			<div class="swiper-button-next custom-next-nhua"></div>
		</div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Móc khoá' );
	echo '</div></div>';
}



	if( is_active_sidebar( 'content-temnganhnghe' ) ){
		echo '<div  class="content-temnganhnghe section">
		<div class="custom-navigation navigation-temnganhnghe">
			<div class="swiper-button-prev custom-prev-temnganhnghe"></div>
			<div class="swiper-button-next custom-next-temnganhnghe"></div>
		</div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tem ngành nghề' );
		echo '</div></div>';
	}


	    if( is_active_sidebar( 'content-banner' ) ){
		echo '<div  class="content-banner section"><div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Banner' );
		echo '</div></div>';
	}

	if( is_active_sidebar( 'content-temvatlieu' ) ){
		echo '<div class="content-temvatlieu section">
		<div class="custom-navigation navigation-temvatlieu">
			<div class="swiper-button-prev custom-prev-temvatlieu"></div>
			<div class="swiper-button-next custom-next-temvatlieu"></div>
		</div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Tem vật liệu' );
		echo '</div></div>';
	}
	
		if( is_active_sidebar( 'content-biencongty' ) ){
		echo '<div class="content-biencongty section">
		<div class="custom-navigation navigation-biencongty">
			<div class="swiper-button-prev custom-prev-biencongty"></div>
			<div class="swiper-button-next custom-next-biencongty"></div>
		</div>
		<div class="wrap">';
			dynamic_sidebar( 'Trang chủ - Biển công ty' );
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