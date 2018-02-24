<?php include(TEMPLATEPATH."/header.php");?>


	<?php while ( have_posts() ) : the_post(); ?>

		<?php if (is_front_page()) {?>
			
		<?php } else { ?>
			
		<?php } ?>
		<div id="main-content">
		    <h2>Woops...</h2>  
		    <p>Sorry, nothing was found. Maybe go back to the <a href="<?php bloginfo('url'); ?>">homepage</a>.</p>
		 </div>
		</div> <!-- End #header div -->
	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>