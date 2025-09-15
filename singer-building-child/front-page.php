<?php
/* Template Name: Home */
get_header();
?>

<main class="home-page">

  <!-- Hero Slider -->
  <?php if ( $hero = get_field('hero_image') ) : ?>
    <section class="hero">
      <div class="hero-slide">
        <img src="<?php echo esc_url($hero['url']); ?>" alt="<?php echo esc_attr($hero['alt']); ?>">
      </div>
    </section>
  <?php endif; ?>

  <!-- Why Singer Building -->
  <?php if ( get_field('why_title') || get_field('why_text') ) : ?>
    <section class="why-singer">
        <article>
          <h2><?php the_field('why_title'); ?></h2>
          <p><?php the_field('why_text'); ?></p>
          <?php if ( $btn = get_field('why_button') ) : ?>
            <a href="<?php echo esc_url($btn['url']); ?>" class="btn btn-primary">
              <?php echo esc_html($btn['title']); ?>
            </a>
          <?php endif; ?>
        </article>

        <aside>
          <?php if ( $img = get_field('why_image') ) : ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
          <?php endif; ?>
        </aside>
    </section>
  <?php endif; ?>

  <!-- Portfolio -->
  <?php
    $args = array(
        'post_type'      => 'portfolio',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <section class="portfolio">
            <div class="pagewrapper">
                <h2><?php the_field('portfolio_title'); ?></h2>
                <div class="portfolio-grid">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="portfolio-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>


  <!-- Industry Section -->
  <?php if ( get_field('industry_title') ) : ?>
    <?php $bg = get_field('industry_bg'); ?>
    <section class="industry" <?php if ($bg) : ?>style="background-image: url('<?php echo esc_url($bg['url']); ?>');"<?php endif; ?>>
        <div class="pagewrapper">
            <div class="overlay">
                <?php if (get_field('industry_title')) : ?>
                <h2><?php the_field('industry_title'); ?></h2>
                <?php endif; ?>

                <?php if (get_field('industry_text')) : ?>
                <div class="industry-text">
                    <?php the_field('industry_text'); ?>
                </div>
                <?php endif; ?>

                <?php if ( $btn = get_field('industry_button') ) : ?>
                <a href="<?php echo esc_url($btn['url']); ?>" class="btn btn-primary">
                    <?php echo esc_html($btn['title']); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


  <!-- CTA Section -->
  <?php if ( get_field('cta_title') ) : ?>
    <section class="cta">
        <div class="pagewrapper">
            <h2><?php the_field('cta_title'); ?></h2>
            <p><?php the_field('cta_text'); ?></p>
            <div class="cta-actions">
                <?php if ( $phone = get_field('cta_phone') ) : ?>
                <a href="tel:<?php echo esc_attr($phone); ?>" class="btn phone btn-outline">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-phone.png'); ?>" alt="Icon Phone">
                    <?php echo esc_html($phone); ?>
                </a>
                <?php endif; ?>
                <?php if ( $btn = get_field('cta_button') ) : ?>
                <a href="<?php echo esc_url($btn['url']); ?>" class="btn btn-primary">
                    <?php echo esc_html($btn['title']); ?>
                </a>
                <?php endif; ?>
            </div>
      </div>
    </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
