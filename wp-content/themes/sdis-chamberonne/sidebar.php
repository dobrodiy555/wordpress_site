<?php
if ( is_active_sidebar( 'sdis_right_sdbr' ) ) : ?>

	<div id="sdis-side" class="sidebar">
  <aside class="aside">
		<?php dynamic_sidebar( 'sdis_right_sdbr' );

    if ( is_post_type_archive('alarmes') ) { ?>
      <div class="block-archives">
        		<div class="title">
        			<h4>Archives</h4>
        		</div>
        <ul>
        <?php
        $cur_year = date('Y');
        wp_get_archives( array(
              'type'      => 'yearly',
              'post_type' => 'alarmes',
              'not_year'   => $cur_year,
              'before' => '<a class="sdis-alarmes-link" href="">Alarmes&nbsp;</a>', // we will add link with jquery
        ) );
        ?>
        </ul>
      </div>
    <?php } ?>


  </aside>
	</div>

<?php endif;