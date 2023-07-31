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

                  
                  <?php // display image that was uploaded in Appearance->SDIS banners
                  $attachment_id = get_option('sdis_upper_banner');
                  $image_attributes = wp_get_attachment_image_src( $attachment_id );
                  ?>
                   <a href="<?php echo home_url(); ?>" class="logo">
                     <?php if ($image_attributes) : ?>
                    <img src="<?php echo $image_attributes[0];?>" />
                     <?php endif; ?>
                   </a>


                    <div class="action">

                      <!--customize this nav menu in Appearance->Menus-->
                        <nav class="nav">
                          <?php wp_nav_menu( array('menu' => 'sdis_menu' ) ); ?>
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
                  <?php wp_nav_menu( array('menu' => 'sdis_menu' ) ); ?>
                </nav>
		    
                <a href="<?php echo site_url(); ?>/connexion" class="connect">
                    <i class="icon icon-profile"></i>
                    <span>Connexion</span>
                </a>
            </div>
        </div>


