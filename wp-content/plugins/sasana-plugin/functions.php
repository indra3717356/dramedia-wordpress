<?php

/** -------------------- Fungsi Menambahkan Menu -------------------- */

// Fungsi ini berguna untuk menambahkan menu pada admin wordpress.
function sasana_add_menu_to_admin(){
    add_menu_page( 
        'Sasana plugin', // Title ketika halaman plugin di akses 
        'Sasana plugin', // Title untuk nama plugin yang akan ditampilkan di dalam menu
        '', // Kapabilitas, artinya ini akan memberitahu wordpress user apa yang bisa mengakses menu ini, disini saya set hanya admin
        'sasana-plugin', // Slug, untuk menampilkan url ketika menu plugin ini dibuka
        'sasana_sub_menu_hubspot', // Menjalankan fungsi ketika halaman dari menu di akses
        'dashicons-admin-tools', // untuk icon, referensi icon bisa di lihat di https://developer.wordpress.org/resource/dashicons/
    );

    add_submenu_page(
        'sasana-plugin', // Parent atau induk dari menu yang akan ditampilkan sub menu, masukan slug induk / parent menunya.
        'Sub menu settings', // Title yang akan ditampilkan pada sub menu
        'Hubspot', // Title pada sub menu
        'manage_options', // Role user yang bisa mengakses sub menu
        'hubspot', // Slug pada sub menu
        'sasana_sub_menu_hubspot', // Function yang akan dijalankan
    );
}

// Menambahkan sub menu kedalam menu
function sasana_sub_menu_hubspot(){
    global $wpdb;
    include('pages/hubspot.php');
}
add_action('admin_menu','sasana_add_menu_to_admin');


/** -------------------- Fungsi Aksi ke database -------------------- */

function hubspot_to_db(){
    global $wpdb;

    if(isset($_REQUEST)){
        $data = $_REQUEST['data'];
        $values = array();

        for ($i=0; $i <count($data) ; $i++) { 
            $id = $data[$i][0];
            $emailName = $data[$i][1];
            $emailAuthor = $data[$i][2];
            $emailUrl = $data[$i][3];

            $values[$i] = "('".$emailName."','".$emailAuthor."','".$emailUrl."')";
        }

        // echo "INSERT INTO wp_newsletter (email_name,author,url) VALUES ".implode(",",$values)." ";

        $wpdb->query("INSERT INTO wp_newsletter (email_name,author,url) VALUES ".implode(",",$values)." ");
    }
}
add_action('wp_ajax_hubspot_to_db','hubspot_to_db');
add_action('wp_ajax_nopriv_hubspot_to_db','hubspot_to_db');



?>