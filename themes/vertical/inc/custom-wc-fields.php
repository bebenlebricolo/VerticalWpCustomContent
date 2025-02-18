<?php

// Custom WooCommerce product fields

if(!function_exists('wc_custom_product_data_fields')){

  function wc_custom_product_data_fields(){

    $custom_product_data_fields = array();

    $custom_product_data_fields[] = array(
          'tab_name'    => __('Extra', 'flatsome'),
    );

    $custom_product_data_fields[] = array(
          'id'          => '_bubble_new',
          'type'        => 'select',
          'label'       => __('"New" Bubble', 'flatsome'),
          'description' => __('Enable a New bubble on this product', 'flatsome'),
          'desc_tip'    => true,
           'options'     => array(
              ''  => 'Disabled',
              '"yes"'  => 'Enabled',
          ),
    );


    $custom_product_data_fields[] = array(
          'id'          => '_custom_tab_title',
          'type'        => 'text',
          'label'       => __('Custom Tab Title', 'wc_cpdf'),
          //'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
          'class'       => 'large',
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );


    $custom_product_data_fields[] = array(
          'id'          => '_custom_tab',
          'type'        => 'textarea',
          'label'       => __('Custom Tab Content', 'flatsome'),
          //'placeholder' => __('', 'wc_cpdf'),
          'style'       => 'width:100%;height:140px;',
          'description' => __('Enter content for custom product tab here. Shortcodes are allowed', 'flatsome'),
          'desc_tip'    => true,
    );

    /*

    // GET THE ID;
    global $wc_cpdf;
    echo $wc_cpdf->get_value(get_the_ID(), 'bubble_new');

    /*
    $custom_product_data_fields[] = array(
          'id'          => '_mytext',
          'type'        => 'text',
          'label'       => __('Text', 'wc_cpdf'),
          'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
          'class'       => 'large',
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'          => '_mynumber',
          'type'        => 'number',
          'label'       => __('Number', 'wc_cpdf'),
          'placeholder' => __('Number.', 'wc_cpdf'),
          'class'       => 'short',
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'          => '_mytextarea',
          'type'        => 'textarea',
          'label'       => __('Textarea', 'wc_cpdf'),
          'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
          'style'       => 'width:70%;height:140px;',
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'          => '_mycheckbox',
          'type'        => 'checkbox',
          'label'       => __('Checkbox', 'wc_cpdf'),
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'          => '_myselect',
          'type'        => 'select',
          'label'       => __('Select', 'wc_cpdf'),
          'options'     => array(
              'option_1'  => 'Option 1',
              'option_2'  => 'Option 2',
              'option_3'  => 'Option 3'
          ),
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'          => '_myradio',
          'type'        => 'radio',
          'label'       => __('Radio', 'wc_cpdf'),
          'options'     => array(
                'radio_1' => 'Radio 1',
                'radio_2' => 'Radio 2',
                'radio_3' => 'Radio 3'
          ),
          'description' => __('Field description.', 'wc_cpdf'),
          'desc_tip'    => true,
    );

    $custom_product_data_fields[] = array(
          'id'         => '_myhidden',
          'type'       => 'hidden',
          'value'      => 'Hidden Value',
    );

    */

    return $custom_product_data_fields;


  }



}

?>
