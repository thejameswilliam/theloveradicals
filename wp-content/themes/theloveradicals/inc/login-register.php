<ul  class="nav nav-tabs">
    <li class="active"><a href="#new" data-toggle="tab">Login</a></li>
    <li><a  href="#login" data-toggle="tab">Create My Account</a></li>
</ul>

<div class="tab-content clearfix">
    <div class="tab-pane active" id="new">
      <div class="col-md-6 col-md-offset-3 row">
        <?php
        $args = array(
          'echo'           => true,
          'remember'       => false,
          'redirect'       => site_url( '/account/ ' ),
          'label_username' => __( 'Username' ),
          'label_password' => __( 'Password' ),
          'label_remember' => __( 'Remember Me' ),
          'label_log_in'   => __( 'Log In' ),
          'value_username' => '',
          'value_remember' => false
        );
        wp_login_form( $args ); ?>
      </div>
    </div>
    <div class="tab-pane" id="login">
      <?php gravity_form(1, $display_title = true, $display_description = true, $ajax = true, 100, $echo = true );
?>
    </div>
</div>
