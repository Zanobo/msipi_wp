<header class="entry-header">
  <h1 class="entry-title">HERES A TGEST OMG<?php echo $EM_Event->output('#_EVENTNAME'); ?></h1>
</header>
<div class="entry-content">
  <p><?php echo $EM_Event->output('#_EVENTNOTES'); ?></p>
</div>
~


<header class="entry-header">
  <h1 class="entry-title"><?php echo $EM_Event->output('#_EVENTNAME'); ?>
    <small>
      <?php echo $EM_Event->output('#_EVENTTIMES'); ?> on <?php echo $EM_Event->output('#_EVENTDATES'); ?>
      <?php echo $EM_Event->output('#_LOCATIONLINK'); ?>
    </small>
  </h1>
  <div style="float:right; margin:0px 0px 15px 15px;"><?php echo $EM_Event->output('#_LOCATIONMAP'); ?></div>
</header>
<div class="entry-content">
  <?php echo $EM_Event->output('#_PRV_ATTACHMENTS'); ?>
  <?php echo $EM_Event->output('#_EVENTNOTES'); ?>
  <h3>Register</h3>
  <?php echo $EM_Event->output('#_BOOKINGFORM'); ?>
</div>


