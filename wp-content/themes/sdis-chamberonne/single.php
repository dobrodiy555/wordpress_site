<?php get_header(); ?>

<div class="wrapper">
  <main>
    <div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/2.jpg')"></div>
    <section class="container">
      <div class="wrap">
        <div class="columns">
          <?php if ( have_posts() ):
            while ( have_posts() ) : the_post(); ?>
              <div class="content">
                <div class="title">
                  <?php the_title('<h1>', '</h1>'); ?>
                </div>
                <div class="point-desc">
                  <div class="info-list">
                    <div class="row">
                      <strong>Numéro d’alarme:</strong>
                      <span>
                        <?php echo get_post_meta( get_the_ID(), 'sdis_numero', true ); ?>
                      </span>
                    </div>
                    <div class="row">
                      <strong>Description:</strong>
                      <span><?php the_content(); ?></span>
                    </div>
                    <div class="row">
                      <strong>Commune:</strong>
                      <span>
                        <?php $categories = get_the_terms( $post->ID, 'commune' );
                        if ( is_array($categories) ) {
                          foreach( $categories as $category ) {
                            echo $category->name;
                            echo " "; // if several
                          }
                        } ?>
                      </span>
                    </div>
                    <div class="row">
                      <strong>Date:</strong>
                      <span>
                        <?php $date = get_the_date('Y-m-d H:i:s');
                        $formatted_date = date_i18n('l j F Y, H:i', strtotime($date));
                        echo $formatted_date; ?>
                      </span>
                    </div>
                    <div class="row">
                      <strong>Type:</strong>
                      <span>
                        <?php $categories = get_the_terms( $post->ID, 'sdis_type' );
                        if ( is_array($categories)) {
                          foreach( $categories as $category ) {
                            echo $category->name;
                            echo " ";
                         }
                        } ?>
                      </span>
                    </div>
                  </div>
                  <?php
                  $post_types = array('alarmes', 'activites', 'divers');
                  foreach ($post_types as $post_type) {
                    if ( is_singular($post_type) ) { ?>
                      <a href="<?php echo get_post_type_archive_link($post_type); ?>" class="btn"><?php _e("Toutes les $post_type", 'sdis'); ?></a> <?php
                    }
                  } ?>
               </div>
              </div>
            <?php endwhile;
          endif;

          // sidebar part if you need statistics for each post type
          //foreach ($post_types as $post_type) {
          //  if ( is_singular($post_type) ) {
          //    sdis_get_data_for_sidebar($post_type);
          //  }
          //} ?>

          <?php get_sidebar(); ?>

        </div>
      </div>
    </section>
  </main>
  
  <?php get_footer(); ?>
</div>