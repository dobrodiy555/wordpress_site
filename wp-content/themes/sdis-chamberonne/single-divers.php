<?php get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/2.jpg')"></div>
		<section class="container">
			<div class="wrap">
				<div class="columns">
					<?php if (have_posts()):
						while (have_posts()) : the_post(); ?>
							<div class="content">
								<div class="title">
									<?php the_title('<h1>', '</h1>'); ?>
								</div>
								<div class="point-desc">
									<div class="info-list">
										<div class="row">
											<strong>Numéro d’alarme:</strong>
											<span><?php the_field('numero'); ?></span>
										</div>
										<div class="row">
											<strong>Description:</strong>
											<span><?php the_field('description'); ?></span>
										</div>
										<div class="row">
											<strong>Commune:</strong>
											<span><?php the_field('commune'); ?></span>
										</div>
										<div class="row">
											<strong>Date:</strong>
											<span><?php the_field('date'); ?></span>
										</div>
										<div class="row">
											<strong>Type:</strong>
											<span><?php the_field('type'); ?></span>
										</div>
									</div>
									<a href="<?php echo get_post_type_archive_link('divers'); ?>" class="btn">Toutes les divers</a>
								</div>
							</div>
						<?php endwhile;
					endif; ?>
					
					<?php get_template_part('parts/sidebar'); ?>
				
				</div>
			</div>
		</section>
	</main>
  
  <?php get_footer(); ?>
</div>