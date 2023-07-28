<?php
/*
 * Template Name: Documents
 */

get_header(); ?>
<div class="wrapper">
  <main>
    <div class="banner" style="background-image: url('img/banner/1.jpg')"></div>
    <section class="section-docs">
      <div class="wrap">
        <div class="info">
          <div class="title">
            <h1>Documents</h1>
          </div>
          <div class="action">
            <a href="" class="btn">Tableau de bord</a>
            <a href="" class="btn">Déconnexion</a>
          </div>
        </div>
        <div class="block-docs flex">
          <div class="item">
            <div class="title">
              <h2>Rapports</h2>
            </div>
            <div class="list-doc">
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
            </div>
          </div>
          <div class="item">
            <div class="title">
              <h2>Plan</h2>
            </div>
            <div class="list-doc">
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
            </div>
          </div>
          <div class="item">
            <div class="title">
              <h2>Divers</h2>
            </div>
            <div class="list-doc">
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i><i class="icon icon-pdf"></i>Plan de communication</a>
            </div>
          </div>
          <div class="item">
            <div class="title">
              <h2>Rapports</h2>
            </div>
            <div class="list-doc">
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Rapport annuel 2019</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
              <a href="" class="doc-load-link" download><i class="icon icon-pdf"></i>Plan de communication</a>
            </div>
          </div>
        </div>
      </div>
      
      <div>
        <?php $image_base64 = get_option('sdis_banner');
        if ($image_base64) {
          $image_data = base64_decode($image_base64);
          $image_mime_type = finfo_buffer(finfo_open(), $image_data, FILEINFO_MIME_TYPE);
          $image_src = 'data:' . $image_mime_type . ';base64,' . $image_base64;
          echo '<img src="' . esc_attr($image_src) . '">';
        }?>
      </div>
      
    </section>
  </main>
  
  <?php
  //$expired_date = get_post_meta( $post->ID, 'expired_date');
  //echo "<pre>"; print_r($expired_date); echo "</pre>";
  //$commune = get_post_meta( $post->ID, 'commune');
  //echo "<pre>"; print_r($commune); echo "</pre>"; ?>
  
  <?php get_footer(); ?>
</div>



