<?php //$date = get_field('date');
//$current_year = date('Y');
//$months = array(
//        'January',
//        'February',
//        'March',
//        'April',
//        'May',
//        'June',
//        'July',
//        'August',
//        'September',
//        'October',
//        'November',
//        'December'
//);

//foreach ( $months as $month ) {
//  if ( str_contains($date, $month) && str_contains($date, $current_year) ) { ?>
	<!--      <div class="title"><h2>--><?php //echo $month; ?><!--</h2></div>-->
	<!--      <div class="block-list">-->
	<!--        <a href="alarme.php" class="row">-->
	<!--          <span class="number">--><?php //the_field('numero'); ?><!--</span>-->
	<!--          <span class="month">Jan</span>-->
	<!--          <span class="desc">--><?php //the_field('description'); ?><!--</span>-->
	<!--          <span class="country">--><?php //the_field('commune'); ?><!--</span>-->
	<!--          <span class="city">Mercredi</span>-->
	<!--          <span class="date">29.01</span>-->
	<!--          <span class="time">18:37</span>-->
	<!--          --><?php //if (has_post_thumbnail()) { // check if works ?>
	<!--            <i class="icon icon-picture"></i>-->
	<!--          --><?php //} ?>
	<!--        </a>-->
	<!--      </div>-->
	<!--      --><?php
//    }
//  }


//foreach ( $months as $month ) {
//  if ( str_contains($date, $month) && str_contains($date, $current_year) ) { ?>
	<!--    <div class="title"><h2>--><?php //echo $month; ?><!--</h2></div>-->
	<!--    --><?php
//  }
//}
//if ( str_contains($date, 'January') && str_contains($date, $current_year) ) { ?>
	<!--<div class="title"><h2>Janvier</h2></div>-->
	<!--<div class="block-list">-->
	<!--  <a href="alarme.php" class="row">-->
	<!--    <span class="number">--><?php //the_field('numero'); ?><!--</span>-->
	<!--    <span class="month">Jan</span>-->
	<!--    <span class="desc">--><?php //the_field('description'); ?><!--</span>-->
	<!--    <span class="country">--><?php //the_field('commune'); ?><!--</span>-->
	<!--    <span class="city">Mercredi</span>-->
	<!--    <span class="date">29.01</span>-->
	<!--    <span class="time">18:37</span>-->
	<!--    --><?php //if (has_post_thumbnail()) { ?>
	<!--      <i class="icon icon-picture"></i>-->
	<!--    --><?php //} ?>
	<!--  </a>-->
	<!--</div>-->
<?php //}
//
//if ( str_contains($date, 'February') && str_contains($date, $current_year) ) { ?>
	<!--<div class="title"><h2>February</h2></div>-->
	<!--<div class="block-list">-->
	<!--  <a href="alarme.php" class="row">-->
	<!--    <span class="number">--><?php //the_field('numero'); ?><!--</span>-->
	<!--    <span class="month">Jan</span>-->
	<!--    <span class="desc">--><?php //the_field('description'); ?><!--</span>-->
	<!--    <span class="country">--><?php //the_field('commune'); ?><!--</span>-->
	<!--    <span class="city">Mercredi</span>-->
	<!--    <span class="date">29.01</span>-->
	<!--    <span class="time">18:37</span>-->
	<!--    --><?php //if (has_post_thumbnail()) { ?>
	<!--      <i class="icon icon-picture"></i>-->
	<!--    --><?php //} ?>
	<!--  </a>-->
	<!--</div>-->
<?php //}


//$args = array(
//        'post_type' => 'alarme',
//        'posts_per_page' => -1,
//        'meta_query' => array(
//                'key' => 'date',
//                'value' => $current_year,
//                 'compare' => 'LIKE'
//        )
//);
//$qur = new WP_Query($args);
//if ($qur->have_posts()): while ($qur->have_posts()) : $qur->the_post();



//$year = date('Y');
//$month = date('m');
//$posts = get_posts( array(
//        'post_type' => 'alarme',
//         'order' => 'ASC',
//         'meta_query' => array(
//                 array(
//                         'key' => 'date',
//                         'value'   => array( $year . '-' . $month . '-01', $year . '-' . $month . '-31' ),
//                         'compare' => 'BETWEEN',
//                         'type'    => 'DATE',
//                 )
//         )
//));

//$current_year = date('Y');
//$current_month = 2; // february
//$posts = get_posts( array(
//        'post_type' => 'alarme',
//         'order' => 'ASC',
//         'meta_query' => array(
//                 array(
//                         'key' => 'date',
//                         'value'   => array( $current_year . '-' . $current_month . '-01', $current_year . '-' . $current_month . '-31' ),
//                         'compare' => 'BETWEEN',
//                       'type' => 'DATE',
//
//                 )
//         )
//));

//                    <strong><?php _e('Numéro d’alarme', 'sdis'); ?><!--</strong>-->
<!--<span>002</span>-->
<!--</div>-->
<!--<div class="row">-->
<!--  <strong>--><?php //_e('Description:', 'sdis'); ?><!--</strong>-->
<!--  <span>--><?php //_e('Poussière sous une tête de détection', 'sdis'); ?><!--</span>-->

<!--function.php -->
<!--// what I did after Webpack launch-->
<!--//wp_enqueue_style( 'sdis-modal', get_template_directory_uri() . '/css/modal.css' );-->
<!--//wp_enqueue_script( 'sdis-main', get_template_directory_uri() . '/src/js/main.js', array('jquery'), null, true );-->
<!--//wp_enqueue_script( 'sdis-slider', get_template_directory_uri() . '/src/js/function_slider.js', array('jquery', 'sdis-main'), null, true );-->
<!--//wp_enqueue_script( 'sdis_script', get_stylesheet_directory_uri() . '/dist/scripts.js', array('jquery'), null, true );-->