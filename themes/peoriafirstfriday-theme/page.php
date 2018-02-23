<?php include(TEMPLATEPATH."/header.php");?>


	<?php while ( have_posts() ) : the_post(); ?>

		<?php if (is_front_page()) {?>
			
		<?php } else { ?>
			
		<?php } ?>
		<div id="main-content">
		    <h1><?php the_title();?></h1>
		    <?php the_content();?>
		 </div>
		</div> <!-- End #header div -->
	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>