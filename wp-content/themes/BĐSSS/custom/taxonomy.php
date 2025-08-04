<?php

// Xóa post-info và post-meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//Đưa ảnh lên trước tiêu đề
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs',9);


$term_id = get_queried_object_id();

add_action('wp_head','caia_add_class');
function caia_add_class(){ 
	?>
	 <script>
        jQuery(document).ready(function($){
           $("body").addClass("tax-special");
        
        });
    </script>
  	<?php
 }

 //Xóa tiêu đề chuyên mục
remove_action( 'genesis_before_loop', 'caia_archive_heading', 5 );


$term_id = get_queried_object_id();
$meta = get_term_meta( $term_id, 'featured', false );
foreach ( $meta as $value ) {
    if($value == 1){

    	add_action( 'genesis_after_header', 'caia_breadcrumb_taxonomy',9);
		function caia_breadcrumb_taxonomy()
		{

			global $post;

			$term = get_queried_object();

			echo '<div class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList"><div class="wrap">';

				echo '<span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><p class="breadcrumb-link" href="'.home_url().'" itemprop="item"><span class="breadcrumb-link-text-wrap" itemprop="name">Trang chủ </p></span><label>/</label> Sản phẩm & Dịch vụ';

				echo '<h1 class="archive-heading">'.$term->name.'</h1>';

			echo '</div></div>';
		}

		add_action('genesis_after_header','caia_close_div');

    	// lấy chuyên mục con cấp 2
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action ('genesis_loop','get_all_term_parent_2');
		function get_all_term_parent_2(){	    

			$term_id = get_queried_object_id();

	        $second_level_terms = get_terms( array(
	            'taxonomy' =>  'service', 
	            'child_of' => $term_id,
	            'parent' => $term_id, 
	            'hide_empty' => false,
	        ) );


	        if ($second_level_terms) {

	            echo '<div class="list-tax">';

	            foreach ($second_level_terms as $second_level_term) {

	                echo '<div class="tax">';
	                
				   $image_ids = get_term_meta( $second_level_term->term_id, 'image_advanced', false ); 
					foreach ( $image_ids as $image_id ) {
					    $image = RWMB_Image_Field::file_info( $image_id, array( 'size' => 'thumbnail' ) );
					    echo '<p><a href="'.get_term_link( $second_level_term->slug, $second_level_term->taxonomy ).'"><img src="' . $image['url'] . '"></a></p>';
					}

					?> 
						<h2><a href="<?php echo get_term_link( $second_level_term->slug, $second_level_term->taxonomy ); ?>"><?php echo $second_level_term->name; ?></a></h2> 
					<?php

					echo '</div>';

	            }// END foreach

	            wp_reset_postdata(); 

	            echo '</div><!-- END .second-level-terms -->';

	        }
	    }// kết thúc lấy chuyên mục con cấp 2

    }else{

    	add_action( 'genesis_after_header', 'caia_breadcrumb_taxonomy',9);
		function caia_breadcrumb_taxonomy()
		{

			global $post;

			$term = get_queried_object();
			$current_term = get_queried_object();

			echo '<div class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList"><div class="wrap">';

			if ( $current_term && ! is_wp_error( $current_term ) && $current_term->parent != 0 ) {
			    $parent_term = get_term( $current_term->parent, $current_term->taxonomy );

			    echo '<span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a class="breadcrumb-link" href="'.home_url().'" itemprop="item"><span class="breadcrumb-link-text-wrap" itemprop="name">Trang chủ </a></span><label>/</label> Sản phẩm & Dịch vụ <label>/</label>'.$parent_term->name;
			}else{
				echo '<span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a class="breadcrumb-link" href="'.home_url().'" itemprop="item"><span class="breadcrumb-link-text-wrap" itemprop="name">Trang chủ </a></span><label>/</label> Sản phẩm & Dịch vụ';
			}

				echo '<h1 class="archive-heading">'.$term->name.'</h1>';

			echo '</div></div>';
		}

		add_action('genesis_after_header','caia_close_div',9);
    	
    	//Sửa chữ read-more
		add_filter( 'excerpt_more', 'be_more_link' );
		add_filter( 'get_the_content_more_link', 'be_more_link' );
		add_filter( 'the_content_more_link', 'be_more_link' );
		function be_more_link($more_link) {
			return sprintf('', 
			get_permalink(), '');
		}

		// mô tả chuyên mục
		add_action( 'genesis_before_loop', 'caia_add_category_description' );
		function caia_add_category_description(){
			global $post;

			$term_id = get_queried_object_id();
			$mota = get_term_meta( $term_id, 'featured_content', true ); 
			$sl = get_term_meta( $term_id, 'imagecm', false ); 
			

			if( !empty($mota) ){
				echo '<div class="description">';
					
					if(!empty($sl)){
						echo '<div class="left">';
							echo do_shortcode(wpautop($mota));
						echo '</div>';

						echo '<div class="right">';
							echo '<div class="slider-for up">';
								foreach ( $sl as $value ) {
								    $image = RWMB_Image_Field::file_info( $value, array( 'size' => 'thumbnail' ) );
								    echo '<div><img src="' . $image['url'] . '"></div>';
								}
							echo '</div>';

							echo '<div class="slider-nav down">';
								foreach ( $sl as $value ) {
								    $image = RWMB_Image_Field::file_info( $value, array( 'size' => 'thumbnail' ) );
								    echo '<div><img src="' . $image['url'] . '"></div>';
								}
							echo '</div>';

						echo '</div>';
					}else{
						echo do_shortcode(wpautop($mota));
					}
				echo '</div>';		
			}

			echo '<p class="title">Danh sách sản phẩm</p>';
		}

		// Lọc sản phẩm
		add_action( 'genesis_before_loop', 'caia_add_filter_product' );
		function caia_add_filter_product(){
								
            echo '<div class="list-product">';
		}

		add_action( 'genesis_after_loop', 'caia_add_close' );
		function caia_add_close(){
			echo '</div>';
		}

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop' , 'caia_get_sp');
		function caia_get_sp () {
			global $post;

			$term = get_queried_object();

			$args = array(
			    'post_type'      => 'product', // Hoặc post type của bạn
			    'posts_per_page' => -1,
			    'tax_query'      => array(
			        array(
			            'taxonomy' => $term->taxonomy,
			            'field'    => 'term_id',
			            'terms'    => $term->term_id,
			        )
			    )
			);

			$query = new WP_Query($args);



			if ($query->have_posts()) :
				echo '<input type="text" id="productSearch" placeholder="Nhập tên sản phẩm..." ><div class="clear"></div>';
				echo '<div id="tableWrapper" class="scroll-wrapper">';
			    echo '<table id="productTable">';
			    echo '<thead><tr>
			    		<th><span>Tên sản phẩm</span></th>
			    		<th><span>Băng thông<span id="sortYearBtn" data-order="asc" style="cursor:pointer; font-size: 10px"> ▲</span></span></th>
			    		<th><span>Bộ nhớ lớn nhất</span></th>
			    		<th><span>Tốc độ lấy mẫu</span></th>
			    		<th><span>Hệ điều hành</span></th>
			    </tr></thead>';
			    echo '<tbody>';

			    while ($query->have_posts()) : $query->the_post();
			        echo '<tr>';
			        echo '<td>';
			        if (has_post_thumbnail()) {
			            echo '<a href="' . get_permalink() . '">';
			            the_post_thumbnail('thumbnail');

			            echo '</a>';
			        }
			        //echo '</td>';
			        // tên
			        //echo '<td>';
			        echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			        echo '<p>'.wp_trim_words(get_the_content(), 8, '...').'</p>';
			        echo '</td>';
			        // băng thông
			        $thongso = rwmb_meta( 'thongso' );
			        		        	

			        	if(!empty($thongso['bangthong'])){
			        		echo '<td data-bt="'.$thongso['bangthong'].'" >';
			        		echo $thongso['bangthong'];
			        	}else{
			        		echo '<td data-bt="" >';
			        		echo 'Đang cập nhật ...';
			        	}

			        echo '</td>';

			        // bộ nhớ
			        $thongso = rwmb_meta( 'thongso' );
			        		        	

			        	if(!empty($thongso['ram'])){
			        		echo '<td>';
			        		echo $thongso['ram'];
			        	}else{
			        		echo '<td>';
			        		echo 'Đang cập nhật ...';
			        	}

			        echo '</td>';

			        // tốc độ

			        $thongso = rwmb_meta( 'thongso' );
			        		        	

			        	if(!empty($thongso['tocdo'])){
			        		echo '<td>';
			        		echo $thongso['tocdo'];
			        	}else{
			        		echo '<td>';
			        		echo 'Đang cập nhật ...';
			        	}

			        echo '</td>';


			        // hệ điều hành

			        $thongso = rwmb_meta( 'thongso' );
			        		        	

			        	if(!empty($thongso['hdh'])){
			        		echo '<td>';
			        		echo $thongso['hdh'];
			        	}else{
			        		echo '<td>';
			        		echo 'Đang cập nhật ...';
			        	}

			        echo '</td>';

			        echo '</tr>';
			    endwhile;
			    echo '</tbody>';
			    echo '</table>';
			    echo '</div>';

			    wp_reset_postdata();
			else :
			    echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
			endif;


		}
		
    }
}

// Mobile
if (isset($caia_detected_device) && ( $caia_detected_device == 'Mobile' || $caia_detected_device == 'Tablet') ){

}