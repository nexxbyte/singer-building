<?php
/**
 * Footer Template
 * 
 * @package SingerBuilding
 */
?>
</main> <!-- #main -->

<footer class="site-footer">
  <div class="pagewrapper">
    <aside>
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php endif; ?>
        </a>

        <p>
            Fusce efficitur augue sed nisi molestie auctor.
            Pellentesque non lacus quis mi maximus.
        </p>
    </aside>

    <ul class="footer-nav">
        <li>
           <p>PORTFOLIO</p>

           <ul class="footer-list">
            <li>
                <a href="">Commercial</a>
            </li>
            <li>
                <a href="">Domestic</a>
            </li>
            <li>
                <a href="">Shop Fit</a>
            </li>
           </ul>
        </li>

        <li>
           <p>QUICK LINKS</p>

           <ul class="footer-list">
            <li>
                <a href="">Why Singer Building</a>
            </li>
            <li>
                <a href="">Services</a>
            </li>
            <li>
                <a href="">Portfolio</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
           </ul>
        </li>

        <li>
           <p>CONTACT</p>

           <ul class="footer-list">
            <li>
                <a href="">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-phone.png'); ?>" alt="Icon Phone">
                    0410 984 873
                </a>
            </li>
            <li>
                <a href="">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-mail.png'); ?>" alt="Icon Mail">
                    rhett@singerbuilding.com.au
                </a>
            </li>
            <li>
                <a href="">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-location.png'); ?>" alt="Icon Location">
                    Nulla malesuada turpis vitae augue pulvinar fringilla.
                </a>
            </li>
           </ul>
        </li>
    </ul>

    <div class="credit">
        <p>
            © 2023 Singer Building. All Rights Reserved.
        </p>
        <p>
            Web Design by: Netwizard Design
        </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
