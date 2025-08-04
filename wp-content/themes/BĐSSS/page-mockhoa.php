<?php

/* Template Name: Trang móc khoá */


// Xóa tiêu đề
//remove_action('genesis_entry_header', 'genesis_do_post_title');

add_filter('genesis_site_layout', 'caia_cpt_layout');
function caia_cpt_layout()
{
	return 'full-width-content';
}


// Xóa social share
add_action('genesis_before_loop', 'remove_caia_rating');
function remove_caia_rating()
{
	global $caia_rating;
	$star_pri = has_filter('the_content', array($caia_rating, 'add_rating_content_bottom'));
	if ($star_pri !== false) {
		remove_filter('the_content', array($caia_rating, 'add_rating_content_bottom'), $star_pri);
	}

	global $caia_social;
	$social_pri = has_filter('the_content', array($caia_social, 'add_native_share_button_at_bottom'));
	if ($social_pri !== false) {
		remove_filter('the_content', array($caia_social, 'add_native_share_button_at_bottom'), $social_pri);
	}
}

// Xóa post-info và post-meta
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_footer', 'genesis_post_meta');

remove_action('genesis_after_header', 'genesis_do_breadcrumbs', 9);

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'caia_add_choose');

function caia_add_choose()
{
	// Đặt slug hoặc ID của category cha muốn active mặc định
	$active_cat_slug = 'moc-khoa';


	$parent_categories = get_terms([
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'parent'     => 0,
		'orderby'    => 'id',
		'order' => 'ASC'
	]);

	if (!empty($parent_categories) && !is_wp_error($parent_categories)) {
		echo '<div class="category-product-wrapper pc-view" >';

		// Sidebar category
		echo '<div class="category-sidebar">';
		echo '<p class="category-title">Danh mục</p>';
		echo '<ul id="cat-list">';

		$firstCatId = null;

		foreach ($parent_categories as $i => $parent_cat) {
			// Xác định active dựa vào slug
			$active = ($parent_cat->slug === $active_cat_slug) ? 'active' : '';
			if ($parent_cat->slug === $active_cat_slug) {
				$firstCatId = $parent_cat->term_id;
			}

			// Lấy danh mục con
			$child_cats = get_terms([
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
				'parent'     => $parent_cat->term_id,
				'orderby'    => 'id',
				'order'      => 'ASC',
			]);

			$has_child = !empty($child_cats) && !is_wp_error($child_cats);

			echo '<li class="cat-item ' . $active . '" data-cat="cat-' . $parent_cat->term_id . '" >';
			echo esc_html($parent_cat->name);
			if ($has_child) {
				echo ' <span class="toggle-subcat" style="margin-left:8px;cursor:pointer;">+</span>';
			}
			echo '</li>';

			if ($has_child) {
				echo '<ul class="sub-cat-list" style="padding-left:20px;margin-top:4px;display:none;">';
				foreach ($child_cats as $child_cat) {
					echo '<li class="cat-item cat-child" data-cat="cat-' . $child_cat->term_id . '">';
					echo esc_html($child_cat->name);
					echo '</li>';
				}
				echo '</ul>';
			}
		}

		echo '</ul>';
		echo '</div>'; 

		// Product list
		echo '<div class="product-content">';

		$all_categories = get_terms([
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		]);

		foreach ($all_categories as $category) {
			$args = [
				'post_type'      => 'product',
				'posts_per_page' => -1,
				'tax_query'      => [
					[
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => $category->slug,
					],
				],
			];
			$query = new WP_Query($args);

			if ($query->have_posts()) {
				$is_active = $category->term_id === $firstCatId;
				$active_class = $is_active ? 'active' : '';
				echo '<div class="product-list cat-' . $category->term_id . ' ' . $active_class . '">';
				while ($query->have_posts()) {
					$query->the_post();
					echo '<div class="product-card">';
					if (has_post_thumbnail()) {
						echo '<div class="product-thumb">';
						echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</a>';
						echo '</div>';
					}
					$terms = get_the_terms(get_the_ID(), 'product_cat');
						$category_name = '';
						if ($terms && !is_wp_error($terms)) {
  						  $category_name = $terms[0]->name;
							}
						echo '<p class="name-category">' . esc_html($category_name) . '</p>';
					echo '<div class="product-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
					echo '</div>';
				}
				echo '</div>';
			}

			wp_reset_postdata();
		}

		echo '</div>'; 
		echo '</div>';



        // MOBILEEEEEEEEEEEEEEEEEEEEEEEEEEEE
        echo '<div class="category-product-wrapper-mobile mobile-view"><div class="wrap">';

$parent_term = get_term_by('slug', $active_cat_slug, 'product_cat');

if ($parent_term) {
    $child_categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent' => $parent_term->term_id,
        'orderby' => 'id',
        'order' => 'ASC'
    ]);

    foreach ($child_categories as $child_cat) {
        echo '<div class="mobile-cat-title"><h3>' . esc_html($child_cat->name) . '</h3><hr></div>';

        $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $child_cat->term_id
                ]
            ]
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="product-list-mobile">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="product-card">';
                if (has_post_thumbnail()) {
                    echo '<div class="product-thumb">';
                    echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</a>';
                    echo '</div>';
                }
				$terms = get_the_terms(get_the_ID(), 'product_cat');
						$category_name = '';
						if ($terms && !is_wp_error($terms)) {
  						  $category_name = $terms[0]->name;
							}
						echo '<p class="name-category">' . esc_html($category_name) . '</p>';
                echo '<div class="product-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
                echo '</div>';
            }
            echo '</div>';
        }
        wp_reset_postdata();
    }
}

echo '</div></div>';
	}
}



// Mobile
if (wp_is_mobile()) {
}

genesis();
