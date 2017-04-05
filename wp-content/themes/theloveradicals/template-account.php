<?php
/* Template Name: User Account Page */
acf_form_head();
get_header();

if(isset($_GET['updated'])) :
  $status = $_GET['updated'];
else :
  $status = 'viewed';
endif;

if(isset($_GET['newuser'])) :
  $status = 'new_user';
endif;

if(isset($_GET['username'])) :
  $new_user_name = $_GET['username'];
endif;

$form_options = array(
  	'id'           => 'user-form',
  	'post_id'      => 'user_'.get_current_user_id(),
  	'field_groups' => array(45),
  	'submit_value' => __("Update My Info", 'acf'),
    'updated_message' => __("Information updated", 'acf'),
);
$login_args = array(
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
$story_args = array(
  'author'         => get_current_user_id(),
  'post_status'    => 'any',
);
?>

	<main role="main container-fluid">
	<?php get_template_part('/inc/post-header'); ?>

	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post();	?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
			<div class=" col-md-12 story_post">
				<!-- post title -->
				<div class="col-md-8 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1 row">
					<div class="post_info">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<!-- /post title -->

				<section class="col-md-8 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1 row">

          <? if($status == 'true') : ?>
            <div class="alert alert-success" role="alert">
              <strong>Awesome!</strong> You successfully updated your profile.
            </div>
          <?php elseif($status == 'new_user') : ?>
            <div class="alert alert-info" role="alert">
              <strong>Welcome <?php echo $new_user_name; ?>.</strong> Login below to get started.
            </div>
          <?php elseif($status != 'new_user' && !is_user_logged_in()) : ?>
          <div class="alert alert-info" role="alert">
            <strong>Whoops.</strong> Please login to edit your account.
          </div>
          <?php endif; ?>
				<?php
					if (is_user_logged_in() || current_user_can('manage_options')) : ?>

            <?php the_content(); ?>
            <ul  class="nav nav-tabs">
                <li class="active"><a  href="#userinfo" data-toggle="tab">My Account</a></li>
                <li><a href="#stories" data-toggle="tab">My Stories</a></li>
            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="userinfo">
                  <?php acf_form($form_options); ?>
                </div>
                <div class="tab-pane" id="stories">
                    <?php
                      // The Query
                      $story_query = new WP_Query( $story_args );

                      // The Loop
                      if ( $story_query->have_posts() ) :
                      	echo '<div class="user_stories col-md-10 col-md-offset-1 row">';
                      	while ( $story_query->have_posts() ) :
                      		$story_query->the_post();
                          if(get_field('featured_image')) :
                            $image_url = get_field('featured_image');
                          else :
                            $author_id = get_the_author_meta('ID');
                            $image_url = get_field('photo', 'user_'. $author_id );
                          endif;
                          $post_status = get_post_status();
                          $image_args = array(
                            'src'            => $image_url,
                            'w'              => 100,
                            'h'              => 100,
                          );
                          ?>
                          <div class="row">

                            <div class="post_thumb col-md-3 col-sm-12 col-xs-12">
                              <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_field('story_title'); ?>">
                              </a>
                            </div>

                            <div class="post_info col-md-9 col-sm-12 col-xs-12">
                                <h2><a href="<?php the_permalink(); ?>"><?php echo the_field('story_title'); ?></a></h2>
                                <?php

                                if($post_status == 'draft') : ?>
                                  <div class="alert alert-info">This story is in review.</div>
                                <?php elseif($post_status == 'publish') : ?>
                                  <div class="alert alert-success">This story has been published.</div>
                                <?php endif; ?>
                                <span class="story_excerpt"><?php echo strip_tags(mapi_word_limit(get_field('story'), 20)); ?>...</span>
                            </div>

                          </div>
                          <hr />
                        <?php

                      	/* Restore original Post Data */
                      	wp_reset_postdata();
                      endwhile;
echo '</div>';
                    endif;
                     ?>
                </div>
            </div>

					<?php else : //user is not logged in ?>

            <?php the_content(); ?>
            <?php get_template_part('/inc/login-register'); ?>
					<?php endif; ?>
				</section>

			</div>

		</article>
		<!-- /article -->

	<?php endwhile; endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
