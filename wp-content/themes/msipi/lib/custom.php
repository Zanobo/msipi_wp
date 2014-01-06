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
                        'multiple'      => true,            // multiple <select>?
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