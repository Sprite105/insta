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

?>
