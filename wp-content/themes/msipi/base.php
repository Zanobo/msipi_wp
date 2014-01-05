<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?> id="msipi">

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>

      <?php
      $EM_Booking = $EM_Event->get_bookings()->has_booking();
      ?>
      <?php if( is_object($EM_Booking) && !get_option('dbem_bookings_double') ): //Double bookings not allowed ?>
      <p>
        <?php echo get_option('dbem_bookings_form_msg_attending'); ?>
        <a href="<?php echo em_get_my_bookings_url(); ?>"><?php echo get_option('dbem_bookings_form_msg_bookings_link'); ?></a>
      </p>
      <?php else : ?>
        <p>No booking</p>
      <?php endif; ?>


    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>


</body>
</html>
