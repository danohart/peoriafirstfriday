<?php include(TEMPLATEPATH."/header.php");?>
<!-- Single template for Spaces page -->
    <div id="main-content">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php 

        $current_address = get_post_meta( $post->ID, '_space_address', true );
        $current_alcohol = get_post_meta( $post->ID, '_space_alcohol', true );
        $spacetypes = array( 'Studio', 'Gallery', 'Bar', 'Restuarant' );
        $current_spacetypes = ( get_post_meta( $post->ID, '_space_spacetypes', true ) ) ? get_post_meta( $post->ID, '_space_spacetypes', true ) : array();

        ?>
      <div class="card">
        <h1><?php the_title();?></h1>
        <h3>Loction Address</h3>
        <p>
          <?php echo $current_address; ?>
        </p>

        <h3>Is Alcohol Served?</h3>
        <p>
          <?php echo $current_alcohol; ?>
        </p>

        <h3>Type of Space</h3>
        <p>
          <?php
          foreach ( $spacetypes as $spacetype ) {
            ?>
            <input type="checkbox" name="spacetypes[]" value="<?php echo $spacetype; ?>" <?php checked( ( in_array( $spacetype, $current_spacetypes ) ) ? $spacetype : '', $spacetype ); ?> /><?php echo $spacetype; ?> <br />
            <?php
          }
          ?>
        </p>
      </div>
      <?php endwhile; // End of the loop. ?>
    </div>
  </div> <!-- End #header div -->

<?php get_footer(); ?>