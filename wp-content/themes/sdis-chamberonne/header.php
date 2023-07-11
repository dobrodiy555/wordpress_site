<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex,nofollow">
        <meta name="theme-color" content="#fff"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta property="og:title" content="Sdis"/>
		<meta property="og:description" content=""/>

            <script>
                document.createElement('header');
                document.createElement('nav');
                document.createElement('main');
                document.createElement('section');
                document.createElement('article');
                document.createElement('aside');
                document.createElement('footer');
            </script>
 
      <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
      <?php wp_body_open(); ?>
        <header class="header">
            <div class="info">
                <div class="wrap">
                    <a href="mailto:contact@sdis-chamberonne.ch">contact@sdis-chamberonne.ch</a>
                </div>
            </div>
            <div class="wrap">
                <div class="flex">
                    <a href="<?php echo home_url(); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-main.svg" alt="" />
                    </a>
                    <div class="action">
                        <nav class="nav">
                            <ul class="menu">
                                <li class="item">
                                    <a href="" class="link">Présentation</a>
                                    <ul>
                                        <li><a href="<?php echo get_site_url(); ?>/formation">Sites</a></li>
                                        <li><a href="<?php echo site_url(); ?>/formation">Organisation</a></li>
                                        <li><a href="<?php echo site_url(); ?>/formation">Missions</a></li>
                                        <li><a href="<?php echo site_url(); ?>/formation">Formation</a></li>
                                        <li><a href="<?php echo get_post_type_archive_link('vehicules'); ?>">Véhicules</a></li>
                                    </ul>
                                </li>
                                <li class="item">
                                    <a href="<?php echo get_post_type_archive_link('alarme'); ?>" class="link">Alarmes</a>
                                </li>
                                <li class="item">
                                    <a href="<?php echo get_post_type_archive_link('activites'); ?>" class="link">Activités & divers</a>
                                </li>
                                <li class="item">
                                    <a href="<?php echo site_url(); ?>/documents" class="link">Documents</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="<?php echo site_url(); ?>/connexion" class="connect">
                            <i class="icon icon-profile"></i>
                            <span>Connexion</span>
                        </a>
                        <div class="hamburger">
                            <span class="line"></span> 
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="shadow"></div>
        <div class="m-panel">
            <div class="content">
                <span class="close icon-signs"></span>
                <nav class="nav">
                    <ul class="menu">
                        <li class="item">
                            <a href="" class="link">Présentation</a>
                            <ul>
                                <li><a href="<?php echo site_url(); ?>/formation">Sites</a></li>
                                <li><a href="<?php echo site_url(); ?>/formation">Organisation</a></li>
                                <li><a href="<?php echo get_site_url(); ?>/formation">Missions</a></li>
                                <li><a href="<?php echo site_url(); ?>/formation">Formation</a></li>
                                <li><a href="<?php echo get_post_type_archive_link('vehicules'); ?>">Véhicules</a></li>
                            </ul>
                        </li>
                        <li class="item">
                            <a href="<?php echo get_post_type_archive_link('alarme'); ?>" class="link">Alarmes</a>
                        </li>
                        <li class="item">
                            <a href="<?php echo get_post_type_archive_link('activites'); ?>" class="link">Activités & divers</a>
                        </li>
                        <li class="item">
                          <a href="<?php echo site_url(); ?>/documents" class="link">Documents</a>
                        </li>
                    </ul>
                </nav>
                <a href="<?php echo site_url(); ?>/connexion" class="connect">
                    <i class="icon icon-profile"></i>
                    <span>Connexion</span>
                </a>
            </div>
        </div>


