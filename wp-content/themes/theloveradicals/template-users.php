<?php
/* Template Name: Writer List Page */
get_header();


$user_args = array(
	'blog_id'      => $GLOBALS['blog_id'],
	'orderby'      => 'display_name',
 );

// The Query
$user_query = new WP_User_Query( $user_args );
?>
<main role="main container-fluid">
	<?php get_template_part('/inc/post-header'); ?>
  	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class('story row'); ?>>
						<div class="author_meta col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
							<?php
              if (!empty( $user_query->results)) :
              foreach ( $user_query->results as $user ) :

                $author_id = $user->id;
                $author_url = get_author_posts_url($author_id);
                $author_image = get_field('photo', 'user_'. $author_id );

                $pen_name_option = get_field('under_pen_name', 'user_'. $author_id );
                if($pen_name_option == 'true') :
                	$author_name = get_field('pen_name', 'user_'. $author_id );
                else :
                	$author_name = get_the_author_meta('display_name', $author_id);
                endif;

                if ( $author_name && $author_image) :
  								$image_url = get_field('photo', 'user_'.$author_id);
  								$image_args = array(
  									'src' => $image_url,
  									'w'   => 300,
  									'h'   => 300,
  								);
                  ?>

                  <div class="post_info">
        						<h1><?php the_title(); ?></h1>
        					</div>
                  <section class="col-xs-12">
                    <div class="col-xs-12">
                      <?php the_content(); ?>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
      								<div class="author_photo col-md-12 col-sm-12 col-xs-12">
      									<a href="<?php echo $author_url; ?>">
                          <img src="<?php echo mapi_thumb($image_args); ?>" alt="<?php the_field('story_title'); ?>">
                        </a>
      								</div>
      								<div class="col-md-12">
      									<h4 align="center"><a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></h4>
      								</div>
                    </div>
                  </section>

  							<?php endif;
              endforeach;
            endif;
            ?>
						</div>
			</article>
			<!-- /article -->
      <?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
