<?php
/**
 * Template Post Type: post
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'single'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-3 pb-5', 'single'); ?>">
    <div id="primary" class="content-area">

    <div class="container mb-3"></div>

      <div class="row bg-body rounded col-xl-9 col-auto">
        <div class="<?= apply_filters('bootscore/class/main/col', 'col'); ?>">

          <div class="container mb-4"></div>

          <main id="main" class="site-main">

            <div class="entry-header mb-4">
              <?php the_post(); ?>
              <?php bootscore_category_badge(); ?>
              <h1 style="font-family: serif;"><?php the_title(); ?></h1>
              <h5 class="text-body-secondary"><?php the_excerpt(); ?></h5>
              <p class="entry-meta ">
                <small class="text-body-secondary">
                  <?php
                  bootscore_date();
                  ?>
                </small>
              </p>
              <?php bootscore_post_thumbnail(); ?>
            </div>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <div class="entry-footer clear-both">
              <div class="mb-4">
                <?php bootscore_tags(); ?>
              </div>
              
              <?php comments_template(); ?>
            </div>

          </main>

        </div>
      </div>

    </div>
  </div>

<?php
get_footer();
