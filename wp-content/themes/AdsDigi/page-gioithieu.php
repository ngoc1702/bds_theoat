<?php

/* Template Name: Trang giới thiệu */

add_filter('genesis_site_layout', 'caia_cpt_layout');
function caia_cpt_layout()
{
	return 'full-width-content';
}

// Xóa tiêu đề
remove_action('genesis_entry_header', 'genesis_do_post_title');

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

add_action('genesis_after_header', 'caia_add_content_contact');
function caia_add_content_contact()
{

	global $post;
	$tieude = get_post_meta($post->ID, 'tieude', true);
	$sumenh = rwmb_meta('khung1');
	// sumenh
	if (!empty($sumenh)) {
		echo '<div data-aos="fade-up" class="sumenh">';
		echo '<div class="widget">' . $tieude . '</div>';
		echo '<div class="nd">';
		foreach ($sumenh as $value) {
			echo '<div class="image-upload">';
			echo do_shortcode(wpautop($value['nd']));
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}
}

//muctieu
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'caia_add_choose');
function caia_add_choose()
{
	global $post;
	$tieude2 = get_post_meta($post->ID, 'tieude2', true);
	echo '<div data-aos="fade-up" class="content-dichvu section">';
	echo '<div class="widget widget_gt">' . $tieude2 . '</div>';

	$muctieu = rwmb_meta('muctieu');

	echo '<div class="widgetdv">';
	foreach ($muctieu as $value) {
		echo '<div class="image-upload2">';
		echo do_shortcode(wpautop($value['nd2']));
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';


	// câu hỏi thường gặp

	$tieude3 = get_post_meta($post->ID, 'tieude3', true);
	$cauhoi = rwmb_meta('cauhoi');

	echo '<div data-aos="fade-up" class="content-cauhoi section">';
	echo '<div class="widgettitle">' . wpautop($tieude3) . '</div>';
	echo '<div class="list_ques">';
	foreach ($cauhoi as $value) {
		echo '<div class="question">';
		echo '<div class="title">';
		echo do_shortcode($value['tieude']);
		echo '</div>';
		echo '<div class="answer">';
		echo do_shortcode(wpautop($value['traloi']));
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';

	echo '</div>';
}


// Mobile
if (wp_is_mobile()) {
}

genesis();
