<?php
    if($_POST != null){

        update_option('dramedia_shortcode_wa_hp',$_POST['nohp']);
        update_option('dramedia_shortcode_wa_text',$_POST['text']);
        update_option('dramedia_shortcode_wa_pesan',$_POST['pesan']);

        $message = true;
    }
?>

<style>
    .message-info{
        border-radius: 8px;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 10px;
        display: none;
        padding-right: 16px;
    }

    .message-info > h3{
        color: #FFFF;
    }

    .message-success{
        background-color: green;
    }

    .message-failed{
        background-color: red;
    }

    .close{
        color: white;
        background-color: transparent;
        border: none;
        font-size: 16pt;
        float: right;
        margin-top: -43px;
    }

    .hide{
        display: none !important;
    }

    .show{
        display: block;
    }

</style>

<h1>Dramedia Shortcode</h1>
<p>Selamat datang di fitur shortcode, fitur ini berguna untuk memanggil text yang sudah di daftarkan di kolom input dibawah<br> 
di setiap post yang anda tambahkan shortcode pada post tersebut, Untuk memanggil text yang sudah di daftarkan cukup menggunakan kode [SHORTCODE] <br> 
"SHORTCODE" didalam kurung diganti dengan shortcode yang tersedia dibawah, misalnya untuk whatsapp [WHATSAPP] dengan begitu text yang anda <br> 
inputkan untuk whatsapp akan muncul di post tersebut.</p>
<br>

<div class="message-info <?= ($message == true)? 'message-success show' : '' ?>">
    <h3>Berhasil menyimpan data</h3>
    <button type='button' class='close' onclick='dismiss(this);'>×</button>
</div>

<h3>Whatsapp</h3>
<table cellpadding="10" cellspacing="0">
    <form action="" method="post">
        <tr>
            <td>No Whatsapp</td>
            <td><input type="text" name="nohp" id="nohp" placeholder="eg: 08xxxxx" value="<?php echo get_option('dramedia_shortcode_wa_hp') ?>"></td>
        </tr>
        <tr>
            <td>Text</td>
            <td><input type="text" name="text" id="text" placeholder="eg: Order disini" value="<?php echo get_option('dramedia_shortcode_wa_text') ?>"></td>
        </tr>
        <tr>
            <td>Pesan</td>
            <td><input type="text" name="pesan" id="pesan" placeholder="eg: Saya ingin beli" value="<?php echo get_option('dramedia_shortcode_wa_pesan') ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" style="width:100%">Simpan</button></td>
        </tr>
    </form>
</table>

<script>
    function dismiss(el){
        el.parentNode.style.display='none';
    };
</script>