<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'page'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-4 pb-5', 'page'); ?>">
    <div id="primary" class="content-area">

      <div class="row bg-body rounded col-xl-9 col-auto">
        <div class="<?= apply_filters('bootscore/class/main/col', 'col'); ?>">

          <div class="container mb-4"></div>
          <main id="main" class="site-main">

            <div class="entry-header mb-4">
              <?php the_post(); ?>
              <h1 class="mb-4"><?php the_title(); ?></h1>
              <?php bootscore_post_thumbnail(); ?>
            </div>

            <div class="entry-content mb-4">
              <?php the_content(); ?>
            </div>

            <div class="entry-footer">
              <?php comments_template(); ?>
            </div>

          </main>

        </div>
      </div>

    </div>
  </div>

<?php
get_footer();
?>