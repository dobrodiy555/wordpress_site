<?php
get_header(); ?>

<div class="wrapper">
	<main>
    <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
  
    <?php
    if (is_category('Caserne 1')) {
      sdis_get_vehicules_by_category('caserne1');
		} else if (is_category('Caserne 2')) {
      sdis_get_vehicules_by_category('caserne2');
    } ?>
	
	</main>
  
  <?php get_footer(); ?>
</div>


