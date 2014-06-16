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
            $feature_image = get_field( 'feature_image' );
      ?>
      <!-- Content -->
      <div class="section row gallery-margin">
        <div class="col three mobile-full highlighted">
          <?php if ( !empty($feature_image) ): ?>
            <a href="<?php echo $post->guid ?>"><img src="<?php echo $feature_image['sizes']['medium']; ?>" class="" width="100%" /></a>
          <?php else: ?>
            <h5><em>Image not found</em></h5>
          <?php endif; ?>
        </div>
        <div class="col eight mobile-full highlighted">
          <!-- Text for Desktop -->
          <div>
            <h3 style="text-transform: uppercase"><a href="<?php echo $post->guid ?>"><?php echo $post->post_title; ?></a></h3>
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
