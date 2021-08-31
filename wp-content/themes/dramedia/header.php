<!doctype html>
<html lang="en">
  <head>
  	<?php wp_head() ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid container">
	    <a class="navbar-brand" href="#">
			<?php the_custom_logo(); ?>
		</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	    
		<?php 

			wp_nav_menu(
				array(
					'menu' => 'desktop',
					'container' => '',
					'theme_location' => 'desktop',
					'items_wrap' => '<ul class="navbar-nav ms-auto">%3$s</ul>'
				)
			);

		?>


		<!-- <ul class="navbar-nav ms-auto">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Features</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Pricing</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	        </li>
	    </ul> -->

	    </div>
	  </div>
	</nav>