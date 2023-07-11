<?php get_header(); ?>

<div class="wrapper">
	<main>
		<section class="section-main">
			<div class="slider-main">
				<div class="swiper-container big-sl">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="wrap">
								<div class="info">
									<div class="title">
										<h1>SDIS Chamberonne</h1>
									</div>
									<div class="editor">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam 
											eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus 
											nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare 
										elit a libero consequat porta.</p>
									</div>
									<div class="action flex">
										<a href="" class="btn">En savoir plus</a>
										<div class="sl-btn">
											<div class="big-sl-prev swiper-button-prev swiper-button-black"></div>
											<div class="big-sl-next swiper-button-next swiper-button-black"></div>	
										</div>
									</div>
								</div>
							</div>
							<div class="img" style="background-image: url('<?php echo get_template_directory_uri();?>/img/slider/1.jpg')"></div>
						</div>
						<div class="swiper-slide">
							<div class="wrap">
								<div class="info">
									<div class="title">
										<h1>SDIS Chamberonne</h1>
									</div>
									<div class="editor">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam 
											eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus 
											nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare 
										elit a libero consequat porta.</p>
									</div>
									<div class="action flex">
										<a href="" class="btn">En savoir plus</a>
										<div class="sl-btn">
											<div class="big-sl-prev swiper-button-prev swiper-button-black"></div>
											<div class="big-sl-next swiper-button-next swiper-button-black"></div>
										</div>
									</div>
								</div>
							</div>
              <div class="img" style="background-image: url('<?php echo get_template_directory_uri();?>/img/slider/2.jpg')"></div>
						</div>
					</div>
					<div class="big-sl-pagination swiper-pagination"></div>
				</div>
			</div>
		</section>
		<section class="main-info">
			<div class="wrap">
				<div class="columns">
					<div class="content">
						<div class="block-main">
							<div class="title">
								<h2>Les Alarmes</h2>
							</div>
							<div class="editor mb-15">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare elit a libero consequat porta. Quisque rutrum accumsan porttitor. Nunc malesuada urna quis mi varius auctor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce a sapien a velit commodo tincidunt. Vestibulum fermentum mauris id mi dignissim auctor. Donec risus odio, imperdiet vitae placerat at, malesuada eget erat. Phasellus eu elit lacinia lorem maximus tristique. Aliquam luctus, nunc sed dictum faucibus, sem augue vestibulum neque, suscipit pretium metus tortor quis enim.</p>
							</div>
							<a href="" class="btn">Toutes les alarmes</a>
						</div>
					</div>
					<aside class="aside">
            
            <!--future activities-->
						<div class="cont">
							<div class="info">
								<div class="title">
									<h4>Prochaines activités</h4>
								</div>
                <?php $posts = get_posts( array(
                        'post_type' => 'activites',
                        'order' => 'ASC',
                        'meta_query' => array(
                                array(
                                        'key' => 'date',
                                        'value' => date('Y-m-d H:i:s'),
                                        'compare' => '>='
                                )
                        )
                )); ?>
                
								<div class="list-alarms">
                  <?php if ($posts) :
                    foreach ($posts as $post) :
                      $activ_date = date('d.m.Y', strtotime(get_field('date')) ); ?>
                      	<div class="row">
                          <?php if (has_post_thumbnail()) { ?>
                            <i class="icon icon-picture"></i>
                          <?php } ?>
                          <span class="date"><?php echo $activ_date;?></span>
                          <span class="text"><?php the_title(); ?></span>
                        </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                  
								<div class="block-btn">
									<a href="<?php echo get_post_type_archive_link('activites'); ?>" class="btn">Toutes les activités</a>
								</div>
							</div>
						</div>
           

          
            <!--past alarmes-->
						<div class="cont">
							<div class="info">
								<div class="title">
									<h4>Dernières alarmes</h4>
								</div>
                <?php $posts = get_posts( array(
                        'post_type' => 'alarme',
                        'order' => 'DESC',
                        'numberposts' => 5, // as default
                        'meta_query' => array(
                                array(
                                        'key' => 'date',
                                        'value' => date('Y-m-d H:i:s'),
                                        'compare' => '<='
                                )
                        )
                ));
                ?>
								<div class="list-alarms">
                  <?php if ($posts) :
                    foreach ($posts as $post) :
                      $alarm_date = date('d.m.Y', strtotime(get_field('date')) ); ?>
                      <div class="row">
                        <?php if (has_post_thumbnail()) { ?>
                          <i class="icon icon-picture"></i>
                        <?php } ?>
                        <span class="date"><?php echo $alarm_date;?></span>
                        <span class="text"><?php the_title(); ?></span>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
			
								<div class="block-btn">
									<a href="<?php echo get_post_type_archive_link('alarme'); ?>" class="btn">Toutes les alarmes</a>
								</div>
        
							</div>
						</div>
					</aside>
				</div>
			</div>
		</section>
	</main>
  
  <?php get_footer(); ?>
</div>


