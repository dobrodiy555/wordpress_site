<?php get_header(); ?>

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
                <a href="<?php echo get_post_type_archive_link('activites'); ?>" class="link btn">Activites</a>
                <a href="#" class="link btn active">Divers</a>
              </div>
							<div class="table-list wrap-tabs">
                
                <?php $current_year = date('Y'); ?>
                <!--<div class="title"><h2>--><?php //echo $current_year; ?><!--</h2></div>-->
                <?php $posts = get_posts( array(
                        'post_type' => 'divers',
                        'order' => 'ASC',
                        'meta_query' => array(
                                array(
                                        'key' => 'date',
                                        'value'   => $current_year,
                                        'compare' => '>=',
                                )
                        )
                ));
                $months = array(
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December'
                );
                foreach ($months as $month) { ?>
                  <div class="title"><h2><?php echo $month; ?></h2></div>
                  <?php if ($posts) {
                    foreach ($posts as $post) {
                      $post_month = date( 'm', strtotime(get_field('date')));
                      $post_month_full = date('F', strtotime(get_field('date')));
                      if ($post_month_full == $month) {
                        $post_month = date( 'M', strtotime(get_field('date')));
                        $post_day = date('l', strtotime(get_field('date')));
                        $post_date = date('d.m', strtotime(get_field('date')));
                        $post_time = date('H:i', strtotime(get_field('date')));
                        ?>
                        
                        <div class="block-list cart-tabs__item cart-tabs__item--active" id="cart-tabs_01">
                          <a href="<?php the_permalink();?>" class="row">
                            <span class="number"><?php the_field('numero'); ?></span>
                            <span class="month"><?php echo $post_month; ?></span>
                            <span class="desc"><?php the_field('description'); ?></span>
                            <span class="country"><?php the_field('commune'); ?></span>
                            <span class="city"><?php echo $post_day; ?></span>
                            <span class="date"><?php echo $post_date; ?></span>
                            <span class="time"><?php echo $post_time; ?></span>
                            <?php if (has_post_thumbnail()) { ?>
                              <i class="icon icon-picture"></i>
                            <?php } ?>
                          </a>
                        </div> <?php
                      }
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <?php get_template_part('parts/sidebar'); ?>
        
        </div>
      </div>
    </section>
  </main>
  
  <?php get_footer(); ?>
</div>




