<?php
// register widget
function sdis_register_statistics_widget() {
	register_widget('Sdis_Statistics_Widget');
}
add_action('widgets_init', 'sdis_register_statistics_widget');

class Sdis_Statistics_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'sdis_statistics_widget', // widget ID
			__('SDIS Statistics', 'sdis'), // widget name
			array( 'description' => __('Displays statistics for the custom post type for the current year', 'sdis') )
		);
	}

	// frontend
	public function widget( $args, $instance ) {
			$post_type = $instance['post_type'];
			$current_date = date('Y-m-d');
			$start_year = date('Y-01-01');
			$days = floor(( strtotime($current_date) - strtotime($start_year) ) / (60 * 60 * 24) ) + 1;
			$current_year = date('Y');
			$args = array(
				'post_type'      => $post_type,
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

			<div class="cont">
				<div class="info">
					<div class="title">
						<h4><?php echo $post_type; echo " "; echo date('Y'); ?></h4>
					</div>
					<div class="info-alarms">
						<div class="atten-info">
							<p><?php _e('Nombre de jours: ', 'sdis'); echo $days; ?></p>
							<p><?php _e('Moyenne annuelle: ', 'sdis'); echo $total; ?></p>
							<p><?php printf( __('Une alarme tous les %s jours', 'sdis'), $frequency ); ?></p>
						</div>

						<!--список кат-й таксономии sdis_type с кол-вом постов в каждой из них-->
						<?php
						$categories = get_categories( array(
							'taxonomy' => 'sdis_type'
						) );
						// find posts of particular CPT that belong to this tax-my
						foreach ($categories as $category) {
							$query = new WP_Query( array(
								'post_type' => $post_type,
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'sdis_type',
										'field' => 'slug',
										'terms' => $category->slug,
									),
								),
							) );
							echo "<div class='row'><span>" . $category->name . "</span><span>&nbsp;" . $query->found_posts . "</span></div>";
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
			<?php
	}


	// backend
	public function form( $instance ) {
		if ( isset($instance['post_type']) ) {
			$post_type = $instance['post_type'];
		} ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e("Select post type for statistics:"); ?></label>
			<select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
				<option value="alarmes" <?php echo selected('alarmes', $post_type, false); ?>><?php _e('Alarmes', 'sdis'); ?></option>

				<option value="activites" <?php echo selected('activites', $post_type, false); ?>><?php _e('Activites', 'sdis'); ?></option>

				<option value="divers" <?php echo selected('divers', $post_type, false); ?>><?php _e('Divers', 'sdis'); ?></option>

				<option value="vehicules" <?php echo selected('vehicules', $post_type, false); ?>><?php _e('Vehicules', 'sdis'); ?></option>

				<option value="documents" <?php echo selected('documents', $post_type, false); ?>><?php _e('Documents', 'sdis'); ?></option>
			</select>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['post_type'] = ( !empty( $new_instance['post_type']) ) ? strip_tags( $new_instance['post_type']) : '';
		return $instance;
	}
}