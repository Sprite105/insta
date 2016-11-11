<?php 

# ###############
# This site was is developed by KarmaPlus studio !
# Website: http://www.karmaplus.com.ua/
# Developer: Vyacheslav Okara ( http://www.studioez.com.ua/ )
# ###############

###################### Get Start ######################

# Add post-thumbnails
add_theme_support('post-thumbnails');

# For title
add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
remove_filter('the_content', 'wpautop');
 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'textdomain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/******************************************************
# Get fields value from page number
# Good luck ^_^
******************************************************/
function karma( $name, $page = 0 ) {

	if( $page <= 0 || empty( $name ) ) return false;

    $value = get_field( $name, $page ); 

    return $value;
}
/******************************************************/
//Menu registe
add_theme_support( 'menus' );


/******************************************************
# Get posts image, title, image from category number
# Good luck ^_^
******************************************************/
function get_posts_data( $number, $type = "DESC", $count = 0 ) {

	if ( ( $number <= 0 || empty( $number ) ) && $number != "all" ) return false;

	if ( $number != "all" ) $cond = "category=" . $number;
	   else $cond = "";

	if ( $count > 0 ) $npost = "numberposts=" . $count . "&";
	   else $npost = "posts_per_page=20&";

	$posts = get_posts ( $npost . "order=" . $type . "&post_type=post&" . $cond );
	
	if ( $posts ) { $i = 0;

		foreach ( $posts as $post ) { //setup_postdata($post);

			$thumbnail[$i] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large');
			$thumbnail[$i] = $thumbnail[$i][0];
			$thumbnail_img[$i] = get_the_post_thumbnail( $post->ID, 'thumbnail' ); 
			$title[$i] = $post->post_title;
			$content[$i] = $post->post_content;
			$ext[$i] = get_extended($post->post_content);
			$ext[$i] = $ext[$i];
			$permalink[$i] = $post->guid;
			$id[$i] = $post->ID;
			$i++;

    	} //wp_reset_postdata();

    	$params[0] = $thumbnail;
    	$params[1] = $title;
    	$params[2] = $permalink;
    	$params[3] = $i;
    	$params[4] = $content;
    	$params[5] = $id;
    	$params[6] = $thumbnail_img;
    	$params[7] = $ext;

	} return $params;

}
/******************************************************/

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args = '' ){
	$args['container'] = false;
	return $args;
}

class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= "";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a $attributes $class_names>"
        . $args->link_before
        . $title
        . '</a>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

?>
