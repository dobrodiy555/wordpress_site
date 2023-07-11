<?php
/*
 * Template Name: Connexion
 */

get_header(); ?>

<div class="wrapper">
	<main>
		<div class="banner" style="background-image: url('img/banner/1.jpg')"></div>
		<section class="section-person">
			<div class="wrap">
				<div class="info">
					<div class="title">
						<h1>Bienvenue dans l’espace membre</h1>
					</div>
					<a href="" class="btn">Déconnexion</a>
				</div>
				<div class="person-area flex">
					<div class="item-area">
						<div class="title">
							<h2>Mon profil</h2>
						</div>
						<div class="cont profile-cont">
							<div class="info-profile">
								<strong>Identifiant:</strong>
								<span>ldind@emblematik.ch</span>
							</div>
							<div class="info-profile">
								<strong>Mot de passe:</strong>
								<span>******</span>
							</div>
						</div>
						<a href="" class="btn">Modifier mon profil</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>Messages</h2>
						</div>
						<div class="cont">
							<span class="message">
								<i class="icon unread icon-ml-close"></i>
								Lorem ipsum dolor sit amet
							</span>
							<span class="message ">
								<i class="icon icon-mail"></i>
								Consetetur sadipscing elitr
							</span>
							<span class="message">
								<i class="icon icon-mail"></i>
								Sed diam nonumy
							</span>
							<span class="message">
								<i class="icon icon-mail"></i>
								Eirmod tempor invidunt ut
							</span>
							<span class="message">
								<i class="icon icon-mail"></i>
								Consetetur sadipscing elitr
							</span>
						</div>
						<a href="" class="btn">Tous les messages</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>Toutes les membres</h2>
						</div>
						<div class="cont">
							<a href="" class="link-item">Maj JACOT Frédéric</a>
							<a href="" class="link-item">Cap CAITUCOLI Stephan</a>
							<a href="" class="link-item">Cap SARTIRANI Michel</a>
							<a href="" class="link-item">Cap TILLE Cyrille</a>
							<a href="" class="link-item">Cap VERREY Julien</a>
						</div>
						<a href="#" class="btn">Tous les membres</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>Info trafic</h2>
						</div>
						<div class="cont">
							<a href="" class="link-item">Lorem ipsum dolor sit amet</a>
							<a href="" class="link-item">Lorem ipsum dolor sit amet</a>
							<a href="" class="link-item">Lorem ipsum dolor sit amet</a>
							<a href="" class="link-item">Lorem ipsum dolor sit amet</a>
							<a href="" class="link-item">Lorem ipsum dolor sit amet</a>
						</div>
						<a href="" class="btn">Toutes les infos trafic</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>activités & ressources</h2>
						</div>
						<div class="list-alarms cont">
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">13.02.20</span>
								<span class="text">APR G.1</span>
							</div>
							<div class="row">
								<span class="date">12.02.20</span>
								<span class="text">CCF 1</span>
							</div>
							<div class="row">
								<span class="date">113.02.20</span>
								<span class="text">SAN E.1</span>
							</div>
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">10.02.20</span>
								<span class="text">DPS 1.1</span>
							</div>
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">10.02.20</span>
								<span class="text">DPS 1.1</span>
							</div>
						</div>
						<a href="<?php echo get_post_type_archive_link('activites'); ?>" class="btn">Toutes les activités</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>Dernières alarmes</h2>
						</div>
						<div class="list-alarms cont">
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">13.02.20</span>
								<span class="text">Sauvetage 008</span>
							</div>
							<div class="row">
								<span class="date">12.02.20</span>
								<span class="text">Alarme automatique 007</span>
							</div>
							<div class="row">
								<span class="date">113.02.20</span>
								<span class="text">Feu 006</span>
							</div>
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">10.02.20</span>
								<span class="text">Inondation 005</span>
							</div>
							<div class="row">
								<i class="icon icon-picture"></i>
								<span class="date">10.02.20</span>
								<span class="text">Prévention feu 004</span>
							</div>
						</div>
						<a href="<?php echo get_post_type_archive_link('alarme'); ?>" class="btn">Toutes les alarmes</a>
					</div>
					<div class="item-area">
						<div class="title">
							<h2>Documents</h2>
						</div>
						<div class="cont">
							<a href="" class="doc-load-link" download><i class="icon icon-pdf"></i> Rapport annuel 2019</a>
							<a href="" class="doc-load-link" download><i class="icon icon-pdf"></i> Plan de communication</a>
							<a href="" class="doc-load-link" download><i class="icon icon-pdf"></i> Rapport annuel 2019</a>
							<a href="" class="doc-load-link" download><i class="icon icon-pdf"></i> Plan de communication</a>
							<a href="" class="doc-load-link" download><i class="icon icon-pdf"></i> Plan de communication</a>
						</div>
						<a href="documents.php" class="btn">Tous les documents</a>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<?php get_footer(); ?>
</div>