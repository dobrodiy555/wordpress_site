    <footer class="footer">
        <div class="wrap">
            <div class="flex">

                  <?php
                  $attachment_id = get_option('sdis_lower_banner');
                  $image_attributes = wp_get_attachment_image_src( $attachment_id );
                  ?>
                  <a href="<?php echo home_url(); ?>" class="logo">
                    <?php if ($image_attributes) : ?>
                      <img src="<?php echo $image_attributes[0];?>" />
                    <?php endif; ?>
                  </a>

                <div class="footer-info">
                    <strong>SDIS Chamberonne</strong>
                    <span>Case postale 346</span> 
                    <span>1024 Ecublens</span>
                </div>
                <div class="copyright">
                    <p>© 2023 SDIS Chamberonne | Créé par Emblematik</p>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="modal modal-contacts" id="modal-contacts" style="display: none;">
        <div class="content-modal  modal-contacts-content" id="modal-contacts-wrap" style="display: none;">
            <span class="close"><img src="img/icons/close.svg" alt=""></span>
            <form action="">
                <div class="title">
                    <h4>Contacts</h4>
                </div>
                <div class="row">
                    <div class="input">
                        <input type="text" placeholder="<?php esc_html_e('Your name', 'sdis'); ?>">
                    </div>
                    <div class="input">
                        <input type="text" placeholder="<?php esc_html_e('Your message', 'sdis'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <input type="text" placeholder="<?php esc_html_e('Your mail', 'sdis'); ?>">
                    </div>
                    <div class="block-btn">
                        <button type="" class="fom-button"><?php esc_html_e('Send message', 'sdis'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>