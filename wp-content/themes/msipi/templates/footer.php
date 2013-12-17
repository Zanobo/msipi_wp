<div class="container container-bottom">

	<footer class="navbar navbar-default msipi-navbar-footer" role="contentinfo">

    <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav pull-left'));
      endif;
    ?>  
	    

	<p class='navbar-text'>&copy; <?php echo date('Y'); ?>  FNC, Inc. All rights reserved.</p>

	      
	</footer>

<?php wp_footer(); ?>


