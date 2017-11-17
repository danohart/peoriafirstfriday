<?php include(TEMPLATEPATH."/header.php");?>


	<?php while ( have_posts() ) : the_post(); ?>

		<?php if (is_front_page()) {?>
			
		<?php } else { ?>
			<h1 class="page-title"><?php the_title();?></h1>
		<?php } ?>
		<div id="content">
			<p><?php the_content();?></p>
			<div class="fb-events">
				<h2 align="center">Upcoming Art &amp; First Friday Events</h2>
				<div class="subtitle">Curated By <a href="http://collecture.co/">Collecture</a></div>
				<div class="fb-page" data-href="https://www.facebook.com/collecture.co" data-tabs="events" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
					<blockquote cite="https://www.facebook.com/collecture.co" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/collecture.co">Collecture</a></blockquote>
				</div>
			</div>
			<?php comments_template( '/comments.php' ); ?>
		</div>
	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>  