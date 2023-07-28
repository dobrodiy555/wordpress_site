<?php
/**
 * Template Name: Alarmes Yearly Archive
 * Description: Custom template for displaying yearly archives.
 */

get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
		<section class="container">
			<div class="wrap">
				<div class="columns">
					<div class="content">
						<div class="table-list">


							<?php
								$year = get_query_var('myyear');
								  $args = array(
									  'post_type' => 'alarmes',
									  'post_status' => 'publish',
									  'posts_per_page' => -1,
									  'year' => $year,
								  );
								  $yearly_query = new WP_Query($args);
								  if ($yearly_query->have_posts()) {
									  while ($yearly_query->have_posts()) {
										  $yearly_query->the_post();
										  the_title('<h2>', '</h2>');
										  //the_content();
									  }
								  } else {
									  echo 'No posts found for the year ' . $year;
								  }

								  wp_reset_postdata(); ?>


						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>


<?php

get_footer();

