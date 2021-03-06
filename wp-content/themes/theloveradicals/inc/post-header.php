<div class="fade-scroll single_header row">

  <div class="single_title col-md-4 col-xs-4">
    <a href="<?php echo site_url()?>">
      <i class="fa fa-home nav-icon" aria-hidden="true"></i>
      <div class="right-tip">Home</div>
    </a>
    <?php if(is_user_logged_in()) : ?>
    <a href="<?php echo site_url( '/account ')?>">
      <i class="fa fa-user-circle-o nav-icon" aria-hidden="true"></i>
      <div class="right-tip">My Account</div>
    </a>
    <?php endif; ?>
    <span class="hidden-sm hidden-xs"><?php if(!is_home() && is_single()) : the_field('story_title'); endif; ?></span>
  </div>
  <button type="button" class="navbar-toggle menu_toggle pull-right collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <i class="fa fa-bars" aria-hidden="true"></i>
  </button>
  <div role="navigation" id="navbar-collapse" class="single_navigation collapse pull-right navbar-collapse col-md-6 col-xs-12">

      <?php
        wp_nav_menu( array(
          'menu' => 'top_menu',
          'menu_class' => 'menu',
          'depth' => 0,
          'container' => false,
          )
        );

    ?>
  </div>
</div>
