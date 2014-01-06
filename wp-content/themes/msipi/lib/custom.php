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
    'filetype'      => array('image', 'video', 'text', 'audio'), //null,
    // include a note within the meta box (string)
    'note'          => 'Manage Attachments',
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
        'name'      => 'restricted',                            // unique field name
        'type'      => 'select',                            // registered field type
        'label'     => __( 'Restrict Access to Approved Registrants?', 'msipi_attachments' ),       // label to display
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
       case '#_ATTACHPUB':
	  $replace = '';
          $attachments = new Attachments('msipi_attachments', $EM_Event->post_id);
          if( $attachments->exist() ) :
            $replace .= '<ul>';
            while( $attachments->get() ) :
	      if $attachments->field('restricted') == 0 :
                $replace .= '<li><a href="'.$attachments->url().'">'. $attachments->field('title')
			.$attachments->field('restricted') . ($attachments->field('restricted') ==0 ? 'true' : 'false') .'</a></li>';
              endif
  	    endwhile;
            $replace .= '</ul>';
          endif;
          break;

	case '#_ATTACHPRV':
          $replace = '';
          $EM_Booking = $EM_Event->get_bookings()->has_booking();
          if( is_object($EM_Booking) ):
            $attachments = new Attachments( 'msipi_attachments', $EM_Event->post_id );
            if( $attachments->exist() ) :
              $replace .= '<ul>';
              while( $attachments->get() && ( $attachments->field('restricted')== 1 )) :
                $replace .= '<li>' . 
			'<a href="'.$attachments->url().'">'. $attachments->field('title') 
		.'</a></li>';
              endwhile;
              $replace .= '</ul>';
            endif;
          endif;

          break;
    }
    return $replace;
}
add_filter('em_event_output_placeholder','msipi_add_em_attachments_placeholders',1,3);
