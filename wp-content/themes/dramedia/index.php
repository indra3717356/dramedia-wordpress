<?php get_header(); ?>

<div class="container mt-5 mb-5">
	<div class="row">
		<?php if(have_posts()){
			while(have_posts()){
				the_post();
				get_template_part('template-parts/content','archive');
			}
		} ?>
		<div class="col-12 text-center mt-5">
			<?php the_posts_pagination(); ?>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>