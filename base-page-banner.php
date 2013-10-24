<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>
  <?php
    $gallery_page = get_page_by_path('gallery');
    if($gallery_page){
    $args = array(
                'post_type' => 'attachment',
                'post_parent' => $gallery_page->ID,
                'orderby' => 'rand',
                'posts_per_page' => '1',
                'post_mime_type' => 'image',
                'post_status' => 'inherit'
              );
        
        
    $lead_image_query = new WP_Query($args);
    while ($lead_image_query->have_posts()) : $lead_image_query->the_post(); 
      echo wp_get_attachment_image( get_the_ID(), 'homepage-banner', false, array('class' => 'attachment-homepage-banner img-responsive')); 
    endwhile;
    wp_reset_query();
  }
  ?>
  <div class="container" role="document">
    <div class="content row">
      <div class="container" role="main">
        <?php
            // Find connected pages
            $connected = new WP_Query( array(
              'connected_type' => 'posts_to_pages',
              'connected_items' => get_queried_object(),
              'nopaging' => true,
            ) );
            $column_num = floor(12/$connected->post_count);
            // Display connected pages
            if ( $connected->have_posts() ) :
            ?>
              <div class="container">
                <div class="highlights">
                    <?php
                      $highlight_count = 1;
                    ?>
                    <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                      <div class="col-md-<?php echo $column_num; ?> text-center highlight<?php if ($highlight_count == $connected->post_count){ echo ' last'; } ?>" style="width: <?php echo 100/$connected->post_count; ?>%;"><?php the_content(); ?></div>
                    <?php 
                      $highlight_count ++;
                    endwhile;
                    ?>
                  <?php 
                  wp_reset_postdata();
                  ?>
                </div>
              </div>
            <?php
            endif;
        ?>
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
        <?php if (roots_display_sidebar()) : ?>
          <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
            <?php include roots_sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  <?php get_template_part('templates/footer'); ?>

</body>
</html>
