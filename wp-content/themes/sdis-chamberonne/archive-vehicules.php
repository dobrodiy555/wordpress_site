<?php get_header(); ?>

<div class="wrapper">
	<main>
    <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
    <section class="container vehicles-section">
			<div class="wrap">
				<section class="section-text single-text">
					<div class="title">
						<h1>Les Véhicules du SDIS</h1>
					</div>
					<div class="editor">
						<p>Le parc du SDIS Chamberonne comprend 9 véhicules et plusieurs engins : 2 véhicules légers « officier de service », 1 tonne-pompe 2000l dernière génération, 1 tonne-pompe 1800l, 1 véhicule lourd d’accompagnement, 2 véhicules mi-lourds d’accompagnement et de transport de personnes, 2 véhicules légers de type jeep, 2 moto-pompes, 1 remorque « canon », 1 remorque « protection respiratoire », 2 remorques « transport de tuyaux », 1 remorque « inondation » et 2 remorques diverses.</p>
					</div>
					<div class="action-btn flex">
            <?php $caserne1_id = get_cat_ID('Caserne 1');
            $caserne2_id = get_cat_ID('Caserne 2');
            $caserne1_link = get_category_link($caserne1_id);
            $caserne2_link = get_category_link($caserne2_id); ?>
            <a href="#" class="btn">All</a>
            <a href="<?php echo esc_url($caserne1_link); ?>" class="btn">Caserne 1</a>
						<a href="<?php echo esc_url($caserne2_link); ?>" class="btn">Caserne 2</a>
					</div>
				</section>
			</div>
		</section>
		<section class="vehicles-posts">
			<div class="wrap">
				<div class="block-posts flex">
        
        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="item-posts">
              <?php if (has_post_thumbnail()) : ?>
               <div class="img" style="background-image: url(<?php the_post_thumbnail_url(); ?>"></div>
              <?php endif; ?>
              <span class="title-post"><?php the_title(); ?></span>
              <?php $content = get_the_content();
              $stripped = strip_tags($content); ?>
              <span class="desc"><?php echo $stripped; ?></span>
            </a>
          <?php endwhile;
        endif; ?>
        
					
				</div>
			</div>
		</section>
	</main>
  
  <?php get_footer(); ?>
</div>


