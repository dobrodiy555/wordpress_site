<?php
// calculate all data for statistics
$current_date = date('Y-m-d');
$start_year = date('Y-01-01');
$days = floor((strtotime($current_date) - strtotime($start_year)) / (60 * 60 * 24)) + 1;
$current_year = date('Y');
$args = array(
        'post_type'      => 'alarme',
        'posts_per_page' => -1,
        'date_query'     => array(
                array(
                        'year'  => $current_year,
                ),
        ),
);
$query = new WP_Query( $args );
$total = $query->found_posts;
$frequency = number_format($days / $total, 1, ',');
?>

<aside class="aside">
	<div class="cont">
		<div class="info">
			<div class="title">
				<h4>Alarmes <?php echo date('Y'); ?></h4>
			</div>
			<div class="info-alarms">
				<div class="atten-info">
					<p>Nombre de jours :  <?php echo $days; ?></p>
					<p>Moyenne annuelle :  <?php echo $total; ?></p>
					<p>Une alarme tous les <?php echo $frequency; ?> jours</p>
				</div>
        
        <!--список кат-рий с кол-вом аларм в каждой из них-->
    <?php
    // Get all categories
    $categories = get_categories();
    // Loop through the categories and display the name and how many alarmes in it
    foreach ($categories as $category) {
      $query = new WP_Query(array(
              'post_type' => 'alarme',
              'tax_query' => array(
                      array(
                              'taxonomy' => 'category',
                              'field' => 'slug',
                              'terms' => $category->slug,
                      ),
              ),
              'posts_per_page' => -1,
      ));
      echo "<div class='row'><span>" . $category->name . "</span><span>&nbsp;" . $query->found_posts . "</span></div>";
      wp_reset_postdata();
    }
    ?>
			
			</div>
		</div>
	</div>

  <!--ARCHIVES - там должны быть ссылки на скачивание статистики за предыдущие годы, но пока вместо этого просто выведи предыдущие годы, по которым вообще есть посты-->
    <?php if ( is_post_type_archive( 'alarme' ) ):
    ?>
    <div class="block-archives">
      <div class="title">
        <h4>Archives</h4>
      </div>
      <ul>
      <?php
      $current_year = date('Y');
      $posts = get_posts( array(
                      'post_type' => 'alarme',
                      'order' => 'DESC',
                      'meta_query' => array(
                              array(
                                      'key' => 'date',
                                      'value'   => $current_year,
                                      'compare' => '<=',
                              )
                      )
              )
      );
      $years = array();
      if ($posts) {
        foreach($posts as $post) {
          $post_year = date('Y', strtotime(get_field('date')));
          $years[] = $post_year;
        }
      }
      $years = array_unique($years);
      foreach ( $years as $year ) {
        echo "<li><a href=''>Alarmes $year</a></li>";
      } ?>
      </ul>
    </div>
  <?php endif; ?>

</aside>
