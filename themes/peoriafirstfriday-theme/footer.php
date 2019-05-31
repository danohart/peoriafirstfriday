<div class="pre-footer">
  <h4>
  Download the logo to use on your First Friday promotional material <a class="button" href="http://peoriafirstfriday.com/wp-content/uploads/2019/05/1stFriday-Logo-LetteringWorks-May2019.zip">Download</a></div>
   <!--  <?php 
      $today  = new DateTime();
      $this_months_friday = new DateTime('first friday of this month');
      $next_months_friday = new DateTime('first friday of next month');
      echo 'The Next First Friday Is ',$this_months_friday->format('M j');
      if ($today = $this_months_friday) {
        echo 'Today is First Friday';
      } elseif ($today < $this_months_friday) {
        echo 'The Next First Friday Is ',$this_months_friday->format('M j');
      } else {
        echo 'The Next First Friday Is ',$next_months_friday->format('M j');
      }
       
      // echo 'The Next First Friday is ',( $today < $this_months_friday) ? $this_months_friday->format('M j') : $next_months_friday->format('M j');
      
    ?> -->


  </h4>
</div>

<footer>
  <?php dynamic_sidebar( 'footer' ); ?>
  <div class="powered-by">
  	<div>
  		Powered by <a href="http://hellopeoria.co/"><img src="<?php bloginfo('template_url');?>/images/hellopeoria.png" alt="Hello Peoria" width="auto" height="42px"/></a>
  	</div>
  	<div>
  		Logo Design by <a href="http://letteringworks.com/"><img src="<?php bloginfo('template_url');?>/images/letteringworks.png" alt="Lettering Works"/></a>
  	</div>
    <div>
      Photos by <a href="http://violetandivy.com/"><img src="<?php bloginfo('template_url');?>/images/violetandivy.png" alt="Violet And Ivy Photography"/></a>
    </div>
  	<div>
  		Hosted by <a href="http://graphicalforce.com/"><img src="<?php bloginfo('template_url');?>/images/graphicalforce.png" alt="Graphical Force"/></a>
  	</div>
  </div>

  <div class="wbbb"><a href="https://www.instagram.com/explore/tags/westbluffbestbluff/">#westbluffbestbluff</a></div>
</footer>

<?php wp_footer();?>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41524322-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-41524322-17');
</script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/peoriafirstfriday-theme.js" ></script>
</body>
</html>