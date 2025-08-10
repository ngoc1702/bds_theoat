<?php
if ( $related_query->have_posts() ):
    echo '<div class="widget"><div class="widgettitle"><p>Bài viết liên quan</p></div><div class="main-posts">';
    while ( $related_query->have_posts() ) : $related_query->the_post(); 
        echo '<div class="post">';
            // Hình ảnh
            ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="alignleft">
                <?php the_post_thumbnail('thumbnail'); ?>
            </a>
            <?php
            echo '<div class="list-info">';
            // Tiêu đề
            echo '<p class="widget-item-title"><a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a></p>';
            
            // Mô tả ngắn (excerpt)
            echo '<div class="widget-item-excerpt">' . get_the_excerpt() . '</div>';

            // Nút Xem thêm
            echo '<a class="widget-read-more" href="'.get_permalink().'">Xem thêm</a>';
            echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div></div>';
    wp_reset_postdata();
endif;
?>
