    <footer class="footer">
        <div class="wrap">
            <div class="flex">
                <a href="<?php echo home_url(); ?>/error" class="logo">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/logo-foot.svg" alt="" class="white" />
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
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="input">
                        <input type="text" placeholder="Your message">
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <input type="text" placeholder="Your mail">
                    </div>
                    <div class="block-btn">
                        <button type="" class="fom-button">Send message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>