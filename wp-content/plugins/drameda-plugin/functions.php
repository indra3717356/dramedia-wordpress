<?php

/** -------------------- Fungsi Menambahkan Menu -------------------- */

// Fungsi ini berguna untuk menambahkan menu pada admin wordpress.
function dramedia_add_menu_to_admin(){
    add_menu_page( 
        'Dramedia plugin', // Title ketika halaman plugin di akses 
        'Dramedia plugin', // Title untuk nama plugin yang akan ditampilkan di dalam menu
        '', // Kapabilitas, artinya ini akan memberitahu wordpress user apa yang bisa mengakses menu ini, disini saya set hanya admin
        'dramedia-plugin', // Slug, untuk menampilkan url ketika menu plugin ini dibuka
        'dramedia_sub_menu_shortcode', // Menjalankan fungsi ketika halaman dari menu di akses
        'dashicons-admin-tools', // untuk icon, referensi icon bisa di lihat di https://developer.wordpress.org/resource/dashicons/
    );

    add_submenu_page(
        'dramedia-plugin', // Parent atau induk dari menu yang akan ditampilkan sub menu, masukan slug induk / parent menunya.
        'Sub menu settings', // Title yang akan ditampilkan pada sub menu
        'Shortcode', // Title pada sub menu
        'manage_options', // Role user yang bisa mengakses sub menu
        'shortcode', // Slug pada sub menu
        'dramedia_sub_menu_shortcode', // Function yang akan dijalankan
    );
}

// Menambahkan sub menu kedalam menu
function dramedia_sub_menu_shortcode(){
    include('pages/shortcode.php');
}

add_action('admin_menu','dramedia_add_menu_to_admin');


/** -------------------- Fungsi Shortcode -------------------- */

function dramedia_shortcode_whatsapp($atts){
    $var = shortcode_atts(
        array(
            'nohp' => get_option('dramedia_shortcode_wa_hp'),
            'pesan' => get_option('dramedia_shortcode_wa_pesan'),
            'text' => get_option('dramedia_shortcode_wa_text')
        ),$atts
    );

    return '<a href="https://wa.me/'.$var['nohp'].'?text='.urlencode($var['pesan']).'" target="_BLANK">'.$var['text'].'</a>';
}

add_shortcode('whatsapp','dramedia_shortcode_whatsapp');

?>