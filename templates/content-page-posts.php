<div class="col-md-8">
<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
</div>
<div class="col-md-4">
<?php
 $connected = new WP_Query( array(
          'connected_type' => 'posts_to_pages',
          'connected_items' => get_queried_object(),
          'nopaging' => true,
        ) );
 if ( $connected->have_posts() ) :
        while ( $connected->have_posts() ) : $connected->the_post(); ?>
                  <div class="well"><h2><?php the_title(); ?></h2><?php the_content(); ?></div>
                <?php
                endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
        <?php
        endif;
    ?>
</div>