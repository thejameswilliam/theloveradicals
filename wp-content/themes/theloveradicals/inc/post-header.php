<div class="fade-scroll single_header col-md-12">

  <div class="single_title col-md-6 col-xs-6">
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
    <?php if(!is_home()) : the_field('story_title'); endif; ?>
  </div>

  <div class="single_navigation col-md-6 col-xs-6">

      <?php /* Primary navigation */
        wp_nav_menu( array(
          'menu' => 'top_menu',
          'depth' => 0,
          'container' => false,
          )
        );

    ?>
  </div>
</div>
