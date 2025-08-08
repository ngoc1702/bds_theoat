<?php

add_filter('rwmb_meta_boxes', 'prefix_register_taxonomy_meta_boxes');
function prefix_register_taxonomy_meta_boxes($meta_boxes)
{
    $prefix = '';
    //Sản phẩm
      $meta_boxes[] = array(
        'title'      => esc_html__( 'Thông tin', 'adsdigi' ),
        'post_types' => array( 'product', ),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'fields'     => array(
    	    array(
                'id' => $prefix . 'anhsp',
                'name' => esc_html__( 'Ảnh sp', 'adsdigi' ), 
                'type'  => 'wysiwyg',   
                'options' => array(
                    'textarea_rows' =>2,
                ),             
            ),

            array(
                'id' => $prefix . 'gt',
                'name' => esc_html__( 'Giới thiệu', 'adsdigi' ), 
                'type'  => 'wysiwyg',   
                'options' => array(
                    'textarea_rows' =>2,
                ),             
            ),

             array(
                'id' => $prefix . 'mota',
                'name' => esc_html__( 'Mô tả', 'adsdigi' ), 
                'type'  => 'wysiwyg',   
                'options' => array(
                    'textarea_rows' =>2,
                ),             
            ),

        ),
    );



    // liên hệ
    $meta_boxes[] = array(
        'title'      => esc_html__('Thông tin', 'adsdigi'),
        'post_types' => array('page',),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'include'   => array(
            'template'  => 'page-lienhe.php',
        ),
        'fields'     => array(
             array(
                        'id' => $prefix . 'nd',
                        'name' => esc_html__('Nội dung liên hệ', 'vinatag'),
                        'type'  => 'wysiwyg',
                        'options' => array(
                            'textarea_rows' => 2,
                        ),
             ),

            array(
                'name' => 'Form',
                'id' => 'form',
                'type' => 'text',
                'size' => 70,
            ),
      

            array(
                'id' => 'map',
                'name' => esc_html__('Map', 'vinatag'),
                'type'  => 'textarea',
                'sanitize_callback' => 'none',
            ),
        ),
    );

    //BLOG
    $meta_boxes[] = array(
    'title'      => esc_html__('Thông tin', 'vinatag'),
    'post_types' => array('page'),
    'context'    => 'normal',
    'priority'   => 'high',
    'autosave'   => true,
    'include'    => array(
        'template' => 'page-blog.php',
    ),
           'fields'     => array(
            array(
                'id' => $prefix . 'tieude',
                'name' => esc_html__('Tiêu đề hỗ trợ', 'vinatag'),
                'type'  => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 2,
                ),
            ),

            array(
    'id'     => $prefix . 'khung_hotro',
    'type'   => 'group',
    'clone'  => true,
    'sort_clone' => true,
    'name'   => 'Nội dung hỗ trợ',
    'fields' => array(
        array(
            'id'   => $prefix . 'nd',
            'name' => 'Nội dung',
            'type' => 'wysiwyg',
            'options' => array(
                'textarea_rows' => 2,
            ),
        ),
    ),
),

        ),
    );




    // ldp công ty bắc sài gòn
    $meta_boxes[] = array(
        'title'      => esc_html__('Thông tin', 'adsdigi'),
        'post_types' => array('page',),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'include'   => array(
            'template'  => 'page-bacsaigon.php',
        ),
        'fields'     => array(

            array(
                'id' => $prefix . 'tieude',
                'name' => esc_html__('Tiêu đề công ty', 'adsdigi'),
                'type'  => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 2,
                ),
            ),

            array(
                'id' => $prefix . 'gioithieu',
                'name' => esc_html__('Giới thiệu', 'adsdigi'),
                'type' => 'group',
                'fields' => array(

                    array(
                        'id' => $prefix . 'nd1',
                        'name' => esc_html__('Nội dung 1', 'adsdigi'),
                        'type'  => 'wysiwyg',
                        'options' => array(
                            'textarea_rows' => 2,
                        ),
                    ),

                      array(
                        'id' => $prefix . 'nd2',
                        'name' => esc_html__('Nội dung 2', 'adsdigi'),
                        'type'  => 'wysiwyg',
                        'options' => array(
                            'textarea_rows' => 2,
                        ),
                    ),
                ),
                // 'sort_clone' => true,
                // 'clone' => true,
            ),

        ),
    );

        // ldp công ty việt nhân group
    $meta_boxes[] = array(
        'title'      => esc_html__('Thông tin', 'adsdigi'),
        'post_types' => array('page',),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'include'   => array(
            'template'  => 'page-vietnhangroup.php',
        ),
        'fields'     => array(

            array(
                'id' => $prefix . 'tieude',
                'name' => esc_html__('Tiêu đề công ty', 'adsdigi'),
                'type'  => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 2,
                ),
            ),

            array(
                'id' => $prefix . 'gioithieu',
                'name' => esc_html__('Giới thiệu', 'adsdigi'),
                'type' => 'group',
                'fields' => array(

                    array(
                        'id' => $prefix . 'nd1',
                        'name' => esc_html__('Nội dung 1', 'adsdigi'),
                        'type'  => 'wysiwyg',
                        'options' => array(
                            'textarea_rows' => 2,
                        ),
                    ),

                      array(
                        'id' => $prefix . 'nd2',
                        'name' => esc_html__('Nội dung 2', 'adsdigi'),
                        'type'  => 'wysiwyg',
                        'options' => array(
                            'textarea_rows' => 2,
                        ),
                    ),
                ),
                // 'sort_clone' => true,
                // 'clone' => true,
            ),

        ),
    );

    // ldp thueggads
    // $meta_boxes[] = array(
    //     'title'      => esc_html__('Thông tin', 'adsdigi'),
    //     'post_types' => array('page',),
    //     'context'    => 'normal',
    //     'priority'   => 'high',
    //     'autosave'   => true,
    //     'include'   => array(
    //         'template'  => 'page-thueggads.php',
    //     ),
    //     'fields'     => array(
    //          array(
    //             'id' => $prefix . 'bannerpage',
    //             'name' => esc_html__('Nội dung đầu trang', 'adsdigi'),
    //             'type'  => 'wysiwyg',
    //             'options' => array(
    //                 'textarea_rows' => 3,
    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //          // ưu điểm


    //                 array(
    //                     'id' => $prefix . 'tieude',
    //                     'name' => esc_html__('Tiêu đề ưu điểm', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),

    //                  array(
    //             'id' => $prefix . 'uudiem',
    //             'name' => esc_html__('Ưu điểm thuê GGADS', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(

    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),

    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //         // lý do nên thuê

    //         array(
    //             'id' => $prefix . 'tieude1',
    //             'name' => esc_html__('Tiêu đề lý do thuê', 'adsdigi'),
    //             'type'  => 'wysiwyg',
    //             'options' => array(
    //                 'textarea_rows' => 2,
    //             ),
    //         ),

    //         array(
    //             'id' => $prefix . 'caclydo',
    //             'name' => esc_html__('Các lý do', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(

    //                 array(
    //                     'id' => $prefix . 'lydo',
    //                     'name' => esc_html__('Lý do', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),


    //         // bảng giá
    //         array(
    //             'id' => $prefix . 'banggia',
    //             'name' => esc_html__('Bảng giá', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'id' => $prefix . 'tieude',
    //                     'name' => esc_html__('Tiêu đề', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //             ),
    //             'sort_clone' => false,
    //             'clone' => false,
    //         ),



    //     ),
    // );


    // ldp thiết kế website
    // $meta_boxes[] = array(
    //     'title'      => esc_html__('Thông tin', 'adsdigi'),
    //     'post_types' => array('page',),
    //     'context'    => 'normal',
    //     'priority'   => 'high',
    //     'autosave'   => true,
    //     'include'   => array(
    //         'template'  => 'page-website.php',
    //     ),
    //     'fields'     => array(
    //          array(
    //             'id' => $prefix . 'bannerpage',
    //             'name' => esc_html__('Nội dung đầu trang', 'adsdigi'),
    //             'type'  => 'wysiwyg',
    //             'options' => array(
    //                 'textarea_rows' => 3,
    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //         // tại sao

    //         array(
    //             'id' => $prefix . 'taisao',
    //             'name' => esc_html__('Vì sao thiết kế Web', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung 1', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //                 array(
    //                     'id' => $prefix . 'nd2',
    //                     'name' => esc_html__('Nội dung 2', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //             ),
    //             'sort_clone' => false,
    //             'clone' => false,
    //         ),

    //         // thiết kế website

    //         array(
    //             'name' => 'Tiêu đề TK Web',
    //             'id' => 'tieudetkweb',
    //             'type' => 'text',
    //             'size' => 100,
    //             'sanitize_callback' => 'none',
    //         ),

    //         array(
    //             'id' => $prefix . 'tkeweb',
    //             'name' => esc_html__('Thiết kế Web', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'name' => 'Tên gói',
    //                     'id' => 'tieude',
    //                     'type' => 'text',
    //                     'size' => 70,
    //                 ),

    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),

    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //         // landing page
    //         array(
    //             'name' => 'Tiêu đề TK LDP',
    //             'id' => 'tieudetkpage',
    //             'type' => 'text',
    //             'size' => 100,
    //             'sanitize_callback' => 'none',
    //         ),

    //         array(
    //             'id' => $prefix . 'tkeldp',
    //             'name' => esc_html__('Thiết kế LDP', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'name' => 'Tên gói',
    //                     'id' => 'tieude',
    //                     'type' => 'text',
    //                     'size' => 70,
    //                 ),

    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),

    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),


    //         // quy trình thiết kế
    //         array(
    //             'name' => 'Quy trình thiết kế',
    //             'id' => 'tieude2',
    //             'type'  => 'wysiwyg',
    //             'options' => array(
    //                 'textarea_rows' => 2,
    //             ),
    //         ),

    //         array(
    //             'id' => $prefix . 'cacbuoc',
    //             'name' => esc_html__('Các bước QT', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'name' => 'Bước',
    //                     'id' => 'buoc',
    //                     'type' => 'text',
    //                     'size' => 70,
    //                     'sanitize_callback' => 'none',
    //                 ),
    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //         // Dịch vụ vê web
    //         array(
    //             'name' => 'Dịch vụ thiết kế',
    //             'id' => 'tieude3',
    //             'type'  => 'wysiwyg',
    //             'options' => array(
    //                 'textarea_rows' => 2,
    //             ),
    //         ),

    //         array(
    //             'id' => $prefix . 'caccd',
    //             'name' => esc_html__('Các chủ đề', 'adsdigi'),
    //             'type' => 'group',
    //             'fields' => array(
    //                 array(
    //                     'id' => $prefix . 'nd',
    //                     'name' => esc_html__('Nội dung', 'adsdigi'),
    //                     'type'  => 'wysiwyg',
    //                     'options' => array(
    //                         'textarea_rows' => 2,
    //                     ),
    //                 ),
    //             ),
    //             'sort_clone' => true,
    //             'clone' => true,
    //         ),

    //     ),
    // );


    return $meta_boxes;
}
