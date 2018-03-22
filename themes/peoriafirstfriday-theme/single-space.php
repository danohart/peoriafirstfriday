<?php include(TEMPLATEPATH."/header.php");?>
<!-- Single template for Spaces page -->
    <div id="main-content" class="">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php 

        $current_address = get_post_meta( $post->ID, '_space_address', true );
        $current_alcohol = get_post_meta( $post->ID, '_space_alcohol', true );
        $spacetypes = array( 'Studio', 'Gallery', 'Bar', 'Restuarant' );
        $current_spacetypes = ( get_post_meta( $post->ID, '_space_spacetypes', true ) ) ? get_post_meta( $post->ID, '_space_spacetypes', true ) : array();

        ?>
      <div class="card">
        <div class="inside-wrap">
          <h1><?php the_title();?></h1>
          <h3>Loction Address</h3>
          <p>
            <?php echo $current_address; ?><br/>Peoria, IL
          </p>

          <?php if (empty($current_website)) { 
            } else { ?>
              <p><a href="<?php echo $current_website; ?>" target="_blank">Website</a></p>
          <?php } ?>

          <h3>Is Alcohol Served?</h3>
          <p>
            <?php echo $current_alcohol; ?>
          </p>

          <h3>Type of Space: 
          <?php
            foreach ( $spacetypes as $spacetype ) {
              if (in_array($spacetype, $current_spacetypes)) { ?>
                  <input type="button" value="<?php echo $spacetype; ?>">
              <?php }
            } ?></h3>
        </div>
      </div>
      <?php endwhile; // End of the loop. ?>
    </div>
  </div> <!-- End #header div -->

<?php get_footer(); ?>