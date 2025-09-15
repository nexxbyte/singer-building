<?php
/**
 * Header Template
 * 
 * @package SingerBuilding
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>Singer Building</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">

    <div class="pagewrapper">
        <!-- Logo -->
        <aside class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
            </a>
        </aside>

        <!-- Hamburger Menu -->
        <div class="menu">
            <a href="">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/menu.png'); ?>" alt="Menu">
            </a>
        </div>
    </div>
</header>