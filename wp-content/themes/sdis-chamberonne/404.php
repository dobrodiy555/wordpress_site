<?php get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner mb" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
		<section class="container">
			<div class="wrap">

				<div class="title">
					<h1 style="color:red"><?php esc_html_e('ERROR 404'); ?></h1>
					<p><?php esc_html_e('No such page'); ?>!</p>
				</div>

			</div>
		</section>
	</main>
</div>

<?php get_footer();
