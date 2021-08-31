<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="div-article-head">
            <h1 class="article-title"><?= the_title() ?></h1>
            <b class="article-author"><?= the_author() ?> - <?= bloginfo('name') ?></b>
            <br>
            <small class="article-date-post"><?= the_date().' '.the_time() ?></small>
        </div>
        <div class="contet-are mt-5">
            <?php the_content() ?>
        </div>
        <div class="comment-count-area mt-5">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 mt-3">
                    <a href="#" class="comment-count"><?php comments_number() ?> Comment</a>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 mt-3">
                    <?php
                        the_tags('<span class="the-tag">#','</span><span class="the-tag">#','</span>');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="-col-sm-12 col-md-4 col-lg-4 article-widget-area mt-5">
        <?php dynamic_sidebar('sidebar-1') ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="comments-area mt-5">
                <?php comments_template() ?>
            </div>
        </div>
    </div>
</div>