<div class="col-sm-12 col-md-4 col-lg-4 mt-3">
  <div class="card w-100 h-100" style="width: 18rem;">
    <div class="div-article-cards">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top h-100" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title"><a href="<?php the_permalink() ?>" style="text-decoration:none; color:black;"><?php the_title() ?></a></h5>
      <p class="card-text"><?php the_excerpt() ?></p>
      <a href="<?php the_permalink() ?>" class="btn btn-primary">Read Article</a>
    </div>
  </div>
</div>