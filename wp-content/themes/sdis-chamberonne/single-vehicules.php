<?php get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner" style="background-image: url('img/banner/1.jpg')"></div>
		<section class="single-vehicle">

      <?php if ( have_posts() ):
      while ( have_posts() ) : the_post(); ?>

			<div class="wrap">
				<div class="block-info flex">
					<div class="text">
						<div class="title"> 
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="point-desc">
							<div class="info-list info-active">
								<div class="row">
                  <strong>Date:</strong>
                  <span><?php $date = get_the_date('Y-m-d H:i:s');
                    $formatted_date = date_i18n( 'l j F Y, H:i', strtotime($date) );
                    echo $formatted_date;
                    $unix_time = strtotime($date);
                    $unix_modif_time = strtotime('+150 minutes', $unix_time); // add two and half hours to unixtime
                    $new_time = date('H:i', $unix_modif_time); // transform unix timestamp into time
                    echo " to $new_time"?></span>
								</div>
								<div class="row">
									<strong>Description:</strong>          
									<span><?php the_content(); ?></span>
								</div>
                <div class="row">
                  <strong>Entrée en service:</strong>
                  <span>SDIS Chamberonne -
                    <?php $cats = get_the_category( get_the_ID() );
                    if ( is_array($cats) ) {
                      foreach ($cats as $cat) {
                        echo $cat->name;
                        echo " ";
                      }
                    }?></span>
                </div>
								<div class="row">
									<strong>Participants:</strong>
									<span><?php echo get_post_meta( get_the_ID(), 'participants', true ); ?></span>
								</div>
								<div class="row">
									<strong>Directeur d’exercice:</strong>
									<span><?php echo get_post_meta( get_the_ID(), 'directeur_de_exercice', true ); ?></span>
								</div>
								<div class="row">
									<strong>Commentaires:</strong>
									<span><?php echo get_post_meta( get_the_ID(), 'commentaires', true ); ?></span>
								</div>
								<div class="row">
									<strong>Désignation:</strong>
									<span><?php echo get_post_meta( get_the_ID(), 'designation', true ); ?></span>
								</div>
							</div>
							<a href="<?php echo get_post_type_archive_link('vehicules'); ?>" class="btn">Tous les véhicules</a>
						</div>
					</div>

          <?php if ( has_post_thumbnail() ) : ?>
            <div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
          <?php endif; ?>

				</div>
			</div>

      <?php endwhile;
      endif; ?>

		</section>
	</main>

  <?php get_footer(); ?>
</div>


