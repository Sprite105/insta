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

function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

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

function pDel( $str ) {
	echo str_replace( '</p>', '', str_replace( '<p>', '', $str ) );
}

function brDel( $str ) {
	return str_replace( '<br>', '', $str );
}

?>
