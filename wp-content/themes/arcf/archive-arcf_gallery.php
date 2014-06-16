<?php get_header(); ?>


  <section class="overview" id="overview">
    <div class="container-full">

      <!-- Section Title -->
      <div class="section row nomargin">
        <div class="desktop-full tablet-full mobile-full">
          <h1 class="section-title">Current Galleries</h1>
        </div>
      </div>
      <!-- End title -->

      <?php

        $args = array(
          'post_type' => 'arcf_gallery',
          'order_by' => 'menu_order',
          'posts_per_page' => -1
        );
        $subquery = get_posts($args);

        if ( $subquery ):
          foreach ($subquery as $post) : setup_postdata($post);

      ?>

      <!-- Content -->
      <div class="section row exhibit">
        <div class="col three mobile-full highlighted">
          <img src="" class="" width="100%" />
        </div>
        <div class="col eight mobile-full highlighted">
          <!-- Text for Desktop -->
          <div>
            <h3 style="text-transform: uppercase"><?php echo $post->post_title; ?></h3>
            <h4><?php echo date("M d, Y", strtotime($post->post_date)); ?></h4>
            <p class="underline showdesktop-inline">
              <?php echo $post->post_content; ?>
            </p>
          </div>

          <!-- Text for Tablet & Mobile -->
        </div>
      </div>
      <hr />
            <?php endforeach; ?>
          <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
