<?php get_header(); ?>

<div class="wrapper">
	<main>
    <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
  
    <?php if (is_category('Caserne 1')) { ?>
		<section class="vehicles-posts">
			<div class="wrap">
          <div class="title">
           <h2><?php single_cat_title(); ?></h2>
          </div>
				  <div class="block-posts flex">
            <?php
            $args = array(
                    'post_type' => 'vehicules',
                    'category_name' => 'caserne1',
                    'posts_per_page' => -1,
            );
            $qur = new WP_Query($args); ?>
            <?php if ($qur->have_posts() ) :
              while ( $qur->have_posts() ) : $qur->the_post(); ?>
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
            endif;
            wp_reset_postdata(); ?>
          </div>
        <?php } ?>
        
        
        <?php if (is_category('Caserne 2')) { ?>
        <section class="vehicles-posts">
          <div class="wrap">
            <div class="title">
              <h2><?php single_cat_title(); ?></h2>
            </div>
            <div class="block-posts flex">
              <?php
              $args = array(
                      'post_type' => 'vehicules',
                      'category_name' => 'caserne2',
                      'posts_per_page' => -1,
              );
              $qur = new WP_Query($args); ?>
              <?php if ($qur->have_posts() ) :
                while ( $qur->have_posts() ) : $qur->the_post(); ?>
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
              endif;
              wp_reset_postdata(); ?>
            </div>
            <?php } ?>
              
				</div>
			</div>
		</section>
	</main>
  
  <?php get_footer(); ?>
</div>


