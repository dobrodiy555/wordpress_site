<?php
/*
* Template Name: ajax
*/
get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
		<section class="container">
			<div class="wrap">
				<div class="columns">
					<div class="content">
						<div class="title">
							<h1>Activités & divers</h1>
						</div>
						<div class="block-tabs">
							<div class="links-tab cart-tabs">
								<a href="" id="activites-btn" class="link btn active">Activites</a>
								<a href="" id='divers-btn' class="link btn">Divers</a>
							</div>
       
							<div class="table-list wrap-tabs">
                
                <?php sdis_get_posts_current_year_each_month('activites'); ?>
                
							</div>
						</div>
					</div>

          <?php get_sidebar(); ?>
				
				</div>
			</div>
		</section>
	</main>
	
	<?php get_footer(); ?>
</div>






