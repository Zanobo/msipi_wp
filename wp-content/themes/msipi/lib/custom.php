<?php
/**
 * Custom functions
 */
function msipi_add_event_attachments( $attachments )
{
  $args = array(

    // title of the meta box (string)
    'label'         => 'Attachments',
    // all post types to utilize (string|array)
    'post_type'     => array( 'event' ), // 'post', 'page',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null, //array('image', 'video', 'text', 'audio'),
    // include a note within the meta box (string)
    'note'          => 'Manage event attachments and access restrictions here.',
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'msipi_attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'msipi_attachments' ),

    'fields'        => array(
      array(
        'name'  => 'title',                          // unique field name
        'type'  => 'text',                           // registered field type
        'label' => __( 'Title', 'msipi_attachments' ),     // label to display
      ),
    array(
        'name'  => 'category',                          // unique field name
        'type'  => 'text',                           // registered field type
        'label' => __( 'Category', 'msipi_attachments' ),     // label to display
      ),      
      array(
        'name'      => 'restricted',                            // unique field name
        'type'      => 'select',                            // registered field type
        'label'     => __( 'Restrict Access to Approved Registrants?', 'msipi_attachments' ), // label to display
        'meta'      => array(                               // field-specific meta as defined by field class
                        'allow_null'    => false,            // allow null value? (adds 'empty' <option>)
                        'multiple'      => false,            // multiple <select>?
                        'options'       => array(           // the <option>s to use
                              '1'     => 'Yes',
                              '0'     => 'No',
                          )
                      ),
      ),
    ),

  );

  $attachments->register( 'msipi_attachments', $args ); // unique instance name
}
add_action( 'attachments_register', 'msipi_add_event_attachments' );

function msipi_add_em_attachments_placeholders($replace, $EM_Event, $result){
  global $wp_query, $wp_rewrite;
	
  switch( $result ){	
	//deprecated
  	case '#_ATTACHPUB':
	   $replace = '';
	   $attachments = new Attachments('msipi_attachments', $EM_Event->post_id);
	   if( $attachments->exist() ) :
	      $replace .= '<ul>';
	      while( $attachments->get() ) :
	        if ($attachments->field('restricted') == 0) :
	          $replace .= '<li><a href="'.
	                      str_replace("%http://%", "https://", $attachments->url())
	                      .'">'. $attachments->field('title').'</a></li>';
	        endif;
		    endwhile;
	          $replace .= '</ul>';
	    endif;
	    break;
			
	//deprecated
  	case '#_ATTACHPRV':
    $replace = '';
    $EM_Booking = $EM_Event->get_bookings()->has_booking();
    if( is_object($EM_Booking) && $EM_Booking->is_reserved() ): //user is logged in and attending this event
      $attachments = new Attachments( 'msipi_attachments', $EM_Event->post_id );
      if( $attachments->exist() ) :
        $replace .= '<ul>';
        while( $attachments->get() ) :
          if ($attachments->field('restricted') == 1) :
            $replace .= '<li><a href="'.
                        str_replace("%http://%", "https://", $attachments->url())
                        .'">'. $attachments->field('title').'</a></li>';
          endif;
        endwhile;
        $replace .= '</ul>';
      endif;
    endif;
		break;
	
		case '#_ATTACHORGANIZED':
			$replace = '';
			$EM_Booking = $EM_Event->get_bookings()->has_booking();
			$event_id = $EM_Event->post_id;
			$attachments = new Attachments( 'msipi_attachments', $event_id );
			
	    // set up an array of attachments indexed by category name
	    if ($attachments->exist()){   
				$attachments_by_category = array();
				
				$serve_restricted =  (is_object($EM_Booking) && $EM_Booking->is_reserved()) ; //user is logged in and attending this event						
	      while( $attachments->get() ) :
					$category = strtolower( $attachments->field('category') );
					
					if ($serve_restricted OR $attachments->field('restricted') == 0) :								
						if (empty($category)) :
							$category = 'uncategorized';
						endif;			
							
						if (!array_key_exists($category,$attachments_by_category)) :
							$attachments_by_category[$category] = array();
						endif;		
								
						$attachments_by_category[$category][] = array(
								'url' => $attachments->url(),
								'title' => $attachments->field('title')
								);
								
					endif;														
	      endwhile;				
			}		
			
			//display HTML based on attachments by category array
			$num_categories = count($attachments_by_category);
			if ($num_categories >= 1) :	
				foreach ($attachments_by_category as $category_name => $attachments ){
					if ($num_categories == 1) { $category_name = 'all files';} //Don't use 'uncategorized' if nothing is categorized
					$collection_id = 'files-' . $event_id . preg_replace("/[^a-z0-9]/", "", $category_name);
					$replace .= '<a class="collapse-toggle collapsed" data-toggle="collapse" data-target="#'. $collection_id .'">'. 
						ucwords($category_name).
						'</a>';
					
	      	$replace .= '<ul id="'. $collection_id .'" class="collapse">';
		      foreach ($attachments as $attachment) {
		      	$url = str_replace("%http://%", "https://", $attachment['url']);
	          $replace .= '<li><a href="'. $url .'">'. $attachment['title'].'</a></li>';					 
	        }			
	      	$replace .= '</ul>';		

				}
      	$replace .= '</ul>';

			endif;
	
			break;
	}		
				
  return $replace;
}
add_filter('em_event_output_placeholder','msipi_add_em_attachments_placeholders',1,3);

function msipi_add_login_notice($content) {

$replace = ( is_user_logged_in() ? '' : 'Attendees can view additional files after <a href="https://msipi.org/wp-login.php"
              >logging in</a>.');

return str_replace("#_ATTACHLOGINNOTE",$replace,$content);

}

add_filter( 'the_content', 'msipi_add_login_notice' );


function msipi_add_my_bookings_link_for_subscribers($wp_admin_bar) {
  // If the user does not have access to publish posts
  if(!current_user_can('publish_posts')) {
    $wp_admin_bar->add_menu( array(
        'id'    => 'my_bookings',
        'title' => 'My Bookings',
        'href'  => 'https://msipi.org/events/my-bookings/',
        'meta'  => array(
            'title' => __('My Bookings'),
        ),
    ));
  }
}
add_action( 'admin_bar_menu', 'msipi_add_my_bookings_link_for_subscribers', 999 );
