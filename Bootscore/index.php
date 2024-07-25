<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'index'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-4 pb-5', 'index'); ?>">
    <div id="primary" class="content-area">
    
      <main id="main" class="site-main">

      <div class="mb-4 round align-center">

<!-- Top 4 Small News / Events -->
        <div class="mb-4 rounded text-body-emphasis bg-body border">
          <div class="row g-0">

            <?php
            $sticky = get_option( 'sticky_posts' );

            $args      = array(
              'post__in'            => $sticky,
              'ignore_sticky_posts' => true,
              'posts_per_page'      => 4,
            );
            
            $the_query = new WP_Query($args);  
            while ($the_query->have_posts()) : $the_query->the_post(); ?>

              <div class="col-lg-3 col-12 m-auto p-1"> <!-- Responsive Column -->

                
                <a href="<?php the_permalink(); ?>" class="text-dark three-header-text no-undersore">
                  <img src="<?php the_post_thumbnail_url(); ?>" class="float-start three-header-img">
                </a>
               

                  <div class="row justify-content-evenly">

                      <div class="col p-1 three-header-text lh-sm">
                        
                        <?php bootscore_category(); ?>

                        <a href="<?php the_permalink(); ?>" class="text-dark no-undersore ">
                          
                          <?php if( strlen(get_the_title()) <= 68 ) { ?>
                            <br><h7 class="fw-semibold" style="font-size: 12px"><?php the_title(); ?></h7>
                          <?php } else { ?>
                            <br><h7 class="fw-semibold" style="font-size: 12px"><?php the_title(); ?></h7>
                          <?php } ?>
                          <br><span class="text-body-secondary"><?= wp_trim_words(strip_tags(get_the_excerpt()), 5); ?></span>

                        </a>

                      </div>

                  </div>
                  
                </a>
              </div>

            <?php
            endwhile;
            ?>

          </div>
        </div>

<!-- Main Post / Image -->
            
              <?php
              $args      = array(
                'ignore_sticky_posts' => true,
                'posts_per_page'      => 1,
                'offset'              => 0,
              );
              
              $the_query = new WP_Query($args);

              if ($the_query->have_posts()) : $the_query->the_post(); ?>

                <a href="<?php the_permalink(); ?>">
                  <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis border border-dark-subtle" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-position: center; width:100%; height: 450px; object-fit: cover;">
                      <div class="col-lg-6 p-4 mb-4 rounded text-body-emphasis position-relative top-50 start-0 translate-middle-y" style="background: rgba(0,0,0,0.85);" >
                        <span><?php the_title('<h1 class="fs-1" style="color: white; font-size: 34px;">', '</h1>'); ?></span><!-- mix-blend-mode: difference; -->

                        <p class="lead my-3" style="color: white;"><?= wp_trim_words(strip_tags(get_the_content()), 25); ?></p>

                        <p class="lead mb-0"><a href="<?php the_permalink(); ?>" class="fw-bold" style="color: white;" >Continue reading...</a></p>

                      </div>
                  </div>
                  </div>
                </a>
            



<!-- Double Posts Row-->
  <div class="row">
                
                <?php
                $args      = array(
                  'ignore_sticky_posts' => true,
                  'posts_per_page'      => 2,
                  'offset'              => 1,
                );
                
                $the_query = new WP_Query($args);

                while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <div class="col-md-6">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <div class="card horizontal mb-4">
                    <div class="row g-0">

                      <?php if (has_post_thumbnail()) : ?>
                        <div class="col-lg-6 px-0">
                          <a href="<?php the_permalink(); ?>" >
                            <?php the_post_thumbnail('medium', array('style' => 'width:100%; height: 250px; object-fit: cover;', 'class' => 'card-img-lg-start')); ?>
                          </a>
                        </div>
                      <?php endif; ?>

                      <div class="col">
                        <div class="card-body">

                          <div class="row">
                            <div class="col-10">
                              <?php bootscore_category_badge(); ?>
                            </div>
                            <div class="col-2 text-end">
                              
                            </div>
                          </div>

                          <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                            <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                          </a>

                          <?php if ('post' === get_post_type()) : ?>
                            <p class="meta small mb-2 text-body-secondary">
                              
                            </p>
                          <?php endif; ?>

                          <p class="card-text">
                            <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                              <span class="fw-semibold"><?= wp_trim_words(strip_tags(get_the_content()), 10); ?></span>
                              <br><span class="text-secondary"><?= wp_trim_words(strip_tags(get_the_excerpt()), 10); ?></span>
                            </a>
                          </p>

                          <p class="card-text">
                            <?php the_date(); ?>
                            <a class="read-more" href="<?php the_permalink(); ?>">
                              
                              <?php _e('Read more »', 'bootscore'); ?>
                            </a>
                          </p>

                          <?php bootscore_tags(); ?>

                        </div>
                      </div>
                    </div>
                  </div>
  </div>
                          

                </article>
              <?php
              endwhile;
              endif;
              wp_reset_postdata();
              ?>

  </div>

    </div>

<!-- Middle quote && Sidebar for Events Only -->
        <div class="container">
          <div class="row" >

            <div class="col-xl-9 col-12 p-4 rounded text-body-emphasis text-center border border-danger mb-5">

              <div class="container position-relative top-50 start-50 translate-middle">
                
                <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/quote.svg')); ?>" class="mb-4">
                <?php dynamic_sidebar('quote-main'); ?>
                <?php dynamic_sidebar('quoted-by'); ?>

              </div>
            
            </div>
          
            <div class="col-lg ms-xl-4 rounded text-body-emphasis bg-body border border-subtle mb-5">
              
              <div class="p-3">
                
                <a href="<?php get_search_query( $escaped = true ) ?>"><h5 style="color: #53256e;">Events</h5></a>
                
                <?php 

                $args      = array(
                  'category_name'       => 'events',
                  'ignore_sticky_posts' => true,
                  'posts_per_page'      => 4,
                  'offset'              => 0,
                );
                
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) : ?>
                  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    
                    
                    <a class="no-undersore fs-6" style="color: black;" href="<?php the_permalink(); ?>"><p><strong><?php the_title(); ?></strong>
                    <br><span class="text-body-secondary"><?= wp_trim_words(strip_tags(get_the_excerpt()), 5); ?></span>
                    <br><span class="meta small mb-2 text-body-secondary"><?php the_date(); ?></span></a>
                    <div class="border-bottom"></div>
                    
                  <?php endwhile;
                endif;  ?>
                <p></p>

                <div class="container position-relative top-50 start-50 translate-middle-x">
                  <p class="text-center"><button class="btn btn-outline-danger"><a href="/category/events/" class="no-undersore" style="color: #ef582c;">View More</a></button></p>
                </div>

              </div>
            </div>
          </div>
        </div>


<!-- Post List -->
        <h1 class="text-center mb-4">Latest Posts</h1>

        <div class="d-flex">
          <div class="<?= apply_filters('bootscore/class/main/col', 'col'); ?>">
            <!-- Grid Layout -->
            <?php 
            $args      = array(
              'ignore_sticky_posts' => true,
              'posts_per_page'      => 3,
              'offset'              => 3,
            );
            
            $the_query = new WP_Query($args);

            
            if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php if (is_sticky()) continue; //ignore sticky posts ?>

                <div class="card horizontal mb-4">
                  <div class="row g-0">

                    <?php if (has_post_thumbnail()) : ?>
                      <div class="col-lg-4 col-xl-5 col-xxl-4">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start', 'style' => 'width:100%; height: 250px; object-fit: cover;')); ?>
                        </a>
                      </div>
                    <?php endif; ?>

                    <div class="col">
                      <div class="card-body">

                        <?php bootscore_category_badge(); ?>

                        <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                          <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                        </a>

                        <?php if ('post' === get_post_type()) : ?>
                          <p class="meta small mb-2 text-body-secondary">
                            <?php
                            the_date();
                            bootscore_author();
                            bootscore_comments();
                            bootscore_edit();
                            ?>
                          </p>
                        <?php endif; ?>

                        <p class="card-text">
                          <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                            <span class="fw-medium">  <?= wp_trim_words(strip_tags(get_the_content()), 35); ?></span>
                            <br><span class="text-secondary"><?= wp_trim_words(strip_tags(get_the_excerpt()), 10); ?></span>
                          </a>
                        </p>

                        <p class="card-text">
                          <a class="read-more" href="<?php the_permalink(); ?>">
                            <?php _e('Read more »', 'bootscore'); ?>
                          </a>
                        </p>

                        <?php bootscore_tags(); ?>

                      </div>
                    </div>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>

            <div class="entry-footer">
              <?php bootscore_pagination(); ?>
            </div>

          </div>
          <!-- col -->
          
        </div>
        
        <div class="container text-center mb-3"></div>
        <div class="text-center mb-5">
          <a href="?s=" class="btn btn-danger custom-btn">Read More</a>
        </div>  
        <div class="container text-center mb-5 border-bottom"></div>
        <div class="container text-center mb-5 border-bottom"></div>
        <!-- row -->
      </main><!-- #main -->

    </div><!-- #primary -->
  </div><!-- #content -->
<?php
get_footer();
