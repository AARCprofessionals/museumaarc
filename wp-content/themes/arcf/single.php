    <?php get_header('gallery'); ?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-gallery.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/custom.css" type="text/css" media="screen" />

    <div class="sidebar" id="left"></div>
    <div class="sidebar" id="right"></div>

    <div id="timelineWrapper">

      <div id="timeline">

        <?php
        $url_slug = $wp_the_query->query_vars['arcf_gallery'];

        $gallery_id = get_posts('name='.$url_slug.'&post_type=arcf_gallery');
        $category_id = get_term_by('slug', $url_slug, 'category', ARRAY_N);

        $categories = $wpdb->get_results( $wpdb->prepare("SELECT t.term_id, t.name, t.slug FROM wp_terms t INNER JOIN wp_term_taxonomy tx ON t.term_id = tx.term_id WHERE tx.parent = %d ORDER BY t.term_order", $category_id[0]) );

        foreach ($categories as $category)	{

        $args = array(
          'post_type' => 'arcf_exhibit',
          'meta_query' => array(
          array(
            'key' => 'gallery',
            'value' => $gallery_id[0]->ID,
            'compare' => '='
          )
        ),
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $category->term_id
          ),
        ),
        'order_by' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1
        );

        $subquery = new WP_Query($args);

        if ( $subquery->have_posts() ):
        echo '<div class="divider"><p>'.str_replace(' ', '<br />', $category->name).'</p></div>';
        while ( $subquery->have_posts() ):
        $subquery->the_post();
        ?>
          <?php $image = get_field('exhibit_image');?>
          <div class="event <?php if (empty($image)): echo 'noimage'; endif; ?>">
            <?php
            if (!empty($image)):
              ?>
            <a rel="prettyPhoto[gallery<?php the_ID(); ?>]" href="<?php echo get_field('exhibit_image'); ?>" title="<?php the_title(); ?>">

                <img src="<?php echo $image; ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php the_title(); ?>" />
              </a>

            <?php else: ?>
              <a rel="prettyPhoto[gallery<?php the_ID(); ?>]" href="<?php echo get_field('exhibit_image'); ?>" title="<?php the_title(); ?>">
                <div class="image-placeholder"> </div>
              </a>
            <?php endif; ?>

            <div class="eventDetails" <?php if (empty($image)){echo 'style="top: 0px;"';} ?>>
              <h2 <?php if (!empty($image)){echo 'class="closed has-image"';} ?>><?php the_title(); ?></h2>
              <div class="eventInfo">
                <p><?php echo get_field('description'); ?></p>
                <p><?php echo get_field('image_credit'); ?></p>
                <a class="readMore" href="">Read More &rarr;</a>
                <!--
                <a title="ginevra_details1" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details1.png"></a>
                <a title="ginevra_details3" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details3.png"></a>
                <a title="ginevra_details2" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details2.png"></a>
                <a title="ginevra_details4" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details4.png"></a>
                -->
              </div>
            </div>
          </div>
          <?php
          endwhile;
          endif;

          }

          ?>



        <!--
        <div class="divider">1470s</div>

        <div class="event">
        <a rel="prettyPhoto[gallery6]" href="/files/1474/05/A14623-985x1024.jpg" title="Ginevra de&#8217; Benci">
        <img src="/files/1474/05/A14623-336x350.jpg" class="attachment-post-thumbnail wp-post-image" alt="Leonardo da Vinci (Italian, 1452 - 1519 ), Ginevra de&#039; Benci, c. 1474/1478, oil on panel, Ailsa Mellon Bruce Fund" />
        </a>
        <div class="eventDetails">
        <h2>Ginevra de&#8217; Benci - 1474</h2>
        <div class="eventInfo">
        <p>Portrait Painting in Florence in the Later 1400s She was the daughter of a wealthy Florentine banker, and her portrait&mdash;the only painting by Leonardo da Vinci in the Americas&mdash;was probably &#8230;</p>
        <a class="readMore" href="/1474/05/ginevra-de-benci/">Read More &rarr;</a>
        <a title="ginevra_details1" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details1.png"></a>
        <a title="ginevra_details3" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details3.png"></a>
        <a title="ginevra_details2" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details2.png"></a>
        <a title="ginevra_details4" class="attachmentGallery" rel="prettyPhoto[gallery6]" href="/files/1474/05/ginevra_details4.png"></a>
        </div>
        </div>

        </div>

        <div class="event">
        <a rel="prettyPhoto[gallery13]" href="/files/1474/05/A14629-976x1024.jpg" title="Wreath of Laurel">
        <img src="/files/1474/05/A14629-333x350.jpg" class="attachment-post-thumbnail wp-post-image" alt="Wreath of Laurel" />
        </a>
        <div class="eventDetails">
        <h2>Wreath of Laurel - 1474</h2>
        <div class="eventInfo">
        <p>Ginevra de&#8217; Benci&#8217;s portrait is two-sided. This is the back, an emblematic portrait of Ginevra. A scroll bears her Latin motto, meaning &#8220;Beauty Adorns Virtue.&#8221; In the emblem&#8217;s center, a &#8230;</p>
        <a class="readMore" href="/1474/05/wreath-of-laurel/">Read More &rarr;</a>
        <a title="laurel_details1" class="attachmentGallery" rel="prettyPhoto[gallery13]" href="/files/1474/05/laurel_details1.png"></a>
        <a title="laurel_details2" class="attachmentGallery" rel="prettyPhoto[gallery13]" href="/files/1474/05/laurel_details2.png"></a>
        <a title="laurel_details3" class="attachmentGallery" rel="prettyPhoto[gallery13]" href="/files/1474/05/laurel_details3.png"></a>
        <a title="laurel_details4" class="attachmentGallery" rel="prettyPhoto[gallery13]" href="/files/1474/05/laurel_details4.png"></a>
        </div>
        </div>
        </div>

        <div class="divider">1500s</div>

        <div class="event">
        <iframe src="http://player.vimeo.com/video/13648230?title=0&amp;byline=0&amp;portrait=0&amp;color=39566B&amp;loop=1" width="231" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

        <div class="eventDetails">
        <h2>The Mona Lisa - 1503</h2>
        <div class="eventInfo">
        <p>The Mona Lisa is a half-length portrait of a woman by the Italian artist Leonardo da Vinci, which has been acclaimed as &#8220;the best known, the most visited, the most &#8230;</p>
        <a class="readMore" href="/1503/05/the-mona-lisa/">Read More &rarr;</a>
        </div>
        </div>
        </div>

        <div class="divider">1510s</div>

        <div class="event">
        <a rel="prettyPhoto[gallery18]" href="/files/1514/05/A10790-1024x945.jpg" title="The Feast of the Gods">
        <img src="/files/1514/05/A10790-379x350.jpg" class="attachment-post-thumbnail wp-post-image" alt="Giovanni Bellini and Titian (Italian, c. 1430/1435 - 1516 ), The Feast of the Gods, 1514/1529, oil on canvas, Widener Collection" />
        </a>
        <div class="eventDetails">
        <h2>The Feast of the Gods - 1514</h2>
        <div class="eventInfo">
        <p>Giovanni Bellini and Titian’s The Feast of the Gods is one of the greatest Renaissance paintings in the United States by two fathers of Venetian art. In this illustration of &#8230;</p>
        <a class="readMore" href="/1514/05/the-feast-of-the-gods/">Read More &rarr;</a>
        <a title="feast_details1" class="attachmentGallery" rel="prettyPhoto[gallery18]" href="/files/1514/05/feast_details1.png"></a>
        <a title="feast_details2" class="attachmentGallery" rel="prettyPhoto[gallery18]" href="/files/1514/05/feast_details2.png"></a>
        <a title="feast_details3" class="attachmentGallery" rel="prettyPhoto[gallery18]" href="/files/1514/05/feast_details3.png"></a>
        <a title="feast_details4" class="attachmentGallery" rel="prettyPhoto[gallery18]" href="/files/1514/05/feast_details4.png"></a>
        <a title="feast_details5" class="attachmentGallery" rel="prettyPhoto[gallery18]" href="/files/1514/05/feast_details5.png"></a>
        </div>
        </div>
        </div>

        <div class="event">
        <a rel="prettyPhoto[gallery23]" href="/files/1515/05/A15040-1024x588.jpg" title="Orpheus">
        <img src="/files/1515/05/A15040-608x350.jpg" class="attachment-post-thumbnail wp-post-image" alt="Venetian 16th Century, Orpheus, c. 1515, oil on panel transferred to canvas, Widener Collection" />
        </a>
        <div class="eventDetails">
        <h2>Orpheus - 1515</h2>
        <div class="eventInfo">
        <p>Artist: Venetian 16th Century Title: Orpheus Dated: c. 1515 Medium: oil on panel transferred to canvas Classification: Painting Dimensions: overall: 39.5 x 81 cm (15 9/16 x 31 7/8 in.) &#8230;</p>
        <a class="readMore" href="/1515/05/orpheus/">Read More &rarr;</a>
        <a title="orpheus_details1" class="attachmentGallery" rel="prettyPhoto[gallery23]" href="/files/1515/05/orpheus_details1.png"></a>
        <a title="orpheus_details2" class="attachmentGallery" rel="prettyPhoto[gallery23]" href="/files/1515/05/orpheus_details2.png"></a>
        <a title="orpheus_details3" class="attachmentGallery" rel="prettyPhoto[gallery23]" href="/files/1515/05/orpheus_details3.png"></a>
        <a title="orpheus_details4" class="attachmentGallery" rel="prettyPhoto[gallery23]" href="/files/1515/05/orpheus_details4.png"></a>
        </div>
        </div>
        </div>

        <div class="event">
        <a rel="prettyPhoto[gallery26]" href="/files/1518/05/A10623-1024x716.jpg" title="A Concert">
        <img src="/files/1518/05/A10623-500x350.jpg" class="attachment-post-thumbnail wp-post-image" alt="Cariani (Italian, 1485/1490 - 1547 or after ), A Concert, c. 1518-1520, oil on canvas, Bequest of Lore Heinemann in memory of her husband, Dr. Rudolf J. Heinemann" />
        </a>
        <div class="eventDetails">
        <h2>A Concert - 1518</h2>
        <div class="eventInfo">
        <p>Reproduced on the cover of the standard monograph on Cariani, A Concert is widely regarded as the artist&#8217;s masterpiece. The painting first came to light in the 1960s, when it &#8230;</p>
        <a class="readMore" href="/1518/05/a-concert/">Read More &rarr;</a>
        <a title="concert_details1" class="attachmentGallery" rel="prettyPhoto[gallery26]" href="/files/1518/05/concert_details1.png"></a>
        <a title="concert_details2" class="attachmentGallery" rel="prettyPhoto[gallery26]" href="/files/1518/05/concert_details2.png"></a>
        <a title="concert_details3" class="attachmentGallery" rel="prettyPhoto[gallery26]" href="/files/1518/05/concert_details3.png"></a>
        <a title="concert_details4" class="attachmentGallery" rel="prettyPhoto[gallery26]" href="/files/1518/05/concert_details4.png"></a>
        </div>
        </div>
        </div>
        -->

      </div><!--end timeline-->

    </div><!--end timelineWrapper-->

    <div id="controlsWrapper">
      <div id="controls">
        <div id="referenceWrapper">
          <div id="reference">
            <div id="marker">
              <div id="markerInfo"></div>
            </div>
            <div id="progress"></div>
            </div><!--end reference-->
            <!--<div id="hoverInfo"></div>-->
            <div class="sidebarSmall" id="leftSmall"></div>
            <div class="sidebarSmall" id="rightSmall"></div>
          </div><!--end referenceWrapper-->
        </div><!--end controls-->
      </div><!--end controlsWrapper-->

    </div><!--end wrapper-->

    <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/touch.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/prettyPhoto.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/activity.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/backPosition.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/masonry.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/infinite.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/respond.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>

    <!-- From footer -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.iosslider.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.inview.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/responsiveslides.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

    <?php wp_footer(); ?>

  </body>
</html>