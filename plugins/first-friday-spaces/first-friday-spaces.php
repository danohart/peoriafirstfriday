<?php
/*
Plugin Name: First Friday Spaces
Description: First Friday Spaces Post for a directory of businesses and studios
*/

function firstfriday_spaces() {
	$labels = array(
		'name'                  => _x( 'First Friday Spaces', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'First Friday Space', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'First Friday Spaces', 'text_domain' ),
		'name_admin_bar'        => __( 'First Friday Spaces', 'text_domain' ),
		'archives'              => __( 'Space Archives', 'text_domain' ),
		'attributes'            => __( 'Space Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Space:', 'text_domain' ),
		'all_items'             => __( 'All Spaces', 'text_domain' ),
		'add_new_item'          => __( 'Add New Space', 'text_domain' ),
		'add_new'               => __( 'Add New Space', 'text_domain' ),
		'new_item'              => __( 'New Space', 'text_domain' ),
		'edit_item'             => __( 'Edit Space', 'text_domain' ),
		'update_item'           => __( 'Update Space', 'text_domain' ),
		'view_item'             => __( 'View Space', 'text_domain' ),
		'view_items'            => __( 'View Spaces', 'text_domain' ),
		'search_items'          => __( 'Search Space', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Upload Photo for Space', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Space', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Space', 'text_domain' ),
		'items_list'            => __( 'Spaces list', 'text_domain' ),
		'items_list_navigation' => __( 'Spaces list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Spaces list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'First Friday Space', 'text_domain' ),
		'description'           => __( 'First Friday Businesses and Studios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-feedback',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => 'space'),
		'capability_type'       => 'page'
	);
	register_post_type( 'space', $args );
}
add_action( 'init', 'firstfriday_spaces' );

// Add meta box
function space_add_meta_boxes( $post ){
	add_meta_box( 'space_meta_box', __( 'Space Information', 'firstfriday_spaces_plugin' ), 'space_build_meta_box', 'space', 'normal', 'low' );
}
add_action( 'add_meta_boxes_space', 'space_add_meta_boxes' );

// Build custom field meta box
function space_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'space_meta_box_nonce' );

	// retrieve the _space_alcohol current value
	$current_alcohol = get_post_meta( $post->ID, '_space_alcohol', true );
	$current_tagline = get_post_meta( $post->ID, '_space_tagline', true );
	$current_address = get_post_meta( $post->ID, '_space_address', true );
	$current_website = get_post_meta( $post->ID, '_space_website', true );
	$current_socialmedia = get_post_meta( $post->ID, '_space_socialmedia', true );

	$spacetypes = array( 'Studio', 'Gallery', 'Bar', 'Restaurant', 'Shop' );
	// stores _space_spacetypes array
	$current_spacetypes = get_post_meta( $post->ID, '_space_spacetypes', true );

	?>

	<h1 align="center">Please fill out all forms</h1>
	<div class="left" style="float: left; width:45%;">
		<h3><?php _e( 'Tagline', 'firstfriday_spaces_plugin' ); ?></h3>
		<p>
			<h4>Short description of your space</h4>
			<input type="text" name="tagline" placeholder="Studio that hosts a new artist every month!" value="<?php echo $current_tagline; ?>" /> 
		</p>

		<h3><?php _e( 'Location Address', 'firstfriday_spaces_plugin' ); ?></h3>
		<p>
			<input type="text" name="address" placeholder="Street Address" size="45" value="<?php echo $current_address; ?>" /><br/>
			<input type="text" name="address_city" placeholder="Peoria" size="7" value="Peoria" />
			<input type="text" name="address_state" maxlength="2" size="2" value="IL" />
		</p>

		<h3><?php _e( 'Links', 'firstfriday_spaces_plugin' ); ?></h3>
		<p>
			Website: <input type="text" name="website" placeholder="Include http://" value="<?php echo $current_website; ?>" />
		</p>
	</div>
	<div class="right" style="float: right; width:45%;">
		<h3><?php _e( 'Is Alcohol Served?', 'firstfriday_spaces_plugin' ); ?></h3>
		<p>
			<input type="radio" name="alcohol" value="Yes" <?php checked( $current_alcohol, 'Yes' ); ?> /> Yes<br />
			<input type="radio" name="alcohol" value="No" <?php checked( $current_alcohol, 'No' ); ?> /> No
		</p>

		<h3><?php _e( 'Space Types', 'firstfriday_spaces_plugin' ); ?></h3>
		<p>
		<?php
		foreach ( $spacetypes as $spacetype ) {
			?>
			<input type="checkbox" name="spacetypes[]" value="<?php echo $spacetype; ?>" <?php checked( ( in_array( $spacetype, $current_spacetypes ) ) ? $spacetype : '', $spacetype ); ?> /><?php echo $spacetype; ?> <br />
			<?php
		}
		?>
		</p>
	</div>
	<br clear="all"/>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function space_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['space_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['space_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

  // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	// store custom fields values
	// alcohol string
	if ( isset( $_REQUEST['alcohol'] ) ) {
		update_post_meta( $post_id, '_space_alcohol', sanitize_text_field( $_POST['alcohol'] ) );
	}

	// store custom fields values
	// tagline string
	if ( isset( $_REQUEST['tagline'] ) ) {
		update_post_meta( $post_id, '_space_tagline', sanitize_text_field( $_POST['tagline'] ) );
	}

	// store custom fields values
	// website string
	if ( isset( $_REQUEST['website'] ) ) {
		update_post_meta( $post_id, '_space_website', sanitize_text_field( $_POST['website'] ) );
	}

	// store custom fields values
	// social media string
	if ( isset( $_REQUEST['socialmedia'] ) ) {
		update_post_meta( $post_id, '_space_socialmedia', sanitize_text_field( $_POST['socialmedia'] ) );
	}

	// store custom fields values
	// address string
	if ( isset( $_REQUEST['address'] ) ) {
		update_post_meta( $post_id, '_space_address', sanitize_text_field( $_POST['address'] ) );
	}

	// store custom fields values
	// spacetypes array
	if( isset( $_POST['spacetypes'] ) ){
		$spacetypes = (array) $_POST['spacetypes'];

		// sanitize array
		$spacetypes = array_map( 'sanitize_text_field', $spacetypes );

		// save data
		update_post_meta( $post_id, '_space_spacetypes', $spacetypes );
	}else{
		// delete data
		delete_post_meta( $post_id, '_space_spacetypes' );
	}
}
add_action( 'save_post_space', 'space_save_meta_box_data' );