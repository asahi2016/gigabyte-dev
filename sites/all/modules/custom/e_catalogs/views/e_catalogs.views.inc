<?php

/**
 * Implements hook_views_data().
 */
/*function asset_upload_views_data()
{

    $data = array();

    $data['asset_uploads']['table']['group'] = t('Content');

    $data['asset_uploads']['table']['base'] = array(
        'title' => t('Exposed'),
        'help' => t('Contains records we want exposed to Views.'),
    );

    // The ID field
    $data['asset_uploads']['id'] = array(
        'title' => t('ID'),


        'help' => t('The record ID.'),
        'field' => array(
            'handler' => 'views_handler_field_numeric',
        ),
        'sort' => array(
            'handler' => 'views_handler_sort',
        ),
        'filter' => array(
            'handler' => 'views_handler_filter_numeric',
        ),
    );

    return $data;

}*/