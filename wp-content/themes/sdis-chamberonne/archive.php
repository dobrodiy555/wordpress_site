<?php // archive page for alarmes, activites and divers CPT
// but for activites and divers ajax archive there is separate page template called 'ajax', page is called "Activites & Divers"

get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
		<section class="container">
			<div class="wrap">
				<div class="columns">
					<div class="content">

						<?php
            if ( is_date() ) { ?>
                  <div class="title"><h1><?php _e('Alarmes', 'sdis'); ?></h1></div>
                  <div><h1><?php echo get_the_date('Y'); ?></h1></div>
                  <div class="table-list">
                    <?php
                    for ($m = 1; $m <= 12; $m++) {
                    $month = date('F', mktime(0,0,0, $m, 1, date('Y') ) ); ?>
                    <div class="title"><h2><?php echo $month; ?></h2></div>
                    <div class="block-list">
                      <?php
                      if ( have_posts() ) :
                        while ( have_posts() ) :	the_post();
                          $post_month = get_the_date('F');
                          $post_month_short = get_the_date('M');
                          $post_day = get_the_date('l');
                          $post_date = get_the_date('d.m');
                          $post_time = get_the_date('H:i');
                            if ($month == $post_month) { ?>
                              <a href="<?php the_permalink();?>" class="row">
                                <span class="number"><?php echo get_post_meta( get_the_ID(), 'sdis_numero', true ); ?></span>
                                <span class="month"><?php echo $post_month_short; ?></span>
                                <span class="desc"><?php the_content(); ?></span>
                                <span class="country">
                              <?php $categories = get_the_terms( get_the_ID(), 'commune' );
                              if ( is_array($categories) ) {
                                foreach ( $categories as $category ) {
                                  echo $category->name;
                                }
                              } ?>
                              </span>
                                <span class="city"><?php echo $post_day; ?></span>
                                <span class="date"><?php echo $post_date; ?></span>
                                <span class="time"><?php echo $post_time; ?></span>
                                <?php if ( has_post_thumbnail() ) { ?>
                                  <i class="icon icon-picture"></i>
                                <?php } ?>
                              </a>
                            <?php }
                        endwhile;
                      endif; ?>
                    </div> <!--block-list-->
                    <?php }
                     ?>
                  </div> <?php


            // if not yearly alarmes archive, display archive common for three CPT
            } else {
              $post_types = array('alarmes', 'activites', 'divers');
              foreach ($post_types as $post_type) {
                if ( is_post_type_archive($post_type) ) { ?>
								<div class="title"><h1><?php echo $post_type; ?></h1></div>
                <div><h1><?php echo get_the_date('Y'); ?></h1></div>
                <div class="table-list">
                <?php
                $current_year = date('Y');
                for ($m = 1; $m <= 12; $m++) {
                $month = date('F', mktime(0,0,0, $m, 1, date('Y') ) ); ?>
                 <div class="title"><h2><?php echo $month; ?></h2></div>
                 <div class="block-list">
                    <?php $query = new WP_Query( array(
	      							'post_type' => $post_type,
				      				'posts_per_page' => -1,
                      'date_query' => array(
                              array(
                                      'year' => $current_year,
                              )
                      )
                    ) );
							      if ($query->have_posts()) :
								      while ($query->have_posts()) :	$query->the_post();
                        $post_month = get_the_date('F');
                        $post_month_short = get_the_date('M');
                        $post_day = get_the_date('l');
                        $post_date = get_the_date('d.m');
                        $post_time = get_the_date('H:i');
                          if ($month == $post_month) { ?>
                            <a href="<?php the_permalink();?>" class="row">
                              <span class="number"><?php echo get_post_meta( get_the_ID(), 'sdis_numero', true ); ?></span>
                              <span class="month"><?php echo $post_month_short; ?></span>
                              <span class="desc"><?php the_content(); ?></span>
                              <span class="country">
                              <?php $categories = get_the_terms( get_the_ID(), 'commune' );
                                if ( is_array($categories) ) {
                                 foreach ( $categories as $category ) {
                                   echo $category->name;
                                 }
                                } ?>
                              </span>
                              <span class="city"><?php echo $post_day; ?></span>
                              <span class="date"><?php echo $post_date; ?></span>
                              <span class="time"><?php echo $post_time; ?></span>
                              <?php if ( has_post_thumbnail() ) { ?>
                              <i class="icon icon-picture"></i>
                              <?php } ?>
                            </a>
                            <?php }
                          endwhile;
                        endif; ?>
                     </div> <!--block-list-->
                    <?php }
                     }
                   } ?>
                 </div>  <!--table-list-->
                <?php } // end of else part ?>
            </div>  <!--content-->

          <!--sidebar section-->

          <!--alternative solution by using f-n in functions.php-->
          <!-- if you want statistics for each post type on correspondent post type archive, comment get_sidebar() below and uncomment this -->
          <?php
          //foreach ($post_types as $post_type) {
          //  if ( is_post_type_archive($post_type) ) {
          //    sdis_get_data_for_sidebar($post_type);
          //  }
          //} ?>

          <?php get_sidebar(); ?>

          <!--end of sidebar section-->

        </div>
		</section>
	</main>

  <?php get_footer(); ?>
</div>
