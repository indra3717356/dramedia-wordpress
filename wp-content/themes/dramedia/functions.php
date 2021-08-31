<?php

/*
    Deskripsi : Fungsi ini berfungsi untuk memberitahu wordpress tema ini mendukung fitur apa saja.
*/

function dramedia_theme_support(){
    // Fitur ini digunakan untuk menuliskan title di halaman web tanpa harus menuliskan tag <title></title> pada web.
    add_theme_support('title-tag');
    // Fitur ini berguna untuk memberikan fitur kepada user agar dapat merubah logo web secara dinamis.
    add_theme_support('custom-logo');
    // Fitur ini untuk memberikan fitur menambahkan thumbnails pada setiap post
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','dramedia_theme_support');


function dramedia_menus(){
    $locations = array(
        'desktop' => "Desktop primary navbar",
        'mobile' => "Mobile navbar menu"
    );

    register_nav_menus($locations);
}

add_action('init','dramedia_menus');

/*
    Deskripsi : Fungsi ini berfungsi untuk mendaftarkan css yang ada dalam template agar dapat di load ketika halaman ditampilkan, cukup dengan fungsi bawaan
                dari wordpress wp_head() maka semua css  yang di daftarkan di fungsi ini akan ter load dengan sendirinya.

    array() : Jika file css memiliki ketergantungan pada file css lain cukup tambahkan id dependency dari css tersebut,maka wordpress akan otomatis
                Menempatkan file yang ketergantungan tersebut setelah file dependency nya tadi.

    $version : Untuk mendapatkan versi dari tema terkini.
*/

function dramedia_register_styles(){

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('dramedia-bootstrap',get_template_directory_uri()."/assets/css/bootstrap.min.css",array(),'5.1.0','all');
    wp_enqueue_style('dramedia-css',get_template_directory_uri()."/assets/css/my.css",array(),$version,'all');
}

add_action('wp_enqueue_scripts','dramedia_register_styles');

/*
    Sama seperti hal nya fungsi dramedia_register_styles() namun di fungsi ini untuk mendaftarkan javascript pada template.

    true / false : Ini merupakan nilai untuk menentukan dimana javascript akan di load, jika false maka javascript akan di load di atas halaman
                   Kebalikannya jika true makan javascript akan di load di bawah halaman, default wordpress bernilai false.
*/

function dramedia_register_scripts(){
    wp_enqueue_script('dramedia-bootstrap',get_template_directory_uri()."/assets/js/bootstrap.bundle.min.js",array(),'5.1.0',true);
}

add_action('wp_enqueue_scripts','dramedia_register_scripts');


function dramedia_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_tile' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar area',
            'id' => 'sidebar-1',
            'description' => 'Memunculkan widget di setiap sidebar yang ada di halaman biasa maupun di halaman post'
        )
    );
}

add_action('widgets_init','dramedia_widget_areas');

?>