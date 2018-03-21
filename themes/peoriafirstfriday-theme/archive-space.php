<?php include(TEMPLATEPATH."/header.php");?>
<!-- archive template for Spaces page -->
    <div id="main-content" class="spaces">
    	<div class="filter-cat">
    		Select: 
		    <button class="all active">All</button>
		    <button class="Studio" data-cat="Studio ">Studio</button>
		    <button class="Gallery" data-cat="Gallery ">Gallery</button>
		    <button class="Restuarant" data-cat="Restuarant ">Restuarant</button>
		    <button class="Bar" data-cat="Bar ">Bar</button>
		    <button class="Shop" data-cat="Shop ">Shop</button>
		</div>
    	<div class="card-wrapper">
	        <?php while ( have_posts() ) : the_post(); ?>
	        <?php 
	        $current_tagline = get_post_meta( $post->ID, '_space_tagline', true );
	        $current_address = get_post_meta( $post->ID, '_space_address', true );
	        $current_website = get_post_meta( $post->ID, '_space_website', true );
	        $current_socialmedia = get_post_meta( $post->ID, '_space_socialmedia', true );
	        $spacetypes = array( 'Studio', 'Gallery', 'Bar', 'Restuarant', 'Shop' );
	        $current_spacetypes = ( get_post_meta( $post->ID, '_space_spacetypes', true ) ) ? get_post_meta( $post->ID, '_space_spacetypes', true ) : array();

	        ?>
	      <div class="card" data-cat="<?php foreach ( $spacetypes as $spacetype ) {if (in_array($spacetype, $current_spacetypes)) { ?><?php echo $spacetype; ?> <?php }}?>">
	      	<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-image"><?php the_post_thumbnail('space');?></div>
			<?php
			} else { ?>
				<div class="no-image"><img src="https://via.placeholder.com/500x300?text=<?php the_title();?>"/></div>
			<?php } ?>
			<div class="inside-wrap">
		        <h2><?php the_title();?></h2>
		        <span><em><?php echo $current_tagline; ?></em></span>

		        <p><?php echo $current_address; ?></p>
		        <p><a href="<?php echo $current_website; ?>" target="_blank">Website</a></p>
		        <div class="additional-info">
			        <!-- <h3>Is Alcohol Served?: <?php echo $current_alcohol; ?></h3> -->

			        <h3>Type of Space</h3>
			          	<?php
						foreach ( $spacetypes as $spacetype ) {
							if (in_array($spacetype, $current_spacetypes)) { ?>
							    <input type="button" value="<?php echo $spacetype; ?>">
							<?php }
						}
						?>
			    </div>
	    	</div>
	      </div>
	      <?php endwhile; // End of the loop. ?>
	  	</div>
    </div>
</div> <!-- End #header div -->

<?php get_footer(); ?>