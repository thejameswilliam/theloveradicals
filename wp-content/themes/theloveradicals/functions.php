<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Remove Admin bypostauthor
    //show_admin_bar(false);



    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('slickjs', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('slickjs'); // Enqueue it!

        wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('bootstrap'); // Enqueue it!



    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_single()) {
      wp_register_style('story_fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300', array(), '1.0.0'); // Custom scripts
      wp_enqueue_style('story_fonts'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0'); // Custom scripts
    wp_enqueue_style('fontawesome'); // Enqueue it!

    wp_register_style('source_fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro|Cardo:400i|Permanent+Marker|Merriweather:300', array(), '1.0.0'); // Custom scripts
    wp_enqueue_style('source_fonts'); // Enqueue it!




}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Footer Widget Area
    register_sidebar(array(
        'name' => __('Column 1 Footer Widgets', 'html5blank'),
        'description' => __('Widgets that appear in the footer of all pages', 'html5blank'),
        'id' => 'widget-col-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Column 2 Footer Widgets', 'html5blank'),
        'description' => __('Widgets that appear in the footer of all pages', 'html5blank'),
        'id' => 'widget-col-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Column 3 Footer Widgets', 'html5blank'),
        'description' => __('Widgets that appear in the footer of all pages', 'html5blank'),
        'id' => 'widget-col-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('Previous Page'),
        'next_text' => __('Next Page'),
    ));
}




// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}


// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
  if(empty( $args['has_children'] )) :
    $classes = array('child');
  else:
    $classes = array('parent');
  endif;

  if($depth < 2) :
    $classes[] = 'row';
    $classes[] = 'comment-story';
  else:

  endif;


//empty( $args['has_children'] ) ? '' : 'parent'

?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class($classes); ?> id="comment-<?php comment_ID() ?>">

  <?php

    if($depth > 1) :
     $com_classes = 'reply comment-body col-xs-12';
    else:
     $com_classes = 'comment-body col-xs-12';
    endif;
  ?>
    <div id="div-comment-<?php comment_ID() ?>" class="<?php echo $com_classes; ?>">

      <?php if ($comment->comment_approved == '0') : ?>
      	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
      	<br />
      <?php endif; ?>
      <div class="comment-author vcard col-md-2 col-xs-4">
      	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
    	</div>
      <div class="comment-meta commentmetadata col-md-10 col-xs-8">
        <div class="comment-author pull-left">
          <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        </div>
        <div class="comment-date pull-right">
          <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
        </div>

      </div>
      <div class="comment-text col-md-10 col-md-offset-2 col-xs-12">
        <?php comment_text() ?>
      </div>

      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<div class="pull-right">', 'after' => '</div>'))) ?>
    </div>

<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


/*------------------------------------*\
	Love Radicals Functions
\*------------------------------------*/

function love_imageshowcase() {
  // check if the repeater field has rows of data
if( have_rows('images', 'options') ):
 	// loop through the rows of data
  echo '<div class="side-image">';
    while ( have_rows('images', 'options') ) : the_row();

      $image_url = get_sub_field('image', 'options');
      $image_args = array(
        'src' => $image_url,
        'w'   => 650,
        'h'   => 1000,
        'q'   => 90,
      ); ?>
    <img src="<?php echo mapi_thumb($image_args); ?>">

    <?php endwhile;
     echo '</div>';
endif;
}


add_filter('acf/pre_save_post' , 'love_pre_save_story', 1);
function love_pre_save_story( $post_id ) {
  if ( $post_id != 'new_post' ) {return $post_id;};
    $post = array(
        'post_status' => 'draft',
        'post_title' => $_POST['acf']['field_583a062a7d688'],
        'post_name' => $_POST['acf']['field_583a062a7d688'],
        'post_content' => $_POST['acf']['field_583a05c87d685'],
        'post_type' => 'post',
        'post_category' => array('Story')
    );
    // insert the post
    $post_id = wp_insert_post( $post );

	   // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}


//add_filter('acf/pre_save_post' , 'love_pre_save_user', 1);
function love_pre_save_user( $post_id) {
  if ( $post_id != get_current_user_id() ) {return $post_id;};
    $user_info = array(
      'first_name' => $_POST['acf']['field_583a2c15c4582'],
      'last_name' => $_POST['acf']['field_583a4c53624d2'],
      'description' => $_POST['acf']['field_583a2c31c4584'],
      'user_email' => $_POST['acf']['field_583a2c27c4583'],
      'user_pass' => $_POST['acf']['field_583a2c52c4586'],
    );

    // insert the post
    $post_id = wp_update_user( $user_info );

	   // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}



add_filter( 'posts_where', 'love_attachments_wpquery' );
function love_attachments_wpquery( $where ){
	global $current_user;

	if( is_user_logged_in() && !current_user_can('manage_options')){
		if( isset( $_POST['action'] ) ){
			// library query
			if( $_POST['action'] == 'query-attachments' ){
				$where .= ' AND post_author='.$current_user->data->ID;
			}
		}
	}

	return $where;
}


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Love Radicals Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
    'position' => '1.1',
		'redirect'		=> false
	));


}
