<?php get_header(); ?>

<div class="container site-content">
    <article>
        <div class="row">
            <?php if(have_posts()){
                    echo '<div class="col-12"><h5>Kami menemukan konten yang cocok dengan pencarian</h5></div>';
                    while(have_posts()){
                        the_post();
                        
                        get_template_part('template-parts/content','archive');
                    }
                }else{
                    echo '<div class="col-12 text-center"><h1>Oops kami tidak menemukan kontent yang dimaksud.</h1></div>';
                }
            ?>
        </div>
    </article>
</div>

<?php get_footer(); ?>