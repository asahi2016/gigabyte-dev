<?php

/**
 * @file
 * User page callbacks for the custom_search module.
 */

/*
 * Presents links to filter the search results.
 */
function custom_search_preprocess_search_results(&$variables) {
  if ($variables['module'] == 'node') {
    $variables['filter_position'] = variable_get('custom_search_filter', 'disabled');

    // Save # of results for collapsing advanced search.
    $GLOBALS['custom_search_nb_results'] = count($variables['results']);
    // Generate the filter.
    if (user_access('use custom search') && $variables['filter_position'] != 'disabled') {
      // Get search words (minus type:node_type).
      $path = explode('/', $_GET['q'], 3);
      $keys = empty($_REQUEST['keys']) ? '' : $_REQUEST['keys'];


      if (count($path) == 3) {
        $keys = $path[2];
      }
        $type = false;
      if (strpos($keys, 'type:') !== FALSE) {
          $type = drupal_substr($keys, strpos($keys, 'type:'));
          $type = ($type) ? trim(str_replace('type:','',$type)) : 0;
          $keys = drupal_substr($keys, 0, strpos($keys, 'type:') - 1);

      }
      // Get Custom Search authorized types.
      $searchable_node_types = variable_get('custom_search_node_types', array());
      $searchable_node_types = array_keys(array_filter($searchable_node_types, 'custom_search_filter_array'));

      $all_results = content_search_execute_based_on_content($keys);

      $node_count = array();
      $nodetype = array();
      $nodes_cnt = array();
      $nodes_cnts = array();
      $total = 0;

      foreach($all_results as $node_key => $node){

          if(in_array(strtolower($node['node']->type), $searchable_node_types)){
              $node_count[strtolower($node['node']->type)][$node_key] = $node['node']->type;
              $nodes_cnts[$node['node']->type] = count($node_count[strtolower($node['node']->type)]);
              $nodes_cnt[$node['node']->type] = $node['node']->type;
              $nodetype[strtolower($node['node']->type)]['type']= $node['type'];
          }
      }

      foreach($nodes_cnts as $cn){
          $total = $total+ $cn;
      }

      if (!count($searchable_node_types)) {
        $searchable_node_types = array_keys(node_type_get_names());
      }
        $node_types = db_query("SELECT type, name FROM {node_type} WHERE type IN (:ntypes)", array(':ntypes' => $searchable_node_types));
        
      // Build menu.
        $items = array();
        $items[] = l(variable_get('custom_search_type_selector_all', CUSTOM_SEARCH_ALL_TEXT_DEFAULT), 'search/node/' . $keys).' <span class="count">('.$total.')</span>';

        $cnt = 0;
        foreach ($node_types as $node_type) {
            // Count # of results per type.
            $nbresults = 1;
            $cnt = in_array($node_type->type , $nodes_cnt) ? count($node_count[$node_type->type]) : 0;
            //$total = $total + $cnt;

            if ($nbresults) {
                if(!empty($node_type->type)){
                    if($cnt > 0 ){
                        $items[] = l($node_type->name, 'search/node/' . $keys . ' type:' . $node_type->type).' <span class="count">('.$cnt.')</span>';
                    }

                }
            }
          }
          $variables['name'] = 'All';
          if($type !== false) {
              $variables['count'] = count($node_count[$type]);
              $variables['name'] = $nodetype[$type]['type'];
          }else{
              $variables['count'] = $total;

          }
          $variables['all_results']= $total;
          if (!isset($variables['filter-title'])) {
            $variables['filter-title'] = filter_xss(variable_get('custom_search_filter_label', CUSTOM_SEARCH_FILTER_LABEL_DEFAULT));
          }

          if ($items) {
            $variables['filter'] = theme('item_list', array('items' => $items, 'title' => $variables['filter-title']));
          }
      }
      $variables['theme_hook_suggestions'][] = 'custom_search_results';
  }
}

/*
 * Customisation of the results info.
 */
function custom_search_preprocess_search_result(&$variables) {

  $variables['user_access_field'] = true;
  if(!field_check_user_access($variables['result']['node'])){
        $variables['user_access_field'] = false;
  }
  $infos = array();
  // In Drupal 7 the content type is no longer in the info array.
  if (variable_get('custom_search_results_info_type', TRUE) && $variables['module'] == 'node') {
    $infos[] = $variables['result']['type'];
  }
  if (isset($variables['info_split'])) {
    foreach ($variables['info_split'] as $key => $info) {
      if (variable_get('custom_search_results_info_' . $key, TRUE)) {
        array_push($infos, $info);
      }
    }
  }
  $variables['url'] = ($variables['result']['node']->type != 'tools_assets_logos')? $variables['url'] : urldecode(url('partner/upload-assets/'.$variables['result']['node']->title, array('absolute'=> TRUE)));
  $variables['info'] = implode(' - ', $infos);
  $variables['theme_hook_suggestions'][] = 'custom_search_result';
}

function content_search_execute_based_on_content($keys){

    // Build matching conditions
    $query = db_select('search_index', 'i', array('target' => 'slave'))->extend('SearchQuery');
    $query->join('node', 'n', 'n.nid = i.sid');
    $query
        ->condition('n.status', 1)
        ->addTag('node_access')
        ->searchExpression($keys, 'node');

    // Insert special keywords.
    $query->setOption('type', 'n.type');
    $query->setOption('language', 'n.language');
    if ($query->setOption('term', 'ti.tid')) {
        $query->join('taxonomy_index', 'ti', 'n.nid = ti.nid');
    }
    // Only continue if the first pass query matches.
    if (!$query->executeFirstPass()) {
        return array();
    }

    // Add the ranking expressions.
    _node_rankings($query);

    // Load results.
    $find = $query
        //->limit(10)
        ->execute();
    $results = array();
    foreach ($find as $item) {
        // Build the node body.
        $node = node_load($item->sid);
        node_build_content($node, 'search_result');
        $node->body = drupal_render($node->content);
        if(!field_check_user_access($node)){ continue; }
        // Fetch comments for snippet.
        //$node->rendered .= ' ' . module_invoke('comment', 'node_update_index', $node);
        // Fetch terms for snippet.
        //$node->rendered .= ' ' . module_invoke('taxonomy', 'node_update_index', $node);

        $extra = module_invoke_all('node_search_result', $node);

        $results[] = array(
            'link' => url('node/' . $item->sid, array('absolute' => TRUE)),
            'type' => check_plain(node_type_get_name($node)),
            'title' => $node->title,
            'user' => theme('username', array('account' => $node)),
            'date' => $node->changed,
            'node' => $node,
            'extra' => $extra,
            'score' => $item->calculated_score,
            'snippet' => search_excerpt($keys, $node->body),
        );
    }
    return $results;
}

function field_check_user_access($node){

    $access = false;

    if($node->type == 'tools_assets_logos') {

        global $user;

        $usr = user_load($user->uid);
        foreach ($usr->roles as $key => $value) {
            if ($key != 2) {
                $role['value'] = $value;
                $role['id'] = $key;
            }
        }

        $permitted_roles = explode(',', $node->field_permitted_roles_tal['und'][0]['value']);

        foreach ($permitted_roles as $rkey => $rval) {
            if ($role['id'] == trim($rval)) {
                $access = true;
            }
        }
        if (in_array('administrator', array_values($user->roles))) {
            $access = true;
        }
    }else{
        $access = true;
    }

    return $access;
}



