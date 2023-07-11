<?php get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/2.jpg')"></div>
		<section class="container">
			<div class="wrap">
				<div class="columns">
          <?php if (have_posts()):
            while (have_posts()) :
              the_post(); ?>
              <div class="content">
                <div class="title">
                  <?php the_title('<h1>', '</h1>'); ?>
                </div>
                <div class="point-desc">
                  <div class="info-list">
                    <div class="row">
                      <strong>Numéro d’alarme:</strong>
                      <span>002</span>
                    </div>
                    <div class="row">
                      <strong>Description:</strong>
                      <span>Poussière sous une tête de détection</span>
                    </div>
                    <div class="row">
                      <strong>Commune:</strong>
                      <span>Ecublens</span>
                    </div>
                    <div class="row">
                      <strong>Date:</strong>
                      <span>Mardi 21 janvier 2020, 14:08</span>
                    </div>
                    <div class="row">
                      <strong>Type:</strong>
                      <span>Alarme automatique</span>
                    </div>
                  </div>
                  <a href="alarmes.php" class="btn">Toutes les alarmes</a>
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