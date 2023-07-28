<?php get_header(); ?>

<div class="wrapper">
	<main>
    <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/banner/1.jpg')"></div>
    <section class="container vehicles-section">
			<div class="wrap">
				<section class="section-text single-text">
					<div class="title">
						<h1>Les Véhicules du SDIS</h1>
					</div>
					<div class="editor">
						<p>Le parc du SDIS Chamberonne comprend 9 véhicules et plusieurs engins : 2 véhicules légers « officier de service », 1 tonne-pompe 2000l dernière génération, 1 tonne-pompe 1800l, 1 véhicule lourd d’accompagnement, 2 véhicules mi-lourds d’accompagnement et de transport de personnes, 2 véhicules légers de type jeep, 2 moto-pompes, 1 remorque « canon », 1 remorque « protection respiratoire », 2 remorques « transport de tuyaux », 1 remorque « inondation » et 2 remorques diverses.</p>
					</div>
					<div class="action-btn flex">
            <a href="" class="btn cas-click active">All</a>
            <a href="#" class="btn cas-click" id="cas1-btn">Caserne 1</a>
						<a href="#" class="btn cas-click" id="cas2-btn">Caserne 2</a>
					</div>
				</section>
			</div>
		</section>
		<section class="vehicles-posts">
			<div class="wrap">
				<div class="block-posts flex">
        
        <?php sdis_get_vehicules_by_category('All'); ?>
					
				</div>
			</div>
		</section>
	</main>
  
  <?php get_footer(); ?>
</div>


