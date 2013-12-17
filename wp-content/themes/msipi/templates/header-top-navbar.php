<div class="container container-top">
	
	  <div class="row brand-bar">
	    <div class="col-lg-12">
	      <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
	  	</div>
	  </div>

<header class="banner navbar navbar-default msipi-navbar-header" role="banner">  
   	

	    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  
</header>
</div>
