<?php
  get_header();
  $blog_page_id     = get_post_field( 'ID', get_option( 'page_for_posts' ) );
  $blog_page_title  = get_post_field( 'post_title', get_option( 'page_for_posts' ) );
?>

<main role="main" class="site-content">

  <section class="content">

    <?php edit_post_link( 'Edit', '<p>', '</p>', $blog_page_id ); ?>
    <h1 class="page-title"><?php echo $blog_page_title; ?></h1>

    <ul class="hfeed preview-list preview-list--blog">
    <?php
      $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
      $blog_args = array(
        'post_type' => 'post',
        'paged' => $paged
      );
      $query = new WP_Query( $blog_args );

      if( $query->have_posts() ) while ( $query->have_posts() ) : $query->the_post();
    ?>

      <?php include( PARENT_TMPL_DIR . '/modules/mod-post-preview.php' ); ?>

    <?php endwhile; ?>
    </ul>

    <?php if ( function_exists( 'pagination' ) ) { pagination( $query ); } ?>

    <?php wp_reset_postdata(); ?>

  </section>

  <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
